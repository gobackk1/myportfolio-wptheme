<ol class="breadcrumb">
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><span itemprop="title">HOME</span></a>
  </li>

  <?php
    $post_parent_arr = array_reverse(get_post_ancestors($post));
    if (page_has_parent()):
  ?>

  <?php foreach ($post_parent_arr as $post_parent_id): //親ページを遡ってパンくずをつける?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo esc_url(get_permalink($post_parent_id)); ?>"><span itemprop="title"><?php echo esc_html(get_the_title($post_parent_id)); ?></span></a>
  </li>
  <?php endforeach; ?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <span itemprop="title"><?php the_title(); ?></span>
  </li>

  <?php else: //親ページないなら?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <span itemprop="title"><?php the_title(); ?></span>
  </li>
  <?php endif; ?>
</ol>
