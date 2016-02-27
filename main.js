$(document).ready(function() { 
    
    $("#cancelBtn").click(function () {
        alert("cancel successful"); 
        $('#submitBtn').hide();
    })
    
    $("#submitBtn").click(function () {
        if($("#inputEmail").val().length==0) {
          alert("Please fill in your email"); 
        }
    })
});

