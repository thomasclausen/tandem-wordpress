<?php
/*
 * bbPress - Topics Loop - Single Topic
 */
?>

<ul id="topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	<li class="bbp-topic-title">
		<?php if ( bbp_is_user_home() ) : ?>
			<?php if ( bbp_is_favorites() ) : ?>
				<span class="bbp-topic-action">
					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_user_favorites_link( array( 'mid' => '+', 'post' => '' ), array( 'pre' => '', 'mid' => '&times;', 'post' => '' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>
				</span>
			<?php elseif ( bbp_is_subscriptions() ) : ?>
				<span class="bbp-topic-action">
					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_user_subscribe_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>
				</span>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>" title="<?php bbp_topic_title(); ?>"><?php bbp_topic_title(); ?></a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php bbp_topic_row_actions(); ?>
	</li>
	<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>
	<li class="bbp-topic-freshness">
		<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>
		<?php bbp_topic_last_active_time(); ?>
		<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
	</li>
</ul>