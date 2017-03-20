<?php get_header(); ?>
<div id="content">

    
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
        <div class="box">
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <?php the_title(); ?>
                        </h2>

                        <hr>
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
		</div><!--#post-# .post-->
        </div>
   </div>

	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
