<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

// 購入履歴へINSERT
function intsert_user_order($db,$user_id){
  $sql="
    INSERT INTO 
      orders(
        user_id,
        order_date
      )
      VALUES(?,NOW())
  ";
  return execute_query($db, $sql,[$user_id]);
}

// 購入明細にINSERT
function insert_details($db,$order_id,$item_id,$amount,$price){
  $sql="
    INSERT INTO
      order_details(
        order_id,
        item_id,
        amount,
        price
      )
      VALUES(?,?,?,?);
  ";
  return execute_query($db, $sql,[$order_id,$item_id,$amount,$price]);
}

// ユーザ毎の購入履歴
function get_user_order($db, $user_id){
  if($user_id===4){
    $str = "";
    $param = [];
  }else{
    $str = "WHERE user_id = ?";
    $param = [$user_id];
  }
  $sql = "
    SELECT
      orders.order_id,
      orders.order_date,
      SUM(order_details.price * order_details.amount) AS total
    FROM
      orders
    JOIN
      order_details
    ON
      orders.order_id = order_details.order_id
    {$str}
    GROUP BY
      order_id
    ORDER BY
      order_date desc
  ";
  return fetch_all_query($db, $sql,$param);
}

// ユーザ毎の購入明細
function get_detail($db, $order_id){
  $sql = "
    SELECT
      order_details.price,
      order_details.amount,
      orders.order_date,
      order_details.price * order_details.amount AS subtotal,
      items.name
    FROM  
      order_details
    JOIN
      items
    ON
      order_details.item_id = items.item_id 
    JOIN
      orders
    ON
      order_details.order_id = orders.order_id
    WHERE
      orders.order_id = ?
  ";
  return fetch_all_query($db, $sql,[$order_id]);
}

function get_order($db,$order_id){
  $sql = "
    SELECT
      orders.order_id,
      orders.order_date,
      orders.user_id,
      SUM(order_details.price * order_details.amount) AS total
    FROM
      orders
    JOIN
      order_details
    ON
      orders.order_id = order_details.order_id
    WHERE
      orders.order_id = ?
    GROUP BY
      order_id
  ";
  return fetch_query($db, $sql,[$order_id]);
}