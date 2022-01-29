/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/backend/sweetalert2.js ***!
  \*********************************************/
/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 */
function appendDeleteForm() {
  $('[data-method="delete"]').append(function () {
    if (!$(this).find('form').length) return "\n" + "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' class='d-none'>\n" + "   <input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" + "   <input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" + "</form>\n";else return "";
  }).attr('href', '#').attr('style', 'cursor:pointer').attr('onclick', '$(this).find("form").submit()');
}

$(function () {
  appendDeleteForm();
  $(document).ajaxComplete(function () {
    appendDeleteForm();
  });
  $(document).on('submit', 'form[name=delete_item]', function (event) {
    event.preventDefault();
    var form = this;
    var link = $('a[data-method="delete"]');
    Swal.fire({
      icon: 'error',
      title: link.attr('data-trans-title'),
      cancelButtonText: link.attr('data-trans-button-cancel'),
      confirmButtonText: link.attr('data-trans-button-confirm'),
      confirmButtonColor: '#e55353',
      showCancelButton: true
    }).then(function (result) {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });
});
/******/ })()
;