<?php get_header(); ?>
<div id="content">
    <div class="row">
        <div class="box">
	<div id="error404" class="post">

                <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <?php _e('Error 404 Not Found'); ?>
                        </h2>

                        <hr>
                    </div>
		<div class="post-content">
			<p><?php _e('Oops. Fail. The page cannot be found.'); ?></p>
			<p><?php _e('Please check your URL or use the search form below.'); ?></p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--.post-content-->
	</div><!--#error404 .post-->
        </div>
    </div>
</div><!--#content-->
<?php get_footer(); ?>