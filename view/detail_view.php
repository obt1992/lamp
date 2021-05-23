<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo h(STYLESHEET_PATH . 'admin.css'); ?>">
    <title>購入明細</title>
  </head>

  <body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入明細</h1>

    <!-- メッセージ・エラーメッセージ -->
    <?php include VIEW_PATH. 'templates/messages.php'; ?>

    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php print h($detail_order['order_id']); ?></td>
          <td><?php print h($detail_order['order_date']); ?></td>
          <td><?php print h($detail_order['total']); ?></td>
        </tr>
      </tbody>
    </table>

    <!-- 購入明細 -->
    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>商品名</th>
          <th>価格</th>
          <th>購入数</th>
          <th>小計</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($details as $detail){ ?>
        <tr>
          <td><?php print h($detail['name']); ?></td>
          <td><?php print h($detail['price']); ?></td>
          <td><?php print h($detail['amount']); ?></td>
          <td><?php print h($detail['subtotal']); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>