<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="titleDiv-Mobile">
  <h1 class="mobile-title-text">Kids in the Stars</h1>
</div>
<div id="theFilter" class="button-group filter">
<button class="button is-checked" data-filter="*">Tout</button>
<?php 
  $tags = get_tags();
  foreach ( $tags as $tag ) {
    echo ( '<button class="button" data-filter="' . $tag->name . '">' . $tag->name . '</button>' );
  }  
?>
</div>
<div id="theGrid" class="main">
	<section class="grid">
		<?php if (have_posts()) : 
			while (have_posts()) : 
				the_post(); ?>
		<?php $postID = get_the_ID(); ?>
                <a class="grid__item <?php $postTags = get_the_tags($postID); 
					foreach ($postTags as $tag) { 
						echo ("$tag->name "); 
					} ?>" href="#">
		    <div class="image image--preview">
		    	<?php the_post_thumbnail() ?>
  		    </div>
		    <h2 class="title title--preview"><?php the_title(); ?></h2>
		    <div class="loader"></div>
                    <h4 class="article-excerpt"><?php the_excerpt() ?></h4>
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
					} ?></span>
                <h2 class="title title--full"><?php the_title() ?></h2>
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