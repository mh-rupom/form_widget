<?php
add_action('wp_ajax_send_custom_email', 'send_custom_email');
function send_custom_email() {
    if (isset($_POST['form_data'])) {
        $form_data = $_POST['form_data'];
        $fields =  $form_data['fields'];
        $template_data =  sanitize_text_field($form_data['template_data']) ;
        $custom_email = sanitize_email($form_data['custom_email']);
        foreach ($fields as $field_name => $field_value) {
            $template_data = str_replace("{{" . $field_name . "}}", sanitize_text_field($field_value), $template_data);
        }
        $to = $custom_email ? $custom_email : 'mohrajulrupom@gmail.com';
        $subject = 'Custom Email';
        $message = $template_data;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $mail_sent = wp_mail($to, $subject, $message, $headers);
        if ($mail_sent) {
            wp_send_json_success(['message' => 'Email sent successfully.']);
        }
    }
    wp_die();
}
