<?php

class Database
{
  public $connection;
  public function  __construct()
  {
    $hostname = "localhost";
    $port = 3306;
    $dbname = "todotat";
    $username = "root";
    $password = "";


    $this->connection = new PDO(
      "mysql:host=$hostname;port=$port;dbname=$dbname",
      $username,
      $password
    );
  }
  public function query($query)
  {



    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $this->connection->prepare($query);
    $sql->execute();

    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
}
