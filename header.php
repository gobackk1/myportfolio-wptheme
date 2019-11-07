<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body class="scrollbarFix">
  <header class="header">
  <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name') ?><span class="logo__sub"><?php bloginfo('description') ?></span></a></div>
</header>
<?php dynamic_sidebar('drawer'); ?>
