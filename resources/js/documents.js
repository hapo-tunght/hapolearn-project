$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.document-name, .preview-button').on('click', function() {
    $.ajax({
      type: 'POST',
      url: '/documents/learned',
      data: {
        lessonId: $(this).data('lesson-id'),
        documentId: $(this).data('document-id'),
      },
      dataType: 'json',
      success: function (response) {
        $('#progressBarDocument').css('width', response.percentage + '%');
        $('#progressBarDocument').html(response.percentage + '%');
      }
    })
  });
  
});