$(function(){
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    readData();
    view_notification();
    
  

});
function readData() {
    
    $.ajax({
        processData:false,
        contentType:false,
        type:'GET',
        url:"get_all_booking",
        success:function(data){
            
          $("#booking_list_table").html(data);
         
        }
    })
}

function show_apartment_details(id)
{  
    var formdata = new FormData();
    formdata.append('id',id);
     $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:'post',
    url:"show_apartment_details",
    success:function(data){
        
      $("#appartment_details").html(data);
      $("#booking_list_details_model").modal('show');

    }
})

}
function view_notification()
{
    $.ajax({
        processData:false,
        contentType:false,
        type:'GET',
        url:"get_notification",
        success:function(data){
            
          $("#notification_list").html(data);
         
        }
    })
}

function cancel_booking(id)
{
    var formdata = new FormData();
    formdata.append('id',id);
    var conf = confirm("Are you sure?");
    if(conf)
    {
     $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:'post',
    url:"cancel_booking",
    success:function(data){
        
        readData();

    }
})
    }
}