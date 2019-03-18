// ESCONDER MENU BAR
$("#banner").hide();
// fade in .navbar
$(function () {

    if ($(window).width() > 1024) {
      $(window).scroll(function () {
        // set distance user needs to scroll before we start fadeIn
        if ($(this).scrollTop() > 680) {
            $('#banner').fadeIn();
        } else {
            $('#banner').fadeOut();
        }
      });
    } else if ($(window).width() < 1024 && $(window).width() < 720) {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 580) {
            $('#banner').fadeIn();
        } else {
            $('#banner').fadeOut();
        }
      });
    } else {
      $(window).scroll(function () {
        // set distance user needs to scroll before we start fadeIn
        if ($(this).scrollTop() > 480) {
            $('#banner').fadeIn();
        } else {
            $('#banner').fadeOut();
        }
      });
    }

    /* $(document).ready(function(){
    var banner = $("#meunav");
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= banner.height()) {
        $("#meubanner").fadeOut();
      } else {
        $("meubanner").fadeIn();
      }
    }); */
  
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
    $(this).removeClass("active");
    }
    $(this).addClass("active");

    
});

(function($) {
    "use strict";
  
    //* Form js
    function verificationForm() {
      //jQuery time
      var current_fs, next_fs, previous_fs; //fieldsets
      var left, opacity, scale; //fieldset properties which we will animate
      var animating; //flag to prevent quick multi-click glitches
  
      $(".next").click(function() {
        if (animating) return false;
        animating = true;
  
        current_fs = $(this).parent();
        next_fs = $(this)
          .parent()
          .next();
  
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li")
          .eq($("fieldset").index(next_fs))
          .addClass("active");
  
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
          {
            opacity: 0
          },
          {
            step: function(now, mx) {
              //as the opacity of current_fs reduces to 0 - stored in "now"
              //1. scale current_fs down to 80%
              scale = 1 - (1 - now) * 0.2;
              //2. bring next_fs from the right(50%)
              left = now * 50 + "%";
              //3. increase opacity of next_fs to 1 as it moves in
              opacity = 1 - now;
              current_fs.css({
                transform: "scale(" + scale + ")",
                position: "absolute"
              });
              next_fs.css({
                left: left,
                opacity: opacity
              });
            },
            duration: 800,
            complete: function() {
              current_fs.hide();
              animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack"
          }
        );
      });
  
      $(".previous").click(function() {
        if (animating) return false;
        animating = true;
  
        current_fs = $(this).parent();
        previous_fs = $(this)
          .parent()
          .prev();
  
        //de-activate current step on progressbar
        $("#progressbar li")
          .eq($("fieldset").index(current_fs))
          .removeClass("active");
  
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
          {
            opacity: 0
          },
          {
            step: function(now, mx) {
              //as the opacity of current_fs reduces to 0 - stored in "now"
              //1. scale previous_fs from 80% to 100%
              scale = 0.8 + (1 - now) * 0.2;
              //2. take current_fs to the right(50%) - from 0%
              left = (1 - now) * 50 + "%";
              //3. increase opacity of previous_fs to 1 as it moves in
              opacity = 1 - now;
              current_fs.css({
                left: left
              });
              previous_fs.css({
                transform: "scale(" + scale + ")",
                opacity: opacity
              });
            },
            duration: 800,
            complete: function() {
              current_fs.hide();
              animating = false;
            },
            //this comes from the custom easing plugin
            easing: "easeInOutBack"
          }
        );
      });
  
      $(".submit").click(function() {
        return false;
      });
    }
   
    verificationForm();
  })(jQuery);
  
  $(document).ready(function() {
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
		var $form = $(this).closest('form'),
            $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
            
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
		}else if($group.data('validate') == 'phone') {
			state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length >= $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'glyphicon glyphicon-ok');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'glyphicon glyphicon-remove');
		}
        
        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="button"]').prop('disabled', false);
        }else{
            $form.find('[type="button"]').prop('disabled', true);
        }
	});
    
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
    
});

  