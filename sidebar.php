	<section id="sidebar" class="<?php echo ( is_post_type_archive( 'forum' ) || is_singular( array( 'forum', 'topic', 'reply', 'user' ) ) || bbp_is_single_user() || bbp_is_topic_tag() ? 'forum ' : ''); ?>clearfix">
		<?php if ( is_page() ) : ?>
			<?php if ( ! $post->post_parent ) :
				// will display the subpages of this top level page
				$children = wp_list_pages( 'child_of=' . $post->ID . '&sort_column=menu_order&title_li=&echo=0' );
			else :
				// will display the subpages of the top level page
				if ( $post->ancestors ) :
					// now you can get the the top ID of this page
					// wp is putting the ids DESC, thats why the top level ID is the last one
					$ancestors = end( $post->ancestors );
					$children = wp_list_pages( 'child_of=' . $ancestors . '&sort_column=menu_order&title_li=&echo=0' );
					// you will always get the whole subpages list
				endif;
			endif;
			if ( $children ) : ?>
				<nav class="submenu">
					<ul class="clearfix">
						<?php echo $children; ?>
					</ul>
				</nav>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-left' ) && !is_page_template( 'page-full-width.php' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-left' ); ?>
			<?php endif; ?>
		<?php elseif ( is_attachment() ) : ?>
			<div class="attachment-meta">
				<?php $imagemeta = wp_get_attachment_metadata();
				// list values in array
				/*$aperture        = $imagemeta['image_meta']['aperture'];
				$credit            = $imagemeta['image_meta']['credit'];
				$camera            = $imagemeta['image_meta']['camera'];
				$caption           = $imagemeta['image_meta']['caption'];
				$created_timestamp = $imagemeta['image_meta']['created_timestamp'];
				$copyright         = $imagemeta['image_meta']['copyright'];
				$focal_length      = $imagemeta['image_meta']['focal_length'];
				$iso               = $imagemeta['image_meta']['iso'];
				$shutter_speed     = $imagemeta['image_meta']['shutter_speed'];
				$title             = $imagemeta['image_meta']['title']; */
				if ( $imagemeta['width'] && $imagemeta['height'] ) {
					echo '<div class="image-size"><strong>' . __( 'Fuld st&oslash;rrelse:', 'tandem' ) . '</strong> ' . $imagemeta['width'] . ' x ' . $imagemeta['height'] . ' ' . __( 'pixels', 'tandem' ) . '</div>';
				}
				if ($imagemeta['image_meta']['camera']) {
					echo '<div class="camera"><strong>' . __( 'Kamera:', 'tandem' ) . '</strong> ' . $imagemeta['image_meta']['camera'] . '</div>';
				}
				if ($imagemeta['image_meta']['aperture']) {
					echo '<div class="aperature"><strong>' . __( 'Bl&aelig;nde:', 'tandem' ) . '</strong> F' . $imagemeta['image_meta']['aperture'] . '</div>';
				}
				if ($imagemeta['image_meta']['created_timestamp']) {
					function time_stamp( $session_time ) { 
						$time_difference = time() - $session_time ; 
						$seconds = $time_difference; 
						$minutes = round($time_difference / 60 );
						$hours = round($time_difference / 3600 ); 
						$days = round($time_difference / 86400 ); 
						$weeks = round($time_difference / 604800 ); 
						$months = round($time_difference / 2419200 ); 
						$years = round($time_difference / 29030400 ); 
						
						if ( $seconds <= 60 ) { // Seconds
							if ( $seconds === 1 ) { return __( '1 sekund siden', 'tandem' ); } else { return sprintf( __( '%s sekunder siden', 'tandem' ), $seconds); }
						} elseif ( $minutes <= 60 ) { //Minutes
							if ( $minutes === 1 ) { return __( '1 minut siden', 'tandem' ); } else { return sprintf( __( '%s minutter siden', 'tandem' ), $minutes); }
						} elseif ( $hours <= 24 ) { //Hours
							if ( $hours === 1 ) { return __( '1 time siden', 'tandem' ); } else { return sprintf( __( '%s timer siden', 'tandem' ), $hours); }
						} else if($days <= 7) { //Days
							if ( $days === 1 ) { return __( '1 dag siden', 'tandem' ); } else { return sprintf( __( '%s dage siden', 'tandem' ), $days); }
						} else if($weeks <= 4) { //Weeks
							if( $weeks === 1 ) { return __( '1 uge siden', 'tandem' ); } else { return sprintf( __( '%s uger siden', 'tandem' ), $weeks); }
						} elseif ( $months <= 12 ) { //Months
							if ( $months === 1 ) { return __( '1 m&aring;ned siden', 'tandem' ); } else { return sprintf( __( '%s m&aring;neder siden', 'tandem' ), $months); }
						} else { //Years
							if ( $years === 1 ) { return __( '1 &aring;r siden', 'tandem' ); } else { return sprintf( __( '%s &aring;r siden', 'tandem' ), $years); }
						}
					} 
					echo '<div class="image-date"><strong>' . __( 'Billedet er taget:', 'tandem' ) . '</strong> ' . time_stamp( $imagemeta['image_meta']['created_timestamp'] ) . ' (' . date( 'H:i:s - d/m/y', $imagemeta['image_meta']['created_timestamp'] ) . ')</div>';
				}
				if ($imagemeta['image_meta']['focal_length']) {
					echo '<div class="focal-length"><strong>' . __( 'Br&aelig;ndvidde:', 'tandem' ) . '</strong> ' . $imagemeta['image_meta']['focal_length'] . ' mm</div>';
				}
				if ($imagemeta['image_meta']['iso']) {
					echo '<div class="iso"><strong>' . __( 'ISO:', 'tandem' ) . '</strong> ' . $imagemeta['image_meta']['iso'] . '</div>';
				}
				if ($imagemeta['image_meta']['shutter_speed']) {
					echo '<div class="shutter-speed"><strong>' . __( 'Lukkehastighed:', 'tandem' ) . '</strong> ';

					// shutter speed handler
					if ( ( 1 / $imagemeta['image_meta']['shutter_speed'] ) > 1 ) {
						echo "1/";
						if ( number_format( ( 1 / $imagemeta['image_meta']['shutter_speed'] ), 1 ) ===  number_format( ( 1 / $imagemeta['image_meta']['shutter_speed'] ), 0 ) ) {
							echo number_format( ( 1 / $imagemeta['image_meta']['shutter_speed'] ), 0, '.', '' ) . __( ' sek.', 'tandem' ) . '</div>';
						} else {
							echo number_format( ( 1 / $imagemeta['image_meta']['shutter_speed'] ), 1, '.', '' ) . __( ' sek.', 'tandem' ) . '</div>';
						}
					} else {
						echo $imagemeta['image_meta']['shutter_speed'] . __( ' sek.', 'tandem' ) . '</div>';
					}
				}
				if ( $imagemeta['image_meta']['credit'] ) {
					echo '<div class="credit"><strong>' . __( 'Fotograf:', 'tandem' ) . '</strong> ' . $imagemeta['image_meta']['credit'] . '</div>';
				}
				if ( $imagemeta['image_meta']['copyright'] ) {
					echo '<div class="copyright"><strong>' . __( 'Copyright:', 'tandem' ) . '</strong> ' . $imagemeta['image_meta']['copyright'] . '</div>';
				} ?>
				<div class="comments"><a href="#comments"><?php comments_number( __( 'Ingen kommentarer', 'tandem' ), __( '1 kommentar', 'tandem' ), __( '% kommentarer', 'tandem' ) );?></a></div>
				<?php edit_post_link( __( 'Rediger billede', 'tandem' ), '<div class="edit-link">', '</div>' ); ?>
			</div>
			<?php echo '<a href="' . get_permalink( $post->post_parent ) . '">' . __( '&laquo; Tilbage til "', 'tandem' ) . get_the_title( $post->post_parent ) . '"</a>'; ?>
		<?php elseif ( is_post_type_archive( 'forum' ) || is_singular( array( 'forum', 'topic', 'reply', 'user' ) ) || bbp_is_topic_tag() ) : ?>
			<?php if ( is_active_sidebar( 'sidebar-forum-left' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-forum-left' ); ?>
			<?php endif; ?>
			<div class="bbp-login-tabs">
				<nav class="bbp-login-navigation">
					<ul class="clearfix">
						<li class="current"><a href="#login"><?php _e( 'Login', 'tandem' ); ?></a></li>
						<li><a href="#register"><?php _e( 'Opret bruger', 'tandem' ); ?></a></li>
						<li><a href="#lost-pass"><?php _e( 'Glemt kodeord?', 'tandem' ); ?></a></li>
					</ul>
				</nav>
				<div id="login" class="bbp-login-tab current">
					<?php if ( !is_user_logged_in() ) :
						bbp_get_template_part( 'form', 'user-login' );
					else :
						bbp_get_template_part( 'user', 'logged-in' );
					endif; ?>
				</div>
				<div id="register" class="bbp-login-tab">
					<?php bbp_get_template_part( 'form', 'user-register' ); ?>
				</div>
				<div id="lost-pass" class="bbp-login-tab">
					<?php bbp_get_template_part( 'form', 'user-lost-pass' ); ?>
				</div>
			</div>
		<?php elseif ( bbp_is_single_user() ) : ?>
			<?php if ( is_active_sidebar( 'sidebar-forum-left' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-forum-left' ); ?>
			<?php endif; ?>
			<nav id="bbp-user-navigation">
				<ul class="clearfix">
					<li class="<?php if ( bbp_is_single_user_profile() ) : ?>current<?php endif; ?>">
						<a href="<?php bbp_user_profile_url(); ?>" title="<?php printf( __( "%s's profil", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Profil', 'tandem' ); ?></a>
					</li>
					<li class="<?php if ( bbp_is_single_user_topics() ) : ?>current<?php endif; ?>">
						<a href="<?php bbp_user_topics_created_url(); ?>" title="<?php printf( __( "%s's emner", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Emner', 'tandem' ); ?></a>
					</li>
					<li class="<?php if ( bbp_is_single_user_replies() ) : ?>current<?php endif; ?>">
						<a href="<?php bbp_user_replies_created_url(); ?>" title="<?php printf( __( "%s's svar", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Svar', 'tandem' ); ?></a>
					</li>
					<?php if ( bbp_is_favorites_active() ) : ?>
						<li class="<?php if ( bbp_is_favorites() ) : ?>current<?php endif; ?>">
							<a href="<?php bbp_favorites_permalink(); ?>" title="<?php printf( __( "%s's favoritter", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Favoritter', 'tandem' ); ?></a>							
						</li>
					<?php endif; ?>
					<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>
						<?php if ( bbp_is_subscriptions_active() ) : ?>
							<li class="<?php if ( bbp_is_subscriptions() ) : ?>current<?php endif; ?>">
								<a href="<?php bbp_subscriptions_permalink(); ?>" title="<?php printf( __( "%s's tilmeldinger", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Tilmeldinger', 'tandem' ); ?></a>							
							</li>
						<?php endif; ?>
						<li class="<?php if ( bbp_is_single_user_edit() ) : ?>current<?php endif; ?>">
							<a href="<?php bbp_user_profile_edit_url(); ?>" title="<?php printf( __( "Rediger %s's profil", 'tandem' ), esc_attr( bbp_get_displayed_user_field( 'display_name' ) ) ); ?>"><?php _e( 'Rediger', 'tandem' ); ?></a>
						</li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php else : ?>
			<?php if ( get_post_format() ) :
				$post_meta_class = ' ' . get_post_format();
			endif;
			if ( has_post_thumbnail() ) :
				$post_meta_class .= ' image';
			endif; ?>
			<div class="post-meta<?php echo $post_meta_class; ?> clearfix">
				<?php if ( has_post_format( 'aside' ) ) :
					$tandem_post_format_title = __( 'Vis alle sidebem&aelig;rkninger', 'tandem' );
					$tandem_post_format = __( 'Sidebem&aelig;rkning', 'tandem' );
				elseif ( has_post_format( 'gallery' ) ) :
					$tandem_post_format_title = __( 'Vis alle gallerier', 'tandem' );
					$tandem_post_format = __( 'Galleri', 'tandem' );
				elseif ( has_post_format( 'link' ) ) :
					$tandem_post_format_title = __( 'Vis alle links', 'tandem' );
					$tandem_post_format = __( 'Link', 'tandem' );
				elseif ( has_post_format( 'image' ) ) :
					$tandem_post_format_title = __( 'Vis alle billeder', 'tandem' );
					$tandem_post_format = __( 'Billede', 'tandem' );
				elseif ( has_post_format( 'quote' ) ) :
					$tandem_post_format_title = __( 'Vis alle citater', 'tandem' );
					$tandem_post_format = __( 'Citat', 'tandem' );
				elseif ( has_post_format( 'status' ) ) :
					$tandem_post_format_title = __( 'Vis alle statusopdateringer', 'tandem' );
					$tandem_post_format = __( 'Statusopdatering', 'tandem' );
				elseif ( has_post_format( 'video' ) ) :
					$tandem_post_format_title = __( 'Vis alle videoer', 'tandem' );
					$tandem_post_format = __( 'Video', 'tandem' );
				else :
					$tandem_post_format_title = __( 'Indl&aelig;g', 'tandem' );
					$tandem_post_format = __( 'Indl&aelig;g', 'tandem' );
				endif; ?>
				<?php if ( get_post_format() ) : ?>
					<div class="format"><?php _e( 'Type:', 'tandem' ); ?> <?php printf( '<a href="%s" title="%s">%s</a>', esc_url( get_post_format_link( get_post_format() ) ), esc_attr( $tandem_post_format_title ), $tandem_post_format ); ?></div>
				<?php else : ?>
					<div class="format"><?php _e( 'Type:', 'tandem' ); ?> <?php echo $tandem_post_format; ?></div>
				<?php endif; ?>
				<div class="comments"><a href="#comments"><?php comments_number( __( 'Ingen kommentarer', 'tandem' ), __( '1 kommentar', 'tandem' ), __( '% kommentarer', 'tandem' ) );?></a></div>
				<div class="categories"><?php _e( 'Kategorier:', 'tandem' ); ?> <?php the_category( ', ' ); ?></div>
				<div class="tags"><?php _e( 'Emner:', 'tandem' ); ?> <?php the_tags( '', ', ' ); ?></div>
				<?php edit_post_link( __( 'Rediger nyhed', 'tandem' ), '<div class="edit-link">', '</div>' ); ?>
			</div>
		<?php endif; ?>
	</section>
