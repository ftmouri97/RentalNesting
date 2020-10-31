$(function(){
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   check_notification();
    
  

});
function check_notification()
{
    $.ajax({
        processData:false,
        contentType:false,
        type:'GET',
        url:"check_notification",
        success:function(data){
            
          $("#notification_count").html(data);
         
        }
    })
}

