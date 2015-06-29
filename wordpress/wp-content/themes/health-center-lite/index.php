<?php get_header(); ?>
<!-- HC Page Header Section -->	
<div class="container">
  <div class="row">
    
  </div>
</div>
<!-- /HC Page Header Section -->	
<!-- HC Blog right Sidebar Section -->	
<div class="container">
 <?php echo do_shortcode('[wonderplugin_carousel id="1"]'); ?>
  <div class="row hc_blog_wrapper">
    <!--Blog Content-->
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <?php 	
        while(have_posts()):the_post();
        	global $more;
        	$more = 0;
        ?>
      <div class="hc_blog_section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <div class="hc_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
         
        </div>
        <div class="clear"></div>
        <div class="hc_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive" ); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('health_center-blog_detail', $defalt_arg); ?>
          </a>
          <?php endif;?>				
        </div>
        <div class="hc_blog_post_content">
          <p><?php the_content( __( 'Read More' , 'health' ) ); ?></p>
		  <?php wp_link_pages( ); ?>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="hc_blog_pagination">
        <div class="hc_blog_pagi">
          <?php if ( get_next_posts_link() ): ?>
          <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'health' ) ); ?>
          <?php endif; ?>
          <?php if ( get_previous_posts_link() ): ?>
          <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'health' ) ); ?>
          <?php endif; ?>
        </div>
        <?php if(wp_link_pages()) { wp_link_pages();  } ?>	
      </div>
    </div>
    <?php get_sidebar(); ?>		
  </div>
</div>
<?php get_footer(); ?>