<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directlys

//load settings
$insta_setting = get_post_meta( $post->ID, 'awl_itg_settings_'.$post->ID, true);

$insta_gallery_id = $post->ID;

//js
wp_enqueue_script('jquery');
wp_enqueue_script( 'itg-bootstrap-js', ITG_PLUGIN_URL  . 'assets/js/bootstrap.min.js', array( 'jquery' ), '', true  );
wp_enqueue_script( 'itg-go-to-top-js', ITG_PLUGIN_URL . 'assets/js/go-to-top.js', array( 'jquery' ), '', true  );

// CSS
wp_enqueue_style( 'itg-bootstrap-css', ITG_PLUGIN_URL . 'assets/css/admin-bootstrap.css' );
wp_enqueue_style( 'itg-metabox-css', ITG_PLUGIN_URL . 'assets/css/metabox.css' );
wp_enqueue_style('awl-toogle-button-css', ITG_PLUGIN_URL . 'assets/css/toogle-button.css');
wp_enqueue_style( 'itg-styles-css', ITG_PLUGIN_URL . 'assets/css/styles.css' );
wp_enqueue_style( 'itg-font-awesome-css', ITG_PLUGIN_URL . 'assets/css/font-awesome.css' );
wp_enqueue_style( 'itg-go-to-top-css', ITG_PLUGIN_URL . 'assets/css/go-to-top.css' );



//uploader
wp_enqueue_media();
wp_enqueue_script('thickbox');
wp_enqueue_script('em-image-upload');
wp_enqueue_style('thickbox');


 
?>
<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<style>

.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
float: left;
}
#comment-link-box, #edit-slug-box {
    display: none;
}

</style>
	<div class="row">
		<div class="col-lg-12 bhoechie-tab-container">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
				<div class="list-group">
					<a href="#" class="list-group-item active text-center">
						<span class="dashicons dashicons-editor-table"></span><br/><?php _e('Add Images', ITG_TXTDM); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<span class="dashicons dashicons-admin-users"></span><br/><?php _e('profile settings', ITG_TXTDM); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<span class="dashicons dashicons-admin-generic"></span><br/><?php _e('Config', ITG_TXTDM); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<span class="dashicons dashicons-admin-appearance"></span><br/><?php _e('Animation Effect', ITG_TXTDM); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<span class="dashicons dashicons-admin-customizer"></span><br/><?php _e('LightBox Settings', ITG_TXTDM); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<span class="dashicons dashicons-cart"></span><br/><?php _e('Upgrade To Pro', ITG_TXTDM); ?>
					</a>
				</div>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
				<div class="bhoechie-tab-content active">
					<h1><?php _e('Add Images', ITG_TXTDM); ?></h1>
					<hr>
					<div id="slider-gallery">
						<input type="button" id="remove-all-slides" name="remove-all-slides" class="button button-large remove-all-slides" rel="" value="<?php _e('Delete All Images', ITG_TXTDM); ?>">
						<ul id="remove-slides" class="sbox">
						<?php
						$allimagesetting = get_post_meta( $post->ID, 'awl_itg_settings_'.$post->ID, true);
						if(isset($allimagesetting['slide-ids'])) {
							$count = 0;
						foreach($allimagesetting['slide-ids'] as $id) {
							$thumbnail = wp_get_attachment_image_src($id, 'medium', true);
							$attachment = get_post( $id );
							//$image_link =  $allimagesetting['slide-link'][$count];
							?>
							<li class="slide">
								<img class="new-slide" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title($id); ?>" style="height: 150px; width: 98%; border-radius: 8px;">
								<input type="hidden" id="slide-ids[]" name="slide-ids[]" value="<?php echo $id; ?>" />
								<input type="text" name="slide-title[]" id="slide-title[]" style="width: 100%;" placeholder="Image Title" value="<?php echo get_the_title($id); ?>">
								<!--<input type="text" name="slide-link[]" id="slide-link[]" style="width: 100%;" placeholder="Image Link URL" value="<?php echo $image_link; ?>">-->
								<input type="button" name="remove-slide" id="remove-slide" class="button remove-single-slide button-danger" style="width: 100%;" value="Delete">
							</li>
						<?php $count++; } // end of foreach
						} //end of if
						?>
						</ul>
					</div>
				</div>
				
				<div class="bhoechie-tab-content">
					<h1><?php _e('profile settings', ITG_TXTDM); ?></h1>
					<hr>
					
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Hide & Show Profile', ITG_TXTDM); ?></h6>
							<p><?php _e('Select Hide and Show Insta Profile', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<p class="switch-field em_size_field">
								<?php if(isset($insta_setting['show_pro'])) $show_pro = $insta_setting['show_pro']; else $show_pro = 0; ?>
								<input type="radio" name="show_pro" id="show_pro1" value="1" <?php if($show_pro == 1) echo "checked=checked"; ?>>
								<label for="show_pro1"><?php _e('Yes', ITG_TXTDM); ?></label>
								<input type="radio" name="show_pro" id="show_pro2" value="0" <?php if($show_pro == 0) echo "checked=checked"; ?>>
								<label for="show_pro2"><?php _e('No', ITG_TXTDM); ?></label>
							</p>
						</div>
					</div>
					<div class="profile_show">
					
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Instagram Profile Image', ITG_TXTDM); ?></h6>
								<p><?php _e('Upload Your Instagram Profile Image', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['upload_image'])) $upload_image = $insta_setting['upload_image']; else $upload_image = ""; ?>
								<i style="display:none;" name="remove-profile-img" id="remove-profile-img" class="fa fa-times em_slide_close" onclick="profile_image_close();" value="remove_profile_image" aria-hidden="true"></i>
								<div style="" id="profile_image" class="">
									<?php if($upload_image == ""){ ?>
									<img style="width:130px; height: 130px; border:2px solid #b7b7b7;" id="image_profile_button" name="image_profile_button" src="<?php echo ITG_PLUGIN_URL ?>/assets/img/instagram-type-gallery-premium.png">
									<?php } else { ?>
									<img style="width:130px; height: 130px; border:2px solid #b7b7b7;" id="image_profile_button" name="image_profile_button" src="<?php echo $upload_image; ?>"/>						
								<?php } ?>
								</div>
								<input id="upload_image" name="upload_image" type="hidden" size="36" value="<?php echo $upload_image; ?>" />
								<input id="profile_image_button" name="profile_image_button" class="button-upload em-btn-uplode" type="button" value="Upload Image" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Profile Title', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Insta Profile Name', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['pro_title'])) $pro_title = $insta_setting['pro_title']; else $pro_title = "A WP Life"; ?>					
								<input type="text" id="pro_title" name="pro_title" value="<?php echo $pro_title; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Profile Description', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Insta Profile Bio', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['pro_dec'])) $pro_dec = $insta_setting['pro_dec']; else $pro_dec = "A WP Life - We are a company of fourteen innovative and dynamic personality professionals. We build premium WordPress products."; ?>					
								<textarea  id="pro_dec" name="pro_dec" class="form-control" value=""><?php echo $pro_dec; ?></textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Follow Button text', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Follow Button text', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['follow_btn_text'])) $follow_btn_text = $insta_setting['follow_btn_text']; else $follow_btn_text = "Follow"; ?>
								<input type="text" id="follow_btn_text" name="follow_btn_text" value="<?php echo $follow_btn_text; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Instragram Username', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Insta Username', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['insta_user'])) $insta_user = $insta_setting['insta_user']; else $insta_user = "awplife"; ?>
								<input type="text" id="insta_user" name="insta_user" value="<?php echo $insta_user; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Number Of Post', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Number Of Post', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['num_post'])) $num_post = $insta_setting['num_post']; else $num_post = 74 ; ?>
								<input type="number" id="num_post" name="num_post" value="<?php echo $num_post; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Number Of Followers', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Number Of Followers', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['num_folo'])) $num_folo = $insta_setting['num_folo']; else $num_folo = 10 ; ?>	
								<input type="number" id="num_folo" name="num_folo" value="<?php echo $num_folo; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Number Of Followings', ITG_TXTDM); ?></h6>
								<p><?php _e('Type Your Number Of Followings', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['num_of_folo'])) $num_of_folo = $insta_setting['num_of_folo']; else $num_of_folo = 50 ; ?>	
								<input type="number" id="num_of_folo" name="num_of_folo" value="<?php echo $num_of_folo; ?>"/>
							</div>
						</div>
					</div>
				</div>
				
				<div class="bhoechie-tab-content">
					<h1><?php _e('Config Settings', ITG_TXTDM); ?></h1>
					<hr>
					
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Gallery Thumbnail Size', ITG_TXTDM); ?></h6>
							<p><?php _e('Select gallery thumbnails size to display into gallery', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['gal_thumb_size'])) $gal_thumb_size = $insta_setting['gal_thumb_size']; else $gal_thumb_size = "thumbnail"; ?>
							<select id="gal_thumb_size" name="gal_thumb_size" class="selectpicker" style="width: 50%;">
								<option value="thumbnail" <?php if($gal_thumb_size == "thumbnail") echo "selected=selected"; ?>><?php _e('Thumbnail - 150  x 150', ITG_TXTDM); ?></option>
								<option value="medium" <?php if($gal_thumb_size == "medium") echo "selected=selected"; ?>><?php _e('Medium - 300 x 169', ITG_TXTDM); ?></option>
								<option value="large" <?php if($gal_thumb_size == "large") echo "selected=selected"; ?>><?php _e('Large - 840 x 473', ITG_TXTDM); ?></option>
								<option value="full" <?php if($gal_thumb_size == "full") echo "selected=selected"; ?>><?php _e('Full Size - 1280 x 720', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
					
					<!--Colums Layout Settings Start-->
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Columns Layout Settings', ITG_TXTDM); ?></h6>
							<p><?php _e('Select gallery column layout for large desktop devices', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['col_large_desktops'])) $col_large_desktops = $insta_setting['col_large_desktops']; else $col_large_desktops = "col-lg-3"; ?>
							<select id="col_large_desktops" name="col_large_desktops" style="width: 50%;">
								<option value="col-lg-12" <?php if($col_large_desktops == "col-lg-12") echo "selected=selected"; ?>><?php _e('1 Column', ITG_TXTDM); ?></option>
								<option value="col-lg-6" <?php if($col_large_desktops == "col-lg-6") echo "selected=selected"; ?>><?php _e('2 Column', ITG_TXTDM); ?></option>
								<option value="col-lg-4" <?php if($col_large_desktops == "col-lg-4") echo "selected=selected"; ?>><?php _e('3 Column', ITG_TXTDM); ?></option>
								<option value="col-lg-3" <?php if($col_large_desktops == "col-lg-3") echo "selected=selected"; ?>><?php _e('4 Column', ITG_TXTDM); ?></option>
								<option value="col-lg-2" <?php if($col_large_desktops == "col-lg-2") echo "selected=selected"; ?>><?php _e('6 Column', ITG_TXTDM); ?></option>
								<option value="col-lg-1" <?php if($col_large_desktops == "col-lg-1") echo "selected=selected"; ?>><?php _e('12 Column', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Colums On Desktops', ITG_TXTDM); ?></h6>
							<p><?php _e('Select gallery column layout for desktop devices', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['col_desktops'])) $col_desktops = $insta_setting['col_desktops']; else $col_desktops = "col-md-4"; ?>
							<select id="col_desktops" name="col_desktops" style="width: 50%;">
								<option value="col-md-12" <?php if($col_desktops == "col-md-12") echo "selected=selected"; ?>><?php _e('1 Column', ITG_TXTDM); ?></option>
								<option value="col-md-6" <?php if($col_desktops == "col-md-6") echo "selected=selected"; ?>><?php _e('2 Column', ITG_TXTDM); ?></option>
								<option value="col-md-4" <?php if($col_desktops == "col-md-4") echo "selected=selected"; ?>><?php _e('3 Column', ITG_TXTDM); ?></option>
								<option value="col-md-3" <?php if($col_desktops == "col-md-3") echo "selected=selected"; ?>><?php _e('4 Column', ITG_TXTDM); ?></option>
								<option value="col-md-2" <?php if($col_desktops == "col-md-2") echo "selected=selected"; ?>><?php _e('6 Column', ITG_TXTDM); ?></option>
								<option value="col-md-1" <?php if($col_desktops == "col-md-1") echo "selected=selected"; ?>><?php _e('12 Column', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Colums On Tablets', ITG_TXTDM); ?></h6>
							<p><?php _e('Select gallery column layout for tablet devices', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['col_tablets'])) $col_tablets = $insta_setting['col_tablets']; else $col_tablets = "col-sm-4"; ?>
							<select id="col_tablets" name="col_tablets" style="width: 50%;">
								<option value="col-sm-12" <?php if($col_tablets == "col-sm-12") echo "selected=selected"; ?>><?php _e('1 Column', ITG_TXTDM); ?></option>
								<option value="col-sm-6" <?php if($col_tablets == "col-sm-6") echo "selected=selected"; ?>><?php _e('2 Column', ITG_TXTDM); ?></option>
								<option value="col-sm-4" <?php if($col_tablets == "col-sm-4") echo "selected=selected"; ?>><?php _e('3 Column', ITG_TXTDM); ?></option>
								<option value="col-sm-3" <?php if($col_tablets == "col-sm-3") echo "selected=selected"; ?>><?php _e('4 Column', ITG_TXTDM); ?></option>
								<option value="col-sm-2" <?php if($col_tablets == "col-sm-2") echo "selected=selected"; ?>><?php _e('6 Column', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Colums On Phones', ITG_TXTDM); ?></h6>
							<p><?php _e('Select gallery column layout for phone devices', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['col_phones'])) $col_phones = $insta_setting['col_phones']; else $col_phones = "col-xs-6"; ?>
							<select id="col_phones" name="col_phones" style="width: 50%;">
								<option value="col-xs-12" <?php if($col_phones == "col-xs-12") echo "selected=selected"; ?>><?php _e('1 Column', ITG_TXTDM); ?></option>
								<option value="col-xs-6" <?php if($col_phones == "col-xs-6") echo "selected=selected"; ?>><?php _e('2 Column', ITG_TXTDM); ?></option>
								<option value="col-xs-4" <?php if($col_phones == "col-xs-4") echo "selected=selected"; ?>><?php _e('3 Column', ITG_TXTDM); ?></option>
								<option value="col-xs-3" <?php if($col_phones == "col-xs-3") echo "selected=selected"; ?>><?php _e('4 Column', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
					<!--Colums Layout Settings End-->
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Hide Thumbnails Spacing', ITG_TXTDM); ?></h6>
							<p><?php _e('Hide gap / margin / padding / spacing between gallery thumbnails', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<p class=" switch-field em_size_field">
								<?php if(isset($insta_setting['no_spacing'])) $no_spacing = $insta_setting['no_spacing']; else $no_spacing = 0; ?>
								<input type="radio" name="no_spacing" id="no_spacing1" value="1" <?php if($no_spacing == 1) echo "checked=checked"; ?>>
								<label for="no_spacing1"><?php _e('Yes', ITG_TXTDM); ?></label>
								<input type="radio" name="no_spacing" id="no_spacing2" value="0" <?php if($no_spacing == 0) echo "checked=checked"; ?>>
								<label for="no_spacing2"><?php _e('No', ITG_TXTDM); ?></label>
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Gallery Thumbnail Order', ITG_TXTDM); ?></h6>
							<p><?php _e('Set a image order in which you want to display gallery thumbnails', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<p class="switch-field em_size_field">	
								<?php if(isset($insta_setting['thumbnail_order'])) $thumbnail_order = $insta_setting['thumbnail_order']; else $thumbnail_order = "ASC"; ?>
								<input type="radio" name="thumbnail_order" id="thumbnail_order1" value="ASC" <?php if($thumbnail_order == "ASC") echo "checked=checked"; ?>>
								<label for="thumbnail_order1"><?php _e('Old First', ITG_TXTDM); ?></label>
								<input type="radio" name="thumbnail_order" id="thumbnail_order2" value="DESC" <?php if($thumbnail_order == "DESC") echo "checked=checked"; ?>>
								<label for="thumbnail_order2"><?php _e('New First', ITG_TXTDM); ?></label>
								<input type="radio" name="thumbnail_order" id="thumbnail_order3" value="RANDOM" <?php if($thumbnail_order == "RANDOM") echo "checked=checked"; ?>>
								<label for="thumbnail_order3"><?php _e('Random', ITG_TXTDM); ?></label>
							</p>
						</div>
					</div>
				</div>
				
				<div class="bhoechie-tab-content">
					<h1><?php _e('Animation & Hover Effects', ITG_TXTDM); ?></h1>
					<hr>
					
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Image Hover Effect Type', ITG_TXTDM); ?></h6>
							<p><?php _e('Select and Set a image hover effect type for Gallery', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['image_hover_effect_type'])) $image_hover_effect_type = $insta_setting['image_hover_effect_type']; else $image_hover_effect_type = "sg"; ?>
							<p class="switch-field em_size_field">
								<input type="radio" name="image_hover_effect_type" id="image_hover_effect_type1" value="no" <?php if($image_hover_effect_type == "no") echo "checked=checked"; ?>>
								<label for="image_hover_effect_type1"><?php _e('None', ITG_TXTDM); ?></label>
								<input type="radio" name="image_hover_effect_type" id="image_hover_effect_type2" value="sg" <?php if($image_hover_effect_type == "sg") echo "checked=checked"; ?>>
								<label for="image_hover_effect_type2"><?php _e('2D Transitions', ITG_TXTDM); ?></label>
							</p>
						</div>
					</div>
					<div class="he_four">
						<div class="col-md-4">
							<div class="ma_field_discription">
								<h6><?php _e('Image Hover Effects', ITG_TXTDM); ?></h6>
								<p><?php _e('Select and Set a image hover effect type for Gallery', ITG_TXTDM); ?></p> 
							</div>
						</div>
						<div class="col-md-8">
							<div class="ma_field p-4">
								<?php if(isset($insta_setting['image_hover_effect_four'])) $image_hover_effect_four = $insta_setting['image_hover_effect_four']; else $image_hover_effect_four = "hvr-box-shadow-outset"; ?>
								<select name="image_hover_effect_four" id="image_hover_effect_four" style="width: 50%;">
									<optgroup label="<?php _e('Shadow and Glow Transitions Effects', ITG_TXTDM); ?>" class="sg">
										<option value="hvr-grow-shadow" <?php if($image_hover_effect_four == "hvr-grow-shadow") echo "selected=selected"; ?>><?php _e('Grow Shadow', ITG_TXTDM); ?></option>
										<option value="hvr-float-shadow" <?php if($image_hover_effect_four == "hvr-float-shadow") echo "selected=selected"; ?>><?php _e('Float Shadow', ITG_TXTDM); ?></option>
										<option value="hvr-glow" <?php if($image_hover_effect_four == "hvr-glow") echo "selected=selected"; ?>><?php _e('Glow', ITG_TXTDM); ?></option>
										<option value="hvr-box-shadow-outset" <?php if($image_hover_effect_four == "hvr-box-shadow-outset") echo "selected=selected"; ?>><?php _e('Box Shadow Outset', ITG_TXTDM); ?></option>
										<option value="hvr-box-shadow-inset" <?php if($image_hover_effect_four == "hvr-box-shadow-inset") echo "selected=selected"; ?>><?php _e('Box Shadow Inset', ITG_TXTDM); ?></option>
									</optgroup>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Animation Eeffect', ITG_TXTDM); ?></h6>
							<p><?php _e('Select Animation Eeffect', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['animation_effect'])) $animation_effect = $insta_setting['animation_effect']; else $animation_effect = "none" ; ?>
							<select id="animation_effect" name="animation_effect" style="width: 50%;">
								<optgroup label="animation effects" class="">
								  <option value="0" <?php if($animation_effect == 0) echo "selected=selected"; ?>><?php _e('None', ITG_TXTDM); ?></option>
								  <option value="bounce"<?php if($animation_effect == "bounce") echo "selected=selected"; ?>><?php _e('bounce', ITG_TXTDM); ?></option>
								  <option value="pulse"<?php if($animation_effect == "pulse") echo "selected=selected"; ?>><?php _e('pulse', ITG_TXTDM); ?></option>
								  <option value="rubberBand"<?php if($animation_effect == "rubberBand") echo "selected=selected"; ?>><?php _e('rubberBand', ITG_TXTDM); ?></option> 
								  <option value="wobble"<?php if($animation_effect == "wobble") echo "selected=selected"; ?>><?php _e('wobble', ITG_TXTDM); ?></option>
								  <option value="rotateIn"<?php if($animation_effect == "rotateIn") echo "selected=selected"; ?>><?php _e('rotateIn', ITG_TXTDM); ?></option>
								  
								</optgroup>
							</select>
						</div>
					</div>
				</div>
				<div class="bhoechie-tab-content">
					<h1><?php _e('Light Box Style', ITG_TXTDM); ?></h1>
					<hr>
					
					<div class="col-md-4">
						<div class="ma_field_discription">
							<h6><?php _e('Light Box Style', ITG_TXTDM); ?></h6>
							<p><?php _e('Select a light box style', ITG_TXTDM); ?></p> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="ma_field p-4">
							<?php if(isset($insta_setting['light_box'])) $light_box = $insta_setting['light_box']; else $light_box = 1; ?>
							<select name="light_box" id="light_box" style="width: 50%;">
								<option value="0" <?php if($light_box == 0) echo "selected=selected"; ?>><?php _e('None', ITG_TXTDM); ?></option>
								<option value="6" <?php if($light_box == 6) echo "selected=selected"; ?>><?php _e('Bootstrap 3 Light Box', ITG_TXTDM); ?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="bhoechie-tab-content">
						<h1><?php _e('Upgrade To Pro', ITG_TXTDM); ?></h1>
						<hr>
						<!--Grid-->
						<div class="" style="padding-left: 10px;">
							<p class="ms-title">Upgrade To Premium For Unloack More Features & Settings</p>
						</div>

						<div class="">
							<h1><strong>Offer:</strong> Upgrade To Premium Just In Half Price <strike>$14</strike> <strong>$7</strong></h1>
							<br>
							<a href="https://awplife.com/wordpress-plugins/instagram-type-gallery-wordpress-plugin/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Premium Version Details</a>
							<a href="https://awplife.com/demo/instagram-type-gallery-premium/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Check Live Demo</a>
							<a href="https://awplife.com/demo/instagram-type-gallery-premium-admin-demo/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Try Pro Version</a>
						</div>

					</div>
			</div>
		</div>
	</div>
<input type="hidden" name="itg-settings" id="itg-settings" value="itg-save-settings">
<script>
//upload_image_button start	
jQuery(document).ready( function( jQuery ) {
    jQuery('#profile_image_button').click(function() {
        formfield = jQuery('#image_profile_button').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
      //  return false;
   
	 window.send_to_editor = function(html) {
        imgurl = jQuery(html).attr('src');
			if(!(imgurl)) {
				imgurl = jQuery('img', html).attr('src');
			}
			if(imgurl) {
				jQuery("#remove-profile-img").show();
				jQuery("#profile_image").show();
				jQuery("#profile_image_button").hide();
			}
			jQuery('#upload_image').val(imgurl);
			jQuery('#image_profile_button').show();
			jQuery("#image_profile_button").attr("src", imgurl);
			tb_remove();
		}	
   });
	jQuery( "#remove-profile-img" ).click(function() {
			jQuery( "#upload_image" ).removeAttr('value');
			jQuery( "#image_profile_button" ).hide();
			jQuery('#image_profile_button').attr('src', '');
			jQuery("#upload_image").show();
			jQuery( "#remove-single-img" ).hide();
	});
});	

	jQuery(document).ready(function() {
		<?php if($upload_image){ ?>
			jQuery("#profile_image").show();
			jQuery("#profile_image_button").hide();
			jQuery("#remove-profile-img").show();
		<?php } ?>
	}); 

	//close status
	function profile_image_close(){
		jQuery("#remove-profile-img").hide();
		jQuery("#profile_image").hide();
		jQuery("#profile_image_button").show();
	}

  
 
 //image uploder
var effect_type = jQuery('input[name="image_hover_effect_type"]:checked').val();
//alert(effect_type);
if(effect_type == "no") {
	jQuery('.he_one').hide();
	jQuery('.he_four').hide();
}
if(effect_type == "2d") {
	jQuery('.he_one').show();
	jQuery('.he_four').hide();
}
if(effect_type == "sg") {
	jQuery('.he_one').hide();
	jQuery('.he_four').show();
}

//on change effect
jQuery(document).ready(function() {
	jQuery('input[name="image_hover_effect_type"]').change(function(){
		var effect_type = jQuery('input[name="image_hover_effect_type"]:checked').val();
		if(effect_type == "no") {
			jQuery('.he_one').hide();
			jQuery('.he_four').hide();
		}
		if(effect_type == "2d") {
			jQuery('.he_one').show();
			jQuery('.he_four').hide();		
		}
		if(effect_type == "sg") {
			jQuery('.he_one').hide();
			jQuery('.he_four').show();
		}	
	});
});

//show/hide profile
var effect_type1 = jQuery('input[name="show_pro"]:checked').val();
//alert(effect_type1);
if(effect_type1 == "0") {
	jQuery('.profile_show').hide();
}
if(effect_type1 == "1") {
	jQuery('.profile_show').show();
}


//on change effect
jQuery(document).ready(function() {
	jQuery('input[name="show_pro"]').change(function(){
		var effect_type1 = jQuery('input[name="show_pro"]:checked').val();
		if(effect_type1 == "0") {
			jQuery('.profile_show').hide();
		}
		if(effect_type1 == "1") {
			jQuery('.profile_show').show();
		}
	});
});


//dropdown toggle on change effect
jQuery(document).ready(function() {
	//accordion icon
	jQuery(function() {
		function toggleSign(e) {
			jQuery(e.target)
			.prev('.panel-heading')
			.find('i')
			.toggleClass('fa fa-chevron-down fa fa-chevron-up');
		}
		jQuery('#accordion').on('hidden.bs.collapse', toggleSign);
		jQuery('#accordion').on('shown.bs.collapse', toggleSign);

		});
	});	
	// tab
	jQuery("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		jQuery(this).siblings('a.active').removeClass("active");
		jQuery(this).addClass("active");
		var index = jQuery(this).index();
		jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	});
	
// title size range settings.  on change range value
function updateRange(val, id) {
	jQuery("#" + id).val(val);
	jQuery("#" + id + "_value").val(val);	  
}
</script>