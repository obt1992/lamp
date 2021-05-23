<?php
require_once '../conf/const.php';
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'user.php';
require_once MODEL_PATH. 'item.php';
require_once MODEL_PATH. 'cart.php';
require_once MODEL_PATH. 'order.php';

session_start();

$token = get_csrf_token();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$orders = get_user_order($db, $user['user_id']);

$order_id = get_post('order_id');

include_once VIEW_PATH. 'order_view.php';