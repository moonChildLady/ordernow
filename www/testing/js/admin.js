var deviceReadyDeferred = $.Deferred();
var jqmReadyDeferred = $.Deferred();
document.addEventListener("deviceready", onDeviceReady, false);

$(document).on('pageinit', '#admin', function(){
    jqmReadyDeferred.resolve();
});

function onDeviceReady() {
 deviceReadyDeferred.resolve();
 }
$.when(deviceReadyDeferred, jqmReadyDeferred).then(doWhenBothFrameworksLoaded);
function doWhenBothFrameworksLoaded() {
      var socket = io.connect('http://pad.dress4u.hk:3000');
        //var device_no = ;
    var total = 0;
    var order,uuid,stauts;
 

    // Initial set of notes, loop through and add to list
    socket.emit('get table info');

    socket.on('rev table info', function(data){
        var output = [];
        $.each(data, function(i, row){
        if(row.Status == "1"){
            var msg = '使用中';
        }else{
            var msg = '空置';
        }
        if(row.LastOrder != "0000-00-00 00:00:00"){
            var lastorder = '<p>最後落單'+row.lastOrder+'</p>';
            var ExpiredOn = '<p>結束時間'+row.ExpiredOn+'</p>';
        }else{
            var lastorder ="";
            var ExpiredOn ="";
        }

        output.push('<li class="clickmodal">'+
        '<a href="#" data-toggle="modal" data-target="#showorder" data-id="table_'+row.id+'" order="'+row.orderNo+'" tableNo="'+row.tableID+'" uuid="'+row.uuid+'" status="'+row.Status+'">'+
        //'<img src="img/'+row.images+'" class="ui-li-thumb">'+
        '<h2>台號：'+row.tableID+'</h2>'+
        '<p>單號：'+row.orderNo+'</p>'+
        '<p>入座時間：'+row.CreatedOn+'</p>'+
        '<p class="ui-li-aside">'+msg+'</p>'+
        lastorder+
        ExpiredOn+
        '</a>'+
        '</li>');
    });
    //$('#order_menu_list').empty().append('<div data-role="navbar"><ul id="nav_menu"><li ref="all"><a>全部</a></li>' + output.join('') + '</ul></div>').trigger('create');
    $('#order_menu_list').empty().append('<ul data-role="listview" data-inset="true" id="listview_menu">'+output.join('')+'</ul>').trigger('create');
//$("#clickmodal").click(function(){

$('#showorder').on('show.bs.modal', function (e) {
    order = "";
    uuid = "";
   order = $(e.relatedTarget).attr('order');
   uuid = $(e.relatedTarget).attr('uuid');
   window.sessionStorage.setItem("uuid", uuid);
   stauts = $(e.relatedTarget).attr('status');
    //var orderno = order.
    //console.log(order);
    var tableNo = $(e.relatedTarget).attr('tableNo');
    $("#orderLabel").html("台號："+tableNo+" <small>單號："+order+"</small>");
    if(stauts == 1){
    socket.emit('get order info',{orderno:order});
       socket.on('rev order info', function(data){
       if(data.length===0){
        var output = [];
        total = 0;
        $.each(data, function(i, row){
        if(row.process=="0"){
            var msg = "準備中";
        }else if (row.process == "1"){
            var msg = "處理中";
        }else if (row.process == "2"){
            var msg = "已完成";
        }

        output.push('<tr>'+
        '<td>'+
        '<p>'+row.ChiName+'</p>'+
        '</td>'+
        '<td>'+
        '<p>'+row.NumberOfSet+'件，每件$'+row.Price+'<br>小計：$'+(row.NumberOfSet*row.Price)+'</p>'+
        '</td>'+
        '<td>'+
        '<p>'+msg+'</p>'+
        '</td>'+
        '</tr>');
        total+=(row.NumberOfSet*row.Price);
    });
        $('#orderbody').empty().append(output.join('')).trigger('create');
   
       }else{
        $('#orderbody').empty().append('<tr><td>暫無紀錄</td></tr>').trigger('create');
       }
     });
   }else{
    //open table
    //var ref = window.open('http://pad.dress4u.hk/opentable.php?uuid='+uuid, '_blank', 'location=yes');
    var ref = window.open('http://pad.dress4u.hk/opentable.php?uuid='+uuid, '_blank', 'location=no');
    ref.addEventListener('loadstart',function() {});
    ref.addEventListener('exit', function() { $("#showorder").modal('hide'); });
   }
});

//})

});
//
$(document).on('vclick', '#btn_check_order', function(){
    //console.log(uuid);
    $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/checkout.php",
    data: {OrderNo: order, InvoiceAmount: total},
    success: function (result) {
        socket.emit('check', {uuid: uuid, pr:1});
        socket.emit('get table info');
        $("#showorder").modal('hide');
    }
});
    });
//
$(document).on('vclick', '#btn_place_order', function(){
    //console.log(uuid);
//$.mobile.changePage( "customer2.html", { transition: "slide", changeHash: false });
window.location = "customer2.html";
    });

$(document).on('vclick', '#order_left', function(){
    location.reload();
});
$(document).on('vclick', '#submit', function(){
var title = $("#msg_title").val();
var body = $("#msg_body").val();
    socket.emit('send msg', {title: title, body:body});
});

//$("#showorder").modal({show:true});

/*
    $("#orderbody").append(
                '<tr>'+
        '<td>'+
        //'<li>'+
        //'<a href="#" data-toggle="modal" data-target="#myModal" data-id="'+row.id+'">'+
        //'<a href="#">'+
        //'<h2>'+row.food_chiname+'</h2>'+
        '<p>'+row.food_chiname+'</p>'+
        //'<p class="ui-li-aside">'+row.NumberOfSet+'件，每件'+row.Price+'<br>總數為'+row.subTotal+'</p>'+
        //'</a>'+
        '</td>'+
        '<td>'+
        '<p>'+row.NumberOfSet+'件，每件'+row.Price+'<br>小計：'+row.subTotal+'</p>'+
        '</td>'+
        '</tr>'
                );
            $("#erromodal").modal({
                keyboard: false,
                backdrop: "static"
            });
*/
}
