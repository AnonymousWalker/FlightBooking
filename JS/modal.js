
$(document).ready(function (){
    $(".flex-container").click(function (){
        var id = $(this).data('ticketid');
        $("#modal-popup").css("visibility","visible");
        $("#ticketId").val(id);
    });
    
    $("#confirm-booking").click(function(){
       var tId = $("#ticketId").val();
       var message = '';
       if (tId != null && tId != ''){
           $.ajax({
               type: "GET",
               url: "index.php",
               data: { ticketId: tId },
               success: function (){
                   message = "Successfully booked";
               },
               error: function () {
                   message = "An error has occured! Please try again later.";
               }
           });
       }
       $("#modal-popup").css("visibility","hidden");
       if (message != '') {
           alert(message);
       }
    });
    
    $(".close-modal").click(function () {
        $("#modal-popup").css("visibility","hidden");
    });
});