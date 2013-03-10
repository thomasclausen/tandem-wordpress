<?php
/*
 * bbPress - Pagination for pages of replies (when viewing a topic)
 */
?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">
	<div class="bbp-pagination-links">
		<?php bbp_topic_pagination_links(); ?>
	</div>
</div>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>