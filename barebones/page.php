<?php get_header(); ?>

  <div id="content" role="main" class="middle smart-padding left-border">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="post">
          <h1 class="title"><?php the_title(); // Display the title of the page ?></h1>
          
          <div class="the-content">
            <?php the_content(); 
            // This call the main content of the page, the stuff in the main text box while composing.
            // This will wrap everything in p tags
            ?>
            
            <?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
          </div><!-- the-content -->
          
        </article>

      <?php endwhile; ?>

    <?php else : ?>
      <article class="post error">
        <h1 class="404">Nothing posted yet</h1>
      </article>
    <?php endif; ?>
  </div><!-- #content .site-content -->
<?php get_footer(); ?>
