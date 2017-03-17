<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kids in the Stars</title>
        <?php wp_head() ?>
        <?php wp_enqueue_scripts(); ?>
        <script type="text/javascript">
            function loadComments(source, identifier, url){
                if(window.DISQUS) {
                    $('#disqus_thread').remove();

                    $('<div id="disqus_thread"></div>').insertAfter(source);
                    
                    DISQUS.reset({
                        reload: true,
                        config: function() {
                            this.page.identifier = url;
                            this.page.url = url;
                        }
                    });
                }
                else{
                    $('<div id="disqus_thread"></div>').insertAfter(source);
                    disqus_identifier = url;
                    disqus_url = url;

                    var dsq = document.createElement('script');
                    dsq.type = 'text/javascript';
                    dsq.async = true;
                    dsq.src = 'http://kidsinthestars.disqus.com/embed.js';
                    $('head').append(dsq);
                }
            }
        </script>
    </head>
    <body>
        <div class="container">