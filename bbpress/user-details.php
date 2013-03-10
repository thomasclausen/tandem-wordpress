<?php
/*
 * bbPress - User Details
 */
?>

<?php do_action( 'bbp_template_before_user_details' ); ?>
<?php if ( bbp_is_single_user_profile() ) : ?>
	<div id="bbp-single-user-details" class="clearfix">
		<div class="bbp-user-details-avatar">
			<a href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>"><?php echo get_avatar( bbp_get_displayed_user_field( 'user_email' ), apply_filters( 'bbp_single_user_details_avatar_size', 160 ) ); ?></a>
		</div>
		<div class="bbp-user-details-info">
			<h2><a href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>"><?php echo bbp_get_displayed_user_field( 'display_name' ); ?></a></h2>
			<?php if ( bbp_is_single_user_profile() &&  bbp_get_displayed_user_field( 'description' ) != '' ) :
				echo '<p>' . bbp_get_displayed_user_field( 'description' ) . '</p>';
			endif; ?>
			<div class="bbp-user-details-meta">
				<p>
					<?php if ( bbp_get_displayed_user_field( 'user_url' ) != '' ) :
						printf( __( '<a href="http://%s" target="_blank">Hjemmeside &rarr;</a>', 'tandem' ), esc_url( bbp_get_displayed_user_field( 'user_url' ) ) );
						echo '<br />';
					endif; ?>
					<?php if ( bbp_get_displayed_user_field( 'twitter' ) != '' ) :
						printf( __( '<a href="http://%s" target="_blank">Twitter &rarr;</a>', 'tandem' ), esc_url( bbp_get_displayed_user_field( 'twitter' ) ) );
						echo '<br />';
					endif; ?>
					<?php if ( bbp_get_displayed_user_field( 'facebook' ) != '' ) :
						printf( __( '<a href="http://%s" target="_blank">Facebook &rarr;</a>', 'tandem' ), esc_url( bbp_get_displayed_user_field( 'facebook' ) ) );
						echo '<br />';
					endif; ?>
					<?php if ( bbp_get_displayed_user_field( 'googleplus' ) != '' ) :
						printf( __( '<a href="http://%s" target="_blank">Google+ &rarr;</a>', 'tandem' ), esc_url( bbp_get_displayed_user_field( 'googleplus' ) ) );
						echo '<br />';
					endif; ?>
					<?php if ( bbp_get_displayed_user_field( 'skype' ) != '' ) :
						printf( __( '<a href="call:%s" target="_blank">Skype &rarr;</a>', 'tandem' ), esc_url( bbp_get_displayed_user_field( 'skype' ) ) );
					endif; ?>
				</p>
				<p><?php setlocale( LC_TIME, 'da_DK' );
				echo 'Bruger siden: ' . gmdate( 'j. F Y', strtotime( bbp_get_displayed_user_field( 'user_registered' ) ) ); ?></p>
			</div>
		</div>
	</div>
<?php else : ?>
	<div id="bbp-single-user-details" class="short clearfix">
		<a href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>"><?php echo get_avatar( bbp_get_displayed_user_field( 'user_email' ), apply_filters( 'bbp_single_user_details_avatar_size', 24 ) ); ?></a>
		<h2><a href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>"><?php echo bbp_get_displayed_user_field( 'display_name' ); ?></a></h2>
	</div>
<?php endif; ?>
<?php do_action( 'bbp_template_after_user_details' ); ?>