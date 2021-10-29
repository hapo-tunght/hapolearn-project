$(function () {
  $('.select-2').select2();

  $('#resetFilter').on('click', function () {
    $('.get-value').val('');
    $('#newestOldestRadio #radioNewest').prop('checked', false);
    $('#newestOldestRadio #radioOldest').prop('checked', false);
    $('.input-change').trigger('change');
  });
});
