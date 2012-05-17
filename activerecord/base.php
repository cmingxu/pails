<?php
require_once("./connection.php");

class Base{
  public static $connection = null;
  public $attributes = array();
  public $is_persist = false;
  public $oid        = -1;


  public function __construct(){
    if(!self::$connection)
      self::$connection = new Connection();
  }

  public function __destruct(){
    if(self::$connection->active()){
      self::$connection->disconnect(); 
    }
  }

  public static function find_by_sql($sql){
    $result = self::$connection->execute($sql);
    $fields_num = mysql_num_fields($result);

    for($i=0; $i<$fields_num; $i++)
    {
      $field = mysql_fetch_field($result);
      echo "<td>{$field->name}</td>";
    }
    while($row = mysql_fetch_row($result))
    {
      foreach($row as $cell)
        echo "<td>$cell</td>";

    }
    mysql_free_result($result);

  }

  public static function find($id_or_ids){
    if(is_array($id_or_ids)){
    }else{
      $result = self::find_by_sql("select * from " . self::table_name() . " where id = " . $id_or_ids);
      echo $result;
    }
  }

  public static function find_by_id($id){
  }

  public static function table_name(){
    return strtolower(get_called_class());
  }

  public function save(){ }

    public function create(){}

    public function update(){}

    public function destroy(){}

    public function reload(){}
}
?>
