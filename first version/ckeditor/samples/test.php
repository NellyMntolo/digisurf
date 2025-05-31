<!DOCTYPE html>
<!--
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="../ckeditor.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body id="main">


<main>
		<form action="random_controller.php" method="POST">
			<div id="cover">
				<input type="text" name="title" id="title" placeholder="the title">
				<textarea name="editor1" id="editor1" rows="10" cols="80">
	                This is my textarea.
	            </textarea>
	        </div>
            <input type="submit" name="create_submit">


            <script type="text/javascript">
	            //WRITER 
				var writer = new CKEDITOR.htmlWriter();
				writer.openTag( 'p' );
				writer.attribute( 'class', 'MyClass' );
				writer.openTagClose( 'p' );
				writer.text( $('#cover').val() );
				//writer.text( $('#title').val() + $('#editor1').val() );
				writer.closeTag( 'p' );
				writer.getHtml();
				"<p class='MyClass' name='thepost'></p>";
				//alert( writer.getHtml() );  "<p class='MyClass'></p>"; //annoying
			</script>

        </form>
            <script>

                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
               CKEDITOR.replace( 'editor1', {
				    on: {
				        instanceReady: function( ev ) {
				            // Output paragraphs as <p>Text</p>.
				            this.dataProcessor.writer.setRules( 'p', {
				                indent: false,
				                breakBeforeOpen: true,
				                breakAfterOpen: false,
				                breakBeforeClose: false,
				                breakAfterClose: true
				            });
				        }
				    }
				});

              /* var data = 'index.html';
               //EDITING EXISTING HTML DATA
               CKEDITOR.instances.editor1.setData( data , function()
				    {
				        this.checkDirty();  // true
				        
					    // Do something with the data
					    $('#editor1').val(data);
					});*/

<?php $name = $_POST['name'];?>
				//
//chrome.exe" --allow-file-access-from-files
			//OPEN FILE TO EDIT
            var jqxhr = $.get( "<?php echo $name; ?>", function(data) {
				CKEDITOR.instances.editor1.setData( data );
					    //alert( "success" );
					  })
					.done(function() {
					    //alert( "second success" );
					})
					.fail(function() {
					    alert( "error" );
					})
					.always(function() {
					    //alert( "finished" );
					});

            </script>
</main>

</body>
</html>
