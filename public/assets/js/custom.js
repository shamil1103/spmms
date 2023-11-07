
// for active menu
(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {

            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });



        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });
	
	

    // For Active menu/href/Class
    $(document).ready(function () {
        var url = window.location.href;
        
		$('#main-menu ul li a').each(function () {
            if (url == this.href) {
                $(this).parent().addClass("active");
            }else{
				$(this).parent().removeClass("active");
			}
			
        });
		
     });
	 
	 //or
	 
	 // var url = window.location;
    // var element = $('ul.nav a').filter(function() {
        // return this.href == url || url.href.indexOf(this.href) == 0;
    // }).addClass('active').parent().parent().addClass('in').parent();
    // if (element.is('li')) {
        // element.addClass('active');
    // }

}(jQuery));



// for tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

// modal
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})