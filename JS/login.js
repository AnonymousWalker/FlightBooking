$(document).ready(function (){
   $("#signup-form").submit(function (e){
       var uname = $("[name='username']").val();
       var pw = $("[name='password']").val();
       var fname = $("[name='firstname']").val();
       var lname = $("[name='lastname']").val();
       var email = $("[name='email']").val();
       var addr = $("[name='address']").val();
       if (uname == '' || pw == '' || fname == '' || lname == ''){
           e.preventDefault();
           alert("Invalid input field(s), please try again!");
//           $(".error-message").text("Invalid input field(s), please try again!");
       }
   })
});