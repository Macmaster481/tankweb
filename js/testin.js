/*
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "sparkbot"
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM tank", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});

*/
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "sparkbot"
});

con.connect(function(err) {
 
  var sql = "UPDATE tank SET capacity=1 WHERE Tankname='a'";
  con.query(sql, function (err, result) {
    if (err) throw err;

 
  });
});

con.Disconmect();
