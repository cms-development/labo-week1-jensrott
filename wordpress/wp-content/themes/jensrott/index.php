<!-- HEADER -->
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-6">
      <?php get_template_part('homepage-template', null); ?>
    </div>
    <div class="col-6">
      <!-- SIDEBAR -->
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<!-- FOOTER -->
<?php get_footer() ?>