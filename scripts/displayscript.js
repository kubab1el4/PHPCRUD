$(document).ready(function() {
var addclass = 'bg-success';
var $cols = $('.rekord').on('click', function(e) {
    $cols.removeClass(addclass);
    $(this).toggleClass(addclass);
    $('.text-reset').attr("id", $(this).attr("id"))
  });
})