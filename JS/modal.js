
$(document).ready(function (){
    $(".flex-container").click(function (){
        var id = $(this).data('ticketid');
        $("#modal-popup").css("visibility","visible");
        $("#ticketId").val(id);
    });
    
    $("#confirm-booking").click(function(){
       var ticketId = $("#ticketId").val();
       var message = '';
       if (ticketId != null && ticketId != ''){
           $.ajax({
               type: "GET",
               url: "index.php",
               data: ticketId,
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