//logout
$(function(){
var logout=$("#logout");
logout.click(function(){
    window.location.href="log.html";
    session_unset();
    session_destroy();
    
});
 
    
});



    

