/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/delete.js ***!
  \********************************/
$(function () {
  $('.delete').click(function () {
    console.log("This.data(class): " + $(this).data("class") + ", This.data(id): " + $(this).data("id"));
    var deleteURL = deleteUrl + $(this).data("class") + "/" + $(this).data("id");
    console.log("full DELETE url: " + deleteURL);
    Swal.fire({
      title: confirmDelete,
      text: $(this).data("prompt"),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: yesResponse,
      cancelButtonText: noResponse
    }).then(function (result) {
      if (result.isConfirmed) {
        $.ajax({
          method: "DELETE",
          url: deleteURL
        }).done(function (data) {
          Swal.fire({
            icon: 'success',
            title: 'Gratulacje',
            text: data.message + ''
          }).then(function (result) {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        }).fail(function (data) {
          Swal.fire({
            icon: 'error',
            title: 'Ups...',
            text: data.responseJSON.message
          });
        });
      }
    });
  });
});
/******/ })()
;