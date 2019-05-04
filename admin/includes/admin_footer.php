  <br>     
               <br>     
               <br>     
               <br>     
               <br>     
               <br>    
                <br>     
               <br>     
                 
             
        
              <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2p" >
    
    <div class="container">
        <p class="text-sm-center">Copyright (c) 2018<!-- NxtGenMove.com--> - All Rights Reserved | Powered By JK <a href="license.txt" class="text-white">License</a></p>
    </div>
</footer>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

           
           
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
           <!--  check all javascript  -->
           <script>
$(document).ready(function(){
     
     $('#SelectAllBox').click(function(event){
         if(this.checked){
             $('.checkBoxes').each(function(){
                 this.checked = true;
             });
         }else {
             $('.checkBoxes').each(function(){
                 this.checked = false;
             });
         }
         
     });
 });


</script>
           <!--  user online ajax javascript  --> 
           <script>

function loadUserOnline(){
    
    $.get("function.php?onlineuser=result", function(data){
        $(".useronline").text(data);
    }); 
}
 setInterval(function(){
            
            loadUserOnline();
            },500);
               

</script>
            
            
</body>

</html>