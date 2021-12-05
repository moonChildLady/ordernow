var mysql = require('mysql');
var http = require('http');
// Let’s make node/socketio listen on port 3000
var io = require('socket.io').listen(3000)
// Define our db creds
var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
	password: '23602312',
    database: '',
    insecureAuth: true
})
 
// Log any errors connected to the db
db.connect(function(err){
    if (err) console.log(err)
})
 
// Define/initialize our global vars
/*function getMessages(uuid) {
    http.get({ host: 'pad.dress4u.hk', port: 80, path: 'check.php?uuid='+uuid, method: 'GET' }, function(response) {
    //http.get({ url:'http://pad.dress4u.hk/check.php?uuid='+uuid }, function(response) {
        var data = "";
        response.on('data', function(chunk) {
            data += chunk;
        });
        response.on('end', function() {
            io.socket.emit(JSON.parse(data));
        });
    });
}*/

var order = [];
var notes = [];
var select_history = [];
var isInitNotes = false
var socketCount = 0
var type;
var uuid;
var get_menu=[];
var get_order_menu = [];
var usernames = {};
var onlineClients = {};
var admin_get_table = [];
var table_info = [];
var order_info = [];
io.sockets.on('connection', function(socket){
    // Socket has connected, increase socket count
    socketCount++;
    // Let all sockets know how many are connected
    io.sockets.emit('users connected', socketCount);
    socket.on('disconnect', function() {
        // Decrease the socket count on a disconnect, emit
        socketCount--
        io.sockets.emit('users connected', socketCount);
        //delete usernames[socket.username];
    });
 

/*var getScoring = function(callback) {
    var url = 'http://pad.dress4u.hk/check.php?uuid='+uuid;
    var dataReturn;
    getJsonFromJsonP(url, function (err, data) {
        //pass data to callback function
        callback(data);
    });
}

socket.on('check', function(data){
    uuid = data.uuid;
    getScoring( function(data){
        socket.emit('set init', { data: data });
    });
}); */



socket.on('check', function(data){
var url = 'http://pad.dress4u.hk/check.php?uuid='+data.uuid;

http.get(url, function(res) {
    var body = '';

    res.on('data', function(chunk) {
        body += chunk;
    });

    res.on('end', function() {
        socket.username = data.uuid;
        if(data.pr!=1){
        onlineClients[data.uuid] = socket.id;
        }
        var fbResponse = JSON.parse(body);
        var id=onlineClients[data.uuid];
        io.sockets.socket(id).emit('set init', fbResponse);
        console.log(fbResponse);
        console.log(onlineClients);
    });
}).on('error', function(e) {
      console.log("Got error: ", e);
});
});


socket.on('get deviceID', function(data){
db.query('select a.id, a.kitchenType, b.ChiName, b.id from tbl_DEVICE a left outer join tbl_CAT b on a.kitchenType = b.id where a.uuid = ? and a.enable = 1', [data.uuid]).on('result', function(select_data){
	type = select_data.kitchenType;
	console.log('here'+select_data.kitchenType);
io.sockets.socket(socket.id).emit('set deviceID', select_data);
	});
db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process != 2 and  b.CatID = ?', [type])
            .on('result', function(data){
                // Push results onto the notes array


                notes.push(data)
                io.sockets.emit('initial notes', notes)
            })
            .on('end', function(){
                // Only emit notes after query has been completed
                notes.length = 0;

            });
});




socket.on('send type', function(data){
	//for get menu cat
db.query('select a.CatID,b.ChiName from tbl_TYPECAT a left outer join tbl_CAT b on a.CatID = b.id left outer join tbl_TABLELOG c on c.type = a.typeID where c.type = ? and c.TableID = ? and c.Status = 1', [data.typeid, data.tableID])
            .on('result', function(data_cat){
                get_menu.push(data_cat);
                
            }).on('end', function(){
                // Only emit notes after query has been completed
                io.sockets.socket(socket.id).emit('get cat', get_menu);
                get_menu.length = 0;
            });
//for current
db.query('Select b.id, b.EnglishName as food_engname, b.ChiName as food_chiname, b.Description, b.images, b.Calorie, c.chiname as source_chiname, c.englishname as source_engname, CONCAT("$", FORMAT(d.Price, 2)) as Price, d.Price as "ShowPrice", b.CatID from tbl_FOOD b left outer join tbl_SOURCE c on b.Source = c.id left outer join tbl_PRICE d on b.id = d.FoodID left outer join tbl_TYPECAT e on e.CatID =  b.CatID where typeID = ?;', [data.typeid])
            .on('result', function(data_select){
                // Push results onto the notes array
                //notes = [];
                get_order_menu.push(data_select);
                
            }).on('end', function(){
                io.sockets.socket(socket.id).emit('menu order', get_order_menu);
                get_order_menu.length = 0;
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


	

socket.on('admin access', function(data){
db.query('select id, deviceType from tbl_DEVICE where uuid = ? and enable = 1', [data.uuid]).on('result', function(select_data){
	var admin_type = select_data.deviceType;
	if(admin_type=='99'){
db.query('SELECT a.tableID, c.uuid FROM tbl_TABLESTATUS a left outer join tbl_TABLE b on b.TableNo = a.tableID left outer join tbl_DEVICE c on b.deviceID = c.id WHERE status = 1')
            .on('result', function(data){
                // Push results onto the notes array


                admin_get_table.push(data)
                io.sockets.emit('admin get table', admin_get_table);
            })
            .on('end', function(){
                // Only emit notes after query has been completed
                admin_get_table.length = 0;

            });
}else{
	return false;
}
});
});

//admin cp [get table]
	
socket.on('get table info', function(){
	db.query('select a.tableID, a.Status, a.orderNo, a.NumberOfSeat, a.Type, a.CreatedOn, c.uuid, a.LastOrder, a.ExpiredOn from tbl_TABLELOG a left outer join tbl_TABLE b on a.tableID = b.TableNo left outer join tbl_DEVICE c on b.DeviceID = c.id').on('result', function(table_data){
		table_info.push(table_data);
		
		}).on('end', function(){
                // Only emit notes after query has been completed
                socket.emit('rev table info',table_info);
                table_info.length = 0;

            });

});

//admin cp [get order]
    
socket.on('get order info', function(data){
    db.query('select b.ChiName, a.process, a.NumberOfSet, c.Price from tbl_ORDER a left outer join tbl_FOOD b on b.id = a.FoodID left outer join tbl_PRICE c on a.FoodID = c.FoodID where orderNo = ?', [data.orderno]).on('result', function(order_data){
        order_info.push(order_data);
        
        }).on('end', function(){
                // Only emit notes after query has been completed
               socket.emit('rev order info',order_info);
                order_info.length = 0;

            });
    
});

//boradcast the msg
socket.on('send msg', function(data){
io.sockets.emit('rev msg',data);
});

    // Check to see if initial query/notes are set
	
	/*if (! isInitNotes) {
        // Initial app start, run db query
		//and kitchenType = ?', [getdata.type]

 		console.log('here:'+type);
        db.query('SELECT a.id, b.ChiName, a.NumberOfSet, a.TableNo, a.takeby, c.uuid, a.process, a.updatetime FROM tbl_ORDER a left outer join tbl_FOOD b on a.FoodID = b.id left outer join tbl_DEVICE c on c.id = a.takeby left outer join tbl_CAT d on d.id = b.CatID where a.process != 2 and  b.CatID = ?', [type])
            .on('result', function(data){
                // Push results onto the notes array


				notes.push(data)
                io.sockets.emit('initial notes', notes)
            })
            .on('end', function(){
                // Only emit notes after query has been completed
                //notes.length = 0;

            });

      isInitNotes = true
    } else {
        // Initial notes already exist, send out
        socket.emit('initial notes', notes)
    }

    if (!isInitNotes){
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
