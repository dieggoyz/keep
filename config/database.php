<?php
class Database {
  public static function connect() {
    $db = new mysqli('localhost', 'root', '', 'keep');
    // $db = new mysqli('sql108.epizy.com', 'epiz_32003965', 'Zz2q6WvSuE', 'epiz_32003965_db');
    $db->query("SET NAMES 'utf8mb4'");
    return $db;
  }
}
