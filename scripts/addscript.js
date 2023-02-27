$(document).ready(function() {
    var $cars = $("#cars");
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
      $cars.off('submit');
      $cars.on("submit", function(e) {
        $textMuted.html(
          "Kliknij na rekord aby zaznaczyć go do edycji"
        );
    
        function getFormData($form) {
          var unindexed_array = $form.serializeArray();
          var indexed_array = {};
    
          $.map(unindexed_array, function(n, i) {
            indexed_array[n['name']] = n['value'];
          });
    
          return indexed_array;
        }
        var formData = JSON.stringify(getFormData($cars));
        $.ajax({
          type: "POST",
          url: "create-action.php",
          data: formData,
          success: function(data) {
            $screen.load("display.php");
            $addContainer.html(
              "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
            );
            $return.html("");
            $editContainter.html(
              "<p>Edytuj zaznaczony samochód</p><button type='button' class='edit btn btn-primary'>Edytuj</button>"
            );
          },
        });
      });
    })