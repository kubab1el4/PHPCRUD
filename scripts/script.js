$(document).ready(function() {
  $('.text-reset').attr("id", "");
  var $editContainter = $(".edit-container");
  var $screen = $("#screen");
  var $return = $(".return");
  var $addContainer = $(".add-container");
  var $textMuted = $(".text-muted");
  jQuery.extend(jQuery.expr[":"], {
    invalid: function(elem, index, match) {
      var invalids = document.querySelectorAll(":invalid"),
        result = false,
        len = invalids.length;

      if (len) {
        for (var i = 0; i < len; i++) {
          if (elem === invalids[i]) {
            result = true;
            break;
          }
        }
      }
      return result;
    },
  });
  $(window).on("load", function() {
    $.ajax({
      url: "views/display.php",
      success: function(result) {
        $screen.load("views/display.php");
      },
    });
  });

  $editContainter.on("click", ".edit", function() {
    if ($('.stopka').attr('id') != 0) {
      $.ajax({
        type: "POST",
        url: "views/edit.php",
        data: JSON.stringify({
          id: $('.stopka').attr('id')
        }),
        success: function(data) {
          $screen.html(data);
        },
      });

      $return.html(
        "<p>Powrót do listy aut</p><button type='button' class='back btn btn-dark'>Powrót</button>"
      );
      $addContainer.html(
        "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
      );
      $editContainter.html(
        ""
      );
      $textMuted.html(
        "ID wybranego samochodu to " + $('.stopka').attr('id')
      );
      $textMuted.attr(
        "id", $('.stopka').attr('id')
      );
    } else {
      $textMuted.html(
        "Nie wybrano samochodu, kliknij na rekord aby wybrać"
      )
    }
  });
  $("#screen").on("click");
  $("#screen").on("click", ".delete", function() {
    $.ajax({
      type: "POST",
      url: "actions/delete-action.php",
      data: JSON.stringify({
        id: event.target.id
      }),
      success: function(data) {
        $screen.load("views/display.php");
      },
    });
    $('.text-reset').attr("id", "");
  });
  $addContainer.on("click", ".add", function() {
    {
      $('.text-reset').attr("id", "");
      $screen.load("views/add.php");
      $return.html(
        "<p>Powrót do listy aut</p><button type='button' class='back btn btn-dark'>Powrót</button>"
      );
      $editContainter.html(
        ""
      );
      $textMuted.html(
        ""
      );
      $addContainer.html("");
    }
  });
  $return.off("click");
  $return.on("click", ".back", function() {
    if(confirm("Jakiekolwiek zmiany/wpisane dane zostaną utracone, czy chcesz kontynuować?")){
      $screen.load("views/display.php");
      $return.html("");
      $editContainter.html(
        "<p>Edytuj zaznaczony samochód</p><button type='button' class='edit btn btn-primary'>Edytuj</button>"
      );
      $addContainer.html(
        "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
      );
      $textMuted.html(
        "Kliknij na rekord aby zaznaczyć go do edycji"
      );}else{return false;}
    }
  );
  
})





