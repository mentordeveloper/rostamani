/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var value = 0
jQuery(".left").rotate({ 
   bind: 
     { 
        click: function(){
            value +=90;
            console.log(value);
            $("#v_file").rotate({ animateTo:value});
            var angle = 90;
            rotateImage(angle);
        }
     } 
   
});


jQuery(".right").rotate({ 
   bind: 
     { 
        click: function(){
            value -=90;
            console.log(value);
            $("#v_file").rotate({ animateTo:value});
            var angle = -90;
            rotateImage(angle);
        }
     } 
   
});


jQuery(".left_content").rotate({ 
   bind: 
     { 
        click: function(){
            var id = jQuery(this).data('id');
            var lvalue = $("#v_file_"+id).data('value');
            console.log(lvalue);
            
            lvalue +=90;
            $("#v_file_"+id).data('value',lvalue);
            console.log(lvalue);
            $("#v_file_"+id).rotate({ animateTo:lvalue});
            var angle = 90;
            rotateImageContent(angle,id);
        }
     } 
   
});
jQuery(".rotate_content").rotate({ 
   bind: 
     { 
        click: function(){
            var id = jQuery(this).data('id');
            var lvalue = $("#v_file_"+id).data('value');
            console.log(lvalue);
            
            lvalue +=90;
            $("#v_file_"+id).data('value',lvalue);
            console.log(lvalue);
            $("#v_file_"+id).rotate({ animateTo:lvalue});
            var angle = 90;
            rotateImageContent(angle,id);
        }
     } 
   
});


jQuery(".right_content").rotate({ 
   bind: 
     { 
        click: function(){
            
            var id = jQuery(this).data('id');
            var lvalue = $("#v_file_"+id).data('value');
            console.log(lvalue);
            
            lvalue -=90;
            
            $("#v_file_"+id).data('value',lvalue);
            console.log(lvalue);
            $("#v_file_"+id).rotate({ animateTo:lvalue});
            var angle = -90;
            rotateImageContent(angle,id);
        }
     } 
   
});
function rotateImage(val){
    console.log("Angle: "+val);
    console.log("Href: "+window.location.href.toString());
    $.ajax({
        "type": "POST",
        "url":  window.location.href.toString(),
        "data": {"rotate" : val},
        "dataType": "json"
    }).done(function(result) 
    { 
        jQuery("#e_im_ro").hide();
        jQuery("#s_im_ro").hide();
      if(result==1){
          jQuery("#s_msg").html('Image Save Successfully.');
          jQuery("#s_im_ro").show();

      }else{

          jQuery("#e_msg").html('Error Occured. Image Not save successfully.');
          jQuery("#e_im_ro").show();
      }  
    });
}

function rotateImageContent(val,id){
//    var id = jQuery(this).data('id');
//    var id = id;
    var value = $("#v_file_"+id).data('value');
    console.log("imv: "+id);
    console.log("Angle: "+value);
    console.log("Href: "+window.location.href.toString());
    $.ajax({
        "type": "POST",
        "url":  "/file/view/"+id,//window.location.href.toString()+"../../",
        "data": {"rotate" : val},
        "dataType": "json"
    }).done(function(result) 
    { 
        jQuery("#e_im_ro").hide();
        jQuery("#s_im_ro").hide();
      if(result==1){
          jQuery("#s_msg").html('Image Save Successfully.');
          jQuery("#s_im_ro").show();

      }else{

          jQuery("#e_msg").html('Error Occured. Image Not save successfully.');
          jQuery("#e_im_ro").show();
      }  
    });

    return false;
}

jQuery(document).on('click', '#save_image', function() 
{
        console.log("Angle: "+value);
        console.log("Href: "+window.location.href.toString());
        $.ajax({
            "type": "POST",
            "url":  window.location.href.toString(),
            "data": {"rotate" : value},
            "dataType": "json"
        }).done(function(result) 
        { 
            jQuery("#e_im_ro").hide();
            jQuery("#s_im_ro").hide();
          if(result==1){
              jQuery("#s_msg").html('Image Save Successfully.');
              jQuery("#s_im_ro").show();
              
          }else{
              
              jQuery("#e_msg").html('Error Occured. Image Not save successfully.');
              jQuery("#e_im_ro").show();
          }  
        });
        
        return false;
    });
    
jQuery(document).on('click', '#save_image_content', function() 
{
        var id = jQuery(this).data('id');
        var value = $("#v_file_"+id).data('value');
        console.log("imv: "+id);
        console.log("Angle: "+value);
        console.log("Href: "+window.location.href.toString());
        $.ajax({
            "type": "POST",
            "url":  "/file/view/"+id,//window.location.href.toString()+"../../",
            "data": {"rotate" : value},
            "dataType": "json"
        }).done(function(result) 
        { 
            jQuery("#e_im_ro").hide();
            jQuery("#s_im_ro").hide();
          if(result==1){
              jQuery("#s_msg").html('Image Save Successfully.');
              jQuery("#s_im_ro").show();
              
          }else{
              
              jQuery("#e_msg").html('Error Occured. Image Not save successfully.');
              jQuery("#e_im_ro").show();
          }  
        });
        
        return false;
    });
    