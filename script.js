$(function () {
  $("#submit").click(function(){
     var fd = new FormData();
     var files = $("#file")[0].files[0];
     var name = $("#name").val();
     var team = $("#team").val();
     fd.append('file',files);
     fd.append('name',name);
     fd.append('team',team);
     $.ajax({
          type: 'POST',
          url: 'process.php',
          data: fd,
          processData: false,
          contentType: false,
          success: function(data,status){
          if(data == "right")
            window.location.replace("admin.html");
          else
            alert(data);
          }
      });
  });
  $("#back").click(function(){
      window.location.replace("index.php");
  });
});