<?php get_header(); ?>
<div class="container">
  <?php if(have_posts()): while(have_posts()): have_posts(); ?>
    <?php if(!is_archive()): ?>
      <?php the_content(); ?>
    <?php else: ?>
      <div class="summary">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>">[READ MORE]</a>
      </div>
    <?php endif; ?>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>