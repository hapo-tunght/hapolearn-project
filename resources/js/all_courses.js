$(function () {
  $('.select-2').select2();

  $('#reset-filter').on('click', function () {
    $('.get-value').val('');
    $('#newest-oldest-radio #radio-newest').prop('checked', false);
    $('#newest-oldest-radio #radio-oldest').prop('checked', false);
    $('.input-change').trigger('change');
  });
});
