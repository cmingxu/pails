<?php
class Connection{
  public $options = array(
    'server' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'dbname'   => 'testDb');

  public $connection = null;


  public function __construct(){
    $this->connection = mysql_connect($this->options['server'], $this->options['user'], $this->options['password']);
    if($this->connection){
      echo('');
      mysql_select_db('my_db', $this->connection);
    }
  }

  public function disconnect(){
      mysql_close($this->connection);
  }

  public function __destruct(){
      mysql_close($this->connection);
  }

  public function connection(){
    return $this->connection;
  }

  public function execute($sql){
    $result = mysql_query($sql);
    return $result;

  }

  public function active(){
    return $this->connection ? true : false;
  }
}
?>
