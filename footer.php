<footer class="footer">
  <p>&copy; 2019 kengo kawabata.</p>
</footer>
<?php wp_footer(); ?>
<?php if(post_custom('script')): ?>
<?php echo apply_filters('the_content', get_post_meta($post->ID, 'script', true)); ?><?php endif; ?>

</body>
</html>
