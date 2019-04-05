
$(document).ready(function (){
    $(".flex-container").click(function (){
        var id = $(this).data('bookingid');
        $("#modal-popup").css("visibility","visible");
        $("#flightId").val(id);
    });
    
    $("#confirm-booking").click(function(){
       var flightId = $("#flightId").val();
       if (flightId != null && flightId != ''){
           $.ajax({
               type: "GET",
               url: "index.php",
               data: flightId,
               success: function (response){
                   
               },
               error: function (message) {
                   
               }
           });
       }
    });
    
    $(".close-modal").click(function () {
        $("#modal-popup").css("visibility","hidden");
    });
});