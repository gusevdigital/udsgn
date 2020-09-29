(function($) {

  // Setup variables
  var navbar = $("#header-navbar nav");
  var navbarTextDefault = navbar.attr("data-menu-text-default");
  var sections = $("section[data-menu-bg]");
  var sectionsBg = [];
  var sectionsText = [];

  // Get sections background colors and text attributes

  if ($(sections).length) {
    $(sections).each(function() {
      if($(this).attr("data-menu-bg")) sectionsBg.push($(this).attr("data-menu-bg"));
      if($(this).attr("data-menu-text")) sectionsText.push($(this).attr("data-menu-text"));
    });
    if ($(sectionsBg).length) sectionsBg = sectionsBg.join(" ");
    if ($(sectionsText).length) sectionsText = sectionsText.join(" ");
  }

  // Check objects overlaping
  // Used to change menu color
  function isOverlap(idOne, idTwo) {
    var objOne = $(idOne),
      objTwo = $(idTwo),
      offsetOne = objOne.offset(),
      offsetTwo = objTwo.offset(),
      topOne = offsetOne.top,
      topTwo = offsetTwo.top,
      leftOne = offsetOne.left,
      leftTwo = offsetTwo.left,
      widthOne = objOne.width(),
      widthTwo = objTwo.width(),
      heightOne = objOne.height(),
      heightTwo = objTwo.height();
    var leftTop = leftTwo > leftOne && leftTwo < leftOne + widthOne && topTwo > topOne && topTwo < topOne + heightOne,
      rightTop = leftTwo + widthTwo > leftOne && leftTwo + widthTwo < leftOne + widthOne && topTwo > topOne && topTwo < topOne + heightOne,
      leftBottom = leftTwo > leftOne && leftTwo < leftOne + widthOne && topTwo + heightTwo > topOne && topTwo + heightTwo < topOne + heightOne,
      rightBottom = leftTwo + widthTwo > leftOne && leftTwo + widthTwo < leftOne + widthOne && topTwo + heightTwo > topOne && topTwo + heightTwo < topOne + heightOne;
    return leftTop || rightTop || leftBottom || rightBottom;
  }

  // Switch header style
  function navSwitchStyle() {
    $(sections).each(function() {
      if (isOverlap(this, navbar)) {
        menuBg = $(this).attr("data-menu-bg");
        menuText = $(this).attr("data-menu-text");
      }
    });

    if ($(navbar).offset().top > navbar.height() && menuBg && menuText) {
      $(navbar)
        .removeClass(sectionsBg)
        .removeClass(sectionsText)
        .addClass(menuBg)
        .addClass(menuText);
    } else {
      $(navbar)
        .removeClass(sectionsBg)
        .removeClass(sectionsText)
        .addClass(navbarTextDefault);
    }
  }

  // Make section fullscreen
  function sectionFullscreen() {
    if ($(window).width() >= 992) {
      $(".section-fullscreen").css("min-height", $(window).outerHeight());
    } else {
      $(".section-fullscreen").css("min-height", "0px");
    }
  }

  // Change nav style on scroll
  $(window).scroll(function() {
    navSwitchStyle();
  });

  // "on ready" functions
  $(document).ready(function() {

    // Change nav style on page load
    navSwitchStyle();

    // Make sections fullscreen
    sectionFullscreen();

  });

  // "on resize" functions
  $(window).resize(function() {

    // Make sections Fullscreen
    sectionFullscreen();

  });

  /*
   * ISOTOPE
   */

  // init Isotope
  if ($.fn.isotope) {
    var $container = $('.projects-items').isotope();
    // filter items on button click
    $('.projects-filter').on('click', 'a', function() {

      $this = $(this);
      var filterValue = $this.attr('data-filter');
      $container.isotope({
        filter: filterValue
      });
      $('.projects-filter a').removeClass('active');
      $this.addClass('active');
    });
  }
})(jQuery);
