<?php
/*
 * bbPress - Topic Tag
 */
?>

<?php $bike_post_type = get_post_type(); ?>

<?php get_header( $bike_post_type ); ?>

<?php get_sidebar( $bike_post_type ); ?>

	<section id="content" class="clearfix">
		<?php get_search_form(); ?>

		<?php do_action( 'bbp_before_main_content' ); ?>
		<div class="bbpress-header clearfix">
			<?php do_action( 'bbp_template_notices' ); ?>
		</div>
		<div class="bbpress-topic-header clearfix">
			<h1><?php printf( __( 'Topic Tag: %s', 'bbpress' ), '<span>' . bbp_get_topic_tag_name() . '</span>' ); ?></h1>
			<?php bbp_breadcrumb(); ?>
			<?php if ( bbp_is_topic_tag() ) :
				bbp_topic_tag_description();
			endif; ?>
		</div>
		<div id="bbpress-forums">
			<?php do_action( 'bbp_template_before_topics_index' ); ?>
			<?php if ( bbp_has_topics() ) : ?>
				<?php bbp_get_template_part( 'loop', 'topics' ); ?>
				<?php bbp_get_template_part( 'pagination', 'topics' ); ?>
			<?php else : ?>
				<ul class="bbp-forums bbp-template-notice">
					<li class="bbp-body">
						<p><?php _e( 'Oh bother! No topics were found here!', 'bbpress' ); ?></p>
					</li>
				</ul>
			<?php endif; ?>
			<?php do_action( 'bbp_template_after_topics_index' ); ?>
		</div>

		<?php do_action( 'bbp_after_main_content' ); ?>
	</section>

<?php get_footer( $bike_post_type ); ?>
