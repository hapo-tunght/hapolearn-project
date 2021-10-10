$(function () {
  $('#join-this-course-button').on('click', function (event) {
    if ($('#header-login-register').innerWidth() > 0) {
      event.preventDefault();
      $('#login-register-modal').modal('show');
      $('#login-nav-tab').trigger('click');
    }
  })
});