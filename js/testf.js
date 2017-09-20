function test()
{
	
	var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "sparkbot"
});

con.connect(function(err) {
 
  var sql = "INSERT INTO tank (Tankname, capacity) VALUES ('cccc', '3')";
  con.query(sql, function (err, result) {
    if (err) throw err;
	
  });
});
}