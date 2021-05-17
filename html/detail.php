<?php
require_once '../conf/const.php';
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'user.php';
require_once MODEL_PATH. 'item.php';
require_once MODEL_PATH. 'cart.php';
require_once MODEL_PATH. 'order.php';

session_start();

if(is_valid_csrf_token(get_post('csrf_token'))===false){
  redirect_to(LOGIN_URL);
}

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$orders = get_user_order($db, $user['user_id']);

$order_id = get_post('order_id');
$details = get_detail($db, $order_id);

include_once VIEW_PATH. 'detail_view.php';