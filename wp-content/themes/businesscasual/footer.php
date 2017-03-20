	<div class="clear"></div>
	</div><!--.container-->
	
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                    <?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
                        <!--Wigitized Footer-->
                    <?php endif ?>
                    <div class="clearfix"></div>
                    <p class="text-center"><?php echo get_theme_mod('bc_footer_text') ?></p>
                    <!-- Keep this to support the developers -->
                    <p class="text-center">Developed by <a href="www.xtendify.com">Xtendify</a></p>
                </div>
            </div>
        </div>
    </footer>

<script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.js"></script>

<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>

</body>
</html>