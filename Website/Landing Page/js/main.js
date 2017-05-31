$(document).ready(function(){
      
    $('.parallax').parallax();

    $(".button-collapse").sideNav();

	var combinaisonTouches = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
	n = 0;
	
	$(document).keydown(function (e) {
	    if (e.keyCode === combinaisonTouches[n++]) {
	        if (n === combinaisonTouches.length) {
	            alert("Bonjour cher internaute !");
	            n = 0;
	            return false;
	        }
	    }else {
	        n = 0;
	    }
	});

});