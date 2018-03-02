<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editor</title>
		<!-- Include CSS for icons. -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<!-- Include Editor style. -->
		<link href="/public/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
		<link href="/public/css/froala_style.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="index.php" method="POST">
			<textarea name="editor_content" id="myEditor">
			</textarea>
			<button name="btn_submit" style="margin: 20px 0px">Submit</button>
		</form>

		<!-- Include jQuery lib. -->
		<script type="text/javascript" src="/public/js/jquery.min.js"></script>

		<!-- Include Editor JS files. -->
		<script type="text/javascript" src="/public/js/froala_editor.pkgd.min.js"></script>

		<script src="/public/js/image.min.js"></script>

		<script>
			$(function() {
			    $('#myEditor')
		      	.froalaEditor({
		      		//Set button (add if you want)
		      		toolbarButtons: ['bold', 'italic', '|', 'indent', 'outdent', 'formatOL', 'formatUL', '|', 'insertLink', 'insertImage', 'subscript', 'superscript'],
					
					// Set the image upload parameter.
					imageUploadParam: 'image_param',

					// Set the image upload URL.
					imageUploadURL: '/upload_image.php',

					// Additional upload params.
					imageUploadParams: {desc: 'something you send to server'},

					// Set request type.
					imageUploadMethod: 'POST',

					// Set max image size to 5MB.
					imageMaxSize: 5 * 1024 * 1024,

					// Allow to upload PNG and JPG.
					imageAllowedTypes: ['jpeg', 'jpg', 'png']
		      	})
				.on('froalaEditor.image.beforeUpload', function (e, editor, images) {
					// Return false if you want to stop the image upload.
				})
				.on('froalaEditor.image.uploaded', function (e, editor, response) {
					// Image was uploaded to the server.
				})
				.on('froalaEditor.image.inserted', function (e, editor, $img, response) {
					// Image was inserted in the editor.
				})
				.on('froalaEditor.image.replaced', function (e, editor, $img, response) {
					// Image was replaced in the editor.
				})
				.on('froalaEditor.image.error', function (e, editor, error, response) {
					// Bad link.
					if (error.code == 1) {}

					// No link in upload response.
					else if (error.code == 2) {}

					// Error during image upload.
					else if (error.code == 3) {}

					// Parsing response failed.
					else if (error.code == 4) {}

					// Image too text-large.
					else if (error.code == 5) {}

					// Invalid image type.
					else if (error.code == 6) {}

					// Image can be uploaded only to same domain in IE 8 and IE 9.
					else if (error.code == 7) {}

					// Response contains the original server response to the request if available.
				})
			    .on('froalaEditor.image.removed', function (e, editor, $img) {
			        //Remove Image
			        $.ajax({
			          // Request method.
			          method: "POST",
			 
			          // Request URL.
			          url: "/delete_image.php",
			 
			          // Request params.
			          data: {
			            deletedImage: $img.attr('src')
			          }
			        })
			        .done (function (data) {
			          console.log ('image was deleted');
			        })
			        .fail (function () {
			          console.log ('image delete problem');
			        })
			    })
			});
		</script>
	</body>
</html>