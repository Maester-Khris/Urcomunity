$(document).ready(function() {

   $(".accept-req").click(function(event){
       event.preventDefault();
       let det = $(this).closest("div.request-details");
       let event_title = det.find("span").text();
       let _token = $('meta[name="csrf-token"]').attr('content');
       let data = {
         titre:event_title,
         statut:1,
         _token: _token
      };
      mypostrequest(data);
      $(this).parents("div.request-details").hide("slow");
      // showdefaultmessage();
   });

   $(".close-req").click(function(event){
       event.preventDefault();
       let det = $(this).closest("div.request-details");
       let event_title = det.find("span").text();
       let _token = $('meta[name="csrf-token"]').attr('content');
       let data = {
         titre:event_title,
         statut:0,
         _token: _token
      };
      mypostrequest(data);
      $(this).parents("div.request-details").hide("slow");
      // showdefaultmessage();
   });

   function mypostrequest(data){
      $.ajax({
        url: "/valider-evenement",
        type:"POST",
        data:data,
        success:function(response){
           if(response) {
             console.log(response)
           }
        },
        error: function(error) {
         console.log(error);
        }
       });
   }

   function showdefaultmessage(){
      console.log("enter");
      var count = $("div.requests-list div.request-details").length;
      console.log(count);
      if(count == 0){
         $template = $('template div:first-child').clone();
         $("div.requests-list.").prepend($template);
      }
   }

});
