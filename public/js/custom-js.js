// $(document).ready(function(){
//    $(".videoView .vjs-control-bar .vjs-button").click(


//    ).attr("wire:click", "saveTimePlay")
// });
jQuery(document).ready(function(){
   jQuery('.videoView .vjs-control-bar .vjs-button').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
      jQuery.ajax({
         url: "/insertaudiotimeplay",
         method: 'post',
         data: {
            audioid: 1,
            currenttime: 1,
            lenghttime: 1
         },
         success: function(result){
            jQuery('.alert').show();
            jQuery('.alert').html(result.success);
         }});
      });
   });

