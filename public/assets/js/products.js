/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function()
  {
    var settings = jQuery("#zipProductImagesuploader").uploadFile({
      url: "/uploadify/zipUploader.php",
      method: "POST",
      allowedTypes: "zip",
      fileName: "Filedata",
      multiple: false,
      autoSubmit: false,
//      showStatusAfterSuccess: false,
      maxFileSize: 1024 * 10000000000,
      formData: {
        'timestamp': jQuery("#timestamp").val(),
        'token': jQuery("#hash").val(),
        '_token': jQuery("#_token").val(),
        'path': jQuery("#path").val(),
        's_id': jQuery("#s_id").val(),
        'type': 'theme',
        'o_h': jQuery("#oldhash").val(),
      },
      onSubmit: function(files)
      {
//        $("#theme_te").html($("#theme_te").html() + "<br/>Submitting:" + JSON.stringify(files));
      },
      onSuccess: function(files, data, xhr)
      {
        var res = jQuery.parseJSON(data);
        $("#theme_te").html($("#theme_te").html() + "<br/>" + res['msg']);
        jQuery("#theme_path").attr('value', res.view_theme_folder); //set uploaded image name
        if(res['response']==1){
          var resp_data = res['tdata'];
          jQuery("#theme_name").attr('value', resp_data.name);
          jQuery("#theme_image").attr('value', resp_data.image);
          jQuery("#main_page").attr('value', resp_data.main_page);
          jQuery("#view_path").attr('value', resp_data.view_theme_folder);
          jQuery("#h_t_f").attr('value', resp_data.hash_theme_folder);
          jQuery('#theme_frm').submit();
        }
      },
      afterUploadAll: function()
      {
//        jQuery('#theme_frm').submit();
      },
      onError: function(files, status, errMsg)
      {
        jQuery("#status").html("<font color='green'>Something Wrong</font>");
      }
    });
    jQuery('#theme_frm').click(function() {

      settings.startUpload();
//      var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
//      if (has_file > 0) {
//      } else {
//        jQuery('#theme_frm').submit();
//      }
    });
  });
