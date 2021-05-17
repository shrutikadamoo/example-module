(function ($) {
    Drupal.behaviors.myModuleBehavior = {
      attach: function (context, settings) {
       
          alert('Hello, World!');
       
      }
    };
  })(jQuery);