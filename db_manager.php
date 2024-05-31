<?php
function getDb() : PDO {
  $dsn = 'mysql:dbname=LAA1586069-teamb; host=mysql305.phy.lolipop.lan; charset=utf8';
  $usr = 'LAA1586069';
  $passwd = 'teamdb';

  $db = new PDO($dsn, $usr, $passwd);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $db = new PDO($dsn, $usr, $passwd, [PDO::ATTR_PERSISTENT => true]);
  return $db;
}
