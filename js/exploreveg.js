(function () {
     var $ = jQuery;

     var modalHTML = '<div class="modal fade">'
+ '  <div class="modal-dialog">'
+ '    <div class="modal-content">'
+ '      <div class="modal-header">'
+ '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
+ '        <h3 id="response-header"></h3>'
+ '      </div>'
+ '      <div class="modal-body">'
+ '        <p id="response-text"></p>'
+ '      </div>'
+ '      <div class="modal-footer">'
+ '        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
+ '      </div>'
+ '    </div>'
+ '  </div>'
+ '</div>';

     var instrumentWPCF7Form = function (id, addModal) {
         var marker = $( "#" + id );
         if ( ! marker.length ) {
             return;
         }

         var container = marker.parent().parent();
         var form = container.find("form");

         form.find(".wpcf7-response-output").detach();

         form.find('input[type="radio"]').parent().parent().wrap($('<div class="radio">'));

         var modal = $( "#" + id + "-modal" );
         if (!modal.length && addModal) {
             modal = $(modalHTML);
             form.append(modal);
         }

         var displayModal = function (title) {
             modal.find("h3").text(title);

             var response = $.parseJSON( form.data("jqxhr").responseText );

             modal.find(".modal-body").children().detach();
             modal.find(".modal-body").append( '<p>' + response.message + '</p>' );
             modal.modal("show");
         };

         var submit = form.find('input[type="submit"]');
         if ( ! submit.length ) {
             submit = form.find('button[type="submit"]');
         }

         submit.attr( "data-loading-text", "Submitting ..." );
         form.submit(
             function () {
                 submit.button("loading");
                 return true;
             }
         );

         if (modal.length) {
             container.on(
                 "mailsent.wpcf7",
                 function () {
                     displayModal("Success!");
                     submit.button("reset");
                 }
             ).on(
                 "invalid.wpcf7",
                 function () {
                     submit.button("reset");
                 }
             ).on(
                 "mailfailed.wpcf7",
                 function () {
                     displayModal("Error");
                     submit.button("reset");
                 }
             );
         }
     };

     var lightboxifyImages = function () {
         var x = 1;
         $('article img[class*="wp-image-"]').each(
             function () {
                 if ( $(this).hasClass("wp-post-image") ) {
                     return;
                 }

                 var link = $(this).parent();
                 var full_image = link.attr("href");
                 if ( ! full_image ) {
                     return;
                 }

                 if ( ! full_image.match(/(?:png|jpe?g|gif)$/) ) {
                     return;
                 }

                 var caption;
                 if ( link.parent().is("figure") ) {
                     caption = link.parent().find("figcaption").contents().clone();
                 }

                 var lb = $("<div/>");
                 lb.addClass("lightbox fade");
                 lb.attr( "id", "auto-lightbox-" + x++ )
                   .attr( "tabindex", "-1" )
                   .attr( "role", "dialog" )
                   .attr( "aria-hidden", "true" );

                 var lb_dialog = $("<div/>");
                 lb_dialog.addClass("lightbox-dialog");

                 var lb_content = $("<div/>");
                 lb_content.addClass("lightbox-content");

                 var lb_img = $("<img/>");
                 lb_img.attr( "src", full_image );

                 lb.append(lb_dialog);
                 lb_dialog.append(lb_content);
                 lb_content.append(lb_img);

                 if (caption) {
                     lb_content.append( $('<div class="lightbox-caption"/>').append(caption) );
                 }

                 lb.insertAfter(link);

                 link.click(
                     function () {
                         lb.lightbox();
                         return false;
                     }
                 );

                 if ( $(this).hasClass("alignright") ) {
                     $(this).removeClass("alignright");
                     link.addClass("thumbnail alignright");
                 }
             }
         );
     };

     $(document).ready(
         function () {
             $("#front-page-photos").carousel( { interval: false } );

//             instrumentWPCF7Form("announce-subscribe");
             $('#announce-subscribe input[name="your-email"]').attr( "placeholder", "Email" );

//             instrumentWPCF7Form("veg-pledge", false);

//             instrumentWPCF7Form("speaker-submission");

//             instrumentWPCF7Form("sponsor-info");

//             instrumentWPCF7Form("exhibitor-application");

             lightboxifyImages();
         }
     );

     $(document).bind(
         'em_maps_location_hook',
         function (e, map, infowindow, marker) {
             var address = $("#google-map-address").text().replace(/,\s+(?:,|$)/g, "");
             if ( address && address.length ) {
                 var url = "https://maps.google.com/maps?q=" + encodeURIComponent(address);
                 $("#location-map").append('<a href="' + url + '">View this location on Google Maps</a>');
             }
         }
     );
})();
