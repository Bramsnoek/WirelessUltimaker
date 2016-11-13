<?php
   session_start(); // You'll have to start the session to destroy it (I know, pretty strange!)
   
   if($_SESSION['ingelogd'] !== true){
     header('Location: login.php');
   } 
   ?>
<html>
   <head>
      <script type="text/template" id="qq-template-gallery">
         <div class="qq-uploader-selector qq-uploader qq-gallery" id="dropfilefield" qq-drop-area-text="Drop files here">
            
             <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                 <span class="qq-upload-drop-area-text-selector"></span>
             </div>
             <span class="qq-drop-processing-selector qq-drop-processing">
                 <span>Processing dropped files...</span>
                 <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
             </span>
             <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                 <li>
                     <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                     <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                         <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                     </div>
                     <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                     <button type="button" onclick="resetFileReader()" class="qq-upload-cancel-selector qq-upload-cancel mini ui inverted red button right floated" style="max-width=10">X</button>
                     <div class="qq-thumbnail-wrapper">
                         <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                     </div>
         
                     <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                         <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                         Retry
                     </button>
         
                     <div class="qq-file-info">
                         <div class="qq-file-name">
                             <span class="qq-upload-file-selector qq-upload-file"></span>
                             <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                         </div>
                         <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                         <span class="qq-upload-size-selector qq-upload-size"></span>
                         <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                             <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                         </button>
                         <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                             <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                         </button>
                         <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                             <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                         </button>
                     </div>
                 </li>
             </ul>
         
             <dialog class="qq-alert-dialog-selector">
                 <div class="qq-dialog-message-selector"></div>
                 <div class="qq-dialog-buttons">
                     <button type="button" class="qq-cancel-button-selector">Close</button>
                 </div>
             </dialog>
         
             <dialog class="qq-confirm-dialog-selector">
                 <div class="qq-dialog-message-selector"></div>
                 <div class="qq-dialog-buttons">
                     <button type="button" class="qq-cancel-button-selector">No</button>
                     <button type="button" class="qq-ok-button-selector">Yes</button>
                 </div>
             </dialog>
         
             <dialog class="qq-prompt-dialog-selector">
                 <div class="qq-dialog-message-selector"></div>
                 <input type="text">
                 <div class="qq-dialog-buttons">
                     <button type="button" class="qq-cancel-button-selector">Cancel</button>
                     <button type="button" class="qq-ok-button-selector">Ok</button>
                 </div>
             </dialog>
         </div>
      </script>
      <!-- Standard Meta -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <!-- Site Properties -->
      <title>3D Print Online</title>
      <link rel="stylesheet" type="text/css" href="./css/components/reset.css">
      <link rel="stylesheet" type="text/css" href="./css/components/site.css">
      <link rel="stylesheet" type="text/css" href="./css/components/container.css">
      <link rel="stylesheet" type="text/css" href="./css/components/grid.css">
      <link rel="stylesheet" type="text/css" href="./css/components/header.css">
      <link rel="stylesheet" type="text/css" href="./css/components/image.css">
      <link rel="stylesheet" type="text/css" href="./css/components/menu.css">
      <link rel="stylesheet" type="text/css" href="./css/components/label.css">
      <link rel="stylesheet" type="text/css" href="./css/components/divider.css">
      <link rel="stylesheet" type="text/css" href="./css/components/segment.css">
      <link rel="stylesheet" type="text/css" href="./css/components/form.css">
      <link rel="stylesheet" type="text/css" href="./css/components/input.css">
      <link rel="stylesheet" type="text/css" href="./css/components/button.css">
      <link rel="stylesheet" type="text/css" href="./css/components/list.css">
      <link rel="stylesheet" type="text/css" href="./css/components/message.css">
      <link rel="stylesheet" type="text/css" href="./css/components/icon.css">
      <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
      <link rel="stylesheet" type="text/ss" href="./css/semantic.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link href="./css/fineuploader/fine-uploader-new.css" rel="stylesheet">
      <script src="./css/fineuploader/jquery.fine-uploader.js"></script>
      <script src="./css/components/form.js"></script>
      <script src="./css/components/transition.js"></script>
      <script src="requests.js"></script>
   </head>
   <body>
      <div class="ui middle aligned center aligned grid">
         <div class="column">
            <h2 class="ui teal image header" id="title">
               <img src="./css/themes/default/assets/images/fontys.jpg" class="image">
               <div class="content" style="color: rgb(102, 51, 102)">
                  3D Print Online
               </div>
            </h2>
            <div class="ui error message" id="noDeltaError">
              <i class="close icon" onclick="removeDeltaError()"></i>
              <div class="header">
                Unfortunately you can't make use of this service!
              </div>
              <ul class="list">
                <li>You need to be a part of Delta</li>
                <li>You are a Delta? According to the FHICT API you aren't in the Delta group. Ask the administrator to add you!</li>
              </ul>
            </div>
            <form class="ui large form" style="background-color: rgba(0, 0, 0, 0.6)" id="formWrapper">
               <div class="ui stacked segment">
                  <div class="field" id="uploadWrapper">
                     <div id="fine-uploader-gallery"></div>
                     <div class="ui pointing red basic label leftt" id="fileerror" style="margin-top: 5%; display: none;" v>
                        Please select a file to upload!
                     </div>
                     <script>
                        var reader = new FileReader();
                        var cleared = false;
                        
                        $('#fine-uploader-gallery').fineUploader({
                            template: 'qq-template-gallery',
                            request: {
                                endpoint: './css/uploads'
                            },
                            thumbnails: {
                                placeholders: {
                                    waitingPath: './css/fineuploader/waiting-generic.png',
                                    notAvailablePath: './css/fineuploader/not_available-generic.png'
                                }
                            },
                            callbacks: {
                                onSubmit: function(id, name) {
                                    var file = this.getFile(id)
                        
                                    if(file){
                                        document.getElementById("fileerror").style.display="none";
                                        reader.readAsDataURL(file)
                                    }
                                }
                            },
                            validation: {
                                allowedExtensions: ['gcode']
                            }
                        });
                        
                        function sendFile(){
                            if(reader.result == null || reader.result == "" || cleared) {
                                document.getElementById("fileerror").style.display="inline";
                            } else {
                                document.getElementById("fileerror").style.display="none";
                        
                                $.post("http://127.0.0.1:12000/printer", { id : reader.result.split(',')[1]})
                                    .done(function (data) {
                                        document.getElementById('scsmessage').style.display="block"
                                    });
                            }
                        }
                     </script>
                  </div>
                  <div class="ui fluid large teal submit button" id="sendButton" onclick="sendFile()" style="background-color: rgb(102, 51, 102)">Send Print!</div>
                  <div class="ui positive message" style="display: none" id="scsmessage">
                     <i class="close icon" onclick="closeSuccesMessage()"></i>
                     <div class="header">
                        Your file was sent to the ultimaker!
                     </div>
                     <p>Go check it out!</p>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <script type="text/javascript">
         var accesToken = <?php echo json_encode($_SESSION['access_token']); ?>;
      </script>
   </body>
</html>