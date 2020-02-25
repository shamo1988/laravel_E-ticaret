    jQuery(document).ready(function(){
  
    $("#divsil .f").each(function() {
var id=jQuery(this).find(".sil").attr("id");
   

       $(".divurun button").each(function() {   
  
          if(jQuery(this).attr("id")==id){
              
  jQuery(this).removeClass("btn btn-primary gonder");
           jQuery(this).addClass("btn btn-danger s");
           if(location.pathname=='/aze'){
            jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Səbətdədir");
            }
            else if(location.pathname=='/tr'){
                jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Sepete Eklenmiş");
                }
                else if(location.pathname=='/en'){
                    jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Added");
                    }       
                     jQuery(this).prop("disabled",true);
              
              jQuery(this).parent(".divurun").find(".increase").prop("disabled",true);
            jQuery(this).parent(".divurun").find(".decrease").prop("disabled",true);
              
              
              
          }
   
   });
      });
      
 
        
        
  });
       var text=0;
   $(".info .fiyat2").each(function() {   
          text+=parseFloat($(this).text());  

       $("#toplam").text(text);
      });    

    
         jQuery('#goster2').click(function(){
          jQuery('#gizle').slideToggle(500);
         });
    
         $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});


    jQuery('.gonder').on("click",function(){
        
        
   var dataid=jQuery(this).attr("id");
   var dataadet=jQuery(this).parent(".divurun").find(".number").val();
   var datafiyat=jQuery(this).parent(".divurun").find(".fiyat").html();
   var dataresim=jQuery(this).parent(".divurun").find('.urunresim').attr('src');
   var datadil= location.pathname;
   
            jQuery(this).parent(".divurun").find(".increase").prop("disabled",true);
            jQuery(this).parent(".divurun").find(".decrease").prop("disabled",true);


jQuery(this).removeClass("btn btn-primary gonder");
           jQuery(this).addClass("btn btn-danger s");

           if(location.pathname=='/aze'){
            jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Səbətdədir");
            }
            else if(location.pathname=='/tr'){
                jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Sepetde");
                }
                else if(location.pathname=='/en'){
                    jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Added");
                    }


           jQuery(this).prop("disabled",true);
        
        var urun=jQuery("#goster").text();
         urun++;
        

       jQuery.ajax({
       type: 'post',
       data: {dataid:dataid,dataadet:dataadet,datafiyat:datafiyat,dataresim:dataresim,datadil:datadil},
                    dataType: 'json',

       url:'ajax',
       success: function(response) {
           jQuery("#goster").html(urun);
          jQuery('#gizle').html(response);

    jQuery("#tema").show().fadeOut(1000);


       },
              
          statusCode:{
              
              404:function(){
                  
                  alert("yoxdu sehife");
                  
                  
              }
          }   
         })
   
   
    });

        jQuery('.sil').click(function(){
   
           
                      
            
           var dataid=jQuery(this).attr("id");
           jQuery(this).parent().parent().parent().hide(200);
            jQuery(this).parent().parent().find(".fiyat2").text(0);
            
           var text2=0;
            
            
             $(".info .fiyat2").each(function() {   
          text2+=parseFloat($(this).text());  

       $("#toplam").text(text2);
      });    
            
            
            var saytext=jQuery("#goster").text();
            var say=parseInt(saytext);
                      say--;
jQuery("#goster").text(say);

                    if( say==0  ){
           jQuery('.silall').hide();
           if(location.pathname=='/aze'){

               jQuery('#gizle').html("<br><div align='center'> Səbət boşdur </div><br>");
           }
            if(location.pathname=='/tr'){

            jQuery('#gizle').html("<br><div align='center'> Sepet boş </div><br>");
        }
        if(location.pathname=='/en'){

            jQuery('#gizle').html("<br><div align='center'> Empty cart </div><br>");
        }
          jQuery('#gizle').fadeOut();
            }
        

            
      $(".divurun button").each(function() {   
          if(jQuery(this).attr("id")==dataid){
jQuery(this).removeClass("btn btn-danger s");
         jQuery(this).addClass("btn btn-primary gonder");
         if(location.pathname=='/aze'){
           jQuery(this).html("Səbətə at");
         }
         if(location.pathname=='/tr'){
            jQuery(this).html("Sepete at");
          }
          if(location.pathname=='/en'){
            jQuery(this).html("Add to cart");
          }
              jQuery(this).prop("disabled",false);
              
                jQuery(this).parent(".divurun").find(".increase").prop("disabled",false);
            jQuery(this).parent(".divurun").find(".decrease").prop("disabled",false);
              
              
              
          }
      });
        
            
        
          jQuery.ajax({
       type: 'post',
       data: {dataid:dataid},
       dataType: 'json',
              url:'sil',
       success: function(result) {
        jQuery("#tema2").html(result.ok);
           jQuery("#tema2").show().fadeOut(1000);

       },
              
          statusCode:{
              
              404:function(){
                  
                  alert("yoxdu sehife");
                  
                  
              }
          }   
         })
   
   
    });
 
   


$('.gonder').on('click', function () {
       var cart = $('#sebeticon');
       var imgtodrag = $(this).parent('.divurun').find("img").eq(0);
       if (imgtodrag) {
           var imgclone = imgtodrag.clone()
               .offset({
               top: imgtodrag.offset().top,
               left: imgtodrag.offset().left
           })
               .css({
               'opacity': '0.5',
                   'position': 'absolute',
                   'height': '150px',
                   'width': '150px',
                   'z-index': '100'
           })
               .appendTo($('body'))
               .animate({
               'top': cart.offset().top + 10,
                   'left': cart.offset().left + 10,
                   'width': 75,
                   'height': 75
           }, 1000, 'easeInOutExpo');

         

           imgclone.animate({
               'width': 0,
                   'height': 0
           }, function () {
               $(this).detach()
           });
       }
   });

    
   jQuery('.increase').click(function(){
       
var number=jQuery(this).parent("label").find(".number").val();
   
                      number++;


jQuery(this).parent("label").find(".number").val(number); 
       var val=jQuery(this).parent("label").find(".number").val();     

       
      var fiyat=jQuery(this).parent("label").parent(".divurun").find(".fiyat").attr("id");     
   
      var vurma= (parseFloat(fiyat)*parseFloat(val)).toFixed(2);

 jQuery(this).parent("label").parent(".divurun").find(".fiyat").html(vurma);
       
              jQuery(this).parent("label").parent(".divurun").find(".gonder").prop("disabled",false);  

   });
    

      jQuery('.decrease').click(function(){
       var text=0;
              $(".info .fiyat2").each(function() {   
          text+=parseFloat($(this).text());  

       $("#toplam").html(text);
      });
          
          
          
       var number=jQuery(this).parent("label").find(".number").val();
   
  
       number--;
                if(number!=0 || number>0){
jQuery(this).parent("label").find(".number").val(number);
     var val=jQuery(this).parent("label").find(".number").val();     
       var fiyatesas=jQuery(this).parent("label").parent(".divurun").find(".fiyat").attr("id");     

      var bolme= (parseFloat(fiyatesas)*parseFloat(val)).toFixed(2);

 jQuery(this).parent("label").parent(".divurun").find(".fiyat").html(bolme);
       }
       else{
           jQuery(this).parent("label").find(".number").val(1);     
           jQuery(this).parent(".divurun").find(".gonder").prop("disabled",true);     

           
       }
       
   });
    
    
    
    
    jQuery('.increase2').click(function(){
       
         
  
        
var number=jQuery(this).parent("label").find(".number2").val();
   
                      number++;


jQuery(this).parent("label").find(".number2").val(number); 
       var val=jQuery(this).parent("label").find(".number2").val();     

       
      var fiyat=jQuery(this).parent("label").parent(".info").find(".fiyat2").attr("id");     
   
      var vurma= (parseFloat(fiyat)*parseFloat(val)).toFixed(2);

 jQuery(this).parent("label").parent(".info").find(".fiyat2").html(vurma);
       var text2=0;
        
         $(".info .fiyat2").each(function() {   
          text2+=parseFloat($(this).text());  

       $("#toplam").text(text2);
      }); 
        
       
        
   });
    

      jQuery('.decrease2').click(function(){
       
       var number=jQuery(this).parent("label").find(".number2").val();
   
  
       number--;
                if(number!=0 || number>0){
jQuery(this).parent("label").find(".number2").val(number);
     var val=jQuery(this).parent("label").find(".number2").val();     
       var fiyatesas=jQuery(this).parent("label").parent(".info").find(".fiyat2").attr("id");     

      var bolme= (parseFloat(fiyatesas)*parseFloat(val)).toFixed(2);

 jQuery(this).parent("label").parent(".info").find(".fiyat2").html(bolme);
                       var text2=0;
        
         $(".info .fiyat2").each(function() {   
          text2+=parseFloat($(this).text());  

       $("#toplam").text(text2);
      }); 
        
       }
       else{
           jQuery(this).parent("label").find(".number2").val(1);     

           
       }
       
   });
    
   jQuery('.silall').click(function(){
    $("#toplam,#satinal").hide();

   jQuery.ajax({
type: 'post',
       url:'all',
success: function(result) {
                            location.reload();

},
       
   statusCode:{
       
       404:function(){
           
           alert("yoxdu sehife");
           
           
       }
   }   
  })


});

