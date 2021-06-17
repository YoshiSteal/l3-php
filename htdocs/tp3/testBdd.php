<?php
$lhost = 'localhost';
$bdd = 'magasin';
$user = 'root';
$pass = '';
$driver='mysql';

$PDO = new PDO("$driver:host=$lhost;dbname=$bdd", $user, $pass);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

var_dump($PDO);
// CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS PRODUCTS (
  id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  price INTEGER
  )";

$PDO->exec($sql);
echo "Table created successfully";

$sql="INSERT INTO products (name, price) VALUES('Lampe', 10)";
$request = $PDO->prepare($sql);
$request->execute();
echo "insert successfully";

$sql="INSERT INTO products (name, price) VALUES('Tapis', 100)";
$request = $PDO->prepare($sql);
$request->execute();
echo "insert successfully";

// SELECT
foreach ($PDO->query('SELECT * from products') as $row) {
    print_r($row);
}