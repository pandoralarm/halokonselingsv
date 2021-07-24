<?php
/**
 * Advance Education Theme Customizer
 *
 * @package advance-education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_education_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_education_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-education'),
		'description'    => __('Description of what this panel does.', 'advance-education'),
	));	

	// font array
	$advance_education_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'advance_education_typography', array(
    	'title'      => __( 'Typography', 'advance-education' ),
		'priority'   => 30,
		'panel' => 'advance_education_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_education_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_education_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_paragraph_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'Paragraph Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	$wp_customize->add_setting('advance_education_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_education_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_education_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_atag_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( '"a" Tag Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_education_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_li_color', array(
		'label' => __('"li" Tag Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_education_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_li_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( '"li" Tag Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_education_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h1_color', array(
		'label' => __('H1 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h1_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'H1 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_education_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_education_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h2_color', array(
		'label' => __('h2 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h2_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'h2 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_education_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h2_font_size',array(
		'label'	=> __('h2 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_education_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h3_color', array(
		'label' => __('h3 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h3_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'h3 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_education_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h3_font_size',array(
		'label'	=> __('h3 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_education_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h4_color', array(
		'label' => __('h4 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h4_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'h4 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_education_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h4_font_size',array(
		'label'	=> __('h4 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_education_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h5_color', array(
		'label' => __('h5 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h5_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'h5 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_education_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h5_font_size',array(
		'label'	=> __('h5 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_education_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_h6_color', array(
		'label' => __('h6 Color', 'advance-education'),
		'section' => 'advance_education_typography',
		'settings' => 'advance_education_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_education_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_education_h6_font_family', array(
	    'section'  => 'advance_education_typography',
	    'label'    => __( 'h6 Fonts','advance-education'),
	    'type'     => 'select',
	    'choices'  => $advance_education_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_education_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_h6_font_size',array(
		'label'	=> __('h6 Font Size','advance-education'),
		'section'	=> 'advance_education_typography',
		'setting'	=> 'advance_education_h6_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_background_skin_mode',array(
        'default' => 'Transpert Background',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_background_skin_mode',array(
        'type' => 'select',
        'label' => __('Background Type','advance-education'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','advance-education'),
            'Transpert Background' => __('Transpert Background','advance-education'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_setting('advance_education_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','advance-education'),
       'section' => 'woocommerce_product_catalog',
    ));

	$wp_customize->add_setting('advance_education_show_wooproducts_border',array(
       'default' => false,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','advance-education'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting( 'advance_education_wooproducts_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	) );
	$wp_customize->add_control( 'advance_education_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'advance-education'),
		'section'  => 'woocommerce_product_catalog',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	)  );

	$wp_customize->add_setting('advance_education_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));	
	$wp_customize->add_control('advance_education_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','advance-education'),
		'section'	=> 'woocommerce_product_catalog',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_education_top_bottom_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control( 'advance_education_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','advance-education' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_education_left_right_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control( 'advance_education_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','advance-education' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'advance_education_wooproducts_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'advance_education_sanitize_number_range',
	));
	$wp_customize->add_control('advance_education_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','advance-education' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting( 'advance_education_wooproducts_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'advance_education_sanitize_number_range',
	));
	$wp_customize->add_control('advance_education_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','advance-education' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_section('advance_education_product_button_section', array(
		'title'    => __('Product Button Settings', 'advance-education'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting( 'advance_education_top_bottom_product_button_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','advance-education' ),
		'section' => 'advance_education_product_button_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'advance_education_left_right_product_button_padding',array(
		'default' => 16,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','advance-education' ),
		'section' => 'advance_education_product_button_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'advance_education_product_button_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'advance_education_sanitize_number_range',
	));
	$wp_customize->add_control('advance_education_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','advance-education' ),
		'section' => 'advance_education_product_button_section',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
	),));

	$wp_customize->add_section('advance_education_product_sale_section', array(
		'title'    => __('Product Sale Button Settings', 'advance-education'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('advance_education_align_product_sale',array(
        'default' => 'Right',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_align_product_sale',array(
        'type' => 'radio',
        'label' => __('Product Sale Button Alignment','advance-education'),
        'section' => 'advance_education_product_sale_section',
        'choices' => array(
            'Right' => __('Right','advance-education'),
            'Left' => __('Left','advance-education'),
        ),
	) );

	$wp_customize->add_setting( 'advance_education_border_radius_product_sale',array(
		'default' => 0,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_border_radius_product_sale', array(
        'label'  => __('Product Sale Button Border Radius','advance-education'),
        'section'  => 'advance_education_product_sale_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    ) );

	$wp_customize->add_setting('advance_education_product_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'advance_education_sanitize_float'
	));
	$wp_customize->add_control('advance_education_product_sale_font_size',array(
		'label'	=> __('Product Sale Button Font Size','advance-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_education_product_sale_section',
		'type'=> 'number'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_education_theme_color_option', array( 
		'panel' => 'advance_education_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-education' ) 
	) );

  	$wp_customize->add_setting( 'advance_education_theme_color', array(
	    'default' => '#cc3333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_education_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'advance-education'),
	    'section' => 'advance_education_theme_color_option',
	    'settings' => 'advance_education_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section('advance_education_left_right', array(
		'title'    => __('Layout Settings', 'advance-education'),
		'priority' => null,
		'panel'    => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_preloader_option',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','advance-education'),
       'section' => 'advance_education_left_right'
    ));

    $wp_customize->add_setting( 'advance_education_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_education_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Shop Page Sidebar','advance-education'),
		'section' => 'advance_education_left_right'
    ));

	$wp_customize->add_setting( 'advance_education_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_education_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','advance-education'),
		'section' => 'advance_education_left_right'
    ));
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_education_layout_options', array(
		'default'           => 'Right Sidebar', 
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));
	$wp_customize->add_control('advance_education_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-education'),
		'section'        => 'advance_education_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-education'),
			'Right Sidebar' => __('Right Sidebar', 'advance-education'),
			'One Column'    => __('One Column', 'advance-education'),
			'Grid Layout'   => __('Grid Layout', 'advance-education')
		),
	));

	$wp_customize->add_setting('advance_education_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));
	$wp_customize->add_control('advance_education_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'advance-education'),
		'section'        => 'advance_education_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-education'),
			'Right Sidebar' => __('Right Sidebar', 'advance-education'),
			'One Column'    => __('One Column', 'advance-education'),
		),
	));

	$wp_customize->add_setting('advance_education_single_post_sidebar_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));
	$wp_customize->add_control('advance_education_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'advance-education'),
		'section'        => 'advance_education_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-education'),
			'Right Sidebar' => __('Right Sidebar', 'advance-education'),
			'One Column'    => __('One Column', 'advance-education'),
		),
	));

	$wp_customize->add_setting('advance_education_theme_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-education'),
        'description' => __('Here you can change the Width layout. ','advance-education'),
        'section' => 'advance_education_left_right',
        'choices' => array(
            'Default' => __('Default','advance-education'),
            'Container' => __('Container','advance-education'),
            'Box Container' => __('Box Container','advance-education'),
        ),
	) );

	// Button
	$wp_customize->add_section( 'advance_education_theme_button', array(
		'title' => __('Button Option','advance-education'),
		'panel' => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','advance-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_education_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('advance_education_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','advance-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_education_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'advance_education_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	) );
	$wp_customize->add_control( 'advance_education_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','advance-education' ),
		'section'     => 'advance_education_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Top Bar
	$wp_customize->add_section('advance_education_topbar',array(
		'title'	=> __('Topbar Section','advance-education'),
		'description'	=> __('Add topbar content','advance-education'),
		'priority'	=> null,
		'panel' => 'advance_education_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'advance_education_display_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_education_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','advance-education' ),
        'section' => 'advance_education_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'advance_education_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ) );
    $wp_customize->add_control('advance_education_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','advance-education' ),
        'section' => 'advance_education_topbar'
    ));

	$wp_customize->add_setting('advance_education_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email',
	));
	$wp_customize->add_control('advance_education_mail1',array(
		'label'	=> __('Mail Address','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'advance_education_sanitize_phone_number',
	));
	$wp_customize->add_control('advance_education_phone1',array(
		'label'	=> __('Phone Number','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('advance_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_time',array(
		'label'	=> __('Timing Text','advance-education'),
		'section'	=> 'advance_education_topbar',
		'type'	=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'advance_education_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-education' ),
		'priority'   => null,
		'panel' => 'advance_education_panel_id'
	) );

	$wp_customize->add_setting('advance_education_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-education'),
       'section' => 'advance_education_slider'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'advance_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_education_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-education' ),
			'description'	=> __('Size of image should be 1600 x 633','advance-education'),
			'section'  => 'advance_education_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('advance_education_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Home Page Slider Overlay','advance-education'),
		'description'    => __('This option will add colors over the slider.','advance-education'),
       'section' => 'advance_education_slider'
    ));

    $wp_customize->add_setting('advance_education_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'advance_education_slider_image_overlay_color', array(
		'label'    => __('Home Page Slider Overlay Color', 'advance-education'),
		'section'  => 'advance_education_slider',
		'description'    => __('It will add the color overlay of the slider. To make it transparent, use the below option.','advance-education'),
		'settings' => 'advance_education_slider_image_overlay_color',
	)));

	//content layout
    $wp_customize->add_setting('advance_education_slider_content_alignment',array(
    'default' => 'Left',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','advance-education'),
        'section' => 'advance_education_slider',
        'choices' => array(
            'Center' => __('Center','advance-education'),
            'Left' => __('Left','advance-education'),
            'Right' => __('Right','advance-education'),
        ),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'advance_education_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	) );
	$wp_customize->add_control( 'advance_education_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','advance-education' ),
		'section'     => 'advance_education_slider',
		'type'        => 'number',
		'settings'    => 'advance_education_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('advance_education_slider_image_opacity',array(
      'default'              => 0.5,
      'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control( 'advance_education_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','advance-education' ),
	'section'     => 'advance_education_slider',
	'type'        => 'select',
	'settings'    => 'advance_education_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','advance-education'),
		'0.1' =>  esc_attr('0.1','advance-education'),
		'0.2' =>  esc_attr('0.2','advance-education'),
		'0.3' =>  esc_attr('0.3','advance-education'),
		'0.4' =>  esc_attr('0.4','advance-education'),
		'0.5' =>  esc_attr('0.5','advance-education'),
		'0.6' =>  esc_attr('0.6','advance-education'),
		'0.7' =>  esc_attr('0.7','advance-education'),
		'0.8' =>  esc_attr('0.8','advance-education'),
		'0.9' =>  esc_attr('0.9','advance-education')
	),
	));

	$wp_customize->add_setting( 'advance_education_slider_speed_option',array(
		'default' => 3000,
		'sanitize_callback'    => 'advance_education_sanitize_number_range',
	));
	$wp_customize->add_control( 'advance_education_slider_speed_option',array(
		'label' => esc_html__( 'Slider Speed Option','advance-education' ),
		'section' => 'advance_education_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('advance_education_slider_image_height',array(
		'default'=> __('550','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_slider_image_height',array(
		'label'	=> __('Slider Image Height','advance-education'),
		'section'=> 'advance_education_slider',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_education_slider_button',array(
		'default'=> __('READ MORE','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_slider_button',array(
		'label'	=> __('Slider Button','advance-education'),
		'section'=> 'advance_education_slider',
		'type'=> 'text'
	));

	//Popular Courses 
	$wp_customize->add_section('advance_education_category',array(
		'title'	=> __('Popular Courses','advance-education'),
		'description'	=> __('Add section below.','advance-education'),
		'panel' => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('advance_education_title',array(
	    'label' => __('Section Title','advance-education'),
	    'section' => 'advance_education_category',
	    'type'  => 'text'
   	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_education_popular_courses_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_education_sanitize_choices',
	));	
	$wp_customize->add_control('advance_education_popular_courses_category',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display post','advance-education'),
		'description'	=> __('Size of image should be 370 x 240','advance-education'),
		'section' => 'advance_education_category',
	));

	//404 Page Setting
	$wp_customize->add_section('advance_education_404_page_setting',array(
		'title'	=> __('404 Page','advance-education'),
		'panel' => 'advance_education_panel_id',
	));	

	$wp_customize->add_setting('advance_education_title_404_page',array(
		'default'=> __('404 Not Found','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_title_404_page',array(
		'label'	=> __('404 Page Title','advance-education'),
		'section'=> 'advance_education_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_education_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_content_404_page',array(
		'label'	=> __('404 Page Content','advance-education'),
		'section'=> 'advance_education_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_education_button_404_page',array(
		'default'=> __('Back to Home Page','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_button_404_page',array(
		'label'	=> __('404 Page Button','advance-education'),
		'section'=> 'advance_education_404_page_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('advance_education_responsive_setting',array(
		'title'	=> __('Responsive Setting','advance-education'),
		'panel' => 'advance_education_panel_id',
	));

    $wp_customize->add_setting('advance_education_responsive_sticky_header',array(
       'default' => false,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_responsive_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Sticky Header','advance-education'),
       'section' => 'advance_education_responsive_setting'
    ));

    $wp_customize->add_setting('advance_education_responsive_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_responsive_slider',array(
       'type' => 'checkbox',
       'label' => __('Slider','advance-education'),
       'section' => 'advance_education_responsive_setting'
    ));

    $wp_customize->add_setting('advance_education_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','advance-education'),
       'section' => 'advance_education_responsive_setting'
    ));

    $wp_customize->add_setting('advance_education_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','advance-education'),
       'section' => 'advance_education_responsive_setting'
    ));

    $wp_customize->add_setting('advance_education_responsive_preloader',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','advance-education'),
       'section' => 'advance_education_responsive_setting'
    ));

	//Blog Post
	$wp_customize->add_section('advance_education_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-education'),
		'panel' => 'advance_education_panel_id',
	));	

	$wp_customize->add_setting('advance_education_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_show_featured_image_single_post',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_show_featured_image_single_post',array(
       'type' => 'checkbox',
       'label' => __('Single Post Image','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

    $wp_customize->add_setting('advance_education_blog_post_description_option',array(
    	'default'   => 'Excerpt Content',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','advance-education'),
        'section' => 'advance_education_blog_post',
        'choices' => array(
            'No Content' => __('No Content','advance-education'),
            'Excerpt Content' => __('Excerpt Content','advance-education'),
            'Full Content' => __('Full Content','advance-education'),
        ),
	) );

    $wp_customize->add_setting( 'advance_education_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	) );
	$wp_customize->add_control( 'advance_education_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-education' ),
		'section'     => 'advance_education_blog_post',
		'type'        => 'number',
		'settings'    => 'advance_education_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'advance_education_post_suffix_option', array(
		'default'   =>  __('...','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_education_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','advance-education' ),
		'section'     => 'advance_education_blog_post',
		'type'        => 'text',
		'settings'    => 'advance_education_post_suffix_option',
	) );

	$wp_customize->add_setting('advance_education_button_text',array(
		'default'=>  __('READ MORE','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_button_text',array(
		'label'	=> __('Add Button Text','advance-education'),
		'section'=> 'advance_education_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'advance_education_metabox_separator_blog_post', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'advance_education_metabox_separator_blog_post', array(
		'label'       => esc_html__( 'Meta Box Separator','advance-education' ),
		'input_attrs' => array(
            'placeholder' => __( 'Add Meta Separator. e.g.: "|", "/", etc.', 'advance-education' ),
        ),
		'section'     => 'advance_education_blog_post',
		'type'        => 'text',
		'settings'    => 'advance_education_metabox_separator_blog_post',
	) );

	$wp_customize->add_setting('advance_education_display_blog_page_post',array(
        'default' => 'In Box',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_display_blog_page_post',array(
        'type' => 'radio',
        'label' => __('Display Blog Page Post :','advance-education'),
        'section' => 'advance_education_blog_post',
        'choices' => array(
            'In Box' => __('In Box','advance-education'),
            'Without Box' => __('Without Box','advance-education'),
        ),
	) );

	$wp_customize->add_setting('advance_education_blog_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_blog_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Pagination in Blog Page','advance-education'),
       'section' => 'advance_education_blog_post'
    ));

	//no Result Found
	$wp_customize->add_section('advance_education_noresult_found',array(
		'title'	=> __('No Result Found','advance-education'),
		'panel' => 'advance_education_panel_id',
	));	

	$wp_customize->add_setting('advance_education_nosearch_found_title',array(
		'default'=> __('Nothing Found','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_nosearch_found_title',array(
		'label'	=> __('No Result Found Title','advance-education'),
		'section'=> 'advance_education_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_education_nosearch_found_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','advance-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_education_nosearch_found_content',array(
		'label'	=> __('No Result Found Content','advance-education'),
		'section'=> 'advance_education_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('advance_education_show_noresult_search',array(
       'default' => true,
       'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('advance_education_show_noresult_search',array(
       'type' => 'checkbox',
       'label' => __('No Result search','advance-education'),
       'section' => 'advance_education_noresult_found'
    ));

	//footer
	$wp_customize->add_section('advance_education_footer_section', array(
		'title'       => __('Footer Text', 'advance-education'),
		'priority'    => null,
		'panel'       => 'advance_education_panel_id',
	));

	$wp_customize->add_setting('advance_education_footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'advance_education_sanitize_choices',
    ));
    $wp_customize->add_control('advance_education_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-education'),
        'section'     => 'advance_education_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-education'),
        'choices' => array(
            '1'     => __('One', 'advance-education'),
            '2'     => __('Two', 'advance-education'),
            '3'     => __('Three', 'advance-education'),
            '4'     => __('Four', 'advance-education')
        ),
    ));

    $wp_customize->add_setting('advance_education_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'advance_education_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'advance-education'),
		'section'  => 'advance_education_footer_section',
	)));

	$wp_customize->add_setting('advance_education_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'advance_education_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','advance-education'),
        'section' => 'advance_education_footer_section'
	)));

	$wp_customize->add_setting('advance_education_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_education_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-education'),
		'section' => 'advance_education_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('advance_education_copyright_content_align',array(
        'default' => 'center',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_copyright_content_align',array(
        'type' => 'select',
        'label' => __('Copyright Text Alignment ','advance-education'),
        'section' => 'advance_education_footer_section',
        'choices' => array(
            'left' => __('Left','advance-education'),
            'right' => __('Right','advance-education'),
            'center' => __('Center','advance-education'),
        ),
	) );

	$wp_customize->add_setting('advance_education_footer_content_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','advance-education' ),
		'section'=> 'advance_education_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('advance_education_copyright_padding',array(
		'default'=> 15,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_copyright_padding',array(
		'label'	=> __('Copyright Padding','advance-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'advance_education_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('advance_education_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'advance_education_sanitize_checkbox'
	));
	$wp_customize->add_control('advance_education_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','advance-education'),
      	'section' => 'advance_education_footer_section',
	));

	$wp_customize->add_setting('advance_education_scroll_setting',array(
        'default' => 'Right',
        'sanitize_callback' => 'advance_education_sanitize_choices'
	));
	$wp_customize->add_control('advance_education_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','advance-education'),
        'section' => 'advance_education_footer_section',
        'choices' => array(
            'Left' => __('Left','advance-education'),
            'Right' => __('Right','advance-education'),
            'Center' => __('Center','advance-education'),
        ),
	) );

	$wp_customize->add_setting('advance_education_scroll_font_size_icon',array(
		'default'=> 20,
		'sanitize_callback'	=> 'advance_education_sanitize_float',
	));
	$wp_customize->add_control('advance_education_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','advance-education'),
		'section'=> 'advance_education_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	) );
}
add_action('customize_register', 'advance_education_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the conadvance_education_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Education_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Education_Customize_Section_Pro(
				$manager,
				'advance_education_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Education Pro Theme', 'advance-education'),
					'pro_text' => esc_html__('Go Pro', 'advance-education'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/education-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('advance-education-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('advance-education-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Education_Customize::get_instance();