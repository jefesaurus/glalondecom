<div id="title-box">
  <h1 class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
  </h1>
</div>

<div class="expandable">
  <li class="tab">
    <input type="radio" id="hidetab" name="ac0" checked>
    <label for="hidetab" class="inversehide">Hide Menu</label>
  </li>

  <li class="tab">
    <input type="radio" id="showtab" name="ac0">
    <hr class="inversehide">
    <label for="showtab" class="inversehide">Show Menu</label>
    <div id="mainmenu" class="tabcontent smart-padding">

      <hr>
      <?php get_search_form(); ?>
      <hr>
      <div id="aboutlink">
        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
      </div>
      <hr>

      <?php
        $cat_args = array('orderby' => 'name', 'parent' => 0);
        $categories = get_categories( $cat_args );

        /* Get the current category of the post */
        if (is_category( )) {
          $curr_cat = get_category(get_query_var('cat'))->term_id;
          $curr_post = -1;
        } else if(is_single()) {
          $curr_post = $wp_query->post->ID;
          $curr_cat = get_the_category($curr_post)[0]->term_id; 
        } else {
          $curr_cat = -1;
          $curr_post = -1;
        }
      ?>

      <div class="accordion">
        <ul>
          <?php foreach ( $categories as $category ) : ?>
            <li class="tab">
              <input type="radio" id="tab-<?php echo $category->term_id; ?>" name="ac1" <?php if($category->term_id == $curr_cat) {echo 'checked';} ?>>
              <label for="tab-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></label>
              <div class="tabcontent smart-padding">
                <?php
                $post_args = array('orderby' => 'post_date', 'category' => $category->term_id, 'numberposts' => -1);
                $currposts = get_posts( $post_args );
                ?>
                <?php foreach ( $currposts as $post ) : ?>
                  <a href="<?php echo get_permalink( $post->term_id); ?>"
                    <?php if ($post->ID == $curr_post) { echo ' class="selected" ';} ?>
                  ><?php echo get_the_title( $post->term_id); ?></a><br/>
                <?php endforeach; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div> <!-- accordion -->

    </div> <!-- tabcontent -->
  </li>
</div><!-- expandable -->
