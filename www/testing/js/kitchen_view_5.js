
<script type="text/javascript">
var deviceReadyDeferred = $.Deferred();
var jqmReadyDeferred = $.Deferred();
document.addEventListener("deviceready", onDeviceReady, false);

$(document).on('pageinit',function(){
    jqmReadyDeferred.resolve();
});

function onDeviceReady() {
 deviceReadyDeferred.resolve();
 }
$.when(deviceReadyDeferred, jqmReadyDeferred).then(doWhenBothFrameworksLoaded);
function doWhenBothFrameworksLoaded() {
      var socket = io.connect('http://pad.dress4u.hk:3000');
        //var device_no = ;
 socket.on('users connected', function(data){
        $('#usersConnected').html('Users connected: ' + data+' '+device.uuid);
    });

socket.emit('get deviceID', {uuid: device.uuid});

  socket.on('set deviceID', function(data){
        $('#device_no').text(data.id);
        if(data.kitchenType == 1){
            var dept = "刺身部用";
        }else if(data.kitchenType == 2){
            var dept = "火鍋部用";
        }else if(data.kitchenType == 3){
             var dept = "點心部用";
        }else if(data.kitchenType == 4){
             var dept = "中菜部用";
        }
        $('#kitchentype').text(dept);
        //data = device_no;
    });

//socket.emit('get type', {uuid: device.uuid});
    // Initial set of notes, loop through and add to list

    socket.on('initial notes', function(data){
        var html = ''
        $('#notes').empty();

        $.each(data, function(i, row){
            var cook = "";
           if(row.takeby != '0'){
            if(row.uuid == device.uuid){
                cook = '<p class="ui-li-aside">本機處理中</p>';

            }else{
                cook = '<p class="ui-li-aside">'+row.takeby+'號機處理中</p>';
            }
        }else{
            cook = '<p class="ui-li-aside">未處理</p>';
        }
           if(row.process == 2){
            cook = '<p class="ui-li-aside">已處理</p>';
          }
            if(typeof row.ChiName != 'undefined'){
            $('#notes').append('<li>'+
                '<a href="" class="take_order" ref="'+row.id+'" process="'+row.process+'">'+
                //'<img src="img/Sushi.png" class="ui-li-thumb">'+
                '<h1 style="font-size:30px">'+row.ChiName+'</h1>'+
                '<h3 style="font-size:30px">'+row.NumberOfSet+'份</h3>'+
                '<div style="font-size:30px">台號：'+row.TableNo+'</div>'+
                '<div>'+row.updatetime+'</div>'+
                cook+
                '</a>'+
                '</li>');
            }
        }); 

     $('.take_order').click(function(){
        var order_id = $(this).attr('ref');
        var process = $(this).attr('process');
        if(process == '0'){
        socket.emit('new note', {takeby: device.uuid, process:1,id:order_id});
        $(this).attr('process','1');
        }else if(process == '1'){
            socket.emit('new note', {takeby: device.uuid, process:2,id:order_id});
            $(this).attr('process','2');
            $(this).find('p').text('已處理')
        }else if(process == '2'){
            return false;
        }
        });
         $('#notes').listview('refresh');
});
  socket.on('done', function(data){
        if(data[0].takeby != '0'){
            if(data[0].uuid == device.uuid){
                cook = '<p class="ui-li-aside">本機處理中</p>';

            }else{
                cook = '<p class="ui-li-aside">'+data[0].takeby+'號機處理中</p>';
            }
        }else{
            cook = '<p class="ui-li-aside">未處理</p>';
        }
           if(data[0].process == 2){
            cook = '<p class="ui-li-aside">已處理</p>';
          }
                $('#for_tab_history_order').append('<li>'+
                '<a href="" class="take_order" ref="'+data[0].id+'" process="'+data[0].process+'">'+
                //'<img src="img/Sushi.png" class="ui-li-thumb">'+
                '<h1 style="font-size:30px">'+data[0].ChiName+'</h1>'+
                '<h3 style="font-size:30px">'+data[0].NumberOfSet+'份</h3>'+
                '<div style="font-size:30px">台號：'+data[0].TableNo+'</div>'+
                '<div>'+data[0].updatetime+'</div>'+
                cook+
                '</a>'+
                '</li>');
     //       });
    $('#for_tab_history_order').listview('refresh');
  });
    // New note emitted, add it to our list of current notes
    socket.on('new note', function(data){
    //$('a[ref='+data.id+'] > .ui-li-aside').prepend('<p class="ui-li-aside">本機處理中</p>');
function hidelist(){
    $('a[ref='+data.id+']').parent('li').remove();
    socket.emit('new done', {id:data.id});
}
   $('a[ref='+data.id+'] > .ui-li-aside').text('本機處理中');
   if(data.process == 2){
   $('a[ref='+data.id+'] > .ui-li-aside').text('已處理');
   setInterval(hidelist, 2000);
   }
    $('#notes').listview('refresh');
});
 

     // New note emitted, add it to our list of current notes
    socket.on('output order', function(data){
    //$('a[ref='+data.id+']').prepend('<p class="ui-li-aside">處理中</p>');
    //$.each(data, function(i, row){
        if(data[0].takeby != '0'){
            if(data[0].uuid == device.uuid){
                cook = '<p class="ui-li-aside">本機處理中</p>';

            }else{
                cook = '<p class="ui-li-aside">'+data[0].takeby+'號機處理中</p>';
            }
        }else{
            cook = '<p class="ui-li-aside">未處理</p>';
        }
           if(data[0].process == 2){
            cook = '<p class="ui-li-aside">已處理</p>';
          }
                $('#notes').append('<li>'+
                '<a href="" class="take_order" ref="'+data[0].id+'" process="'+data[0].process+'">'+
                //'<img src="img/Sushi.png" class="ui-li-thumb">'+
                '<h1 style="font-size:30px">'+data[0].ChiName+'</h1>'+
                '<h3 style="font-size:30px">'+data[0].NumberOfSet+'份</h3>'+
                '<div style="font-size:30px">台號：'+data[0].TableNo+'</div>'+
                '<div>'+data[0].updatetime+'</div>'+
                cook+
                '</a>'+
                '</li>');
     //       });
    $('#notes').listview('refresh');
    
     $('.take_order').click(function(){
        var order_id = $(this).attr('ref');
        var process = $(this).attr('process');
       if(process == '0'){
        socket.emit('new note', {takeby: device.uuid, process:1,id:order_id});
        $(this).attr('process','1');
        }else if(process == '1'){
            socket.emit('new note', {takeby: device.uuid, process:2,id:order_id});
            $(this).attr('process','2');
            $(this).find('p').text('已處理')
        }else if(process == '2'){
            return false;
        }
        });
         $('#notes').listview('refresh');
        });

//for history
socket.on('initial history', function(data){
       // var html = ''
        $('#for_tab_history_order').empty();

        $.each(data, function(i, row){
            var cook = "";
           if(row.takeby != '0'){
            if(row.uuid == device.uuid){
                cook = '<p class="ui-li-aside">本機處理中</p>';

            }else{
                cook = '<p class="ui-li-aside">'+row.takeby+'號機處理中</p>';
            }
        }else{
            cook = '<p class="ui-li-aside">未處理</p>';
        }
           if(row.process == 2){
            cook = '<p class="ui-li-aside">已處理</p>';
          }
            if(typeof row.ChiName != 'undefined'){
            $('#for_tab_history_order').append('<li>'+
                //'<a href="" class="take_order" ref="'+row.id+'" process="'+row.process+'">'+
                //'<img src="img/Sushi.png" class="ui-li-thumb">'+
                '<h1 style="font-size:30px">'+row.ChiName+'</h1>'+
                '<h3 style="font-size:30px">'+row.NumberOfSet+'份</h3>'+
                '<div style="font-size:30px">台號：'+row.TableNo+'</div>'+
                '<div>'+row.updatetime+'</div>'+
                cook+
                //'</a>'+
                '</li>');
            }

        }); 
$('#for_tab_history_order').listview('refresh');
}); 

}
</script>