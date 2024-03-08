$(document).ready(function(){
    //Admin login submit alert
      $('body').on('submit','#information',function(e){
        e.preventDefault();
    
        $.ajax({
        url: $(this).attr('action'),
        method:"POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData: false,
        success: function(data){
            if (data.status == 200) {
               Swal.fire({
                icon: "success",
                title: data.msg,
                text: "Thanks",
                timer: 1500,
              });
  
              window.reload();
            }else{
              Swal.fire({
                icon: "error",
                title: data.msg,
                text: "Thanks",
                timer: 1500,
              });
            }
         }
    })
    })
      $('body').on('submit','#userorder',function(e){
        e.preventDefault();
    
        $.ajax({
        url: $(this).attr('action'),
        method:"POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData: false,
        success: function(data){
            if (data.status == 200) {
               Swal.fire({
                icon: "success",
                title: data.msg,
                text: "Thanks",
                timer: 1500,
              });
  
              window.reload();
            }else{
              Swal.fire({
                icon: "error",
                title: data.msg,
                text: "Thanks",
                timer: 1500,
              });
            }
         }
    })
    })

    
        })