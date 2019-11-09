<ol class="breadcrumb">
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><span itemprop="title">HOME</span></a>
  </li>

  <?php
    if(is_page()){

      $post_parent_arr = array_reverse(get_post_ancestors($post));

    } elseif(is_single()){

      $cat = get_the_category($post -> ID);
      $post_parent_arr = array_reverse(get_ancestors($cat[0] -> cat_ID,'category'));

    } elseif(is_category()){

      $cat = get_queried_object();
      $post_parent_arr = array_reverse(get_ancestors($cat -> cat_ID,'category'));

    }
  ?>

  <?php if($post_parent_arr): foreach ($post_parent_arr as $post_parent_id): //親ページを遡ってパンくずをつける?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="<?php if(is_page()){

        echo esc_url(get_permalink($post_parent_id));

      } elseif(is_single() || is_category()){

        echo esc_url(get_category_link($post_parent_id));

      } ?>"><span itemprop="title">
      <?php if(is_page()){

        echo esc_html(get_the_title($post_parent_id));

      } elseif(is_single() || is_category()){

        echo esc_html(get_cat_name($post_parent_id));

      }
      ?>
    </span></a>
  </li>
  <?php endforeach; endif;?>

  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
    <span itemprop="title"><?php
      if(is_page() || is_single()){

        the_title();

      } elseif(is_category()){

        single_cat_title();

      } ?></span>
  </li>
</ol>
