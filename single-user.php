<?php
/*
 * bbPress - Single User Profile
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
		<div class="bbpress-user-header clearfix">
			<?php bbp_get_template_part( 'user', 'details' ); ?>
		</div>
		<div id="bbpress-forums">
			<?php if ( bbp_is_single_user_profile() ) bbp_get_template_part( 'user', 'profile' ); ?>
			<?php if ( bbp_is_single_user_topics() ) bbp_get_template_part( 'user', 'topics-created' ); ?>
			<?php if ( bbp_is_single_user_replies() ) bbp_get_template_part( 'user', 'replies-created' ); ?>
			<?php if ( bbp_is_favorites() ) bbp_get_template_part( 'user', 'favorites' ); ?>
			<?php if ( bbp_is_subscriptions() ) bbp_get_template_part( 'user', 'subscriptions' ); ?>
			<?php if ( bbp_is_single_user_edit() ) bbp_get_template_part( 'form', 'user-edit' ); ?>
		</div>
		<?php do_action( 'bbp_after_main_content' ); ?>
	</section>

<?php get_footer( $bike_post_type ); ?>