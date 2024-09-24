<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_form_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'formwidget';
	}
	public function get_title(){
		return esc_html__( 'Form widget', 'elementor_form' );
	}
	public function get_icon(){
		return 'fa fa-image';
	}
	public function get_categories(){
		return ['form-category'];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'login_title',
			[
				'label' => esc_html__( 'Title', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Login', 'elementor_form' ),
			]
		);
		$this->add_control(
			'username_label',
			[
				'label' => esc_html__( 'Username label', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Username', 'elementor_form' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Title css', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'login_title_style',
			[
				'label' => esc_html__( 'Text align', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => esc_html__( 'Left', 'elementor_form' ),
					'right' => esc_html__( 'Right', 'elementor_form' ),
					'center' => esc_html__( 'Center', 'elementor_form' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .title',
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<h2 class="title">
			<?php echo $settings['login_title']; ?>
		</h2>
		<label for="">
			<span><?php echo $settings['username_label'] ?></span>
			<input type="text" name="" id="">
		</label>
		<?php
	}
}