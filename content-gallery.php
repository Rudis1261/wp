<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php //twentyfourteen_post_thumbnail(); ?>

	<div class="container-fluid">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div><!-- .entry-meta -->

		<?php
			endif;
		?>
		<div class="row">
		<?php

			# Get the author and modify it slightly
			$date_and_author = '<br /><small>[' . twentyfourteen_posted_on() . ']</small>';

			if ( is_single() ) :
				the_title( '<h1 class="page-header">', $date_and_author . '</h1>' . edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="pull-right"><br />', '</span>' ) );
			else :
				the_title( '<h1 class="page-header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' . $date_and_author . '</h1>' . edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="pull-right"><br />', '</span>' )  );
			endif;
		?>
		</div>


		<div class="entry-meta">
			<!-- <span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>"><?php echo get_post_format_string( 'gallery' ); ?></a>
			</span> -->

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php endif; ?>

		</div><!-- .entry-meta -->

	</div><!-- .entry-header -->


	<!-- ON the current page -->
	<?php if ( is_single() ) : ?>

		<div class="container-fluid">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			?>
		</div><!-- .entry-content -->

	<!-- On the post listing -->
	<?php else : ?>

		<?php

			# Loop through the attachments
			$attachments = get_children( array(
		        'post_parent' 		=> get_the_ID(),
		        'post_status' 		=> 'inherit',
		        'post_type' 		=> 'attachment',
		        'post_mime_type' 	=> 'image',
		        'orderby' 			=> 'menu_order ID'
		       	)
		    );

			$image 		= false;
			$text 		= substr( strip_tags( get_the_excerpt() ),0,235);

			# Has a featured image
			if (has_post_thumbnail($post->ID)) {
				$image 			= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				$width 			= $image[1];
				$height 		= $image[2];
				$image 			= $image[0];
			}


			# Check that the image is empty and the gallery it not
			if (!empty($attachments) AND empty($image)) {

				$attachment_ids = array_keys($attachments);
				$random_key 	= array_rand($attachment_ids);
				$image 			= wp_get_attachment_image_src( $attachment_ids[ $random_key ] , 'medium');
				$width 			= $image[1];
				$height 		= $image[2];
				$image 			= $image[0];
			}


		# The post does have images of some sort. Whether it's a gallery or a singular featured image
		if (!empty($image)) :
		?>

			<div id="container-fluid">
				<div class="pull-left">
					<a href="<?php echo the_permalink(); ?>">
						<img class="img-thumbnail img-responsive lazy" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-original="<?php echo $image; ?>" alt="Featured image">
					</a>
				</div>
				<div class="pull-left post-content">
					<p>
						<?php
							$first_word = strtok($text, " ");
						 	echo str_replace($first_word, "<span class='post-first-word'>" . $first_word . "</span>", $text);
						?>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>


		<!-- JUST IMAGES, WHICH SHOULD NOT BE THE CASE WITH A GALLERY ITEM -->
		<?php else : ?>
			<div id="container-fluid">
				<div class="pull-left post-content">
					<p>
						<?php
							$first_word = strtok($text, " ");
						 	echo str_replace($first_word, "<span class='post-first-word'>" . $first_word . "</span>", $text);
						?>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>

		<?php  endif;?>


	<!-- Close off the listing -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
	<hr />
</article><!-- #post-## -->
