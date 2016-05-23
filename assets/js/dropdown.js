  (function ($) {
      $.fn.menuAim = function (opts) {
          // Initialize menu-aim for all elements in jQuery collection
          this.each(function () {
              init.call(this, opts);
          });
          return this;
      };
      function init(opts) {
          var $menu = $(this),
                  activeRow = null,
                  mouseLocs = [],
                  lastDelayLoc = null,
                  timeoutId = null,
                  options = $.extend({
                      rowSelector: "> li",
                      submenuSelector: "*",
                      submenuDirection: "right",
                      tolerance: 75,  // bigger = more forgivey when entering submenu
                      enter: $.noop,
                      exit: $.noop,
                      activate: $.noop,
                      deactivate: $.noop,
                      exitMenu: $.noop
                  }, opts);
          var MOUSE_LOCS_TRACKED = 3,  // number of past mouse locations to track
                  DELAY = 300;  // ms delay when user appears to be entering submenu
          var mousemoveDocument = function (e) {
              mouseLocs.push({x: e.pageX, y: e.pageY});
              if (mouseLocs.length > MOUSE_LOCS_TRACKED) {
                  mouseLocs.shift();
              }
          };
          var mouseleaveMenu = function () {
              if (timeoutId) {
                  clearTimeout(timeoutId);
              }
              if (options.exitMenu(this)) {
                  if (activeRow) {
                      options.deactivate(activeRow);
                  }
                  activeRow = null;
              }
          };
          var mouseenterRow = function () {
                      if (timeoutId) {
                          // Cancel any previous activation delays
                          clearTimeout(timeoutId);
                      }
                      options.enter(this);
                      possiblyActivate(this);
                  },
                  mouseleaveRow = function () {
                      options.exit(this);
                  };
          var clickRow = function () {
              activate(this);
          };
          var activate = function (row) {
              if (row == activeRow) {
                  return;
              }
              if (activeRow) {
                  options.deactivate(activeRow);
              }
              options.activate(row);
              activeRow = row;
          };
          var possiblyActivate = function (row) {
              var delay = activationDelay();
              if (delay) {
                  timeoutId = setTimeout(function () {
                      possiblyActivate(row);
                  }, delay);
              } else {
                  activate(row);
              }
          };
          var activationDelay = function () {
              if (!activeRow || !$(activeRow).is(options.submenuSelector)) {
                  return 0;
              }
              var offset = $menu.offset(),
                      upperLeft = {
                          x: offset.left,
                          y: offset.top - options.tolerance
                      },
                      upperRight = {
                          x: offset.left + $menu.outerWidth(),
                          y: upperLeft.y
                      },
                      lowerLeft = {
                          x: offset.left,
                          y: offset.top + $menu.outerHeight() + options.tolerance
                      },
                      lowerRight = {
                          x: offset.left + $menu.outerWidth(),
                          y: lowerLeft.y
                      },
                      loc = mouseLocs[mouseLocs.length - 1],
                      prevLoc = mouseLocs[0];
              if (!loc) {
               return 0;
              }
              if (!prevLoc) {
                  prevLoc = loc;
              }
              if (prevLoc.x < offset.left || prevLoc.x > lowerRight.x ||
                      prevLoc.y < offset.top || prevLoc.y > lowerRight.y) {
                  return 0;
              }
              if (lastDelayLoc &&
                      loc.x == lastDelayLoc.x && loc.y == lastDelayLoc.y) {
                  return 0;
              }
              function slope(a, b) {
                  return (b.y - a.y) / (b.x - a.x);
              }
              ;
              var decreasingCorner = upperRight,
                      increasingCorner = lowerRight;
              if (options.submenuDirection == "left") {
                  decreasingCorner = lowerLeft;
                  increasingCorner = upperLeft;
              } else if (options.submenuDirection == "below") {
                  decreasingCorner = lowerRight;
                  increasingCorner = lowerLeft;
              } else if (options.submenuDirection == "above") {
                  decreasingCorner = upperLeft;
                  increasingCorner = upperRight;
              }
              var decreasingSlope = slope(loc, decreasingCorner),
                      increasingSlope = slope(loc, increasingCorner),
                      prevDecreasingSlope = slope(prevLoc, decreasingCorner),
                      prevIncreasingSlope = slope(prevLoc, increasingCorner);
              if (decreasingSlope < prevDecreasingSlope &&
                      increasingSlope > prevIncreasingSlope) {
                  lastDelayLoc = loc;
                  return DELAY;
              }
              lastDelayLoc = null;
              return 0;
          };
          $menu
                  .mouseleave(mouseleaveMenu)
                  .find(options.rowSelector)
                  .mouseenter(mouseenterRow)
                  .mouseleave(mouseleaveRow)
                  .click(clickRow);
          $(document).mousemove(mousemoveDocument);
      }
      ;
  })(jQuery);
    $(document).ready(function() {
            //fix height of global menu's sub categories
            $('.gm-sc-cntnr').css('min-height',$('#dropDownbox1').height() - 5);
            //fix width of global menu's sub categories
            $.each($('.gm-sc-cntnr'), function(){
                var self = $(this);
                var subCatCount = self.find('.grid_4').length; // provide count of how many vertical row are there in sub cat
                var multiplier = self.find('.grid_4:first').width(); // width of first vertical row
                var padParam = subCatCount * 32; // used to take into consideration paddings and margins
                self.width( (subCatCount * multiplier) + padParam);
            });
        $('.gm-mc-nm').click(function(event){
            var curRef = $(this),
                    curPrnt = $(this).parents('.gm-mc:first'),
                    trgt = curPrnt.find('.gm-sc-cntnr');
            if(trgt.is(':visible')){
            } else {
                event.preventDefault();
                curPrnt.trigger('mouseenter');
            }
        });
      /*Dropdown js */
        $('#dropDownButton').bind("mouseenter click",function(event) {
            //deactivateSubmenu($("#dropDownbox1").find('.maintainHover').parents('.gm-mc'));
            if(event.type=='click' && $("#dropDownbox1").is(':visible')){
                $('#dropDownButton').trigger("mouseleave");
                return;
            }
            $("#dropDownbox1").css("display", "block");
            //$("#dropDownButton").addClass("menu-hdr-hover");
            $(".icn-dwn-cs2").addClass("icn-dwn-cs-hover");
        });
        $('#dropDownButton').mouseleave(function() {
            $("#dropDownbox1").css("display", "none");
            $(".icn-dwn-cs2").removeClass("icn-dwn-cs-hover");
        });
        $('#dropDownbox1').hover(function() {
        $("#dropDownbox1").css("display", "block");
        //$("#dropDownButton").addClass("menu-hdr-hover");
        $(".icn-dwn-cs2").addClass("icn-dwn-cs-hover");
      },
          function() {
            $("#dropDownbox1").css("display", "none");
            $(".gm-sc-cntnr").css("display", "none");
            $(".maintainHover").removeClass("maintainHover");
            $(".icn-dwn-cs2").removeClass("icn-dwn-cs-hover");
          }
          );
      $('.gm-mc').mouseover(function(e) {
        var ele = e.currentTarget;
        setTimeout(function() {
          if ($('.gm-sc-cntnr:visible').length == 0 && $(ele).find('a').attr('href') == $('.gm-mc:hover').find('a').attr('href')) {
            $(ele).find('.gm-sc-cntnr').show();
            console.log('in');
          }
        }, 200);
      });
      var $menu = $(".gm");
      $menu.mouseleave(function() {
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
        $submenu.find('.grid_4:last').css('border-right', 'none');
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
          $submenu.find('.grid_4').each(function(){getMaxHeight($(this))});
      //  maxHeight = 'auto';
        if(maxHeight>100){
            $submenu.find('.grid_4').height(maxHeight);
        }
        function getMaxHeight(ref){
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
      // Bootstrap's dropdown menus immediately close on document click.
      // Don't let this event close the menu if a submenu is being clicked.
      // This event propagation control doesn't belong in the menu-aim plugin
      // itself because the plugin is agnostic to bootstrap.
      $(".gm li").click(function(e) {
        e.stopPropagation();
      });
    });
