<?php
/*
 * bbPress - Forum Single
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
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( bbp_user_can_view_forum() ) : ?>
				<div class="bbpress-forum-header clearfix">
					<h1><?php bbp_forum_title(); ?></h1>
					<?php bbp_breadcrumb(); ?>
					<?php the_content(); ?>
				</div>
				<div id="bbpress-forums">
					<?php do_action( 'bbp_template_before_single_forum' ); ?>
					<?php if ( post_password_required() ) : ?>
						<?php bbp_get_template_part( 'form', 'protected' ); ?>
					<?php else : ?>
						<?php if ( bbp_get_forum_subforum_count() && bbp_has_forums() ) : ?>
							<?php bbp_get_template_part( 'loop', 'forums' ); ?>
						<?php endif; ?>
						<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>
							<?php bbp_get_template_part( 'loop', 'topics' ); ?>
							<?php bbp_get_template_part( 'pagination', 'topics' ); ?>
							<?php bbp_get_template_part( 'form', 'topic' ); ?>
						<?php elseif ( !bbp_is_forum_category() ) : ?>
							<ul class="bbp-forums bbp-template-notice">
								<li class="bbp-body">
									<p><?php _e( 'Oh bother! No topics were found here!', 'bbpress' ); ?></p>
								</li>
							</ul>
							<?php bbp_get_template_part( 'form', 'topic' ); ?>
						<?php endif; ?>
					<?php endif; ?>
					<?php do_action( 'bbp_template_after_single_forum' ); ?>
				</div>
			<?php else : ?>
				<div class="bbpress-forum-header clearfix">
					<div id="forum-private" class="bbp-forum-content">
						<h1 class="entry-title"><?php _e( 'Private', 'bbpress' ); ?></h1>
						<div class="entry-content">
							<div class="bbp-template-notice info">
								<p><?php _e( 'You do not have permission to view this forum.', 'bbpress' ); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php do_action( 'bbp_after_main_content' ); ?>
	</section>

<?php get_footer( $bike_post_type ); ?>