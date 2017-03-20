<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
        <div class="box">
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                         
                    
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <?php the_title(); ?>
                        </h2>
                        
                        <hr>
                        <h2 class="text-center"><small><?php the_time('F j, Y'); _e(' at '); the_time() ?> <?php  _e('By '); the_author_posts_link() ?></small></h2>

                    </div>
                    
                        <?php if ( has_post_thumbnail() ) {  ?>
                        <div class="col-md-6">

                            <!--<img class="img-responsive img-border-left" >-->
                            <?php the_post_thumbnail('post-thumbnail', array('class'=> "attachment-$size img-responsive img-border-left")) ?>
                        </div>
                        <?php } ?>
			<div class="<?php echo (has_post_thumbnail())?"col-md-6":"col-md-12" ?>">
                        <?php the_content(); ?>
                                            <?php edit_post_link('<small>Edit this entry</small>','',''); ?>

                        <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
                        </div>
                    <div class="clearfix"></div>
                        <h2 class="text-center"><small><?php the_category(', ') ?> <?php the_tags(' | ', ', ', ' '); ?></small></h2>
                        <?php if(get_theme_mod('bc_enable_comments')) { ?>
			<div id="post-meta">
				<p><?php comments_popup_link('No comments', 'One comment', '% comments', 'comments-link', 'Comments are closed'); ?> </p>
				
			</div><!--#post-meta-->
                        <?php } ?>
			

		</div><!-- #post-## -->

		<div class="newer-older">
			<p class="older pull-left"><?php previous_post_link('%link', '&laquo; Previous') ?>
			<p class="newer pull-right"><?php next_post_link('%link', 'Next &raquo;') ?></p>
		</div><!--.newer-older-->

        </div>
    </div>
	<?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_footer(); ?>