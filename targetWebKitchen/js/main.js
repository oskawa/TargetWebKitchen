(function ($) {
   $('.explication').click(function () {
      console.log($(this))

      $(this).css('textDecoration', 'line-through')
      $(this).css('text-decoration-color', '#C69761')
   })

   $('.ingredient').click(function () {
      console.log($(this))
      $(this).toggleClass('changed')
      $(this).css('textDecoration', 'line-through')
   })


   var ham = $("button.hamburger");
   var menu = $(".mobile")
   var body = $("body")
   console.log(ham)
   console.log(menu)


   function toggleMenu() {
      if (menu.hasClass("showMenu")) {
         menu.removeClass("showMenu");
         ham.removeClass("is-active")
         body.removeClass("overflow-hidden");

      } else {
         menu.addClass("showMenu");
         ham.addClass("is-active hamburger--spring");
         body.addClass("overflow-hidden")
      }
   }
   ham.click(toggleMenu)





})(jQuery);
