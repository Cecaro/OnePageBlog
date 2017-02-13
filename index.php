<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="theGrid" class="main">
	<section class="grid">
  <header class="top-bar">
    <div class="top-bar__language">
      <ul><?php pll_the_languages();?></ul>
      <!-- <h2 class="language-item"><a class="active" href="">Français</a></h2>
      <h2 class="language-item"><a href="">English</a></h2> -->
    </div>
      <div class="filter" id="filter">
        <span class="filter-item active fr" data-filter="*">Toutes catégories</span>
        <span class="filter-item en" data-filter="*">All Categories</span>
        <?php 
          $tags = get_tags();
          foreach ( $tags as $tag ) {
            echo ( '<span class="filter-item" data-filter="' . $tag->name . '">' . $tag->name . '</span>' );
          }  
        ?>
      </div>
    </header>
		<?php if (have_posts()) : 
			while (have_posts()) : 
				the_post(); ?>
		<?php $postID = get_the_ID(); ?>
        <a class="grid__item <?php $postTags = get_the_tags($postID); 
					foreach ($postTags as $tag) { 
						echo ("$tag->name "); 
					} ?>" href="#">
          <h2 class="title title--preview"><?php the_title(); ?></h2>
          <div class="loader"></div>
          <span class="category"><?php $postTags = get_the_tags($postID); 
            $lastTag = end($postTags);
            foreach ($postTags as $tag) {
              if($tag === $lastTag){
                echo ("$tag->name");
              } else { 
                echo("$tag->name, ");
              } 
            } ?>
          </span>
          <div class="meta meta--preview">
            <img class="meta__avatar" src="" alt="" /> 
            <span class="meta__date"><i class="fa fa-calendar-o"></i><?php $post_date = get_the_date( 'M j' ); echo $post_date; ?></span>
          </div>
        </a>
			<?php endwhile; 
		else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</section>
  <section class="content">
    <div class="scroll-wrap">
      <?php if (have_posts()) :
          while (have_posts()) :
              the_post(); ?>
          <?php $postID = get_the_ID(); ?>
            <article class="content__item">
              <span class="category category--full"><?php $postTags = get_the_tags($postID); 
  						  $lastTag = end($postTags);
  				      foreach ($postTags as $tag) {
        					if($tag === $lastTag){
        						echo ("$tag->name");
        					} else { 
        						echo("$tag->name, ");
        					} 
        				} ?>   
              </span>
              <h2 class="title title--full"><?php the_title() ?></h2>
              <div class="meta meta--full">
                <img class="meta__avatar" src="" alt="" />
                <span class="meta__date"><i class="fa fa-calendar-o"></i><?php $post_date = get_the_date( 'M j' ); echo $post_date; ?></span>
              </div>
              <p><?php the_content() ?></p>
	            <div class="comment-section"><?php comment_form(); ?>
            </article>
          <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
  </section>
</div>

<?php get_footer(); ?>
<!--Wrapper div-->
    </div>
<?php wp_footer() ?>
</body>
</html>