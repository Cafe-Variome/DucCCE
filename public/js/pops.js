/** pop.js
 * Author: Umar Riaz
 * This file hanling all the popups for the input
 */
 (function ($) {
    $(document).ready(function () {
      $('[data-toggle="popover"]').popover();
  
      $("#p_id").popover({
        title: "Profile Id",
        content: "Please enter profile id.",
        placement: "top",
        trigger: "hover",
        container: "body",
      });
    })
})