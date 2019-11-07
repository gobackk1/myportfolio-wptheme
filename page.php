<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>
<main class="under-page">
  <div class="page-band">
    <h1 class="page-band__ttl"><?php the_title(); ?></h1>
  </div>
  <div class="inner">
    <ol class="breadcrumb">
      <li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
      <li><?php the_title(); ?></li>
    </ol>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>
</main>
<?php endif; ?>
<?php get_footer(); ?>
