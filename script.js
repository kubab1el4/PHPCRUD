$(document).ready (function() {
    $(window).on('load',function(){$.ajax(
        {
        url: "display.php",
        success: function (result) {
            $("#screen").load("display.php");
    
        }})
        $('#screen').on('click', '.btn', function() {$.ajax(
            {
                type: "POST",
                url: "delete.php",
                data:  JSON.stringify({"id": event.target.id}),
                success: function( data){
                    $("#screen").load("display.php");
        }});
})
})
})
        
    
