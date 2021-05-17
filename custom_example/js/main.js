(function ($) {
    Drupal.behaviors.myModuleBehavior = {
      attach: function (context, settings) {
        //This loads on every ajax call use .once() for loading only once
          console.log('Hello, In JS, I load on each ajax call!');
       
      }
    };
  })(jQuery);