<?php
/*
 * bbPress - Topic Single
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
		<?php if ( bbp_user_can_view_forum( array( 'forum_id' => bbp_get_topic_forum_id() ) ) ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="bbpress-topic-header clearfix">
					<h1><?php bbp_topic_title(); ?></h1>
					<?php if ( !post_password_required() ) : ?>
						<?php bbp_topic_tag_list(); ?>
					<?php endif; ?>
					<?php bbp_user_subscribe_link(); ?>
					<?php bbp_user_favorites_link(); ?>
					<?php bbp_breadcrumb(); ?>
				</div>
				<div id="bbpress-forums">
					<?php do_action( 'bbp_template_before_single_topic' ); ?>
					<?php if ( post_password_required() ) : ?>
						<?php bbp_get_template_part( 'form', 'protected' ); ?>
					<?php else : ?>
						<?php if ( bbp_show_lead_topic() ) : ?>



							<?php do_action( 'bbp_template_before_lead_topic' ); ?>
							<ul id="topic-<?php bbp_topic_id(); ?>-lead" class="bbp-lead-topic">
								<li class="bbp-body">
									<div class="bbp-topic-header">
										<div class="bbp-meta">
											<span class="bbp-topic-post-date"><?php bbp_topic_post_date(); ?></span>

											<a href="<?php bbp_topic_permalink(); ?>" title="<?php bbp_topic_title(); ?>" class="bbp-topic-permalink">#<?php bbp_topic_id(); ?></a>

											<?php do_action( 'bbp_theme_before_topic_admin_links' ); ?>

											<?php bbp_topic_admin_links(); ?>

											<?php do_action( 'bbp_theme_after_topic_admin_links' ); ?>
										</div>
									</div>
									<div id="post-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
										<div class="bbp-topic-author">
											<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

											<?php bbp_topic_author_link( array( 'sep' => '<br />', 'show_role' => true ) ); ?>

											<?php if ( is_super_admin() ) : ?>
												<?php do_action( 'bbp_theme_before_topic_author_admin_details' ); ?>

												<div class="bbp-topic-ip"><?php bbp_author_ip( bbp_get_topic_id() ); ?></div>

												<?php do_action( 'bbp_theme_after_topic_author_admin_details' ); ?>
											<?php endif; ?>

											<?php do_action( 'bbp_theme_after_topic_author_details' ); ?>
										</div>
										<div class="bbp-topic-content">
											<?php do_action( 'bbp_theme_before_topic_content' ); ?>

											<?php bbp_topic_content(); ?>

											<?php do_action( 'bbp_theme_after_topic_content' ); ?>
										</div>
									</div>
								</li>
							</ul>
							<?php do_action( 'bbp_template_after_lead_topic' ); ?>



						<?php endif; ?>
						<?php if ( bbp_has_replies() ) : ?>
							<?php bbp_get_template_part( 'loop', 'replies' ); ?>
							<?php bbp_get_template_part( 'pagination', 'replies' ); ?>
						<?php endif; ?>
						<?php bbp_get_template_part( 'form', 'reply' ); ?>
					<?php endif; ?>
					<?php do_action( 'bbp_template_after_single_topic' ); ?>
				</div>
			<?php endwhile; ?>
		<?php elseif ( bbp_is_forum_private( bbp_get_topic_forum_id(), false ) ) : ?>
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
		<?php do_action( 'bbp_after_main_content' ); ?>
	</section>

<?php get_footer( $bike_post_type ); ?>