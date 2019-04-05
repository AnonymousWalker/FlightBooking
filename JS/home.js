$(document).ready(function () {
    $(".account-btn").click(function () {
        $(".account-popup").css('visibility','visible');
    });
    
    $(document).mouseup(function (e){
       var popupMenu = $(".account-popup");
       if (!popupMenu.is(e.target) && popupMenu.has(e.target).length === 0){
           popupMenu.css('visibility','hidden');
       }
    });
    
    
});

<<<<<<< HEAD
$("#log-out-btn").on('click',function (){
    $.ajax({
        type: 'GET',
        url: 'index.php',
        data: 'logout',
        success: function(result) {
            location.reload();
        }
    });
=======
>>>>>>> parent of bd57003... signup with validation
});