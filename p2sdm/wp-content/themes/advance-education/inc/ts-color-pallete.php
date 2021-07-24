<?php
	
	$advance_education_theme_color = get_theme_mod('advance_education_theme_color');

	$advance_education_custom_css = '';

	$advance_education_custom_css .=' input[type="submit"], .read-moresec a:hover, .top-header .account-btn a:hover, .time, #slider i, #slider .inner_carousel .readbtn a, .read-more-btn a,  #footer input[type="submit"], .copyright, #footer .tagcloud a:hover,.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover,#footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, #sidebar ul li:hover:before, #menu-sidebar input[type="submit"], #footer .woocommerce a.button:hover, #footer .woocommerce button.button:hover, .tags p a:hover, .meta-nav:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{';
		$advance_education_custom_css .='background-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='a,h1,h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .logo a, .top-header .account-btn a, .mail i,.phone i, .search-box i, #slider .inner_carousel .readbtn a:hover, #courses h3 i, .cat-posts a, .page-box h4, .read-more-btn a:hover, .page-box .metabox,.page-box-single .metabox, section h4, #comments a time, .woocommerce-message::before, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, h1.entry-title,h1.page-title, .pagination span,.pagination a, .pagination .current, #sidebar h3.widget-title a,.metabox a, .new-text a, #footer li a:hover, p.logged-in-as a, single.page-box-single h3 a, .entry-content p a, div#div-comment-1 a, .nav-next a, #courses h2 i, .comment-meta a, h2.entry-title, h2.page-title, nav-links span,.page-template-custom-front-page .search-box i, tr.woocommerce-cart-form__cart-item.cart_item a, span.tagged_as a, a.shipping-calculator-button, #sidebar ul li a:hover,#sidebar ul li:hover, #sidebar ul li:active, #sidebar ul li:focus, #sidebar ul li:hover a,#contact-info .account-btn a, .page-box-single h1, .tags i, .tags p a, .meta-nav, #sidebar .textwidget a, .entry-content a{';
		$advance_education_custom_css .='color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.main-menu{';
		$advance_education_custom_css .='border-bottom-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.woocommerce-message{';
		$advance_education_custom_css .='border-top-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.cat_body, h3.title-btn{';
		$advance_education_custom_css .='border-right-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.top-header .account-btn a, .serach_inner form.search-form, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover, .cat-posts a, .read-more-btn a, .read-more-btn a:hover, #footer input[type="search"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, .pagination a:hover, .pagination .current,#footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button,#contact-info .account-btn a, .tags p a{';
		$advance_education_custom_css .='border-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.primary-navigation ul ul li:first-child{';
		$advance_education_custom_css .='border-top-color: '.esc_attr($advance_education_theme_color).';';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
		$advance_education_custom_css .='background-color: '.esc_attr($advance_education_theme_color).'!important;';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='.logo p,page-box-single h1, #sidebar ul li a:active, #sidebar ul li a:focus, .read-more-btn a:hover{';
		$advance_education_custom_css .='color: '.esc_attr($advance_education_theme_color).'!important;';
	$advance_education_custom_css .='}';

	$advance_education_custom_css .='#sidebar aside{
		box-shadow: -12px 12px 0 0 '.esc_attr($advance_education_theme_color).';
	}';

	$advance_education_custom_css .='#sidebar aside{
		box-shadow: 0 3px 3px '.esc_attr($advance_education_theme_color).';
	}';

	// media
	$advance_education_custom_css .='@media screen and (max-width:1000px) {';
	if($advance_education_theme_color){
	$advance_education_custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul, .primary-navigation ul ul a:focus, .primary-navigation li a:focus{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_attr($advance_education_theme_color).' 120%);
		}';
	}
	$advance_education_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_theme_options','Default');
    if($advance_education_theme_lay == 'Default'){
		$advance_education_custom_css .='body{';
			$advance_education_custom_css .='max-width: 100%;';
		$advance_education_custom_css .='}';
		$advance_education_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_education_custom_css .='width: 97.3%';
		$advance_education_custom_css .='}';
	}else if($advance_education_theme_lay == 'Container'){
		$advance_education_custom_css .='body{';
			$advance_education_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_education_custom_css .='}';
		$advance_education_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_education_custom_css .='width: 97.7%';
		$advance_education_custom_css .='}';
		$advance_education_custom_css .='.serach_outer{';
			$advance_education_custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$advance_education_custom_css .='}';
	}else if($advance_education_theme_lay == 'Box Container'){
		$advance_education_custom_css .='body{';
			$advance_education_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_education_custom_css .='}';
		$advance_education_custom_css .='.serach_outer{';
			$advance_education_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$advance_education_custom_css .='}';
		$advance_education_custom_css .='.page-template-custom-front-page .top-header{';
			$advance_education_custom_css .='margin: 0 10px;';
		$advance_education_custom_css .='}';
	}

	// css
	$advance_education_show_slider = get_theme_mod( 'advance_education_slider_hide', false);
	if($advance_education_show_slider == false){
		$advance_education_custom_css .='.page-template-custom-front-page #header-top{';
			$advance_education_custom_css .='position:static; margin:0; width: 100%; background: #f5f5f5;';
		$advance_education_custom_css .='}';
	} 
	if($advance_education_show_slider == false){
		$advance_education_custom_css .='.page-template-custom-front-page .top-header{';
			$advance_education_custom_css .='background: #f5f5f5;';
		$advance_education_custom_css .='}';
	}
	if($advance_education_show_slider == false){
		$advance_education_custom_css .='.page-template-custom-front-page .logo{';
			$advance_education_custom_css .='position: static; box-shadow: none;';
		$advance_education_custom_css .='}';
	}
	if($advance_education_show_slider == false){
		$advance_education_custom_css .='.page-template-custom-front-page .main-menu{';
			$advance_education_custom_css .='border-bottom: 1px solid #cc3333; box-shadow: 0px 2px 10px -2px #bbb;';
		$advance_education_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_slider_content_alignment','Left');
    if($advance_education_theme_lay == 'Left'){
		$advance_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_education_custom_css .='text-align:left; left:15%; right:45%;';
		$advance_education_custom_css .='}';
	}else if($advance_education_theme_lay == 'Center'){
		$advance_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_education_custom_css .='text-align:center !important; left:20%; right:20%;';
		$advance_education_custom_css .='}';
	}else if($advance_education_theme_lay == 'Right'){
		$advance_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_education_custom_css .='text-align:right !important; left:45%; right:15%;';
		$advance_education_custom_css .='}';
	}

	/*---------- Slider Opacity -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_slider_image_opacity','0.5');
	if($advance_education_theme_lay == '0'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.1'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.1';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.2'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.2';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.3'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.3';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.4'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.4';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.5'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.5';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.6'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.6';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.7'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.7';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.8'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.8';
		$advance_education_custom_css .='}';
		}else if($advance_education_theme_lay == '0.9'){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:0.9';
		$advance_education_custom_css .='}';
		}

	/*------------------------------ Button Settings option-----------------------*/
	$advance_education_button_padding_top_bottom = get_theme_mod('advance_education_button_padding_top_bottom');
	$advance_education_button_padding_left_right = get_theme_mod('advance_education_button_padding_left_right');
	$advance_education_custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"], .cat-posts a{';
		$advance_education_custom_css .='padding-top: '.esc_attr($advance_education_button_padding_top_bottom).'px !important; padding-bottom: '.esc_attr($advance_education_button_padding_top_bottom).'px !important; padding-left: '.esc_attr($advance_education_button_padding_left_right).'px !important; padding-right: '.esc_attr($advance_education_button_padding_left_right).'px !important; display:inline-block;';
	$advance_education_custom_css .='}';

	$advance_education_button_border_radius = get_theme_mod('advance_education_button_border_radius');
	$advance_education_custom_css .='.new-text .read-more-btn a,#slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"], .cat-posts a{';
		$advance_education_custom_css .='border-radius: '.esc_attr($advance_education_button_border_radius).'px;';
	$advance_education_custom_css .='}';

	/*--------------Responsive Setting --------------------*/
	$advance_education_stickyheader = get_theme_mod( 'advance_education_responsive_sticky_header', false);
	if($advance_education_stickyheader == false && get_theme_mod( 'advance_education_sticky_header', false) == true){
    	$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='.header-fixed{';
			$advance_education_custom_css .='position:static;';
		$advance_education_custom_css .='} }';
	}

	$advance_education_slider = get_theme_mod( 'advance_education_responsive_slider',false);
	if($advance_education_slider == true && get_theme_mod( 'advance_education_slider_hide', false) == false){
    	$advance_education_custom_css .='#slider{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} ';
	}
    if($advance_education_slider == true){
    	$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#slider{';
			$advance_education_custom_css .='display:block;';
		$advance_education_custom_css .='} }';
	}else if($advance_education_slider == false){
		$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#slider{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} }';
	}

	$advance_education_slider = get_theme_mod( 'advance_education_responsive_scroll', true);
	if($advance_education_slider == true && get_theme_mod( 'advance_education_enable_disable_scroll', true) == false){
    	$advance_education_custom_css .='#scroll-top{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} ';
	}
    if($advance_education_slider == true){
    	$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#scroll-top{';
			$advance_education_custom_css .='visibility: visible !important;';
		$advance_education_custom_css .='} }';
	}else if($advance_education_slider == false){
		$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#scroll-top{';
			$advance_education_custom_css .='visibility: hidden !important;';
		$advance_education_custom_css .='} }';
	}

	$advance_education_sidebar = get_theme_mod( 'advance_education_responsive_sidebar',true);
    if($advance_education_sidebar == true){
    	$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#sidebar{';
			$advance_education_custom_css .='display:block;';
		$advance_education_custom_css .='} }';
	}else if($advance_education_sidebar == false){
		$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#sidebar{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} }';
	}

	$advance_education_loader = get_theme_mod( 'advance_education_responsive_preloader', true);
	if($advance_education_loader == true && get_theme_mod( 'advance_education_preloader_option', true) == false){
    	$advance_education_custom_css .='#loader-wrapper{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} ';
	}
    if($advance_education_loader == true){
    	$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#loader-wrapper{';
			$advance_education_custom_css .='display:block;';
		$advance_education_custom_css .='} }';
	}else if($advance_education_loader == false){
		$advance_education_custom_css .='@media screen and (max-width:575px) {';
		$advance_education_custom_css .='#loader-wrapper{';
			$advance_education_custom_css .='display:none;';
		$advance_education_custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_background_skin_mode','Transpert Background');
    if($advance_education_theme_lay == 'With Background'){
		$advance_education_custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin, .noresult-content{';
			$advance_education_custom_css .='background-color: #fff; padding:10px;';
		$advance_education_custom_css .='}';
	}else if($advance_education_theme_lay == 'Transpert Background'){
		$advance_education_custom_css .='.page-box-single, #sidebar aside{';
			$advance_education_custom_css .='background-color: transparent;';
		$advance_education_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_education_top_bottom_product_button_padding = get_theme_mod('advance_education_top_bottom_product_button_padding', 10);
	$advance_education_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_education_custom_css .='padding-top: '.esc_attr($advance_education_top_bottom_product_button_padding).'px; padding-bottom: '.esc_attr($advance_education_top_bottom_product_button_padding).'px;';
	$advance_education_custom_css .='}';

	$advance_education_left_right_product_button_padding = get_theme_mod('advance_education_left_right_product_button_padding', 16);
	$advance_education_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_education_custom_css .='padding-left: '.esc_attr($advance_education_left_right_product_button_padding).'px; padding-right: '.esc_attr($advance_education_left_right_product_button_padding).'px;';
	$advance_education_custom_css .='}';

	$advance_education_product_button_border_radius = get_theme_mod('advance_education_product_button_border_radius', 0);
	$advance_education_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_education_custom_css .='border-radius: '.esc_attr($advance_education_product_button_border_radius).'px;';
	$advance_education_custom_css .='}';

	$advance_education_show_related_products = get_theme_mod('advance_education_show_related_products',true);
	if($advance_education_show_related_products == false){
		$advance_education_custom_css .='.related.products{';
			$advance_education_custom_css .='display: none;';
		$advance_education_custom_css .='}';
	}

	$advance_education_show_wooproducts_border = get_theme_mod('advance_education_show_wooproducts_border', false);
	if($advance_education_show_wooproducts_border == true){
		$advance_education_custom_css .='.products li{';
			$advance_education_custom_css .='border: 1px solid #d4d2d2;';
		$advance_education_custom_css .='}';
	}

	$advance_education_top_bottom_wooproducts_padding = get_theme_mod('advance_education_top_bottom_wooproducts_padding',0);
	$advance_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_education_custom_css .='padding-top: '.esc_attr($advance_education_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_attr($advance_education_top_bottom_wooproducts_padding).'px !important;';
	$advance_education_custom_css .='}';

	$advance_education_left_right_wooproducts_padding = get_theme_mod('advance_education_left_right_wooproducts_padding',0);
	$advance_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_education_custom_css .='padding-left: '.esc_attr($advance_education_left_right_wooproducts_padding).'px !important; padding-right: '.esc_attr($advance_education_left_right_wooproducts_padding).'px !important;';
	$advance_education_custom_css .='}';

	$advance_education_wooproducts_border_radius = get_theme_mod('advance_education_wooproducts_border_radius',0);
	$advance_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_education_custom_css .='border-radius: '.esc_attr($advance_education_wooproducts_border_radius).'px;';
	$advance_education_custom_css .='}';

	$advance_education_wooproducts_box_shadow = get_theme_mod('advance_education_wooproducts_box_shadow',0);
	$advance_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_education_custom_css .='box-shadow: '.esc_attr($advance_education_wooproducts_box_shadow).'px '.esc_attr($advance_education_wooproducts_box_shadow).'px '.esc_attr($advance_education_wooproducts_box_shadow).'px #eee;';
	$advance_education_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$advance_education_copyright_content_align = get_theme_mod('advance_education_copyright_content_align');
	if($advance_education_copyright_content_align != false){
		$advance_education_custom_css .='.copyright{';
			$advance_education_custom_css .='text-align: '.esc_attr($advance_education_copyright_content_align).';';
		$advance_education_custom_css .='}';
	}

	$advance_education_footer_content_font_size = get_theme_mod('advance_education_footer_content_font_size', 16);
	$advance_education_custom_css .='.copyright p{';
		$advance_education_custom_css .='font-size: '.esc_attr($advance_education_footer_content_font_size).'px !important;';
	$advance_education_custom_css .='}';

	$advance_education_copyright_padding = get_theme_mod('advance_education_copyright_padding', 15);
	$advance_education_custom_css .='.copyright{';
		$advance_education_custom_css .='padding-top: '.esc_attr($advance_education_copyright_padding).'px !important; padding-bottom: '.esc_attr($advance_education_copyright_padding).'px !important;';
	$advance_education_custom_css .='}';

	$advance_education_footer_widget_bg_color = get_theme_mod('advance_education_footer_widget_bg_color');
	$advance_education_custom_css .='#footer{';
		$advance_education_custom_css .='background-color: '.esc_attr($advance_education_footer_widget_bg_color).';';
	$advance_education_custom_css .='}';

	$advance_education_footer_widget_bg_image = get_theme_mod('advance_education_footer_widget_bg_image');
	if($advance_education_footer_widget_bg_image != false){
		$advance_education_custom_css .='#footer{';
			$advance_education_custom_css .='background: url('.esc_attr($advance_education_footer_widget_bg_image).');';
		$advance_education_custom_css .='}';
	}

	// scroll to top
	$advance_education_scroll_font_size_icon = get_theme_mod('advance_education_scroll_font_size_icon', 22);
	$advance_education_custom_css .='#scroll-top .fas{';
		$advance_education_custom_css .='font-size: '.esc_attr($advance_education_scroll_font_size_icon).'px;';
	$advance_education_custom_css .='}';

	// Slider Height 
	$advance_education_slider_image_height = get_theme_mod('advance_education_slider_image_height');
	$advance_education_custom_css .='#slider img{';
		$advance_education_custom_css .='height: '.esc_attr($advance_education_slider_image_height).'px;';
	$advance_education_custom_css .='}';

	// Display Blog Post 
	$advance_education_display_blog_page_post = get_theme_mod( 'advance_education_display_blog_page_post','In Box');
    if($advance_education_display_blog_page_post == 'Without Box'){
		$advance_education_custom_css .='.page-box{';
			$advance_education_custom_css .='background-color: transparent;';
		$advance_education_custom_css .='}';
	}

	// slider overlay
	$advance_education_slider_overlay = get_theme_mod('advance_education_slider_overlay', true);
	if($advance_education_slider_overlay == false){
		$advance_education_custom_css .='#slider img{';
			$advance_education_custom_css .='opacity:1;';
		$advance_education_custom_css .='}';
	} 
	$advance_education_slider_image_overlay_color = get_theme_mod('advance_education_slider_image_overlay_color', true);
	if($advance_education_slider_overlay != false){
		$advance_education_custom_css .='#slider{';
			$advance_education_custom_css .='background-color: '.esc_attr($advance_education_slider_image_overlay_color).';';
		$advance_education_custom_css .='}';
	}

	// site title and tagline font size option
	$advance_education_site_title_size_option = get_theme_mod('advance_education_site_title_size_option', 35);{
	$advance_education_custom_css .='.logo h1, .logo p.site-title a{';
	$advance_education_custom_css .='font-size: '.esc_attr($advance_education_site_title_size_option).'px;';
		$advance_education_custom_css .='}';
	}

	$advance_education_site_tagline_size_option = get_theme_mod('advance_education_site_tagline_size_option', 12);{
	$advance_education_custom_css .='.logo p{';
	$advance_education_custom_css .='font-size: '.esc_attr($advance_education_site_tagline_size_option).'px;';
		$advance_education_custom_css .='}';
	}

	// woocommerce product sale settings
	$advance_education_border_radius_product_sale = get_theme_mod('advance_education_border_radius_product_sale',0);
	$advance_education_custom_css .='.woocommerce span.onsale {';
		$advance_education_custom_css .='border-radius: '.esc_attr($advance_education_border_radius_product_sale).'px;';
	$advance_education_custom_css .='}';

	$advance_education_align_product_sale = get_theme_mod('advance_education_align_product_sale', 'Right');
	if($advance_education_align_product_sale == 'Right' ){
		$advance_education_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_education_custom_css .=' left:auto; right:0;';
		$advance_education_custom_css .='}';
	}elseif($advance_education_align_product_sale == 'Left' ){
		$advance_education_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_education_custom_css .=' left:0; right:auto;';
		$advance_education_custom_css .='}';
	}

	$advance_education_product_sale_font_size = get_theme_mod('advance_education_product_sale_font_size',14);
	$advance_education_custom_css .='.woocommerce span.onsale{';
		$advance_education_custom_css .='font-size: '.esc_attr($advance_education_product_sale_font_size).'px;';
	$advance_education_custom_css .='}';



