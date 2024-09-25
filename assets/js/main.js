jQuery(document).ready(function($) {
    $('#send_email').on('click', function() {
        let form_data = {
            fields: {},
            template_data: $('#template_data').val(),
            custom_email: $('input[name="custom_email"]').val()
        };
        $('#email_form input[type="text"]').each(function() {
            let field_name = $(this).attr('name');
            form_data.fields[field_name] = $(this).val();
        });

        $.ajax({
            url: ajaxurl.url, 
            type: 'POST',
            data: {
                action: 'send_custom_email',
                form_data: form_data
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.data.message);
                    console.log(response);
                }
            }
        });
    });
});
