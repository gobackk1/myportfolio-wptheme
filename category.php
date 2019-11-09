<?php get_header(); ?>
<main class="under-page">
  <div class="page-band">
    <h1 class="page-band__ttl"><?php single_cat_title(); ?></h1>
  </div>
  <div class="inner">
    <?php get_template_part('parts/breadcrumb'); ?>
    <div class="content">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <h2 class="title-m--cat-ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <date class="post-date" datetime="<?php echo get_the_date(DATE_W3C); ?>"><?php echo get_the_date('Y/m/d') ?></date>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
    </div>
  </div>
</main>
<?php the_posts_pagination(array(
  'prev_text' => '<span class="screen-reader-text">前へ</span>',
  'next_text' => '<span class="screen-reader-text">次へ</span>',
)); ?>
<?php get_footer(); ?>
