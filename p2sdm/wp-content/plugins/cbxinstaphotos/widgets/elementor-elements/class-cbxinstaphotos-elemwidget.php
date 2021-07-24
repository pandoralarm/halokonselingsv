<?php
	namespace CBXInstaPhotosElemWidget\Widgets;

	use Elementor\Widget_Base;
	use Elementor\Controls_Manager;


	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	/**
	 * CBX Insta Photo(Single Account) Elementor Widget
	 */
	class CBXInstaPhotos_ElemWidget extends Widget_Base {

		/**
		 * Retrieve google maps widget name.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'cbxinstaphotos_single';
		}

		/**
		 * Retrieve google maps widget title.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Insta Photos', 'cbxinstaphotos' );
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the widget categories.
		 *
		 * @since  1.0.10
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'codeboxr' );
		}

		/**
		 * Retrieve google maps widget icon.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'cbxinstaphotos-single-icon';
		}

		/**
		 * Register google maps widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function _register_controls() {

			$insta_posts = \CBXInstaPhotosHelper::get_active_instaposts();
			//$layouts      = \CBXInstaPhotosHelper::get_layouts();
			$layouts = \CBXInstaPhotosHelper::get_layouts_elementor_dropdown();


			$this->start_controls_section(
				'section_cbxinstaphotos_single',
				array(
					'label' => esc_html__( 'Insta Photos', 'cbxinstaphotos' ),
				)
			);


			$this->add_control(
				'cbxinstaphotos_id',
				array(
					'label'       => esc_html__( 'Select Instagram Post', 'cbxinstaphotos' ),
					'type'        => \Elementor\Controls_Manager::SELECT2,
					'placeholder' => esc_html__( 'Select Instagram Post', 'cbxinstaphotos' ),
					'default'     => '',
					'options'     => $insta_posts,
					'description' => esc_html__( 'Choose from saved cbxinstaphotos posts', 'cbxinstaphotos' ),
				)
			);

			$this->add_control(
				'cbxinstaphotos_layout',
				array(
					'label'       => esc_html__( 'Layout', 'cbxinstaphotos' ),
					'type'        => \Elementor\Controls_Manager::SELECT2,
					'placeholder' => esc_html__( 'Select layout', 'cbxinstaphotos' ),
					'default'     => 'default',
					'options'     => $layouts
				)
			);

			/*$this->add_control(
				'hr',
				array(
					'type' => \Elementor\Controls_Manager::DIVIDER,
	
				)
			);*/


			$this->add_control(
				'cbxinstaphotos_count',
				array(
					'label'       => esc_html__( 'Photo Count', 'cbxinstaphotos' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'No of photo', 'cbxinstaphotos' ),
					'default'     => 9,
				)
			);


			$this->add_control(
				'cbxinstaphotos_follow',
				array(
					'label'   => esc_html__( 'Show Follow Button:', 'cbxinstaphotos' ),
					'type'    => \Elementor\Controls_Manager::SELECT,
					'options' => array(
						'1' => esc_html__( 'Enable', 'cbxinstaphotos' ),
						'0' => esc_html__( 'Disable', 'cbxinstaphotos' ),
					),
					'default' => 1,
				)
			);

			$this->add_control(
				'cbxinstaphotos_show_like',
				array(
					'label'   => esc_html__( 'Show Like:', 'cbxinstaphotos' ),
					'type'    => \Elementor\Controls_Manager::SELECT,
					'options' => array(
						'1' => esc_html__( 'Enable', 'cbxinstaphotos' ),
						'0' => esc_html__( 'Disable', 'cbxinstaphotos' ),
					),
					'default' => 1,
				)
			);

			$this->add_control(
				'cbxinstaphotos_show_com',
				array(
					'label'   => esc_html__( 'Show Comments:', 'cbxinstaphotos' ),
					'type'    => \Elementor\Controls_Manager::SELECT,
					'options' => array(
						'1' => esc_html__( 'Enable', 'cbxinstaphotos' ),
						'0' => esc_html__( 'Disable', 'cbxinstaphotos' ),
					),
					'default' => 1,
				)
			);


			$this->end_controls_section();
		}//end method _register_controls

		/**
		 * Render google maps widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function render() {

			$instance = $this->get_settings();

			$id = intval( $instance['cbxinstaphotos_id'] );

			if ( $id == 0 ) {
				//render map from saved map
				echo esc_html__( 'No Instagram(CBX Insta Photos/cbxinstaphotos) post selected', 'cbxinstaphotos' );
			} else {

				//render map from custom attributes
				$layout    = isset( $instance['cbxinstaphotos_layout'] ) ? esc_attr( $instance['cbxinstaphotos_layout'] ) : 'default';
				$count     = isset( $instance['cbxinstaphotos_count'] ) ? intval( $instance['cbxinstaphotos_count'] ) : 9;
				$follow    = isset( $instance['cbxinstaphotos_follow'] ) ? intval( $instance['cbxinstaphotos_follow'] ) : 0;
				$show_like = isset( $instance['cbxinstaphotos_show_like'] ) ? intval( $instance['cbxinstaphotos_show_like'] ) : 0;
				$show_com  = isset( $instance['cbxinstaphotos_show_com'] ) ? intval( $instance['cbxinstaphotos_show_com'] ) : 0;


				echo do_shortcode( '[cbxinstaphotos id="' . $id . '" layout="' . $layout . '" count="' . $count . '" follow="' . $follow . '"  show_like="' . $show_like . '" show_com="' . $show_com . '"  ]' );
			}
		}//end method render

		/**
		 * Render google maps widget output in the editor.
		 *
		 * Written as a Backbone JavaScript template and used to generate the live preview.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function _content_template() {
		}//end method _content_template
	}//end method CBXInstaPhotos_ElemWidget
