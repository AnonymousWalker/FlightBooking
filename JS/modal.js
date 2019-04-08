
$(document).ready(function () {
    var modalVisibility = false;
    $(".flex-container").click(function () {
        var id = $(this).data('ticketid');
        $("#modal-popup").css("visibility", "visible");
        modalVisibility = true;
        $("#ticketId").val(id);
    });

    $("#confirm-booking").click(function () {
        var tId = $("#ticketId").val();
        if (tId != null && tId != '') {
            $.ajax({
                type: "GET",
                url: "myFlight.php",
                dataType: "json",
                data: {ticketId: tId},
                success: function (response) {
                    if (response.error == '0') {
                        alert(response.message);
                    } 
                    if (response.error == '1'){
                        window.location.replace(response.url);
                    }
                    if (response.error == '2'){
                        alert(response.message);
                    }
                },
                error: function (e) {
                    alert("An error has occured! Please try again later.");
                }
            });
        }
        $("#modal-popup").css("visibility", "hidden");
    });

    $(".close-modal").click(function () {
        $("#modal-popup").css("visibility", "hidden");
    });

//    $(document).click(function (e){
////        var popupModal = $("#modal-popup");
////        if (modalVisibility &&
////            !popupModal.is(e.target) && popupModal.has(e.target).length === 0) {
////            popupModal.css('visibility', 'hidden');
////        }
//        if (!$(event.target).closest("#modal-popup").length){
//            $("#modal-popup").css('visibility', 'hidden');
//        }
//    });

});