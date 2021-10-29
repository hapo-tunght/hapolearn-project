$(function () {
  $('#joinThisCourseButton').on('click', function (event) {
    if ($('#headerLoginRegister').innerWidth() > 0) {
      event.preventDefault();
      $('#loginRegisterModal').modal('show');
      $('#loginNavTab').trigger('click');
    }
  })
});