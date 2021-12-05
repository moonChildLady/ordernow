var http = require('http');
var mysql = require('mysql');
 
require('./json/json2');
 
http.createServer(function(request, response) {
 
	function polling(request, response)
	{
		/*
		 *	 �P�_�s�u�ɶ��O�_�W�L�]�w��, �W�L�h��������_�u, ��AJAX���s�s�u�߰�
		 */
		var date = new Date();
 
		// �p�G�j��40��᪽����X�Ÿ��, ����ajax���s�s�u
		if(parseInt(date - request.socket._idleStart.getTime()) > 39999) {
			response.writeHead(200, {'Content-Type': 'text/plain','Access-Control-Allow-Origin' : '*'});
			response.end('([])');
			return false;
		}
 
		/*
		 *	���o��ƨçP�_�O�_���Ȼݭn��X, �����O�H�����d�߸�Ʈw�覡�Ӱ�����,
		 *	�p�G�A����ƥH�άd�߼Ʒ|�ܦh����, ����ĳ�����ݸ�Ʈw�I�I
		 *	�i�H���memcache�άOnosql����������x�s�覡
		 */
		// ��l�Ƹ�Ʈw

  
var client = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '23602312',
  database : 'BUFFET',  //mysql database to work with (optional)
  insecureAuth: true
});
		// SQL
		var sql = "select * from tbl_SOURCE";
 
		// �s��MySql
		client.connect();
 
		// �e�X�d��
		client.query(sql, function selectCb(err, results, fields) {
			if (err) {
				throw err;
			}
 
			// �ഫ��JSON�榡
			var data = JSON.stringify(results);;
 
			// �P�_�O�_���ȩάO�i�H��X��ƤF
			if(data != ''){
				// HTTP�^��
				response.writeHead(200, {'Content-Type': 'text/plain','Access-Control-Allow-Origin' : '*'});
				response.write(data + "\n");
				response.end();
 
				return false;
			}
		});
 
		// �����s�u
		client.end();
 
		// 10������polling
		setTimeout(function() { polling(request, response) }, 10000);
	}
 
	polling(request, response);
 
}).listen('8080');
 
console.log('Server running at http://ip:port/');
