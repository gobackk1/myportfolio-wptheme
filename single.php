<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>
<main class="under-page">
  <div class="page-band">
    <h1 class="page-band__ttl"><?php the_title(); ?></h1>
  </div>
  <div class="inner">
    <?php get_template_part('parts/breadcrumb'); ?>
    <div class="content">
      <date class="post-date" datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo get_the_date('Y/m/d') ?></date>
      <?php the_content(); ?>
    </div>
  </div>
</main>
<div class="inner">
  <?php the_post_navigation(); ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>
