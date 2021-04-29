<?php foreach(get_errors() as $error){ ?>
  <p class="alert alert-danger"><span><?php echo h($error); ?></span></p>
<?php } ?>
<?php foreach(get_messages() as $message){ ?>
  <p class="alert alert-success"><span><?php echo h($message); ?></span></p>
<?php } ?>