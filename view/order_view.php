!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>購入履歴</title>
    <link rel="stylesheet" href="<?php echo h(STYLESHEET_PATH . 'admin.css'); ?>">
  </head>

  <body>
    <h1>購入履歴</h1>

    <!-- メッセージ・エラーメッセージ -->
    <?php include VIEW_PATH. 'templates/messages.php'; ?>

    <!-- 購入履歴 -->
    <?php if(!empty($order)){ ?>
    <table>
      <thead>
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($order) as $order)){ ?>
        <tr>
          <td><?php h print($order)['order_id']); ?></td>
          <td><?php h print($order)['created']); ?></td>
          <td><?php h print($order)['total']); ?></td>
          <td>
            <form method="post" action="detail.php">
              <input type="submit" value="購入明細表示">
              <input type="hidden" name="order_id" value="<?php h print $order['order_id']); ?>">
              <input type = "hidden" name = "csrf_token" value = "<?php echo $token ?>">
            </form>
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