(function($){

$(document).ready(function(){
  $(document).on('submit','[data-js-form=filter]', function(e){

    e.preventDefault(e);

    var data = $(this).serialize();

    //console.log(data);

    $.ajax({

      url: wpAjax.ajaxUrl,
      data: data,
      type: 'POST',

      success: function(result){
      $('[data-js-filter=target]').html(result);
    },

    error: function(result){
      console.warn(result);
    },


    });

  });
});

  $('#movie-start-date').datepicker({
        dateFormat : 'yymmdd'
    });
  $('#movie-end-date').datepicker({
        dateFormat : 'yymmdd'
    });


})(jQuery);
