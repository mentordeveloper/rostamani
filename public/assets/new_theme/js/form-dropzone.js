var FormDropzone = function () {


    return {
        //main function to initiate the module
        init: function () {  

            Dropzone.options.myAudioDropzone = {
                url: '/uploadify/uploadify.php',
                paramName: "Filedata", // The name that will be used to transfer the file
                maxFilesize: jQuery("#audio_size").val(), // MB
                acceptedFiles:"audio/*",
                params: {
                    'timestamp': jQuery("#timestamp").val(),
                    'token': jQuery("#hash").val(),
                    '_token': jQuery("#_token").val(),
                    'path': jQuery("#path").val(),
                    's_id': jQuery("#s_id").val(),
                    'type': 'audio',
                },
                accept: function(file, done) 
                {
                    var re = /(?:\.([^.]+))?$/;
                    var ext = re.exec(file.name)[1];
                    ext = ext.toUpperCase();
                    if ( ext == "MP3" || ext == "CAF") 
                    {
                        done();
                    }
                    else { done("just select mp3 or caf files."); }
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;
                        jQuery("#audio_path").val(1); //set uploaded image name
                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();

                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                },
                success: function(file) {
                    jQuery("#audio_path").val(file.name); //set uploaded image name
                    if (file.previewElement) {
                      return file.previewElement.classList.add("dz-success");
                    }
                    
                },            
            },
            Dropzone.options.myVideodropzone = {
                url: '/uploadify/uploadify.php',
                paramName: "Filedata", // The name that will be used to transfer the file
                maxFilesize: jQuery("#video_size").val(), // MB
                acceptedFiles:"video/*",
                params: {
                    'timestamp': jQuery("#timestamp").val(),
                    'token': jQuery("#hash").val(),
                    '_token': jQuery("#_token").val(),
                    'path': jQuery("#path").val(),
                    's_id': jQuery("#s_id").val(),
                    'type': 'video',
                    'o_h': jQuery("#oldhash").val(),
                },
                accept: function(file, done) 
                {
                    var re = /(?:\.([^.]+))?$/;
                    var ext = re.exec(file.name)[1];
                    ext = ext.toUpperCase();
                    if ( ext == "MP3" || ext == "MP4" || ext == "MOV" ||  ext == "FLV") 
                    {
                        done();
                    }
                    else { done("just select jpeg or bmp or gif or pnj files."); }
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;
                         jQuery("#vid_path").val(1); //set uploaded image name
                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();

                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                } ,
                success: function(file) {
                    jQuery("#vid_path").val(file.name); //set uploaded image name
                    if (file.previewElement) {
                      return file.previewElement.classList.add("dz-success");
                    }
                    
                },
            },
            Dropzone.options.myImagedropzone = {
                url: '/uploadify/uploadify.php',
                paramName: "Filedata", // The name that will be used to transfer the file
                maxFilesize: jQuery("#image_size").val(), // MB
                acceptedFiles:"image/*",
                params: {
                    'timestamp': jQuery("#timestamp").val(),
                    'token': jQuery("#hash").val(),
                    '_token': jQuery("#_token").val(),
                    'path': jQuery("#path").val(),
                    's_id': jQuery("#s_id").val(),
                    'type': 'image',
                    'o_h': jQuery("#oldhash").val(),
                },
                accept: function(file, done) 
                {
                    var re = /(?:\.([^.]+))?$/;
                    var ext = re.exec(file.name)[1];
                    ext = ext.toUpperCase();
                    console.log("File Ext: "+ext);
                    if ( ext == "JPEG" || ext == "BMP" || ext == "GIF" ||  ext == "JPG" ||  ext == "PNG" ||  ext == "JPE") 
                    {
                        done();
                    }
                    else { done("just select jpeg or bmp or gif or pnj files."); }
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;
                        jQuery("#img_path").val(1); //set uploaded image name
                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();
                          
                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                },
                success: function(file) {
                    
                    jQuery("#img_path").val(file.name); //set uploaded image name
                    if (file.previewElement) {
                      return file.previewElement.classList.add("dz-success");
                    }
                },
            },
            Dropzone.options.myTxtdropzone = {
                url: '/uploadify/uploadify.php',
                paramName: "Filedata", // The name that will be used to transfer the file
                maxFilesize: jQuery("#doc_size").val(), // MB
//                autoProcessQueue: false,
                params: {
                    'timestamp': jQuery("#timestamp").val(),
                    'token': jQuery("#hash").val(),
                    '_token': jQuery("#_token").val(),
                    'path': jQuery("#path").val(),
                    's_id': jQuery("#s_id").val(),
                    'type': 'doc',
                    'o_h': jQuery("#oldhash").val(),
                },
                accept: function(file, done) 
                {
                    var re = /(?:\.([^.]+))?$/;
                    var ext = re.exec(file.name)[1];
                    ext = ext.toUpperCase();
                    if ( ext == "JPEG" || ext == "BMP" || ext == "GIF" ||  ext == "JPG" ||  ext == "PNG" ||  ext == "JPE" 
                            || ext == "PDF" || ext == "TXT" || ext == "DOCX" ||  ext == "DOC" ) 
                    {
                        done();
                    }
                    else { done("just select Allowed files."); }
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;
                        jQuery("#doc_path").val(1); //set uploaded image name
                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();

                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                },
                success: function(file) {
                    jQuery("#doc_path").val(file.name); //set uploaded Doc name
                    if (file.previewElement) {
                      return file.previewElement.classList.add("dz-success");
                    }
                    
                },
//                successmultiple: noop,
//                canceled: function(file) {
//                    return this.emit("error", file, "Upload canceled.");
//                },
//                canceledmultiple: noop,
//                complete: function(file) {
//                    if (file._removeLink) {
//                      return file._removeLink.textContent = this.options.dictRemoveFile;
//                    }
//                },
                
                
            }

            Dropzone.options.myRSdropzone = {
                url: '/uploadify/uploadify.php',
                paramName: "Filedata", // The name that will be used to transfer the file
//                maxFilesize: jQuery("#video_size").val(), // MB
                acceptedFiles:"image/*",
//                autoProcessQueue: true,
                params: {
                    'timestamp': jQuery("#timestamp").val(),
                    'token': jQuery("#hash").val(),
                    '_token': jQuery("#_token").val(),
                    'path': jQuery("#path").val(),
                    's_id': jQuery("#s_id").val(),
                    'type': 'video',
                    'o_h': jQuery("#oldhash").val(),
                },
                accept: function(file, done) 
                {
//                    var re = /(?:\.([^.]+))?$/;
//                    var ext = re.exec(file.name)[1];
//                    ext = ext.toUpperCase();
//                    
                        done();
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;
                        jQuery("#vid_path").val(1); //set uploaded image name
                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();

                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                },
                success: function(file) {
                    jQuery("#vid_path").val(file.name); //set uploaded Doc name
                    if (file.previewElement) {
                      return file.previewElement.classList.add("dz-success");
                    }
                    
                },
//                successmultiple: noop,
//                canceled: function(file) {
//                    return this.emit("error", file, "Upload canceled.");
//                },
//                canceledmultiple: noop,
//                complete: function(file) {
//                    if (file._removeLink) {
//                      return file._removeLink.textContent = this.options.dictRemoveFile;
//                    }
//                },
                
                
            }

        }
    };
}();