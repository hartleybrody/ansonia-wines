        <?php wp_footer(); ?>
        </div><!-- #content -->
    </div><!-- .container -->
  
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  
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

</body>
</html>