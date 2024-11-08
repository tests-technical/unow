jQuery(document).ready(function ($) {
  $('#cfp-contact-form').on('submit', function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    $.ajax({
      type: 'POST',
      url: cfp_ajax.ajax_url,
      data: formData + '&action=submit_contact_form&nonce=' + cfp_ajax.nonce,
      beforeSend: function () {
        form.find('button').prop('disabled', true);
        $('#cfp-form-message')
          .html('Sending...')
          .removeClass('error')
          .addClass('sending');
      },
      success: function (response) {
        if (response.success) {
          $('#cfp-form-message')
            .html(response.data)
            .removeClass('sending error')
            .addClass('success');
          form[0].reset();
        } else {
          $('#cfp-form-message')
            .html(response.data)
            .removeClass('sending success')
            .addClass('error');
        }
      },
      error: function () {
        $('#cfp-form-message')
          .html('An error occurred. Please try again.')
          .removeClass('sending success')
          .addClass('error');
      },
      complete: function () {
        form.find('button').prop('disabled', false);
      }
    });
  });
});
