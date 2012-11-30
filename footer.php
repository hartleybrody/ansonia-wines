        
        </div><!-- #content -->
        <div id="footer">
            &copy; Ansonia Wines 2012
        </div>
        <?php wp_footer(); ?>
    </div><!-- .container -->
  
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    <!-- image swap -->
    <script type="text/javascript">
        $(".hover-swap").hover( 
            function(obj){ // in handler
                imgSrc = $(this).attr("src");
                newImgSrc = imgSrc.split(".jpg")[0] + "-hover.jpg";
                $(this).attr("src", newImgSrc);
            }, 
            function(obj){ // out handler
                imgSrc = $(this).attr("src");
                newImgSrc = imgSrc.split("-hover.jpg")[0] + ".jpg";
                $(this).attr("src", newImgSrc);
            }
        );
    </script>
    
    <!-- referral tracking code -->
    <script type="text/javascript"> var _vouchfor_config = _vouchfor_config || {}; _vouchfor_config.campaignTag = "Ansonia-Wines"; _vouchfor_config.offer = "$10 Off"; _vouchfor_config.position = "left-pos"; _vouchfor_config.host = "http://vouchfor.com"; _vouchfor_config.analytics = "https://ssl.google-analytics.com/__utm.gif?utms=1&utmhn=vouchfor.com&utmp=%2FAnsonia-Wines%2Fwidget%2Fvisit&utmac=UA-23418569-1&utmt=event&utme=5%28widget*open%20widget*Ansonia%20Wines%29%284114922%29";(function() {var vfjs = document.createElement('script'); vfjs.type = 'text/javascript'; vfjs.async = true; vfjs.src = 'http://vouchfor.com/js/vouchfor-widget/vouchfor-widget.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vfjs, s);})();</script>

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