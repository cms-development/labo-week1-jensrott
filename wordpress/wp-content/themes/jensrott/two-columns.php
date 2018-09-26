<?php 
/* Template Name: Two Column Lay-Out */
?>


<?php get_header() ?>

<div class="row">
  <div class="col-6">
    <?php $mycustomquery = new WP_Query(array('category_name' => 'algemeen', 'post_per_page' => 2)); ?>
    <?php if(have_posts(1)) : while($mycustomquery->have_posts()) : $mycustomquery->the_post() ?>

    <?php _e('DIT IS EEN CUSTOM POST'); ?>
    <h1><?php the_title() ?></h1>

    <?php endwhile; ?>

    <?php else : ?>

    <?php endif; ?>
    <?php wp_reset_post_data() ?>
  </div>

  <!-- SIDEBAR -->
  <div class="col-6">
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer() ?>