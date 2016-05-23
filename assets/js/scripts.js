// Slider Script Start //
$(function() {
				var demo1 = $("#demo1").slippry({
					transition: 'fade',
					useCSS: true,
					speed: 1000,
					pause: 3000,
					auto: true,
					preload: 'visible'
				});
			});
// Slider Script End //
			
// Menu Script Start //			
$(document).ready(function () {


  /*menu begins*/

  $('#dropDownbox1 .gm-mc-nm').click(function (event) {
    var curRef = $(this),
        curPrnt = $(this).parents('.gm-mc:first'),
        trgt = curPrnt.find('.gm-sc-cntnr');
    if (trgt.is(':visible')) {

    } else {
      event.preventDefault();
      curPrnt.trigger('mouseenter');
    }
  });
  /*Dropdown js */
  $('#dropDownButton').on("mouseenter click", function (event) {
    //deactivateSubmenu($("#dropDownbox1").find('.maintainHover').parents('.gm-mc'));
    if (event.type == 'click' && $("#dropDownbox1").is(':visible')) {
      $('#dropDownButton').trigger("mouseleave");
      return;
    }
    $("#dropDownbox1").css("display", "block");
    //$("#dropDownButton").addClass("menu-hdr-hover");
    $(".icn-dwn-cs2").addClass("icn-dwn-cs-hover");
  });

  $('#dropDownButton').mouseleave(function () {
    $("#dropDownbox1").css("display", "none");
    $(".icn-dwn-cs2").removeClass("icn-dwn-cs-hover");
  });

  $('#dropDownbox1').hover(function () {
        $("#dropDownbox1").css("display", "block");
        //$("#dropDownButton").addClass("menu-hdr-hover");
        $(".icn-dwn-cs2").addClass("icn-dwn-cs-hover");
      },
      function () {
        $("#dropDownbox1").css("display", "none");
        $(".gm-sc-cntnr").css("display", "none");
        $(".maintainHover").removeClass("maintainHover");

        $(".icn-dwn-cs2").removeClass("icn-dwn-cs-hover");
      }
  );

  $('.gm-mc').mouseover(function (e) {
    var ele = e.currentTarget;
    setTimeout(function () {

      if ($('.gm-sc-cntnr:visible').length == 0 && $(ele).find('a').attr('href') == $('.gm-mc:hover').find('a').attr('href')) {
        $(ele).find('.gm-sc-cntnr').show();
        /*console.log('in');*/
      }
    }, 200);

  });


  var $menu = $(".gm");
  $menu.mouseleave(function () {
    $('.gm-sc-cntnr:visible').hide();
  });
  // jQuery-menu-aim: <meaningful part of the example>
  // Hook up events to be fired on menu row activation.
  $menu.menuAim({
    activate: activateSubmenu,
    deactivate: deactivateSubmenu
  });
  // jQuery-menu-aim: </meaningful part of the example>

  // jQuery-menu-aim: the following JS is used to show and hide the submenu
  // contents. Again, this can be done in any number of ways. jQuery-menu-aim
  // doesn't care how you do this, it just fires the activate and deactivate
  // events at the right times so you know when to show and hide your submenus.
  function activateSubmenu(row) {
    var $row = $(row),
        $submenu = $row.find('.gm-sc-cntnr')
    height = $menu.outerHeight(),
        width = $menu.outerWidth();
    var maxHeight = 0;
    $submenu.find('.span3:last').css('border-right', 'none');
    $row.find('.gm-sc-cntnr').css('font-weight', 'bold');
    // Show the submenu
    $submenu.css({
      display: "block",
      top: -5,
      left: width - 3

    });

    // Keep the currently activated row's highlighted look
    $row.find("a").addClass("maintainHover");

    //Fix vertical line height

    $submenu.find('.span3').each(function () {
      getMaxHeight($(this))
    });
    //  maxHeight = 'auto';
    if (maxHeight > 100) {
      $submenu.find('.span3').height(maxHeight);
    }

    function getMaxHeight(ref) {
      maxHeight = (maxHeight < ref.height()) ? ref.height() : maxHeight;
    }


  }

  function deactivateSubmenu(row) {
    var $row = $(row),
        submenuId = $row.data("submenuId"),
        $submenu = $row.find('.gm-sc-cntnr');

    // Hide the submenu and remove the row's highlighted look
    $submenu.css("display", "none");
    $row.find("a").removeClass("maintainHover");
  }




  function goToTop() {
    $(window).scroll(function (e) {
      if ($(window).scrollTop() > 100) {
        $('.go-to-top-cntnr').css({
          position: 'fixed',
          top: '90%',
          right: '10px'
        }).fadeIn(300);
      } else {
        $('.go-to-top-cntnr').fadeOut(500);
      }
    });
  }

  goToTop();
  
});

// Menu Script End //


// FlexiCarousel Script Start //
$(document).ready(function () {
        $('#dropDownButton').off();
        $('#dropDownbox1').off();
        $("#flexiCarousel-0").flexisel({noOfItemsToScroll: 4, visibleItems:4, animationSpeed: 300});
        $("#flexiCarousel-1").flexisel({noOfItemsToScroll: 4, visibleItems:4, animationSpeed: 300});
});
// FlexiCarousel Script End //



// Menu //


