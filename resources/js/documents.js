$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.document-name, .preview-button').on('click', function() {
    $.ajax({
      type: 'POST',
      url: '/lesson/document/learned',
      data: {
        lessonId: $(this).data('lesson-id'),
        documentId: $(this).data('document-id'),
      },
      dataType: 'json',
      success: function (response) {
        $('#progress-bar-document').css('width', response.percentage + '%');
        $('#progress-bar-document').html(response.percentage + '%');
      }
    })
  });
  
});