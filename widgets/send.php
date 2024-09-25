
<?php
if (!defined('ABSPATH')) {
    exit;
}

class Elementor_send_message_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'send_message';
    }

    public function get_title() {
        return esc_html__('Send Message', 'elementor_form');
    }

    public function get_icon() {
        return 'fa fa-envelope';
    }

    public function get_categories() {
        return ['form-category'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_send',
            [
                'label' => esc_html__('Content', 'elementor_form'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'email_type',
            [
                'label' => __('Send To', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'admin' => __('Admin', 'elementor_form'),
                    'custom' => __('Custom', 'elementor_form'),
                ],
                'default' => 'admin',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'custom_email',
            [
                'label' => __('Custom Email', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'email_type' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'fields_section',
            [
                'label' => __('Fields', 'elementor_form'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'field_label', [
                'label' => __('Label', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'elementor_form'),
            ]
        );
        $repeater->add_control(
            'field_name', [
                'label' => __('Name id', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'elementor_form'),
            ]
        );
        $repeater->add_control(
            'name_field', [
                'label' => __('Name', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jack', 'elementor_form'),
            ]
        );

        $this->add_control(
            'fields',
            [
                'label' => __('Fields List', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ field_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'template_section',
            [
                'label' => __('Template', 'elementor_form'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'template',
            [
                'label' => __('Template', 'elementor_form'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Your name:{{name}}',
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <form id="email_form" style="width: 50%; display:flex; flex-direction: column; gap: 20px; margin:auto">
            <?php if (!empty($settings['fields'])) { ?>
                <?php foreach ($settings['fields'] as $index => $item) { ?>
                    <div class="repeater-field">
                        <span><?php echo esc_html($item['field_label']); ?></span>
                        <input type="text" name="fields[<?php echo esc_attr($item['field_name']); ?>]" id="<?php echo esc_attr($item['field_name']); ?>" value="<?php echo esc_attr($item['name_field']); ?>" />
                    </div>
                <?php } ?>
            <?php } ?>
    
            <?php if ($settings['email_type'] == 'custom') { ?>
                <div class="">
                    <span style="margin-bottom: 12px;">Email:</span>
                    <input type="email" name="custom_email" value="<?php echo esc_attr($settings['custom_email']); ?>" />
                </div>
            <?php } ?>
            <input type="hidden" name="template_data" id="template_data" value="<?php echo esc_attr($settings['template']); ?>">
            <button type="button" id="send_email">Send</button>
        </form>
        <?php
    }
    
}
