<div style="clear:both;"></div>
<footer>
   
   <div style="bottom:0px;left:20%; left:0;" align="center"><p style="color:red; font-weight:bold;  text-align:center; " class="container col-md-12 col-lg-12">ⒸCreated by <a href="https://www.facebook.com/Shamo.Hasanov">Shamo Hasanov</a></p></div>
 </footer>

   </div>
   <script src="{{ url('js/indexajax.js') }}"></script>
   <script src="{{ url('js/jquery.dd.min.js') }}"></script>

   <script >
   $(document).ready(function(){
       $('#dil').change(function(){
       if($(this).val()=="aze"){
           window.location.href = '/aze';
       }
      else if($(this).val()=="tr"){
           window.location.href = '/tr';
       }
       else if($(this).val()=="en"){
           window.location.href = '/en';
       }
       });
   });

       </script>

<script>
   $(document).ready(function() {
   $("#dil").msDropdown();
   })
   </script>

</body>
</html>