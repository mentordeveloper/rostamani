/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function()
{
    var settings = jQuery("#resourcemultiplefileuploader").uploadFile({
        url: "/uploadify/resourceUploader.php",
        method: "POST",
        allowedTypes: "jpg,png,gif,JPEG,JPG,PNG,GIF,flv,mp3,mp4,FLV,MP3,MP4,doc,docx,txt,DOC,DOCX,TXT,pdf,PDF",
        fileName: "Filedata",
        multiple: true,
//        maxFileCount: 1,
        autoSubmit: false,
        showStatusAfterSuccess: false,
        maxFileSize: 1024 * 1000000,
//            maxFileSize: jQuery("#image_size").val(),
        formData: {
            'timestamp': jQuery("#timestamp").val(),
            'token': jQuery("#hash").val(),
            '_token': jQuery("#_token").val(),
            'path': jQuery("#path").val(),
            's_id': jQuery("#s_id").val(),
            'type': 'resource',
            'o_h': jQuery("#oldhash").val(),
        },
        onSubmit: function(files)
        {
//        $("#resource_te").html($("#resource_te").html() + "<br/>Submitting:" + JSON.stringify(files));
        },
        onSuccess: function(files, data, xhr)
        {

            var res = jQuery.parseJSON(data);
            $("#resource_te").html($("#resource_te").html() + "<br/>" + res['msg']);
            jQuery("#theme_path").attr('value', res.view_theme_folder); //set uploaded image name
            if (res['response'] == 1) {
                var resp_data = res['tdata'];
                var type = res['type'];
                jQuery("#view_path").attr('value', resp_data); //set uploaded image name
                jQuery("#r_type").attr('value', type); //set uploaded image name
           }
        },
        afterUploadAll: function()
        {
            jQuery('#resource_frm').submit();
//        $("#resource_te").html('all file uploaded');
            
        },
        onError: function(files, status, errMsg)
        {
            jQuery("#status").html("<font color='green'>Something Wrong</font>");
        }
    });
    jQuery('#resource_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
//            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
        var has_file = jQuery(".ajax-file-upload-filename").length //check if there files need upload
//      if (validate) {
        if (has_file > 0) {
            settings.startUpload();
        } else {
            jQuery('#resource_frm').submit();
        }
//      }
    });
});

