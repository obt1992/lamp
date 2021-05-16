<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>購入明細</title>
  </head>

  <body>
    <h1>購入明細</h1>

    <!-- メッセージ・エラーメッセージ -->
    <?php include VIEW_PATH. 'templates/messages.php'; ?>
    <!-- 購入明細 -->
    <table>
      <thead>
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