$(document).ready(function () {
    $('.text-reset').attr("id", "")
    var addclass = 'bg-success';
var $cols = $('.rekord').on('click', function(e) {
    $cols.removeClass(addclass);
    $(this).toggleClass(addclass);
    $('.text-reset').attr("id", $(this).attr("id"))
  });
    const floatingPoint =
      "**Proszę, wypełnij to pole danymi odpowiedniego typu (Number/ Floating Point)";
    jQuery.extend(jQuery.expr[":"], {
      invalid: function (elem, index, match) {
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
    $(window).on("load", function () {
      $.ajax({
        url: "display.php",
        success: function (result) {
          $("#screen").load("display.php");
        },
      });
    });
    $(".edit-container").off("click");
    $(".edit-container").on("click", ".edit", function () {
        if($('.stopka').attr('id')!=0){
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: JSON.stringify({ id: $('.stopka').attr('id')}),
            success: function (data) {
                $("#screen").html(data);
            },
          });
        
          $(".return").html(
            "<p>Powrót do listy aut</p><button type='button' class='back btn btn-dark'>Powrót</button>"
          );
          $(".add-container").html(
            "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
          );
          $(".edit-container").html(
            ""
          );
          $(".text-muted").html(
            "ID wybranego samochodu to "+$('.stopka').attr('id')
          );
          $(".text-muted").attr(
            "id",$('.stopka').attr('id')
          );
        }else{$(".text-muted").html(
            "Nie wybrano samochodu, kliknij na rekord aby wybrać"
        )}
      });
    $("#screen").on("click", ".delete", function () {
      $.ajax({
        type: "POST",
        url: "delete-action.php",
        data: JSON.stringify({ id: event.target.id }),
        success: function (data) {
          $("#screen").load("display.php");
        },
      });
    });
    $(".add-container").on("click", ".add", function () {
      {
        $("#screen").load("add.php");
        $(".return").html(
          "<p>Powrót do listy aut</p><button type='button' class='back btn btn-dark'>Powrót</button>"
        );
        $(".edit-container").html(
            ""
          );
        $("#screen").load("add.php");
        $(".text-muted").html(
            ""
          );
        $(".add-container").html("");
      }
    });
    $(".return").off("click");
    $(".return").on("click", ".back", function () {
        if(confirm(
          "Wprowadzone dane zostaną utracone, czy jesteś pewien/pewna?"
        )){
    
          $("#screen").load("display.php");
          $(".return").html("");
          $(".edit-container").html(
            "<p>Edytuj zaznaczony samochód</p><button type='button' class='edit btn btn-primary'>Edytuj</button>"
          );
          $(".add-container").html(
            "<p>Dodaj nowy samochód</p><button type='button' class='add btn btn-dark'>Dodaj</button>"
          );
          $(".text-muted").html(
            "Kliknij na rekord aby zaznaczyć go do edycji"
          );
          }else{return false;}
      });
    document.addEventListener(
      "invalid",
      (function () {
        return function (e) {
          e.preventDefault();
        };
      })(),
      true
    );
    $("form").on("click", ".send", function () {
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
  
      let regex2 = /^[-+]?([0-9]+(\.[0-9]+)?|\.[0-9]+)$/;
      let pattern = $("#SKU").pattern;
      let regex = new RegExp("/${pattern}/gm");
  
      if ($("#SKU").is(":invalid")) {
        $("#skucheck").css("display", "block");
        $("#skucheck").text("**Please, fill in the SKU.");
        let bla = $("#SKU").val();
        if (!regex.test(bla) && bla.length != 0) {
          $("#skucheck").text(
            "**This SKU is already in the database, please input another SKU."
          );
        }
      } else {
        $("#skucheck").css("display", "none");
      }
  
      showNameMessage("name");
  
      showNumberMessage("max_speed");
  
      showNameMessage("engine");
  
      showNumberMessage("mass");
  
      showNumberMessage("price");
    });
    $("#cars").off('submit');
    $("#cars").on("submit", function (e) {
        $(".text-muted").html(
            "Kliknij na rekord aby zaznaczyć go do edycji"
          );
        function getFormData($form){
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};
        
            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });
        
            return indexed_array;
        }
        var formData = JSON.stringify(getFormData($("#cars")));
      $.ajax({
        type: "POST",
        url: "create-action.php",
        data: formData,
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
    $("#editcars").off('submit');
    $("#editcars").on("submit", function (e) {
        $(".text-muted").html(
            "Kliknij na rekord aby zaznaczyć go do edycji"
          );
        function getFormData($form){
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};
        
            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });
        
            return indexed_array;
        }
        var formData = JSON.stringify(getFormData($("#editcars")));
        var formData2 = JSON.stringify(parseInt($('.text-muted').attr('id')));
      $.ajax({
        type: "POST",
        url: "edit-action.php",
        data: {formData, formData2},
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
})
    


        
    
