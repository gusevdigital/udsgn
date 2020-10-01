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
      if ($(this).attr("data-menu-bg")) sectionsBg.push($(this).attr("data-menu-bg"));
      if ($(this).attr("data-menu-text")) sectionsText.push($(this).attr("data-menu-text"));
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

  /*
   * IMAGES LAZY LOAD
   */
  $(function() {
    $('.lazy').Lazy();
  });


  /*
   * FORM VALIDATION
   */
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  if (form = $("form[name='contact-form']").length) {
    name_error_required = $("[name = 'cName']").attr('data-error-required');
    name_error_length = $("[name = 'cName']").attr('data-error-length');
    email_error_required = $("[name = 'cEmail']").attr('data-error-required');
    email_error_valid = $("[name = 'cEmail']").attr('data-error-valid');
    subject_error_required = $("[name = 'cSubject']").attr('data-error-required');
    subject_error_length = $("[name = 'cSubject']").attr('data-error-length');
    message_error_required = $("[name = 'cMessage']").attr('data-error-required');
    message_error_length = $("[name = 'cMessage']").attr('data-error-length');
    $("form[name='contact-form']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        cName: {
          required: true,
          minlength: 2
        },
        cSubject: {
          required: true,
          minlength: 2
        },
        cEmail: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        cMessage: {
          required: true,
          minlength: 5
        }
      },
      // Specify validation error messages
      messages: {
        cName: {
          required: name_error_required,
          minlength: jQuery.validator.format(name_error_length)
        },
        cSubject: {
          required: subject_error_required,
          minlength: jQuery.validator.format(subject_error_length)
        },
        cEmail: {
          required: email_error_required,
          email: email_error_valid
        },
        cMessage: {
          required: message_error_required,
          minlength: jQuery.validator.format(message_error_length)
        }
      },
      errorClass: "is-invalid",
      validClass: "is-valid",
      errorPlacement: function(error, element) {
        error.appendTo(element.parent(".form-group").find(".invalid-feedback"));
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  }
})(jQuery);
