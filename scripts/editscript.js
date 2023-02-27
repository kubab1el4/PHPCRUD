$(document).ready(function() {
    var $editCars = $("#carsedit");
    var $textMuted = $(".text-muted");
    var $screen = $("#screen");
    var $addContainer = $(".add-container");
    var $return = $(".return");
    var $editContainter = $(".edit-container");
    const floatingPoint =
    "**Proszę, wypełnij to pole danymi odpowiedniego typu (Number/ Floating Point)";
    document.addEventListener(
        "invalid",
        (function() {
          return function(e) {
            e.preventDefault();
          };
        })(),
        true
      );
      $("form").on("click", ".send", function() {
        function showNameMessage(val) {
          if ($("#" + val).is(":invalid")) {
            $("#" + val.toLowerCase() + "Check").css("display", "block");
            $("#" + val.toLowerCase() + "Check").text(
              "**Proszę, wypełnij to pole"
            );
          } else {
            $("#" + val.toLowerCase() + "Check").css("display", "none");
          }
        }
        let regex2 = /^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$/;
        function showNumberMessage(val) {
          if ($("#" + val).is(":invalid")) {
            $("#" + val.toLowerCase() + "Check").css("display", "block");
            $("#" + val.toLowerCase() + "Check").text(
              "**Proszę, wypełnij to pole"
            );
            let bla1 = $("#" + val).val();
            if (!regex2.test(bla1) && bla1.length != 0) {
              $("#" + val.toLowerCase() + "Check").text(floatingPoint);
            }
          } else {
            $("#" + val.toLowerCase() + "Check").css("display", "none");
          }
        }
        showNameMessage("name");
    
        showNumberMessage("max_speed");
    
        showNameMessage("engine");
    
        showNumberMessage("mass");
    
        showNumberMessage("price");
      });
      $("#editcars").off('submit');
      $("#editcars").on("submit", function (e) {
        $(".text-muted").html(
          "Kliknij na rekord aby zaznaczyć go do edycji"
        );
        function getFormData($form) {
          var unindexed_array = $form.serializeArray();
          var indexed_array = {};
    
          $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
          });
    
          return indexed_array;
        }
        var formData = JSON.stringify(getFormData($("#editcars")));
        var formData2 = JSON.stringify(parseInt($('.text-muted').attr('id')));
        $.ajax({
          type: "POST",
          url: "edit-action.php",
          data: { formData, formData2 },
          success: function (data) {
            console.log(data), $("#screen").load("display.php");
            $(".add-container").html(
              "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
            );
            $(".return").html("");
            $(".edit-container").html(
              "<p>Edytuj zaznaczony samochód</p><button type='button' class='edit btn btn-primary'>Edytuj</button>"
            );
    
          },
        });
      });
  $('.text-reset').attr("id", "");
    })