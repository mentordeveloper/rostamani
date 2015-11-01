<?php
$timestamp = time();
$hash = md5('unique_salt' . $timestamp);
$csrf_token = csrf_token();
$sch_id = '';
?>
<script type="text/javascript">
    function txt_click(d) {
        jQuery(".tab-pane1").hide('fast');
        jQuery("#" + d).slideDown('fast');
    }
    
        jQuery(document).ready(function()
    {
        jQuery(document).on('click', "#tab-capture .nav-nav-pills a",function() {
            jQuery('#show_icon').removeClass('showicons');
        });
        if(jQuery("#status_action").length){
            jQuery("#status_action").focus();
            console.log("if status focus");
        }
    });


//  jQuery(document).on("click", "#img_id", function()
    jQuery(document).ready(function()
    {
        var settings = jQuery("#imgmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "jpg,png,gif,JPEG,JPG,PNG,GIF",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 1000,
            maxFileSize: jQuery("#image_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'image',
                'o_h': jQuery("#oldhash").val(),
            },
            onSubmit: function(files)
            {
//        $("#img_te").html($("#img_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                jQuery("#img_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//        $("#img_te").html('all file uploaded');
                jQuery('#img_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#img_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
//            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
            var has_file = jQuery(".ajax-file-upload-filename").length //check if there files need upload
//      if (validate) {
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#img_frm').submit();
            }
//      }
        });
    });

//   jQuery(document).on("click", "#vdo_id", function()
    jQuery(document).ready(function()
    {
        var settings = jQuery("#vidmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "flv,mp3,mp4",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 10000,
            maxFileSize: jQuery("#video_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'video',
                'o_h': jQuery("#oldhash").val(),
            },
            onSubmit: function(files)
            {
//        $("#img_te").html($("#img_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                jQuery("#vid_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//          $("#img_te").html('all file uploaded');
                jQuery('#video_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#vid_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
//            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
            var has_file = jQuery(".ajax-file-upload-filename").length //check if there files need upload
//      if (validate) {
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#video_frm').submit();
            }
//      }
        });
    });

    
    jQuery(document).ready(function()
    {
        var settings = jQuery("#docmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "doc,docx,txt,pdf,PDF,TXT,DOCX,DOC",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
            showStatusAfterSuccess: true,
//            maxFileSize: 1024 * 1000,
            maxFileSize: jQuery("#doc_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'doc',
                'o_h': jQuery("#oldhash").val(),
            },
            onSubmit: function(files)
            {
//        $("#doc_te").html($("#doc_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                $("#doc_te").html("<font color='green'>Files upload and adding them in page.</font>");
                jQuery("#doc_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//          $("#doc_te").html('all file uploaded');
                jQuery('#doc_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#doc_submit').click(function() {

//            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
            var has_file = jQuery(".ajax-file-upload-filename").length //check if there files need upload

            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#doc_frm').submit();
            }

        });
    });


    jQuery(document).on("click", "#vdo_id123", function()
    {
        console.log(jQuery("#_token").val());
        var settings = {
            url: "/uploadify/uploadify.php",
//      url: "/upload",
            dragDrop: true,
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
//    autoSubmit: false,
            allowedTypes: "jpg,png,gif,doc,pdf,zip",
            returnType: "json",
            maxFileSize: jQuery("#video_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'video',
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



    jQuery(document).on("click", "#img_id1", function()
    {
        jQuery("#image_uploader_div").html('');
        jQuery("#image_uploader_div").html('<div id="imgmulitplefileuploader">Upload</div>');
        var settings = jQuery("#imgmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "jpg,png,gif,JPEG,JPG,PNG,GIF",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 10000,
            maxFileSize: jQuery("#image_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'image',
            },
            onSubmit: function(files)
            {
//        $("#img_te").html($("#img_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                jQuery("#img_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//        $("#img_te").html('all file uploaded');
                jQuery('#img_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#img_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
//      if (validate) {
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#img_frm').submit();
            }
//      }
        });
    });
    jQuery(document).on("click", "#vdo_id4", function()
    {
        jQuery("#video_uploader_div").html('');
        jQuery("#video_uploader_div").html('<div id="vidmulitplefileuploader">Upload</div>');
        var settings = jQuery("#vidmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "flv,mp3,mp4",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 10000,
            maxFileSize: jQuery("#video_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'video',
            },
            onSubmit: function(files)
            {
//        $("#img_te").html($("#img_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                jQuery("#vid_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//          $("#img_te").html('all file uploaded');
                jQuery('#video_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#vid_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
//      if (validate) {
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#video_frm').submit();
            }
//      }
        });
    });

    jQuery(document).on("click", "#audio_id5", function()
    {
        jQuery("#audio_uploader_div").html('');
        jQuery("#audio_uploader_div").html('<div id="audiomulitplefileuploader">Upload</div>');
        var settings = jQuery("#audiomulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "mp3,caf",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 10000,
            maxFileSize: jQuery("#audio_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'audio',
            },
            onSubmit: function(files)
            {
//        $("#audio_te").html($("#audio_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                jQuery("#audio_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//          $("#audio_te").html('all file uploaded');
                jQuery('#audio_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#audio_submit').click(function() {

//      var validate = jQuery("#myform").validationEngine('validate');
            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
//      if (validate) {
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#audio_frm').submit();
            }
//      }
        });
    });

    jQuery(document).on("click", "#txt_id5", function()
    {
        jQuery("#doc_uploader_div").html('');
        jQuery("#doc_uploader_div").html('<div id="docmulitplefileuploader">Upload</div>');
        var settings = jQuery("#docmulitplefileuploader").uploadFile({
            url: "/uploadify/uploadify.php",
            method: "POST",
            allowedTypes: "doc,docx,txt,pdf,PDF,DOC,DOCX",
            fileName: "Filedata",
            multiple: true,
            maxFileCount:1,
            autoSubmit: false,
//      showStatusAfterSuccess: false,
//            maxFileSize: 1024 * 10000,
            maxFileSize: jQuery("#doc_size").val(),
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'type': 'doc',
            },
            onSubmit: function(files)
            {
//        $("#doc_te").html($("#doc_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function(files, data, xhr)
            {
                $("#doc_te").html("<font color='green'>Files upload and adding them in page.</font>");
                jQuery("#doc_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function()
            {
//          $("#doc_te").html('all file uploaded');
                jQuery('#doc_frm').submit();
            },
            onError: function(files, status, errMsg)
            {
                jQuery("#status").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#doc_submit').click(function() {

            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#doc_frm').submit();
            }
        });
    });

    jQuery(document).ready(function ()
    {
        jQuery("#user_uploader_div").html('');
        jQuery("#user_uploader_div").html('<div id="usermulitplefileuploader">Upload</div>');
        var settings = jQuery("#usermulitplefileuploader").uploadFile({
            url: "/uploadify/import_upload.php",
            method: "POST",
            returnType: "json",
            allowedTypes: "csv,xlsx",
            fileName: "Filedata",
            multiple: true,
            maxFileCount: 1,
            autoSubmit: false,
            showStatusAfterSuccess: true,
            maxFileSize: 1024 * 1024 * 100,
            formData: {
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val(),
                's_id': jQuery("#s_id").val(),
                'u_id': jQuery("#user_id").val(),
                'type': 'users_import',
            },
            onSubmit: function (files)
            {
//        $("#user_te").html($("#user_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function (files, data, xhr)
            {

                if (!data.error) {
                    jQuery("#file_name").val(data.path);
                    jQuery("#i_id").val(data.id);
                    jQuery("#user_te").html("<font color='green'>" + data.msg + "</font>");
                    jQuery('#import_user_frm').submit();
                } else {
                    jQuery("#i_id").val('0');
                    jQuery("#user_te").html("<font color='red'>" + data.msg + "</font>");
                }

                jQuery("#upload_path").attr('value', files); //set uploaded image name
            },
            afterUploadAll: function ()
            {
//                var i_id = jQuery("#i_id").val();
//                if (i_id != '0')
//                    jQuery('#import_user_frm').submit();
            },
            onError: function (files, status, errMsg)
            {
                jQuery("#user_te").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#upload_btn').click(function () {
            var has_file = jQuery(".ajax-file-upload-statusbar").length //check if there files need upload
            if (has_file > 0) {
                settings.startUpload();
            } else {
                jQuery('#import_user_frm').submit();
            }
        });
    });

    jQuery(document).ready(function ()
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
                'type': 'zipImages',
                'o_h': jQuery("#oldhash").val(),
            },
            onSubmit: function (files)
            {
//        $("#theme_te").html($("#theme_te").html() + "<br/>Submitting:" + JSON.stringify(files));
            },
            onSuccess: function (files, data, xhr)
            {
                var res = jQuery.parseJSON(data);
                $("#zip_te").html($("#zip_te").html() + "<br/>" + res['msg']);

                if (res['response'] == 1) {
                    var resp_data = res['tdata'];
                    jQuery('#import_pictures').submit();
                }
            },
            afterUploadAll: function ()
            {
//        jQuery('#theme_frm').submit();
            },
            onError: function (files, status, errMsg)
            {
                jQuery("#zip_te").html("<font color='green'>Something Wrong</font>");
            }
        });
        jQuery('#import_pictures').click(function () {
            settings.startUpload();
        });
    });

    jQuery(document).on('click', ".delete_div", function () {
        var p_id = jQuery(this).parent().attr('id');
        var value_a = p_id.split("_");
        value = value_a[1];
        jQuery.ajax({
            type: 'POST',
            url: "/uploadify/uploadify.php",
            data: {
                id: value,
                name: "image_delete",
                'timestamp': jQuery("#timestamp").val(),
                'token': jQuery("#hash").val(),
                '_token': jQuery("#_token").val(),
                'path': jQuery("#path").val()
            },
            success: function (data) {
                if (data == 1) {
                    jQuery("#" + p_id).remove();
                } else {
                    jQuery("#error_on_delete").html("Some error occured. Try Again Later");
                }
            }
        });

    });


    jQuery(document).on('click', ".del_comm", function () {

        var comm_id = jQuery(this).data('id');
        var comm_link = jQuery(this).data('link');
        jQuery.ajax({
            type: 'POST',
            url: comm_link,
            data: {
                id: comm_id,
            },
            success: function (data) {
                if (data == 1) {
                    jQuery("#cmt-" + comm_id).remove();
                    var comments_count = jQuery("#comment_count").val();
                    console.log(comments_count);
                    comments_count -= 1;
                    jQuery("#comment_count").val(comments_count);
                    console.log(comments_count);
                    jQuery("#c_count").html(comments_count)
                    jQuery("#c_s_im_ro").fadeIn('fast');
                    jQuery("#c_s_im_ro").show();
                } else {
                    jQuery("#c_e_im_ro").fadeIn('fast');
                    jQuery("#c_e_im_ro").show();
                }
            }
        });

    });

    jQuery(document).on('change', '#parent_cate', function () {
        var comm_id = jQuery(this).val();
        var comm_link = jQuery('#sub_categories_link').val();
        if (comm_id != '') {
            jQuery.ajax({
                type: 'POST',
                url: comm_link,
                data: {
                    cat_id: comm_id
                },
                success: function (data) {
                    jQuery('#sub_cate').html(data);
                }
            });
        }
    });

    jQuery(document).on('change', '#parent_size', function () {
        var comm_id = jQuery(this).val();
        var comm_link = jQuery('#sub_size_link').val();
        if (comm_id != '') {
            jQuery.ajax({
                type: 'POST',
                url: comm_link,
                data: {
                    size_id: comm_id
                },
                success: function (data) {
                    jQuery('#sub_size').html(data);
                }
            });
        }
    });
 
</script>

<?php
if (!isset($data['js_files'])) {
    $js_files = array();
} else {
    $js_files = $data['js_files'];
}
?>
<?php foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>" type="text/javascript"></script>
<?php endforeach; ?>
<?php
if (!isset($data['css_files'])) {
    $css_files = array();
} else {
    $css_files = $data['css_files'];
}
?>
<?php foreach ($css_files as $file): ?>
    <link rel="stylesheet" href="<?php echo $file; ?>" >
<?php endforeach; ?>
<script type="text/javascript">

</script>
