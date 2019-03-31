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