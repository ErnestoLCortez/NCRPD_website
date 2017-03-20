<?php get_header(); ?>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <?php echo get_option('background_image'); ?>
   
                    <?php //echo get_theme_mod('bc_post_id_carousel');
                    if (is_int(intval(get_theme_mod('bc_post_id_carousel')))) {  ?>
                    <?php
                    $postid = get_theme_mod('bc_post_id_carousel');
                    if ( $images = get_posts(array(
                        'post_parent' => $postid,
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'orderby'        => 'title',
                        'order'           => 'ASC',
                        'post_mime_type' => 'image',
                        ))) {
                                
                        
                    ?>
                   
                    <div id="carousel-home" class="carousel slide" style="min-height: 501px">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <?php $i=1;
                                foreach( $images as $image ) { 
                                        ?>
                            
                             <li data-target="#carousel-home" data-slide-to="<?php echo ($i-1) ?>" <?php echo ($i==1?'class="active"':'') ?>></li>
                            <?php $i++;} ?>
                            
                           
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php 
                            $i =1 ;
                            foreach( $images as $image ) { 
                                
                                    $image = wp_get_attachment_image_src($image->ID, 'full');
                                        echo '<div class="item'.($i==1?' active':'').'">';
                                        echo '<img class="img-responsive img-full" src="'.$image[0].'">';
                                        echo '</div>'
                                ?>
                            
                                
                            <?php  $i++; } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-home" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-home" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                        <?php } } ?>
                    <h1>
                        <small>Welcome to</small>
                        <br>
                        <span class="brand-name"> <?php bloginfo('name'); ?></span>
                        <hr class="tagline-divider">
                        <small> <?php bloginfo('description'); ?>
                        </small>
                    </h1>
                </div>
            </div>
        </div>
        <?php if (is_int(intval(get_theme_mod('bc_home_cat_id')))) { 
                $cat_id = get_theme_mod('bc_home_cat_id'); 
                 query_posts('cat='.$cat_id);    
                 
                if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <div class="row">
                        <div class="box">
                            <div class="col-lg-12">
                                <hr>
                                <h2 class="intro-text text-center"><?php the_title() ?>
                                </h2>
                                <hr>
                                <?php if ( has_post_thumbnail() ) {  ?>
                                
                            
                                <!--<img class="img-responsive img-border-left" >-->
                                <?php the_post_thumbnail('medium', array('class'=> 
                                    "attachment-$size img-responsive img-border img-left")) ?>
                                
                                <?php } ?>
                                <hr class="visible-xs">
                                <?php the_content(); ?>

                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php } ?>


<script>
    jQuery(document).ready(function() {
        // Activates the Carousel
        jQuery('.carousel').carousel({
            interval: 5000,
        })
    })
    
    </script>
<?php get_footer(); ?>
