;(function(){

			// Menu settings
			$('#menuToggle, .menu-close').on('click', function(){
				$('#menuToggle').toggleClass('active');
				$('body').toggleClass('body-push-toleft');
				$('#theMenu').toggleClass('menu-open');
			});


			//upload without entering
			
    		$("#file-input").on("change",function() {
     			$("#myForm").submit();
    		});
		


})(jQuery)