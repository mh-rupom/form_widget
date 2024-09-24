<?php
if (! defined('ABSPATH')){
	exit; 
}

class Elementor_logout_Widget extends \Elementor\Widget_Base {

	public function get_name(){
		return 'logout';
	}
	public function get_title(){
		return esc_html__( 'Logout', 'elementor_form' );
	}
	public function get_icon(){
		return 'fa fa-image';
	}
	public function get_categories(){
		return ['form-category'];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'content_logout',
			[
				'label' => esc_html__( 'Content', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'logout_button_text',
			[
				'label' => esc_html__( 'Logout', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Logout', 'elementor_form' ),
			]
		);
		$this->add_control(
            'logout_button_text',
            [
                'label' => esc_html__( 'Logout Button Text', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Logout', 'elementor_form' ),
            ]
        );
        
        $this->add_control(
            'logout_button_align',
            [
                'label' => esc_html__( 'Button Alignment', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor_form' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor_form' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor_form' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .logout_btn_div' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'logout_button_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073e6',
                'selectors' => [
                    '{{WRAPPER}} .logout_button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'logout_button_text_color',
            [
                'label' => esc_html__( 'Text Color', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .logout_button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'logout_button_padding',
            [
                'label' => esc_html__( 'Padding', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => 10,
                    'right' => 20,
                    'bottom' => 10,
                    'left' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logout_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'logout_button_margin',
            [
                'label' => esc_html__( 'Margin', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logout_btn_div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'logout_button_border',
                'label' => esc_html__( 'Border', 'elementor_form' ),
                'selector' => '{{WRAPPER}} .logout_button',
            ]
        );
        $this->add_control(
            'logout_button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'elementor_form' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false, 
                ],
                'selectors' => [
                    '{{WRAPPER}} .logout_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
		
		$this->end_controls_section();
	}
	protected function render() {
        $settings = $this->get_settings_for_display();
		?>
		<div class="logout_btn_div">
        <a href="<?php echo esc_url( $logout_url ); ?>" class="logout_button">
            <?php echo esc_html( $settings['logout_button_text'] ); ?>
        </a>
    </div>
        <?php
	}
}