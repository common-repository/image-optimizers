( function( $ ) {
  $(window).on('load', function() {
      imop_main_body_class();
      imop_page_name_as_class();
  });
  /**
    * Body Class
    * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
    * Date       : 19.04.2020
    */
  function imop_main_body_class(){
      $('body').addClass('imop');
      $('body').addClass('imop-desktop-device');
      
  }

    /**
    * Page Name
    * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
    * Date       : 19.04.2020
    */
  function imop_page_name_as_class() {
      var pageCurrentUrl = window.location.href;
      var removeDomainSegment = pageCurrentUrl.substr(pageCurrentUrl.lastIndexOf('/') + 1);
      var lastSegment = removeDomainSegment.split('.').slice(0, -1).join('.')
      $('.imop-wrapper').addClass('imop-page-'+lastSegment);
  }
  /**
    * Save Setting Data
    * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
    * Date       : 19.04.2020
    */
 $('#imop_save_setting').on('click', function () {
    var nonce = $('#security_imop').val();
    var serialized_data = $('#imop_form :input[name][name!="security"]').serialize();
    $('#imop_form :input[type=checkbox]').each(function() {     
        if (!this.checked) {
            serialized_data += '&'+this.name+'=0';
        }
    });
    var data = {
      type: 'save_imop_setting',
      action: 'imop_setting_action',
      security: nonce,
      data: serialized_data
    };
    $.post(ajaxurl, data, function (response) {
      if (response == 1) {
       notifyMessage('Option Updated', 'success', 'fa fa-check');
      } else if(response == -1) {
        notifyMessage('Nonce is invalid or Something wrong, try again!', 'danger', 'fa fa-times-circle');
      }else {
        notifyMessage('Something wrong, try again!', 'warning', 'fa fa-warning');
      }
    });
    return false;
  });
} )( jQuery );
  /**
  * Notify Message Show Function
  * Dependencies   : jquery
  * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
  * Date       : 19.04.2020
  */
function notifyMessage(message,messageType,icon) {
  jQuery.notify(
    {
      // options
      title: messageType.charAt(0).toUpperCase() + messageType.slice(1),
      message: "<br>" + message,
      icon: icon,
      target: "_blank",

    },
    {
      // settings
      element: "body",
      type: messageType,
      showProgressbar: false,
      placement: {
        from: "top",
        align: "right"
      },
      offset: {
        x:25,
        y:50
      },
      spacing: 10,
      z_index: 1031,
      delay: 3300,
      timer: 1000,
      allow_dismiss: true,
      newest_on_top: false,
      mouse_over: 'pause',
      url_target: "_blank",
      mouse_over: null,
      animate: {
        enter: "animated fadeInDown",
        exit: "animated lightSpeedOut"
      },
      onShow: null,
      onShown: null,
      onClose: null,
      onClosed: null,
      icon_type: "class",
      beforeOpen : function() {
        alert('A notice will be presented.');
      },
    }
  );
};
