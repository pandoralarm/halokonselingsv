<?php

	// Prevent direct file access
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class CBXInstaPhotos_Widget extends WP_Widget {

		/**
		 *
		 * Unique identifier for your widget.
		 *
		 *
		 * The variable name is used as the text domain when internationalizing strings
		 * of text. Its value should match the Text Domain file header in the main
		 * widget file.
		 *
		 * @since    1.0.0
		 *
		 * @var      string
		 */
		protected $widget_slug = 'cbxinstaphotos-widget';


		/**
		 * Constructor
		 * Specifies the classname and description, instantiates the widget,
		 * loads localization files, and includes necessary stylesheets and JavaScript.
		 */
		public function __construct() {


			parent::__construct(
				$this->get_widget_slug(),
				esc_html__( 'Insta Photos', "cbxinstaphotos" ),
				array(
					'classname'   => 'cbxinstaphotos-wd ' . $this->get_widget_slug() . '-class',
					'description' => esc_html__( 'This widget shows Instagram Photos from single account',
						"cbxinstaphotos" ),
				)
			);
		}// end constructor

		/**
		 * Return the widget slug.
		 *
		 * @since    1.0.0
		 *
		 * @return    Plugin slug variable.
		 */
		public function get_widget_slug() {
			return $this->widget_slug;
		}


		/**
		 * Outputs the content of the widget.
		 *
		 * @param array $args
		 * @param array $instance
		 *
		 * @return int|void
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			// go on with your widget logic, put everything into a string and …

			extract( $args, EXTR_SKIP );

			$widget_string = $before_widget;

			// Title
			$title = apply_filters( 'widget_title',
				empty( $instance['title'] ) ? esc_html__( 'Insta Photos', 'cbxinstaphotos' ) : $instance['title'],
				$instance,
				$this->id_base );

			$id        = isset( $instance['id'] ) ? intval( $instance['id'] ) : '';
			$layout    = isset( $instance['layout'] ) ? esc_attr( $instance['layout'] ) : 'default';
			$count     = isset( $instance['count'] ) ? intval( $instance['count'] ) : 12;
			$follow    = isset( $instance['follow'] ) ? intval( $instance['follow'] ) : 0;
			$show_like = isset( $instance['show_like'] ) ? intval( $instance['show_like'] ) : 0;
			$show_com  = isset( $instance['show_com'] ) ? intval( $instance['show_com'] ) : 0;


			// Defining Title of Widget
			if ( $title ) {
				$widget_string .= $args['before_title'] . $title . $args['after_title'];
			} else {
				$widget_string .= $args['before_title'] . $args['after_title'];
			}

			$widget_string .= do_shortcode( '[cbxinstaphotos id="' . $id . '" layout="' . $layout . '" count="' . $count . '" follow="' . $follow . '"  show_like="' . $show_like . '" show_com="' . $show_com . '"  ]' );

			$widget_string .= $after_widget;
			print $widget_string;
		}//end method widget


		/**
		 * Processes the widget's options to be saved.
		 *
		 * @param array $new_instance
		 * @param array $old_instance
		 *
		 * @return array|mixed
		 */
		public function update( $new_instance, $old_instance ) {

			$instance['title']     = esc_attr( $new_instance['title'] );
			$instance['id']        = intval( $new_instance['id'] );
			$instance['count']     = intval( $new_instance['count'] );
			$instance['follow']    = intval( $new_instance['follow'] );
			$instance['show_like'] = intval( $new_instance['show_like'] );
			$instance['show_com']  = intval( $new_instance['show_com'] );
			$instance['layout']    = esc_attr( $new_instance['layout'] );

			return $instance;
		}//end method widget

		/**
		 * Generates the administration form for the widget.
		 *
		 * @param array instance The array of keys and values for the widget.
		 */
		public function form( $instance ) {

			$instance = wp_parse_args(
				(array) $instance,
				array(
					'title'     => esc_html__( 'Insta Photos', 'cbxinstaphotos' ),
					'id'        => '',
					'count'     => 12,
					'follow'    => 1,
					'show_like' => 1,
					'show_com'  => 1,
					'layout'    => 'default',
				)
			);

			$title     = esc_attr( $instance['title'] );
			$id        = intval( $instance['id'] );
			$layout    = esc_attr( $instance['layout'] );
			$count     = intval( $instance['count'] );
			$follow    = intval( $instance['follow'] );
			$show_like = intval( $instance['show_like'] );
			$show_com  = intval( $instance['show_com'] );

			$active_insta = CBXInstaPhotosHelper::get_active_instaposts();
			$layouts      = CBXInstaPhotosHelper::get_layouts();

			// Display the admin form
			include( plugin_dir_path( __FILE__ ) . 'views/admin.php' );
		}//end method form


	}// end class CBXInstaPhotos_Widget