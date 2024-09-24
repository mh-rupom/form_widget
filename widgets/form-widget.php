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
			'field_label',
			[
				'label' => esc_html__( 'Username label', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Username', 'elementor_form' ),
			]
		);
		$this->add_control(
			'password_label',
			[
				'label' => esc_html__( 'Password label', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Password', 'elementor_form' ),
			]
		);
		$this->add_control(
			'login_button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Login', 'elementor_form' ),
				'placeholder' => esc_html__( 'Enter button text', 'elementor_form' ),
			]
		);
		$this->add_control(
			'after_login_text',
			[
				'label' => esc_html__( 'Text no account', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Don\'t have an account?', 'elementor_form' ),
				'placeholder' => esc_html__( 'Enter text', 'elementor_form' ),
			]
		);
		$this->add_control(
			'sign_up_link',
			[
				'label' => esc_html__( 'Sign Up Link', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => false,
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'form-container',
			[
				'label' => esc_html__( 'Container css', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'container_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .form_container_wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'container_width',
			[
				'label' => esc_html__( 'Container Width', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 50,
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .form_container' => 'width: {{SIZE}}{{UNIT}}; margin: auto;',
				],
			]
		);
		$this->add_control(
			'form_background_color',
			[
				'label' => esc_html__( 'Form Background', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .form_container' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Form Shadow', 'elementor_form' ),
				'selector' => '{{WRAPPER}} .form_container',
			]
		);
		$this->add_control(
			'form_padding',
			[
				'label' => esc_html__( 'Form Padding', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true, 
				],
				'selectors' => [
					'{{WRAPPER}} .form_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$this->add_control(
			'margin_title',
			[
				'label' => esc_html__( 'Title margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$this->start_controls_section(
			'style_username',
			[
				'label' => esc_html__( 'Field css', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'field_label_style',
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
					'{{WRAPPER}} .field_label' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Label margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .field_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'margin_field',
			[
				'label' => esc_html__( 'Field margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .field_div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Input padding', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'border',
			[
				'label' => esc_html__( 'Input Border', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'border-top-width: {{TOP}}{{UNIT}}; border-right-width: {{RIGHT}}{{UNIT}}; border-bottom-width: {{BOTTOM}}{{UNIT}}; border-left-width: {{LEFT}}{{UNIT}}; border-style: solid;',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'input_width',
			[
				'label' => esc_html__( 'Input Width', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
					],
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'input_height',
			[
				'label' => esc_html__( 'Input Height', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
					],
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .input_field' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'username_typography',
				'selector' => '{{WRAPPER}} .field_section',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'login_btn_style',
			[
				'label' => esc_html__( 'Login button css', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'login_button_background_color',
			[
				'label' => esc_html__( 'Button Background', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .login_button' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'login_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .login_button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'login_button_alignment',
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
					'{{WRAPPER}} .login_btn_div' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'login_button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .login_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'login_button_margin',
			[
				'label' => esc_html__( 'Button Margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .login_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
            'login_button_border_radius',
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
                    '{{WRAPPER}} .login_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'login_button_typography',
				'label' => esc_html__( 'Button Typography', 'elementor_form' ),
				'selector' => '{{WRAPPER}} .login_button',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'style_after_login_btn',
			[
				'label' => esc_html__( 'No account', 'elementor_form' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'after_login_text_alignment',
			[
				'label' => esc_html__( 'Text Alignment', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'left' => esc_html__( 'Left', 'elementor_form' ),
					'center' => esc_html__( 'Center', 'elementor_form' ),
					'right' => esc_html__( 'Right', 'elementor_form' ),
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .after_login_text' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'after_text_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => 24,
					'right' => 0,
					'bottom' => 24,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .after_login_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'after_login_text_margin',
			[
				'label' => esc_html__( 'Text Margin', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .after_login_text span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'after_login_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .after_login_text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sign_up_link_color',
			[
				'label' => esc_html__( 'Link Color', 'elementor_form' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .after_login_text a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'after_login_text_typography',
				'label' => esc_html__( 'Text Typography', 'elementor_form' ),
				'selector' => '{{WRAPPER}} .after_login_text span',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sign_up_link_typography',
				'label' => esc_html__( 'Link Typography', 'elementor_form' ),
				'selector' => '{{WRAPPER}} .after_login_text a',
			]
		);
		
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="form_container_wrapper">
			<div class="form_container">
				<h2 class="title">
					<?php echo $settings['login_title']; ?>
				</h2>
				<div class="field_section">
					<div class="field_label"><?php echo $settings['field_label'] ?></div>
					<div class="field_div">
						<input type="text" name="" id="input_field" class="input_field" >
					</div>
				</div>
				<div class="field_section">
					<div class="field_label"><?php echo $settings['password_label'] ?></div>
					<div class="field_div">
						<input type="text" name="" id="input_field" class="input_field" >
					</div>
				</div>
				<div class="login_btn_div">
					<button class="login_button"><?php echo $settings['login_button_text'] ?></button>
				</div>
				<div class="after_login_text">
					<span><?php echo esc_html( $settings['after_login_text'] ); ?></span>
					<a href="<?php echo esc_url( $settings['sign_up_link']['url'] ); ?>" <?php echo ( $settings['sign_up_link']['is_external'] ) ? 'target="_blank"' : ''; ?>>
						<?php esc_html_e( 'Sign Up', 'elementor_form' ); ?>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}