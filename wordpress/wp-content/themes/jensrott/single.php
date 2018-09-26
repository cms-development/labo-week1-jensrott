<?php 
/* Template Name: Single Page Template */


if(have_posts()) : while(have_posts()) : the_post()
?>

<?php get_header(); ?> 
  
<div class="card mb-3">
  <h1 class="card-header"><?php the_title() ?></h1>
  <p class="card-text"><?php the_content() ?></p>
</div> 
<?php
endwhile;
?>

<?php else : ?>
  <p>Oops no posts found!</p>
<?php endif ?>;

<?php get_sidebar(); ?>


<?php get_footer(); ?>