/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function txt_click(d) {
  jQuery(".tab-pane1").hide('fast');
  jQuery("#" + d).slideDown('fast');
}


jQuery(document).on("click","#vdo_id",function()
{
  console.log(jQuery("#_token").val());
  var settings = {
    url: "/uploadify/uploadify.php",
//      url: "/upload",
    dragDrop: true,
    fileName: "Filedata",
    multiple: true,
//    autoSubmit: false,
    allowedTypes: "jpg,png,gif,doc,pdf,zip",
    returnType: "json",
    formData: {
      'timestamp':jQuery("#timestamp").val(),
      'token'     : jQuery("#hash").val(),
      '_token'     : jQuery("#_token").val(),
      'path'     : jQuery("#path").val(),
      'type'     : 'video',
    },
    onSuccess: function(files, data, xhr)
    {
      // alert((data));
    },
    showDelete: true,
    deleteCallback: function(data, pd)
    {
      for (var i = 0; i < data.length; i++)
      {
        jQuery.post("delete.php", {op: "delete", name: data[i]},
        function(resp, textStatus, jqXHR)
        {
          //Show Message
          jQuery("#status").append("<div>File Deleted</div>");
        });
      }
      pd.statusbar.hide(); //You choice to hide/not.

    }
  }
  var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);



});

//jQuery(document).on("submit", "#video_frm", function(event) {
//  alert(1);
////  jQuery('#video_url').uploadify('upload','*');
//});