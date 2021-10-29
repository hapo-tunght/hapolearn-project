$(function () {
  $("ul.tab-bar > li > a").on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id;
  });

  var hash = window.location.hash;
  $('#pillsTabDetailCourse a[href="' + hash + '"]').tab('show');

  $('#sendReview').on('click', function (event) {
    $('#pillsLessonsTab').removeClass('active');
    $('#pillsReviewsTab').addClass('active');
    
    if ($('#headerLoginRegister').innerWidth() > 0) {
      event.preventDefault();
      $('#loginRegisterModal').modal('show');
      $('#loginNavTab').trigger('click');
    }
  })
});
