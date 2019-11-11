<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>
<main class="under-page">
  <div class="page-band">
    <h1 class="page-band__ttl"><?php the_title(); ?></h1>
  </div>
  <div class="inner">
    <?php get_template_part('parts/breadcrumb'); ?>
    <div class="content">
      <?php the_content(); ?>
      <?php if(is_page('sitemap')): ?>
      <?php wp_nav_menu(array('theme_location'=>'sitemap')); ?>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php endif; ?>
<?php get_footer(); ?>
