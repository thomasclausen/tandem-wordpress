<?php
/*
 * bbPress - Replies Loop
 */
?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>
<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">
	<?php if ( bbp_show_lead_topic() ) : ?>
		<li class="bbp-header">
			<div class="bbp-reply-content">
				<?php _e( 'Replies', 'bbpress' ); ?>
			</div>
		</li>
	<?php endif; ?>
	<li class="bbp-body">
		<?php while ( bbp_replies() ) : bbp_the_reply(); ?>
			<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>
		<?php endwhile; ?>
	</li>
</ul>
<?php do_action( 'bbp_template_after_replies_loop' ); ?>