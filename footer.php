        
        </div><!-- #content -->
        <div id="footer">
            &copy; Ansonia Wines 2016</br>
        </div>
        <?php wp_footer(); ?>
    </div><!-- .container -->
  
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_site_url(); ?>/wp-content/themes/_s/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo get_site_url(); ?>/wp-content/themes/_s/scripts/jquery.cookie.js"></script>

    <?php if ( is_home() ) : ?>
        <script>
            $('.carousel').carousel({
                interval: 3500
            });

            var hasSeenModal = $.cookie("hasSeenModal");
            if (hasSeenModal === undefined){

                $.cookie("hasSeenModal", true, { expires: 3 });

                if ($(window).width() > 940 && $(window).height() > 400){ // only show the modal if they're on a big enough screen
                    // show and center the modal
                    setTimeout( function(){
                        $('.modal').modal({
                            show: true
                        }).css({
                            'margin-left': function () { // horizontal centering
                                return -($(this).width() / 2);
                            }
                        });
                    }, 8000);
                }
            }
        </script>
    <?php endif; ?>
    
    <!-- google analytics -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-35915987-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>


</body>
</html>
