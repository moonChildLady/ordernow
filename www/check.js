var http = require('http');
var mysql = require('mysql');
 
require('./json/json2');
 
http.createServer(function(request, response) {
 
	function polling(request, response)
	{
		/*
		 *	 判斷連線時間是否超過設定值, 超過則直接輸並斷線, 讓AJAX重新連線詢問
		 */
		var date = new Date();
 
		// 如果大於40秒後直接輸出空資料, 並讓ajax重新連線
		if(parseInt(date - request.socket._idleStart.getTime()) > 39999) {
			response.writeHead(200, {'Content-Type': 'text/plain','Access-Control-Allow-Origin' : '*'});
			response.end('([])');
			return false;
		}
 
		/*
		 *	取得資料並判斷是否有值需要輸出, 此次是以直接查詢資料庫方式來做測試,
		 *	如果你的資料以及查詢數會很多的話, 不建議直接問資料庫！！
		 *	可以改用memcache或是nosql之類的資料儲存方式
		 */
		// 初始化資料庫

  
var client = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '23602312',
  database : 'BUFFET',  //mysql database to work with (optional)
  insecureAuth: true
});
		// SQL
		var sql = "select * from tbl_SOURCE";
 
		// 連接MySql
		client.connect();
 
		// 送出查詢
		client.query(sql, function selectCb(err, results, fields) {
			if (err) {
				throw err;
			}
 
			// 轉換成JSON格式
			var data = JSON.stringify(results);;
 
			// 判斷是否有值或是可以輸出資料了
			if(data != ''){
				// HTTP回應
				response.writeHead(200, {'Content-Type': 'text/plain','Access-Control-Allow-Origin' : '*'});
				response.write(data + "\n");
				response.end();
 
				return false;
			}
		});
 
		// 關閉連線
		client.end();
 
		// 10秒後執行polling
		setTimeout(function() { polling(request, response) }, 10000);
	}
 
	polling(request, response);
 
}).listen('8080');
 
console.log('Server running at http://ip:port/');
