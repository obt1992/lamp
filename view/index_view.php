<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php echo h(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php echo h($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php echo h(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php echo h($item['item_id']); ?>">
                    <input type = "hidden" name = "csrf_token" value = "<?php echo $token ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      <table class="table table-bordered text-center">
            <thead class="thead-light">
              <tr>
                <th>人気商品ランキング</th>
                <th>商品名</th>
                <th>購入</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($rankings as $key=> $ranking){ ?>
              <tr>
                <td><?php print h($key+1); ?></td>
                <td><?php print h($ranking['name']); ?></td>
                <td>
                <?php if($ranking['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php echo h($ranking['item_id']); ?>">
                    <input type = "hidden" name = "csrf_token" value = "<?php echo $token ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
      </div>
    </div>
  </div>
</body>
</html>