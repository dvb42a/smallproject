<script>
   
   document.getElementById("blah").style.display = "none";
    function readURL(input) {
           if (input.files[0]) {
               var reader = new FileReader();
               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result)
                       .width(433)
                       .height(243);
               };
               reader.readAsDataURL(input.files[0]);
               document.getElementById("blah").style.display = "block";
           }
       }
   </script>