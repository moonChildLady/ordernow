/*
var deviceReadyDeferred = $.Deferred();
var jqmReadyDeferred = $.Deferred();

document.addEventListener("deviceready", onDeviceReady, false); 

$(document).on('pageinit', function(){
    jqmReadyDeferred.resolve();
});
 function onDeviceReady() {
    deviceReadyDeferred.resolve();
}

$.when(deviceReadyDeferred, jqmReadyDeferred).then(doWhenBothFrameworksLoaded);
function doWhenBothFrameworksLoaded() {*/
var device = []
device.uuid = "CCB9C1B7-14EB-4D36-9F68-EE6CBB8280B9";
var socket = io.connect('http://pad.dress4u.hk:3000');
$(document).on('pagebeforecreate', "#customer_view, #order_info, #top10", function(){
socket.on('rev msg', function(data){
    $("#popuptitle").text(data.title);
    $("#popupbody").html(
                '<div class="row">'+
                '<div class="col-md-12">'+
                data.body+
                '</div>'+
                '</div>'
                );
    $("#popupmsg").modal();
    $("#msg_to").text(data.title+": "+data.body);
});

    var lasttime = "";
    var endoftime = "";
    var TypeID = "";
    var tableid = "";
var s_uuid = window.sessionStorage.getItem("uuid");
if(s_uuid){
    device.uuid = s_uuid;
}
console.log(s_uuid);
console.log(device.uuid);
socket.emit('check', {uuid: device.uuid, pr:0});
socket.on('set init', function(data){
    $("#erromodal, #checkout_menu").modal('hide');
    $( "#order_left" ).panel( "close" );
    if($.isArray(data.TableInfo) && $.isArray(data.Order)){
        $.each(data.TableInfo, function(i, row) {
            if(row.Status == 1){
            $("#NumberOfSeat").text(row.NumberOfSeat);
            $("#TableNo").text(row.TableNo);
            $("#OrderInvoiceNo").text(row.OrderNo);
            $("#tableCreatedOn").text(row.CreatedOn);
            $("#TypeName").text(row.TypeName);
            TypeID = row.Type;
            lasttime = row.LastOrder;
            endoftime = row.ExpiredOn;
            tableid = row.TableNo;
        }else{
            $("#customer_view").empty();
            $("#customer_view").html('<p>時間到了</p>');
        }
        });

        $("#customer_view").unblock({
                onUnblock: function(){
                    $('#lastordertimer, #countdowntimer').countdown('destroy');
                    setTimeout(counter, 5000);
                    $("#myModal").modal('hide');
                    $.mobile.navigate( "#customer_view" );
                }
            }); 
        $.each(data.Order, function(i, row) {
            $("#orderInfo_No").text(row.NoOfOrder);
        });

        setInterval('updateClock()', 1000);
         setTimeout(counter, 5000);
        
    
    socket.emit('send type', {typeid: TypeID, tableID:tableid});
    socket.on('get cat', function(data){
    var output = [];
    $.each(data, function(i, row){
        //order_menu_li.push('<li><a data-ajax="false" href="#tab_order_menu_'+row.CatID+'">'+row.ChiName+'</a></li>');
//$("#ul_order_menu").append('<li>'+row.CatID+'</li>').navbar();
    output.push('<li ref="cat_'+row.CatID+'"><a id="tab_order_menu_'+row.CatID+'">'+row.ChiName+'</a></li>');
    //$("#ul_order_menu").append('<li><a data-ajax="false" href="#tab_order_menu_'+row.CatID+'">'+row.ChiName+'</a></li>');
    });
    //$("#ul_order_menu").navbar();
    $('#ul_order_menu').empty().append('<div data-role="navbar"><ul id="nav_menu"><li ref="all"><a>全部</a></li>' + output.join('') + '</ul></div>').trigger('create');
    });

 socket.on('menu order', function(data){
     var output = [];
       $.each(data, function(i, row) {
        //alert(row.id);
        output.push('<li ref="cat_'+row.CatID+'">'+
        '<a href="#" data-toggle="modal" data-target="#myModal" data-id="'+row.id+'">'+
        '<img src="http://pad.dress4u.hk/admin/images/'+row.images+'" class="ui-li-thumb img-responsive">'+
        '<h2>'+row.food_chiname+'</h2>'+
        '<p>'+row.food_engname+'<span class="badge pull-right">'+row.Price+'</span></p>'+
        '<p class="ui-li-aside">New</p>'+
        '</a>'+
        '</li>');
        
        });
      //alert(output);
        $('#order_menu_list').empty().append('<ul data-role="listview" data-inset="true" id="listview_menu">'+output.join('')+'</ul>').trigger('create');
});

$(document).on('vclick', '#nav_menu li', function(){  
    var ourClass = $(this).attr('ref');
    if(ourClass == 'all') {
      // show all our items
      $('#listview_menu').children('li').show();
    }
    else {
      // hide all elements that don't share ourClass
      $('#listview_menu').children('li:not([ref=' + ourClass + '])').hide();
      // show all elements that do share ourClass
      $('#listview_menu').children('li[ref=' + ourClass+']').show();
    }
    return false;
});

    }else{
        if(data == 3 || data == 2 || data == 4 || data == 5){
            if(data==5){
                $.mobile.navigate( "#kitchen_view" );

            }else{
            var blockstatus = $("#customer_view").data();
            if(blockstatus["blockUI.isBlocked"] != 1){
                
            $("#customer_view").block();
            if(data == 3){
            $("#error_Label").html('歡迎下次光臨！謝謝！');
            }else if(data == 2){
            $("#error_Label").html('此裝置未能進行認証。');
            }else{
                $("#error_Label").html('本店的使用裝置已超出限定。');
            }
            $("#error_body").html(
                '<fieldset><legend>以下是廣告商提供之廣告</legend>'+
                '<p class="text-center">'+
                '<img src="http://rack.0.mshcdn.com/media/ZgkyMDEzLzA0LzE4L2M4L2dvb2dsZS5kZWVlMy5naWYKcAl0aHVtYgkxMjAweDk2MDA-/a2bcbaea/ba6/google.gif" data-fragment="m!7558" data-width="500" title="google" alt="" src="http://rack.0.mshcdn.com/media/ZgkyMDEzLzA0LzE4L2M4L2dvb2dsZS5kZWVlMy5naWYKcAl0aHVtYgkxMjAweDk2MDA-/a2bcbaea/ba6/google.gif">'+
                '</p>'+
                '</fieldset>'+
                '<div class="row">'+
                '<div class="col-md-4">'+
                '<div class="thumbnail">'+
                '<img src="http://pad.dress4u.hk/get_QR.php?uuid='+device.uuid+'">'+
                '<div class="caption">'+
                '<h3 text-align="center">本店專用</h3>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-4">'+
                '<div class="thumbnail">'+
                '<img src="http://pad.dress4u.hk/get_QR.php?uuid='+device.uuid+'">'+
                '<div class="caption">'+
                '<h3 text-align="center">廣告詳情</h3>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'
                );
            $("#erromodal").modal({
                keyboard: false,
                backdrop: "static"
            });
        }
        }
        }

    }
    
});
$(document).on('vclick', '#btn_order_rate', function(){  

            var food = $('input[name=foodID]').val();
            console.log(food);
            $.ajax({
            type: "POST",
            url: "http://pad.dress4u.hk/rate.php",
            data: {orderNo: $("#OrderInvoiceNo").text(), food:food},
            //contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                if(data==1){
                    alert('已記錄！');
                }
            }
        });    
});
$(document).on('vclick', '#btn_order_food', function(){  
    var socket = io.connect('http://pad.dress4u.hk:3000');
    var food = $('input[name=foodID]').val();
    var quan = $('input[name=foodquan]').val();
    var table = $("#TableNo").text();
    var orderno = $("#OrderInvoiceNo").text();
    socket.emit('new order', {foodID: food, quan:quan, tableno:table, orderno:orderno});
    alert('已成功落單！');
    $("#myModal").modal('hide');
});
$( "#order_left" ).on( "panelbeforeopen", function() { 
    /*if(window.sessionStorage.getItem("uuid")){
        window.location = "admin.html";
    }*/
    //alert(1);
    $("#order_left_list").empty();
    $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/get_order_info.php",
    data: {tableNo: $("#TableNo").text()},
    //contentType: "application/json; charset=utf-8",
    dataType: "json",

    success: function (result) {
		$.each(result.buffet, function(j,data){
		if(data.buffet == 0){
        $.each(result.order_list, function(i, row) {
        //alert(row.id);
        $("#order_left_list").append(
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
        '</tr>');
        
        });

        $.each(result.total, function(i, row) {
            //$("#order_left_total").text(row.show_total);
            $("#order_left_list tr:last").after(
                '<tr>'+
                '<td>'+
                '<p>總計（已加一服務貴）：</p>'+
                '</td>'+
                '<td><p>'+row.show_actual_total+
                '</p></td>'+
                '</tr>'+
                '<input type="hidden" id="actual_total" value="'+row.actual_total+'">'
                );
        });
	}else{
		//$.each(result.total, function(i, row) {
            //$("#order_left_total").text(row.show_total);
            $("#order_left_list tr:last").after(
                '<tr>'+
                '<td>'+
                '<p>每人收費：$'+data.Full+'</p>'+
                '</td>'+
                '<td><p>$'+(parseInt(data.Full)*parseInt($("#NumberOfSeat").text()))+
                '</p></td>'+
                '</tr>'+
                '<input type="hidden" id="actual_total" value="'+(parseInt(data.Full)*parseInt($("#NumberOfSeat").text()))+'">'
                );
        //});
	}
			});
        $('#order_left_list').listview('refresh');

    }
});

    //order_left_list
});

$(document).on('vclick', '#to_order_menu', function(){ 
    $.mobile.changePage( "#order_menu", { transition: "slide", changeHash: false });
});

$("#checkout_menu").on('show.bs.modal', function(){
    $("#checkout_body").empty();
    $("#order_left_list").clone().appendTo("#checkout_body");
});

$(document).on('vclick', '#to_order_info', function(){ 
    $.mobile.changePage( "#order_info", { transition: "slide", changeHash: false });
});

$(document).on('vclick', '#btn_comfirm_checkout', function(){ 
    $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/checkout.php",
    data: {OrderNo: $("#OrderInvoiceNo").text(), InvoiceAmount: $("#actual_total").val()},
    success: function (result) {
        socket.emit('check', {uuid: device.uuid, pr:0});
    }
});
});
$(document).on('vclick', '#order_menu_list li a', function(){ 
    var id = $(this).attr('data-id');
    $("#food_body, #food_Label").empty();
    $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/get_food.php",
    data: {get_food_details: 1, food_id: id, Type: TypeID},
    dataType: "json",

    success: function (result) {
        $.each(result, function(i, row) {
            $("#food_Label").html(row.food_chiname+'<small>'+row.food_engname+'</small>');
            $("#food_body").append(
            '<fieldset><legend>食物資料</legend>'+
            '<p><img src="http://pad.dress4u.hk/admin/images/'+row.images+'" class="ui-li-thumb"></p>'+
            '<p>產地: '+row.source_chiname+' - '+row.source_engname+'</p>'+
            '<p>卡路里: '+row.Calorie+'</p>'+
            '<p>售價: '+row.Price+'</p>'+
            '<p>'+row.Description+'</p>'+
            //'</fieldset>'+
            //'<fieldset><legend>食物資料</legend>'+
            
            '<form name="order_food" id="order_food">'+
            '<input type="hidden" value="'+row.id+'" name="foodID">'+
            '<input type="hidden" value="'+row.ShowPrice+'" id="foodprice">'+
            '<div data-role="fieldcontain">'+
            '<p>落單數量: <span id="food_quan"></span>件，小計：$<span id="food_subtotal">'+row.ShowPrice+'</span></p>'+
            '<input type="range" name="foodquan" id="foodquan" value="1" min="1" max="10" data-highlight="true" />'+
            '</form>'+
            '</div>'+
            '</fieldset>'
            ).trigger( "create" );
        //}
            
        });
        //$.mobile.slider.prototype.options.initSelector = "#food_quan";
        //$('#food_Label').listview('refresh');
        $("#food_quan").text($("#foodquan").val());
        $("#foodquan").change(function(){
        $("#food_quan").text($("#foodquan").val());
        $("#food_subtotal").text($("#foodquan").val()*$("#foodprice").val());
        });
       
    }
}); 
});


$(document).on('pagebeforeshow', '#order_info', function(){ 
    //ajaxloader();
    $("#order_info_list").empty();
        $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/get_order_info.php",
    data: {tableNo: $("#TableNo").text()},
    //contentType: "application/json; charset=utf-8",
    dataType: "json",

    success: function (result) {
        if(result.length != 0){
        $.each(result.order_list, function(i, row) {
        if(row.process==1){
            var status = "處理中";
        }else if(row.process==2){
            var status = "已完成";
        }else{
            var status = "準備中";
        }
        //alert(row.id);
        $("#order_info_list").append(
        '<li>'+
        //'<a href="#" data-toggle="modal" data-target="#myModal" data-id="'+row.id+'">'+
        '<a href="#">'+
        '<img src="http://pad.dress4u.hk/admin/images/'+row.images+'" class="ui-li-thumb">'+
        '<h2>'+row.food_chiname+'</h2>'+
        '<p>'+row.food_engname+'</p>'+
        '<p class="ui-li-aside">'+row.NumberOfSet+'件，每件'+row.Price+'<br>總數為'+row.subTotal+'<br>'+status+'</p>'+
        //'<p>'+row.status+'</p>'+
        '</a>'+
        '</li>');
        
        });
        $('#order_info_list').listview('refresh');
        }else{
        $("#order_info_list").append(
            '<li>暫無落單</li>'
            );
    }
    
    }
});   
});

$(document).on('pagebeforeshow', '#top10', function(){ 
    //ajaxloader();
    $("#top10_list").empty();
        $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/top10.php",
    //data: {tableNo: $("#TableNo").text()},
    //contentType: "application/json; charset=utf-8",
    dataType: "json",

    success: function (result) {
        if(result.length != 0){
        $.each(result.order_list, function(i, row) {
        //alert(row.id);
        $("#top10_list").append(
        '<li>'+
        //'<a href="#" data-toggle="modal" data-target="#myModal" data-id="'+row.id+'">'+
        '<a href="#">'+
        '<img src="http://pad.dress4u.hk/admin/images/'+row.images+'" class="ui-li-thumb">'+
        '<h2>'+row.food_chiname+'</h2>'+
        '<p>'+row.food_engname+'</p>'+
        '</a>'+
        '</li>');
        
        });
        $('#top10_list').listview('refresh');
        }else{
        $("#top10_list").append(
            '<li>暫無結果</li>'
            );
    }
    
    }
});   
});



function counter(){
var countdown = endoftime;
var lastorder = lasttime;
$('#lastordertimer').countdown({
    until: lastorder,
    layout: '最後落單剩餘： {hn}:{mn}:{sn}',
    expiryText: '<div class="over">最後落單剩餘： 已完結</div>',
    onExpiry: function () { 
                        
                        //alert('done.');
                        $(".submit").prop("disabled", true);
                        //checklastordertime(1);
                        
                    }
});
$('#countdowntimer').countdown({
    until: countdown,
    layout: '結束時候剩餘： {hn}:{mn}:{sn}',
    expiryText: '<div class="over">結束時候剩餘： 已完結</div>',
    onExpiry: function () { 
                        
                       //alert($("#OrderInvoiceNo").text());
                       $.ajax({
                        type: "POST",
                        url: "http://pad.dress4u.hk/table.php",
                        data: {enable: '0', OrderNo: $("#OrderInvoiceNo").text()},
                        //contentType: "application/json; charset=utf-8",
                        //dataType: "json",
                        success: function (result) {
                            socket.emit('check', {uuid: device.uuid, pr:0});
                        }
                        });
                        
                    }
}); 
} 
});
//end of custoomer//




$(document).on('pagebeforecreate', "#kitchen_view", function(){

socket.on('users connected', function(data){
        $('#usersConnected').html('Users connected: ' + data+' '+device.uuid);
    });

socket.emit('get deviceID', {uuid: device.uuid});

  socket.on('set deviceID', function(data){
        $('#device_no').text(data.id);
        var dept = data.ChiName;
        $('#kitchentype').text(dept);
        //data = device_no;
    });

//socket.emit('get type', {uuid: device.uuid});
    // Initial set of notes, loop through and add to list

    socket.on('send type', function(data){
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
   //setTimeout(hidelist, 2000);
   $('a[ref='+data.id+']').parent('li').remove();
    socket.emit('new done', {id:data.id});
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

});//end of kitchen//



$(document).on('pagebeforecreate', "#admin", function(){
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
        if(row.LastOrder != "無限時"){
            var lastorder = '<p>最後落單'+row.lastOrder+'</p>';
            var ExpiredOn = '<p>結束時間'+row.ExpiredOn+'</p>';
        }else{
            var lastorder ="";
            var ExpiredOn ="";
        }

        output.push('<li class="clickmodal">'+
        '<a href="#" data-toggle="modal" data-target="#showorder" data-id="table_'+row.id+'" order="'+row.orderNo+'" tableNo="'+row.tableID+'" uuid="'+row.uuid+'" status="'+row.Status+'">'+
        //'<img  class="ui-li-thumb">'+
        '<h2>台號：'+row.tableID+'</h2>'+
        '<p>單號：'+row.orderNo+'</p>'+
        '<p>入座時間：'+row.CreatedOn+'</p>'+
        '<p class="ui-li-aside" style="font-size:20px"><span class="label label-success">'+msg+'</span></p>'+
        lastorder+
        ExpiredOn+
        '</a>'+
        '</li>');
    });
    //$('#order_menu_list').empty().append('<div data-role="navbar"><ul id="nav_menu"><li ref="all"><a>全部</a></li>' + output.join('') + '</ul></div>').trigger('create');
    $('#order_menu_list_admin').empty().append('<ul data-role="listview" data-inset="true" id="listview_menu">'+output.join('')+'</ul>').trigger('create');
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
       if(data.length>0){
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

});//end of admin //

$(document).on('pageinit', "#reg", function(){

$.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/admin/Device/uuid/"+device.uuid,
	xhrFields: {
      withCredentials: true
   },
    success: function (data) {
        //alert(data);
        if(data == '0'){
            //$("#home").block();

            $("#reg_device").modal({
                keyboard: false,
                backdrop: "static"
            });
            $("#reg_device_body").append(
                '<p>'+device.uuid+'</p>'+
                '<form action="" method="POST" name="reg_device_form" id="reg_device_form">'+
                //'<input name="uuid" type="hidden" value="'+device.uuid+'">'+
                '<select name="device_type" id="device_type">'+
                '<option value="0"><p>請選擇</p></option>'+
                '<option value="1"><p>客人用</p></option>'+
                '<option value="2"><p>廚房用</p></option>'+
                '<option value="99"><p>公關用</p></option>'+
                '</select>'+
                '<input name="tableno" type="tel" placeholder="台號">'+
                '<select name="kitchen_type" id="kitchen_type">'+
                '<option value="0">請選擇</option>'+
                '<option value="1">刺身用</option>'+
                '<option value="2">火鍋配料</option>'+
                '<option value="3">點心</option>'+
				'<option value="4">中菜</option>'+
				'<option value="5">壽司</option>'+
				'<option value="6">放題小吃</option>'+
				'<option value="7">火鍋小吃</option>'+
				'<option value="8">日式小吃</option>'+
				'<option value="9">小吃</option>'+
				'<option value="10">前菜</option>'+
				'<option value="11">放題甜品</option>'+
				'<option value="12">甜品</option>'+
				'<option value="13">火鍋甜品</option>'+
				'<option value="14">雪花冰</option>'+
				'<option value="15">中式甜品</option>'+
				'<option value="16">中式糖水</option>'+
				'<option value="17">傳統甜品</option>'+
				'<option value="18">西米露</option>'+
				'<option value="19">手卷</option>'+
				'<option value="20">炸物</option>'+
				'<option value="21">燒物</option>'+
				'<option value="22">沙律</option>'+
				'<option value="23">一品料理</option>'+
				'<option value="24">放題飲品</option>'+
				'<option value="25">定食</option>'+

                '</select>'+
                '</form>'
                ).trigger( "create" );
            $("form[name='reg_device_form'] input[name='tableno']").hide();
            $("#kitchen_type").parent().hide();
            $(document).on('change', 'form[name="reg_device_form"] #device_type', function(){
                if($(this).val() == 1){
                $("form[name='reg_device_form'] input[name='tableno']").show();
                }else{
                    $("form[name='reg_device_form'] input[name='tableno']").hide();
                }
                if($(this).val() == 2){
                $("form[name='reg_device_form'] #kitchen_type").parent().show();
                }else{
                    $("form[name='reg_device_form'] #kitchen_type").parent().hide();
                }

            });
            //$('#reg_device_body').listview('refresh');
        }
        else if(data==2){
           $("#reg_device_body").append(
                '<p>'+device.uuid+'</p>'+
                '<p>Not Enable</p>'
            ).trigger( "create" );
        }else if(data==1){
            $("#reg_device").modal('hide');
            //$.mobile.navigate( "#customer_view", { transition: "slide", changeHash: false });
            $.mobile.changePage( "#customer_view", { transition: "slide", changeHash: false });
            //window.location.href = "customer2.html";
        }else if(data == 3){
            
            //$.mobile.navigate( "#kitchen_view", { transition: "slide", changeHash: false });
            $.mobile.changePage( "#kitchen_view", { transition: "slide", changeHash: false });
            //window.location.href = "kitchen.html";
            //$.mobile.changePage
        }else if(data == 99){
            //window.location.href = "admin.html";
			$.mobile.changePage( "#admin", { transition: "slide", changeHash: false });
        }
    console.log(data);
    },
    error: function(data){
        console.log(data);
    }

});
/*        function alertDismissed() {
            $("#reg_device").modal('hide');
        }

    // Show a custom alertDismissed
    //
    function showAlert(message) {
        navigator.notification.alert(
            message,  // message
            alertDismissed,         // callback
            '登記',            // title
            'Done'                  // buttonName
        );
    }*/
$(document).on('vclick', '#reg_device_submit', function(){ 
    
        //alert("1");
        $.ajax({
    type: "POST",
    //url: "http://pad.dress4u.hk/reg_device.php",
    url: "http://pad.dress4u.hk/admin/Device/RegDevice",
    data: $('#reg_device_form').serialize()+'&uuid='+device.uuid,
	headers: {
      'MyCustomHeader': 'important information'
  },
	xhrFields: {
      withCredentials: true
   },
    //contentType: "application/json; charset=utf-8",
    //dataType: "json",
    success: function (data) {
        //showAlert(data);
        var status = data.split("_")[0];
        var device_type = data.split("_")[1];
        if(status == 1){
            //showAlert('成功登記！');  
			alert('成功登記！');  
            $("#reg_device").modal('hide');
        }
        if(device_type == '1'){
            $.mobile.navigate( "#customer_view", { transition: "slide", changeHash: false });
                }else if(device_type == '2'){
            $.mobile.navigate( "#kitchen_view", { transition: "slide", changeHash: false });
        }else if(device_type == '99'){
            $.mobile.navigate( "#admin", { transition: "slide", changeHash: false });
        }

    }
});
});

});//end of check device/reg divice//
//}