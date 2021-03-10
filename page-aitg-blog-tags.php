<?php get_header(); ?>

  <div class="flex-row">
    <div class="left-column">
    </div>
    <main class="content">
      <?php do_action( 'basic_main_content_inner_begin' ); ?>

      <h1>Blog Tags</h1>


      <?php do_action( 'basic_main_content_inner_end' ); ?>
    </main>
    <div class="right-column">
      <?php get_sidebar(); ?>
    </div>
  </div>

  <!-- END #content -->

<?php get_footer(); ?>
