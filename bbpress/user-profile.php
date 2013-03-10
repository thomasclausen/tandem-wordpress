<?php
/*
 * bbPress - User Profile
 */
?>

<?php do_action( 'bbp_template_before_user_profile' ); ?>

<ul class="bbp-users">
	<li class="bbp-header">
		<ul class="user-titles">
			<li class="bbp-user-info"><?php _e( 'Forum Role', 'bbpress' ); ?></li>
			<li class="bbp-user-topic-count"><?php _e( 'Topics', 'bbpress' ); ?></li>
			<li class="bbp-user-reply-count"><?php _e( 'Replies', 'bbpress' ); ?></li>
		</ul>
	</li>
	<li class="bbp-body">
		<ul class="user">
			<li class="bbp-user-info"><?php echo bbp_get_user_display_role(); ?></li>
			<li class="bbp-user-topic-count"><a href="<?php bbp_user_topics_created_url(); ?>" title="<?php printf( __( '%s emner', 'tandem' ), bbp_get_user_topic_count_raw() ); ?>"><?php echo bbp_get_user_topic_count_raw(); ?></a></li>
			<li class="bbp-user-reply-count"><a href="<?php bbp_user_replies_created_url(); ?>" title="<?php printf( __( '%s svar', 'tandem' ), bbp_get_user_reply_count_raw() ); ?>"><?php echo bbp_get_user_reply_count_raw(); ?></a></li>
		</ul>
	</li>
</ul>

<?php do_action( 'bbp_template_after_user_profile' ); ?>