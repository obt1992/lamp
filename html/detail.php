<?php
require_once '../conf/const.php';
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'user.php';
require_once MODEL_PATH. 'item.php';
require_once MODEL_PATH. 'cart.php';
require_once MODEL_PATH. 'order.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$orders = get_user_order($db, $user['user_id']);

$order_id = get_get('order_id');
$details = get_detail($db, $order_id);
$detail_order = get_order($db,$order_id);
if($detail_order['user_id']!==$user['user_id'] && $user['user_id']!==4){
  redirect_to(LOGIN_URL);
}

include_once VIEW_PATH. 'detail_view.php';