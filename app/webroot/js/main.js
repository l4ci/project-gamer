/**
 * Description: main js file
 * Version: 1.0.0
 * Last update: 2014/07/13
 * Author: Volker Otto <hello@volkerotto.net>
 *
 */

$(document).ready(function () {


  // not needed anymore - using modernizr
  //$('html').removeClass('no-js');


  /**
   * HTML5 Placeholder Fallback
   */
  // if (!Modernizr.input.placeholder) {
  //   // no placeholder support :(
  //   // fall back to a scripted solution
  //   var fields = document.getElementsByTagName('input');
  //   for(var i=0; i < fields.length; i++) {
  //     if(fields[i].hasAttribute('placeholder')) {
  //       fields[i].defaultValue = fields[i].getAttribute('placeholder');
  //       fields[i].onfocus = function() {
  //         if(this.value === this.defaultValue){
  //           this.value = '';
  //         }
  //       };
  //       fields[i].onblur = function() {
  //         if(this.value === '') {
  //           this.value = this.defaultValue;
  //         }
  //       };
  //     }
  //   }
  // }


  /* ==========================================================================
     PASSWORD HELPER
     Add a passwort/text toggle button to all .password-helper input elements
     ========================================================================== */

  $('.password-helper').after('<span class="password-helper-span">Show</span>');

  $('.password-helper-span').on('click',function(){
    var $this = $(this);
    var $pw = $this.prev('input');

    if ('password' === $pw.attr('type')){
      $pw.attr('type', 'text');
    }else{
      $pw.attr('type', 'password');
    }

    if ('Hide' === $this.text()){
      $this.text('Show');
    }else{
      $this.text('Hide');
    }

    $pw.focus();
  });



  /* ==========================================================================
     OVERLAY

     - fixed-overlay is added to body
     - .overlay with #id are hidden
     - open overlay with normal href="#id" and class="js-open-overlay" on a link
     - .overlay#id is then copied into .fixed-overlay -> becomes visible
     - original .overlay#id position is saved as #ghost
     - on close -> #ghost gets back the .fixed-overlay#id, that way all entered data is preserved!
     ========================================================================== */

    // All HTML
    var overlayhtml = [];
        overlayhtml.overlay = '<div class="fixed-overlay"></div>';
        overlayhtml.closebutton = '<button class="btn close-overlay"><i class="fa fa-times"></i></button>';

    // Create Overlay
    $('body').prepend(overlayhtml.overlay);
    // Create Close Buttons
    $('.overlay__closebutton').prepend(overlayhtml.closebutton);

    var overlay = $('.fixed-overlay');
    var hash = window.location.hash;


    function closeOverlay(hide){
      hide = typeof hide !== 'undefined' ? hide : true;

      // find open id
      var id = overlay.find('.overlay').attr('id');
      $('#'+id).insertAfter('#ghost');
      // remove ghost_
      //$('#ghost').attr('id',id);
      $('#ghost').remove();
      // remove overlay content
      overlay.empty();

      if (hide){
       // hide overlay
        overlay.removeClass('active');
        // enable page scrolling
        $('body').removeClass('stop-scrolling')
                .unbind('touchmove');
      }
      // remove hash
      window.location.hash = "";
    }


    function openOverlay(id){

      var target = $('#'+id);

      // close existing overlays
      closeOverlay(false);

      // id exists?
      if (target.length){

        // clone content
        /*target.clone()
              .attr("id","ghost_"+id)
              .insertAfter(target);
        */
        var ghost = $('<div class="overlay" id="ghost"></div>');
        ghost.insertAfter(target);

        // append content
        target.appendTo('.fixed-overlay');

        // show overlay
        overlay.addClass('active');
        // create hash
        window.location.hash = id;
        // prevent scrolling
        $('body').addClass('stop-scrolling')
                  .bind('touchmove', function(e){
                    e.preventDefault();
                  });

      }else{
        console.log('Overlay with id:' + id + ' - not found!');
      }
    }

    // Close on direct overlay click
    overlay.on('click',function(e){
      if(e.target === this){
        closeOverlay();
      }
    });

    // Close on ESC
    $(document).keyup(function(event){
        if(event.which === '27'){
          closeOverlay();
        }
      });

    // Close with button
    overlay.on('click','.js-close-overlay',function(e){
      closeOverlay();
      e.preventDefault();
    });

    // Open overlay by link
    $('body').on('click','.js-open-overlay',function(e){
      openOverlay($(this).attr('href').substring(1));
      e.preventDefault();
    });

    // Open overlay by hash
    if( $(hash).hasClass('overlay') ){
      // remove leading # and open overlay
      openOverlay(hash.substring(1));
    }

  /**
   * NOTIFICATIONS OPENER
   */

  $('.dropdown > a').on('click',function(e){
    // close all
    $('a.js-dropdown--active').not(this).removeClass('js-dropdown--active');
    // toggle current
    $(this).toggleClass('js-dropdown--active');

    e.preventDefault();
  });


  /**
   * FORM MESSAGE CLOSE BUTTON
   */
  $('.form-msg').append('<div class="js-close-form-msg form-msg-close"><i class="fa fa-times"></i></div>');
  $('.form-msg').on('click','.js-close-form-msg',function(e){
    $(this).closest('.form-msg').fadeOut();
    e.preventDefault();
  });

  /**
   * BUBBLE CLOSE BUTTON
   */
  $('.bubble .container').append('<div class="js-close-bubble bubble-close"><i class="fa fa-times"></i></div>');
  $('.bubble').on('click','.js-close-bubble',function(e){
    $(this).closest('.bubble').slideUp();
    e.preventDefault();
  });


  /* ==========================================================================
     ONLINE NETWORK CHECKER
     ========================================================================== */

  function isOnline(){
    $('.client-status').attr('class', 'client-status online')
                        .attr('title','You are online.')
                        .text(' Online');
  }
  function isOffline(){
    $('.client-status').attr('class', 'client-status offline')
                       .attr('title','You are offline.')
                       .text(' Offline');
  }
  // Startup Checker
  if (navigator.onLine){
    isOnline();
  } else {
    isOffline();
  }

  // Check on Change
  if (window.addEventListener) {
        /*
            Works well in Firefox and Opera with the
            Work Offline option in the File menu.
            Pulling the ethernet cable doesn't seem to trigger it.
            Later Google Chrome and Safari seem to trigger it well
        */
    window.addEventListener("online", isOnline, false);
    window.addEventListener("offline", isOffline, false);
  } else {
    /*
      Works in IE with the Work Offline option in the
      File menu and pulling the ethernet cable
    */
    document.body.ononline = isOnline;
    document.body.onoffline = isOffline;
  }

}); // closing document.ready function
