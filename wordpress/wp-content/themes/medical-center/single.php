<?php
/**
 * The template for displaying the single file.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
get_header();
get_sidebar(); ?>
	<div id="mdclcntr_content" role="main">
		<?php if ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h2><?php the_title(); ?></h2>
					<div class="mdclcntr_meta">
						<?php _e( 'Posted on', 'medical_center' ); ?> <a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'j F, Y' ); ?></a>
						<?php if ( has_category() ) : printf( '&nbsp;' . __( 'in', 'medical_center' ) . '&nbsp;' ); the_category( ', ' ); endif; ?>
					</div><!-- mdclcntr_meta -->
				</header>
				<div class="mdclcntr_img_content">
					<?php the_post_thumbnail( 'mdclcntr_thumb' );
					do_action( 'mdclcntr_the_post_caption' ); ?>
				</div><!-- mdclcntr_img_content -->
				<div class="mdclcntr_entry_content">
					<?php the_content();
					wp_link_pages(); ?>
					<div class="clear"></div>
				</div><!-- mdclcntr_entry_content -->
				<?php if ( is_singular() ) : ?>
					<nav id="post-nav" class="post-navigation" role="navigation">
						<div class="post-nav-prev alignleft"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
						<div class="post-nav-next alignright"><?php next_post_link( '%link', '%title  &raquo;' ); ?></div>
					</nav>
					<div class="clear"></div>
				<?php endif;
				if ( comments_open( get_the_ID() ) ) :
					comments_template();
				endif;
				if ( has_tag() ) : ?>
					<footer class="mdclcntr_tags">
						<p><?php the_tags( __( 'Tags:', 'medical_center' ) . '&nbsp;', ', ' ); ?></p>
					</footer><!-- mdclcntr_tags -->
				<?php endif; ?>
			</article><!-- post -->
		<?php endif; ?>
	</div><!-- mdclcntr_content -->
<div class="clear"></div>
<?php get_footer(); ?>