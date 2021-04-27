<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
//ページへリング
session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//未登録の場合LOGINページへ
$db = get_db_connect();

$user = get_login_user($db);
//ユーザー情報DBで照会
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}
//管理者以外のユーザーはLOGINページへ
$item_id = get_post('item_id'); //DBから商品データを照会
$changes_to = get_post('changes_to'); //変更内容をPOST

if($changes_to === 'open'){
  update_item_status($db, $item_id, ITEM_STATUS_OPEN); //ステータス表示DBに書き込み
  set_message('ステータスを変更しました。'); //変更メッセージ表示
}else if($changes_to === 'close'){
  update_item_status($db, $item_id, ITEM_STATUS_CLOSE); //ステータス非表示DBに書き込み
  set_message('ステータスを変更しました。'); //変更メッセージ表示
}else {
  set_error('不正なリクエストです。'); //エラーメッセージ
}


redirect_to(ADMIN_URL); 