<?php
<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function intsert_user_order($db,$item_id,$order_date){
  $sql="
    INSERT INTO 
      orders(
        user_id,
        order_date
      )
      VALUES(?,NOW())
  "
  return execute_query($db, $sql,[$user_id]);
}

function insert_order_details($db,$order_id,$item_id,$amount,$price){
  $order = get_order_details($db,$order_id,$item_id,$amount,$price)
  if(intsert_user_order($db,$item_id,$order_date) === false){
    return false;
  }
  foreach($order as $order){
  $sql="
    INSERT INTO
      order_details(
        order_id,
        item_id,
        amount,
        price
      )
      VALUES(?,?,?,?);
  "
  return execute_query($db, $sql,[$order_id,$item_id,$amount,$price]);
}