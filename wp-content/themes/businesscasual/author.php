<?php get_header(); ?>
<div id="content">
    <div class="row">
            <div class="box">
	<?php
		if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
	    else :
			$curauth = get_userdata(intval($author));
		endif;
	?>
	
	
        
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php _e('About:'); ?> <?php echo $curauth->display_name; ?></strong>
                    </h2>
                    <hr>
                </div>
        <?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
			<p><?php echo '<div class="text-center">'.$curauth->description.'</div>'; ?></a></p>
		<?php } ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-12 text-center">
                    <?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ 
                        the_post_thumbnail('full', array('class'=> "attachment-$size img-responsive img-border img-full"));
                        } ?>
                    <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        <br>
                        <small><?php the_time('F j, Y'); _e(' at '); the_time(); _e(', by '); the_author_posts_link() ?></small>
                    </h2>
                    <p><?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?></p>
                    
                    <hr>
                </div>
		
	<?php endwhile; else: ?>
		<div class="no-results">
			<p><strong><?php _e('There has been an error.'); ?></strong></p>
			<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.'); ?></p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--noResults-->
	<?php endif; ?>
		
	<div class="oldernewer">
		<p class="older pull-left"><?php next_posts_link('&laquo; Older Entries') ?></p>
		<p class="newer pull-right"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
	</div><!--.oldernewer-->
            </div>
    </div>
</div><!--#content-->
<?php get_footer(); ?>