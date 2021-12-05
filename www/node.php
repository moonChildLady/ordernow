<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$(function(){
	call_polling();
});
 
function call_polling()
{
	$.ajax({
		url: 'http://dress4u.hk:8080',
		data: '',
		success: function(response) {
			console.log(response);
		},
		complete:function(){
			call_polling();
		}
	})
}
</script>