<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order.php';

xss_header();

session_start();

if(is_valid_csrf_token(get_post('csrf_token'))===false){
  redirect_to(LOGIN_URL);
}

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);

if(purchase_carts($db, $carts) === false){
  set_error('商品が購入できませんでした。');
  redirect_to(CART_URL);
}
// 購入後、カートの中身削除&在庫変動&購入履歴・明細にデータを挿入
$db->beginTransaction();
try{
  // 購入履歴へINSERT
  intsert_user_order($db,$user['user_id']);

  $order_id = $db->lastInsertId();

  // 購入明細にINSERT
  insert_detail($db, $order_id, $cart['item_id'], $cart['amount'], $cart['price']);   
  }catch(PDOException $e){
  $db->rollback();
  throw $e;

$total_price = sum_carts($carts);

include_once '../view/finish_view.php';