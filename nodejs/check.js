var mysql = require('mysql')
// Let’s make node/socketio listen on port 3000
var io = require('socket.io').listen(3000)
// Define our db creds
var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
	password: '',
    database: 'BUFFET',
    insecureAuth: true
})
 
// Log any errors connected to the db
db.connect(function(err){
    if (err) console.log(err)
})
 
// Define/initialize our global vars

var order = [];
var notes = [];
var select_history = [];
var isInitNotes = false
var socketCount = 0
var type;
var get_menu=[];
io.sockets.on('connection', function(socket){
    // Socket has connected, increase socket count
    socketCount++;
    // Let all sockets know how many are connected
    io.sockets.emit('users connected', socketCount);
 
    socket.on('disconnect', function() {
        // Decrease the socket count on a disconnect, emit
        socketCount--
        io.sockets.emit('users connected', socketCount)
    });
 
	
socket.on('get deviceID', function(data){
db.query('select id, kitchenType from tbl_DEVICE where uuid = ? and enable = 1', [data.uuid]).on('result', function(select_data){
	type = select_data.kitchenType;
	//console.log('here'+select_data.kitchenType);
io.sockets.emit('set deviceID', select_data);
//for current
db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process != 2 and  b.CatID = ?', [select_data.kitchenType])
            .on('result', function(data_select){
                // Push results onto the notes array
                //notes = [];
                notes.push(data_select);
                io.sockets.emit('initial notes', notes);
            }).on('end', function(){
                // Only emit notes after query has been completed
                notes = [];
            });
//for history
db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process = 2 and  b.CatID = ? order by a.id DESC', [select_data.kitchenType])
            .on('result', function(data_select_history){
                // Push results onto the notes array
                //select_history = [];
                select_history.push(data_select_history);
                io.sockets.emit('initial history', select_history);
            }).on('end', function(){
                // Only emit notes after query has been completed
                select_history = [];
            });

	});
});

	socket.on('send type', function(data){
	//for get menu cat
db.query('select a.CatID,b.ChiName from tbl_TYPECAT a left outer join tbl_CAT b on a.CatID = b.id left outer join tbl_TABLESTATUS c on c.type = a.typeID where c.type = ? and c.TableID = ?', [data.typeid, data.tableID])
            .on('result', function(data_cat){
                get_menu.push(data_cat);
                io.sockets.emit('get cat', get_menu);
            }).on('end', function(){
                // Only emit notes after query has been completed
                get_menu = [];
            });
	});

    socket.on('new note', function(data){
        // New note added, push to all sockets and insert into db
        //notes.push(data);
        io.sockets.emit('new note', data);
        // Use node's db injection format to filter incoming data
        //db.query('INSERT INTO notes (note) VALUES (?)', data.note)
		//console.log(data.takeby);
		db.query('select id from tbl_DEVICE where uuid = ? and enable = 1', [data.takeby]).on('result', function(select_data){
			//console.log(data);
		db.query('update tbl_ORDER set takeby = ?, process = ? where id = ?', [select_data.id, data.process, data.id]);
		});

    });

    socket.on('new order', function(data, callback){
        // New note added, push to all sockets and insert into db
        db.query('insert into tbl_ORDER(FoodID, NumberOfSet, TableNo, OrderNo) values (?, ?, ?, ?)', [data.foodID, data.quan, data.tableno, data.orderno], function(err, info){
			db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process != 2  and a.id = ? and b.CatID = ?',[info.insertId, type])
            .on('result', function(data){
                // Push results onto the notes array
                //output_order.push(data);
				//output_order;
				var output_order = [];
                output_order.push(data);
				console.log(output_order);
                //output_order = [];
		io.sockets.emit('output order', output_order);
            });

        });
        //isInitNotes = false;

    });
 
    socket.on('new done', function(data){
            db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process = 2  and a.id = ?',[data.id])
            .on('result', function(data_done){
                var done_order = [];
                done_order.push(data_done);
                //console.log(output_order);
                //output_order = [];
        io.sockets.emit('done', done_order);
 });
    });

    // Check to see if initial query/notes are set
	
	//if (! isInitNotes) {
        // Initial app start, run db query
		//and kitchenType = ?', [getdata.type]

 /* 		console.log('here:'+type);
        db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process != 2 and  b.CatID = ?', [type])
            .on('result', function(data){
                // Push results onto the notes array


				notes.push(data)
                io.sockets.emit('initial notes', notes)
            })
            .on('end', function(){
                // Only emit notes after query has been completed

            })

      isInitNotes = true
    } else {
        // Initial notes already exist, send out
        socket.emit('initial notes', notes)
    }*/

    /*if (!isInitNotes){
        // Initial app start, run db query
		//and kitchenType = ?', [getdata.type]
        db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby where a.process != 2 and deviceType = 2')
            .on('result', function(data){
                // Push results onto the notes array
                notes.push(data)
            })
            .on('end', function(){
                // Only emit notes after query has been completed
                socket.emit('initial notes', notes)
            })

        isInitNotes = true
    }else {
        // Initial notes already exist, send out
        socket.emit('initial notes', notes)
    }*/
});