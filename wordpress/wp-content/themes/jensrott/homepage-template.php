<?php 

get_header();
?>
<main>
  
  <?php
  $args = array(
          'posts_per_page' => 2,
          'order' => 'desc',
          'orderby' => 'date',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'algemeen',
              'include_children' => false
            ),
          )
      );
  $posts = new WP_Query($args);
  if( $posts->have_posts() ): ?>
      <h2>Recente posts</h2>
      <?php

      while( $posts->have_posts() ) :
        $posts->the_post(); 
        ?>
        <div class="card mb-5">
          <h4 class="card-header"><?php the_title(); ?></h4>
          <p><?php the_content();?></p>
        </div> 
<?php endwhile; ?>
    <?php endif; wp_reset_postdata(); ?> 
  <?php
  $args2 = array(
          'posts_per_page' => -1,
          'order' => 'ASC',
          'orderby' => 'date',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'weetjes',
              'include_children' => false
            ),
          )
  );
  $posts2 = new WP_Query($args2);
  if($posts2->have_posts()): ?>
    
    <h2>Weetjes</h2>
    <?php
    while($posts2->have_posts()) :
      $posts2->the_post(); ?>
      <div class="card mb-5">
        <h4 class="card-header"><?php the_title(); ?></h4>
        <p><?php the_content();?></p>
      </div> 
      <?php endwhile; ?>
    
<?php endif; wp_reset_postdata(); ?>

<?php
// Sidebar
get_sidebar('primary-sidebar');
?>

</main>
<?php

get_footer();
?>