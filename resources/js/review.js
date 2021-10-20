$(function () {
  $("ul.tab-bar > li > a").on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id;
  });

  var hash = window.location.hash;
  $('#pills-tab-detail-course a[href="' + hash + '"]').tab('show');

  $('#send-review').on('click', function (event) {
    $('#pills-lessons-tab').removeClass('active');
    $('#pills-reviews-tab').addClass('active');
    
    if ($('#header-login-register').innerWidth() > 0) {
      event.preventDefault();
      $('#login-register-modal').modal('show');
      $('#login-nav-tab').trigger('click');
    }
  })

});
