chokidar = require('chokidar');
var fs = require('fs');
var http = require('http');
var filename = require("path");
var gm = require('gm');
// Let¡¦s make node/socketio listen on port 3000
var io = require('socket.io').listen(3000);
/*
var watcher = chokidar.watch('/home/www/pad/album', {
  ignored: /[\/\\]\./, persistent: true
});
*/

var log = console.log.bind(console);
var images = [];
var isInit = false;
var eventID;
io.sockets.on('connection', function(socket){
	
	
	socket.on('sent eventID', function(data, cb){
        // New note added, push to all sockets and insert into db
		console.log(data);
        eventID = data.eventID;
		socket.emit('re eventID', eventID);
        //console.log(eventID);
		cb({images: data.eventID});
})


chokidar.watch('/home/www/pad/album/', {
	//ignored: /[\/\\]\./, 
	ignored: "/home/www/pad/album/*/*/thumb_*.*", 
	persistent: true,awaitWriteFinish: {
    stabilityThreshold: 2000,
    pollInterval: 100
  }}).on('add', function(path) {
	  var thumb = "thumb_"+filename.basename(path);
	  var myarr = path.split("/");
	  var folder = myarr[5];
	  var thumb_path = "/home/www/pad/album/"+folder+"/thumb/";
	  
gm(path)
.resize(200,200)
.write(thumb_path+thumb, function (err) {
socket.emit('init images', {images: [filename.basename(path)], path: path,folder:folder});




});

console.log('Found file'); 
images = [];
})
.on('change', function(path) { 
console.log('file change'); 
 });







chokidar.watch('/home/www/pad/album/', {ignored: /[\/\\]\./, persistent: true,awaitWriteFinish: {
    stabilityThreshold: 2000,
    pollInterval: 100
  }}).on('unlink', function(path) {
	  
	   var thumb = "thumb_"+filename.basename(path);
	  var myarr = path.split("/");
	  var folder = myarr[5];
	  var thumb_path = "/home/www/pad/album/"+folder+"/thumb/";
  	//socket.emit('init images', {images: images, path: path,folder:folder});
 //socket.emit('delete images', filename.basename(path));
 socket.emit('delete images',  {images: filename.basename(path), path: path, folder:folder});
 //fs.unlinkSync(thumb_path+thumb);
  
});  
}); 
/* chokidar.watch('/home/www/pad/album', {ignored: /[\/\\]\./}).on('all', function(event, path) {
  console.log(event, path);
  //io.sockets.emit('users connected', socketCount);
}); */