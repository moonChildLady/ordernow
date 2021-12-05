var deviceReadyDeferred = $.Deferred();
var jqmReadyDeferred = $.Deferred();
document.addEventListener("deviceready", onDeviceReady, false);

//$(document).on('pageinit', function(){
$(document).on('pageinit', function(){
    jqmReadyDeferred.resolve();
});


	function onDeviceReady() {
	deviceReadyDeferred.resolve();
}

$.when(deviceReadyDeferred, jqmReadyDeferred).then(doWhenBothFrameworksLoaded);
function doWhenBothFrameworksLoaded() {
// alert dialog dismissed
$.ajax({
    type: "POST",
    url: "http://pad.dress4u.hk/admin/Device/uuid/"+device.uuid,
    //data: {uuid: device.uuid},
    //contentType: "application/json; charset=utf-8",
    //dataType: "json",
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
                '<option value="3"><p>公關用</p></option>'+
                '</select>'+
                '<input name="tableno" type="tel" placeholder="台號">'+
                '<select name="kitchen_type" id="kitchen_type">'+
                '<option value="0">請選擇</option>'+
                '<option value="1">廚部用</option>'+
                '<option value="2">味部用</option>'+
                '<option value="3">刺身用</option>'+
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
            //$.mobile.changePage( "customer.html", { transition: "slide", changeHash: false });
            window.location.href = "customer2.html";
        }else if(data == 3){
            
            //$.mobile.navigate( "#kitchen_view", { transition: "slide", changeHash: false });
            //$.mobile.changePage( "kitchen.html", { transition: "slide", changeHash: false });
            window.location.href = "kitchen.html";
            //$.mobile.changePage
        }else if(data == 99){
            window.location.href = "admin.html";
        }
    console.log(data);
    },
    error: function(data){
        console.log(data);
    }

});
        function alertDismissed() {
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
    }
$(document).on('vclick', '#reg_device_submit', function(){ 
    
        //alert("1");
        $.ajax({
    type: "POST",
    //url: "http://pad.dress4u.hk/reg_device.php",
    url: "http://pad.dress4u.hk/admin/Device/RegDevice",
    data: $('#reg_device_form').serialize()+'&uuid='+device.uuid,
    //contentType: "application/json; charset=utf-8",
    //dataType: "json",
    success: function (data) {
        //showAlert(data);
        var status = data.split("_")[0];
        var device_type = data.split("_")[1];
        if(status == 1){
            showAlert('成功登記！');  
            $("#reg_device").modal('hide');
        }
        if(device_type == '1'){
            $.mobile.navigate( "#customer_view", { transition: "slide", changeHash: false });
                }else if(device_type == '2'){
            $.mobile.navigate( "#kitchen_view", { transition: "slide", changeHash: false });
             //$.mobile.navigate( "#kitchen_view" );
            
            //$.mobile.navigate( "#kitchen_view");
            
        }

    }
});
});

}

