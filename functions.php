<?php

	add_action( 'wp_enqueue_scripts', 'load_files');
	add_theme_support( 'post-thumbnails' ); 

	function load_files(){
		wp_deregister_script('jquery');
      		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false);
		wp_register_script( 'quicksand', get_template_directory_uri() . '/js/quicksand.min.js');
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js');
		wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), 1.0, true);
		wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), 1.0, true);
	
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css');
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,600|Sacramento');
		wp_enqueue_style( 'style', get_stylesheet_uri());
      		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'quicksand');
		wp_enqueue_script( 'modernizr');
		wp_enqueue_script( 'classie');
		wp_enqueue_script( 'fonts');
		wp_enqueue_script( 'main');
	}


	function disqus_embed($disqus_shortname) {
	    global $post;
	    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
	    echo '<div id="disqus_thread"></div>
	    <script type="text/javascript">
	        var disqus_shortname = "'.$disqus_shortname.'";
	        var disqus_title = "'.$post->post_title.'";
	        var disqus_url = "'.get_permalink($post->ID).'";
	        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
	    </script>';
	}
?>



