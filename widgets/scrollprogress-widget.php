<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Scrollprogress Widget.
 *
 * Elementor widget that inserts an Scrollprogress into the page.
 *
 * @since 1.0.0
 */


class Elementor_Scrollprogress_Widget extends \Elementor\Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve Scrollprogress widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'Scrollprogress';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Scrollprogress widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Scrollprogress', 'elementor-scrollprogress-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Scrollprogress widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-navigator';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @return string Widget help URL.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return [ 'test-plugin' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Scrollprogress widget belongs to.
	 *
	 * @return array Widget keywords.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
		return [
			'scrollprogress',
			'url',
			'link',
		];
	}

	/**
	 * Register Test Scrollprogress widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Test Scrollprogress', 'elementor-scrollprogress-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'target_selector',
			[
				'label'   => esc_html__( 'Target Selector', 'elementor-scrollprogress-widget' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$this->add_control(
			'container_color',
			[
				'label'     => esc_html__( 'Progress Container Color', 'elementor-scrollprogress-widget' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-container' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label'     => esc_html__( 'Progress bar Color', 'elementor-scrollprogress-widget' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'height',
			[
				'label'      => esc_html__( 'Height', 'elementor-scrollprogress-widget' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [
					'px',
					'em',
				],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'em' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 0.1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors'  => [ '{{WRAPPER}} .progress-container' => 'height: {{SIZE}}{{UNIT}};' ],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Scrollprogress widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$inline_style = '';
		if ( ! empty( $settings['target_selector'] ) && is_string( $settings['target_selector'] ) ) {
			$inline_style = 'style="position: static;"';
		}

		?>
		<div <?php echo $inline_style; ?> class="fixed <?php echo esc_attr( $settings['target_selector'] ); ?>" >
			<div class="progress-container">
				<div class="progress-bar" id="myBar">
				</div>
			</div>
		</div>
		<?php
	}
}
