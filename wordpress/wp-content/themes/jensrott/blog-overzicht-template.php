<?php
/*
Template: Blog overzicht template
*/
?>

<?php 

get_header();
?>

<div>
 
  <h1>Algemene Posts:</h1>
  <?php $recentpostsquery = new WP_Query(array('category_name' => 'algemeen', 'posts_per_page' => 2)); ?>
    <?php if(have_posts()) : while($recentpostsquery->have_posts()) : $recentpostsquery->the_post() ?>


  <div class="card mb-3">
    <h1 class="card-header"><?php the_title() ?></h1>
    <p class="card-text"><?php the_content() ?></p>
  </div>    

  <?php endwhile; ?>

  <?php else : ?>
    <p>Oops no posts found!</p>
  <?php endif; ?>

  <h1>Weetjes Posts:</h1>
  <?php $weetjesquery = new WP_Query(array('category_name' => 'weetjes', 'post_per_page' => 2)); ?>
    <?php if(have_posts()) : while($weetjesquery->have_posts()) : $weetjesquery->the_post() ?>

    
    <div class="card mb-3">
      <h1 class="card-header"><?php the_title() ?></h1>
      <p class="card-text"><?php the_content() ?></p>
    </div>
    <?php endwhile; ?>

    <?php else : ?>
      <p>Oops no posts found!</p>
    <?php endif; ?>

</div>

<?
  /* Footer */
  get_footer();
?>