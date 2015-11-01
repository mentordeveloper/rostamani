<link href="{{asset('css/uploadfile.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery.uploadfile.min.js')}}"></script>
<script type="text/javascript">
jQuery(document).ready(function()
{
  $("#avatarUploader").uploadFile({
    url: "{{route('upload')}}",
    allowedTypes: "png,gif,jpg,jpeg",
    fileName: "uploaded_img",
    onSuccess: function(files, data, xhr)
    {
      data = $.parseJSON(data); // yse parseJSON here
      if (data.error) {
        //there is an error
      } else {
        //there is no error
        fileName = data['fileName'];
        $('#avatar').val(fileName);
      }
    }
  });
});

< div id = "avatarUploader" > Upload < /div>
    < input type = "hidden" name = "avatar" id = "avatar" / >