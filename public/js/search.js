 
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 

    $(document).ready(function(){
        $('#getRequest').click(function(){
            //alert($(this).text());
         //   $.get('getRequest',function(data){
         //     $('#getRequestData').append(data);
         //       console.log(data);
         //   });
      //  });

     $.ajax({
          type: "GET",
          url: "getRequest",
          success: function(data){
            console.log(data);
            $('#getRequestData').append(data);
          }
          });
      });

  $('#ragister').click(function(){
            var fname = $('#firstname').val();
            var lname = $('#lastname').val();
            //$.post('ragister', {firstname:fname, lastname:lname}, function(data){
            //    console.log(data);
            //    $('#postRequestData').html(data);
           // });

            var dataString = "firstname="+fname+"&lastname="+lname;
            $.ajax({
                type: "POST",
                url: "ragister",
                data: dataString,
                success: function(data){
                    $('#getRequestData').append(data);
                }
            });



        });

});

        function totalbandwidthresult() {
           alert("Hello! I am an alert box!!");
              var e = document.getElementById("getdatafromoption");
              var fname = e.options[e.selectedIndex].value;
                      //  var fname = $('#getdatafromoption').val();
           
            //$.post('ragister', {firstname:fname, lastname:lname}, function(data){
            //    console.log(data);
            //    $('#postRequestData').html(data);
           // });

            var dataString = "oprtion="+fname;
            $.ajax({
                type: "POST",
                url: "ragister",
                data: dataString,
                success: function(data){
                    $('#getRequestData').append(data);
                }
            });


    
        }


 

 