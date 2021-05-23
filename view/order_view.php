<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入履歴</title>
    <link rel="stylesheet" href="<?php echo h(STYLESHEET_PATH . 'index.css'); ?>">
  </head>

  <body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入履歴</h1>

    <!-- メッセージ・エラーメッセージ -->
    <?php include VIEW_PATH. 'templates/messages.php'; ?>

    <!-- 購入履歴 -->
    <?php if(!empty($orders)){ ?>
    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($orders as $order){ ?>
        <tr>
          <td><?php print h($order['order_id']); ?></td>
          <td><?php print h($order['order_date']); ?></td>
          <td><?php print h($order['total']); ?></td>
          <td>
            <a href='detail.php?order_id=<?php print h($order['order_id']); ?>'>購入明細表示</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php }else{ ?>
    <p>購入履歴がありません。</p>
    <?php } ?>
  </body>
</html>