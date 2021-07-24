<?php
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	echo '<div id="cbxinstaphotoswrap' . $post_id . '" class="cbxinstaphotoswrap cbxinstaphotoswrap-' . $layout . '">';
	if ( isset( $result['errors'] ) && sizeof( $result['errors'] ) > 0 ) {
		echo '<div class="cbxinstaphotos-errors">';
		echo '<p>' . esc_html__( 'CBX Insta Photos: Possible list of errors', 'cbxinstaphotos' ) . '</p>';
		echo '<ul>';
		foreach ( $result['errors'] as $err ) {
			echo '<li>' . $err . '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}

	if ( isset( $result['items'] ) && sizeof( $result['items'] ) > 0 ) {
		$items = $result['items'];

		foreach ( $items as $item ) {


			$title = '';
			if ( $show_like || $show_com ) {

				if ( $show_like ) {
					$title .= sprintf( esc_html__( 'Likes: %d', 'cbxinstaphotos' ), intval( $item->like ) );
				}

				if ( $show_com ) {
					if ( $title != '' ) {
						$title .= ' &nbsp;&nbsp; ';
					}
					$title .= sprintf( esc_html__( 'Comments: %d', 'cbxinstaphotos' ), intval( $item->comment ) );
				}
			}

			if ( isset( $item->desc ) && $item->desc != '' ) {
				$title .= ' - ' . $item->desc;
			}

			$pop_url = ( $item->type == 'image' ) ? $item->standard_resolution : $item->video_url;

			?>
			<div class="cbxinstaphotos-default">
				<a data-type="<?php echo esc_attr( $item->type ); ?>" class="inta-single" data-mtitle="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" href="<?php echo esc_url( $pop_url ); ?>" target="_blank">
					<figure>
						<img src="<?php echo esc_url( $item->thumb ); ?>" alt="instagram">
						<?php if ( $show_like || $show_com ): ?>
							<figcaption>
								<div class="cbxinsta-cbx-hover-link">
									<div class="cbxinsta-cbx-vertical">
										<?php if ( $show_like ): ?>
											<p class="cbxinsta-action"><i class="cbxinsta-heart"
																		  aria-hidden="true"></i> <?php echo intval( $item->like ); ?>
											</p>
										<?php endif; ?>
										<?php if ( $show_com ): ?>
											<p class="cbxinsta-action"><i class="cbxinsta-comment"
																		  aria-hidden="true"></i> <?php echo intval( $item->comment ); ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							</figcaption>
						<?php endif; ?>
					</figure>
				</a>
			</div>

		<?php } ?>
		<div class="cbxinstaclear"></div>
	<?php } ?>


<?php if ( $follow == 1 ) { ?>
	<p class="cbinstafollowus">
		<a target="_blank" href="http://instagram.com/<?php echo $client_username; ?>/">
			<img alt="<?php esc_attr_e( 'Follow Me on Instagram', 'cbxinstaphotos' ) ?>"
				 title="<?php esc_attr_e( 'Follow Me on Instagram', 'cbxinstaphotos' ) ?>"
				 src="<?php echo esc_url( CBXINSTAPHOTOS_ROOT_URL . 'assets/images/instafollow.png' ); ?>" /> </a>
	</p>
<?php }


	echo '</div>';