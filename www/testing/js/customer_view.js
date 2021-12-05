
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
function doWhenBothFrameworksLoaded() {

 //function onDeviceReady() {
var socket = io.connect('http://pad.dress4u.hk:3000');
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
    //var catid = $(this).attr('data-menu');
  //$('#nav_menu li a').click(function() {
    // fetch the class of the clicked item
    var ourClass = $(this).attr('ref');

    // reset the active class on all the buttons
    //$('#filterOptions li').removeClass('active');
    // update the active state on our clicked button
    //$(this).parent().addClass('active');

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

//$(document).on('vclick', "a[id^=tab_order_menu_]", function(){ 
    
//$(document).on( "pageinit", '#customer_view',function() { 
/*$( document ).on( "pagecreate" , function ( event ) {
    $("#ul_order_menu").empty();
    socket.emit('send type', {typeid: TypeID, tableID:9});
    socket.on('get cat', function(data){
    $.each(data, function(i, row){

        //order_menu_li.push('<li><a data-ajax="false" href="#tab_order_menu_'+row.CatID+'">'+row.ChiName+'</a></li>');
$("#ul_order_menu").append('<p>'+row.CatID+'</p>').navbar();
    //$("#ul_order_menu ul").append('<li><a data-ajax="false" href="#tab_order_menu_'+row.CatID+'">'+row.ChiName+'</a></li>').trigger('create');
    });
     //$('#ul_order_menu').append('<div data-role="navbar">' + order_menu_li.join('') + '</div>').trigger('create');
    //$("#ul_order_menu").listview('refresh');
    //$("#ul_order_menu  ul").trigger('create');
     //$('#customer_view').page();
    });
*/
//});
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
    /*$.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/save_order.php",
    data: $('#order_food').serialize()+'&TableNo='+$("#TableNo").text()+'&OrderNo='+$("#OrderInvoiceNo").text(),
    dataType: "json",
    success: function (data) {
        alert('已成功落單！');
        $("#myModal").modal('hide');
    }
});*/

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
    if(window.sessionStorage.getItem("uuid")){
        window.location = "admin.html";
    }
    //alert(1);
    $("#order_left_list").empty();
    $.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/get_order_info.php",
    data: {tableNo: $("#TableNo").text()},
    //contentType: "application/json; charset=utf-8",
    dataType: "json",

    success: function (result) {
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
}
