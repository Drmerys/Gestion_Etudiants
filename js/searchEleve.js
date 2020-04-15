$(document).ready(function(){

	$("#inputSearchEleves").keyup(function(){
		    
        _this = this;
        $.each($(".donneesEleves"), function() {
            
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
              
               $(this).hide();

            else

               $(this).show();                
    }); 

	});
	
});