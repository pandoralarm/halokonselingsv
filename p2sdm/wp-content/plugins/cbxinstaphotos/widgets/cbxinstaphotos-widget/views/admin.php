<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}
?>

<!-- Widget Tittle -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php esc_html_e( 'Title:', 'cbxinstaphotos' ); ?>
	</label>

	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
		   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<?php


?>
<!-- Widget Insta Post ID-->
<p>
	<label for="<?php echo $this->get_field_id( 'id' ); ?>"> <?php esc_html_e( 'Select Instagram Post', 'cbxinstaphotos' ); ?>
		<select class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>"
				name="<?php echo $this->get_field_name( 'id' ); ?>">
			<?php foreach ( $active_insta as $key => $value ) { ?>
				<option value="<?php echo $key; ?>" <?php echo ( $id == $key ) ? 'selected="selected"' : ''; ?>><?php echo $value; ?></option>
			<?php } ?>
		</select> </label>

</p>

<!-- Widget Insta Post ID-->
<p>
	<label for="<?php echo $this->get_field_id( 'layout' ); ?>"> <?php esc_html_e( 'Layout', 'cbxinstaphotos' ); ?>
		<select class="widefat" id="<?php echo $this->get_field_id( 'layout' ); ?>"
				name="<?php echo $this->get_field_name( 'layout' ); ?>">
			<?php foreach ( $layouts as $key => $value ) { ?>
				<option value="<?php echo $key; ?>" <?php echo ( $layout == $key ) ? 'selected="selected"' : ''; ?>><?php echo $value['title']; ?></option>
			<?php } ?>
		</select> </label>
</p>

<!-- Photo Count -->
<p>
	<label for="<?php echo $this->get_field_id( 'count' ); ?>">
		<?php esc_html_e( 'Photo count', 'cbxinstaphotos' ); ?>
	</label>

	<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>"
		   name="<?php echo $this->get_field_name( 'count' ); ?>" type="number"
		   value="<?php echo intval( $count ); ?>" />
</p>

<!-- Follow Button -->
<p>
	<label for="<?php echo $this->get_field_id( 'follow' ); ?>">
		<?php esc_html_e( 'Show Follow Button', 'cbxinstaphotos' ); ?>
	</label>

	<input class="widefat" name="<?php echo $this->get_field_name( 'follow' ); ?>" type="radio"
		   value="1" <?php echo ( $follow == 1 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'Yes:', 'cbxinstaphotos' ); ?>
	<input class="widefat" name="<?php echo $this->get_field_name( 'follow' ); ?>" type="radio"
		   value="0" <?php echo ( $follow == 0 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'No:', 'cbxinstaphotos' ); ?>
</p>


<!-- Show Like -->
<p>
	<label for="<?php echo $this->get_field_id( 'show_like' ); ?>">
		<?php esc_html_e( 'Show Like', 'cbxinstaphotos' ); ?>
	</label>

	<input class="widefat" name="<?php echo $this->get_field_name( 'show_like' ); ?>" type="radio"
		   value="1" <?php echo ( $show_like == 1 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'Yes:', 'cbxinstaphotos' ); ?>
	<input class="widefat" name="<?php echo $this->get_field_name( 'show_like' ); ?>" type="radio"
		   value="0" <?php echo ( $show_like == 0 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'No:', 'cbxinstaphotos' ); ?>
</p>

<!-- Show Comments -->
<p>
	<label for="<?php echo $this->get_field_id( 'show_com' ); ?>">
		<?php esc_html_e( 'Show Comments', 'cbxinstaphotos' ); ?>
	</label>

	<input class="widefat" name="<?php echo $this->get_field_name( 'show_com' ); ?>" type="radio"
		   value="1" <?php echo ( $show_com == 1 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'Yes:', 'cbxinstaphotos' ); ?>
	<input class="widefat" name="<?php echo $this->get_field_name( 'show_com' ); ?>" type="radio"
		   value="0" <?php echo ( $show_com == 0 ) ? 'checked="checked"' : ''; ?>/><?php esc_html_e( 'No:', 'cbxinstaphotos' ); ?>
</p>
