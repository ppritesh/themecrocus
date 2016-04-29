	<?php require( 'inc/header.php' ); ?>



	<?php

	if ( isset( $_REQUEST['type'] ) && !empty( $_REQUEST['type'] )) {

		$type = $_REQUEST['type'];

	} else {

		header( "Location: index.php" );

	}

	?>



	<!-- Go to Index Page -->

	<div class="text-right back-btn">

		<a href="index.php">

			<< &nbsp; BACK TO TOOLS PAGE

		</a>

	</div>



	<!-- Start Minifier -->

	<h1 class="main-title">

		<?php

		if ( $type == "css" ) {

			echo "CSS Minifier";

		} else if ( $type == "html" ) {

			echo "HTML Minifier";

		} else if ( $type == "js" ) {

			echo "JavaScript Minifier";

		}

		?>

	</h1>

	<div class="editor animated">

		<form action="process.php?type=<?php echo $type; ?>" method="post" id="form">

			<p class="editor-title">Compress Editor</p>

			<div class="textarea">

				<textarea name="content" placeholder="Place your code here.." id="editer-textarea"></textarea>

			</div>	



			<div class="editor-button">

				<a href="javascript:file_upload();" class="btn btn-primary">File Upload</a>
				
				<input type="submit" name="submit" value="Compress" class="btn btn-success">

				<a href="javascript:clear();" class="btn btn-danger clear">Clear</a>

			</div> 

		</form>

	</div>		

	<!-- End Minifier -->



	<!-- Modal -->

	<div id="myModal" class="modal fade" role="dialog">

		<div class="modal-dialog modal-lg">



			<!-- Modal content-->

			<div class="modal-content">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Compress File</h4>

				</div>

				<div class="modal-body">

					<span id="result"></span>

				</div>

				<div class="modal-footer">

					<form action="download.php" method="post" class="pull-left">
				
						<textarea style="display:none" name="content" id="hdnContent"> </textarea>
					
						<textarea style="display:none" name="ext" id="hdnFileExt"> </textarea>
					
						<input type="submit" class="btn btn-warning" name="submit" value="Download File" />
					
					</form>
						
					<button id="copy-content" class="btn btn-success" data-clipboard-target="#result">COPY CONTENT!</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>

			</div>

			<!-- End Modal content-->



		</div>

	</div>

	<!-- End Modal -->






	<!-- Modal -->

	<div id="file-upload-form" class="modal fade" role="dialog">

		<div class="modal-dialog modal-md">


			<!-- Modal content-->

			<div class="modal-content">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">File Upload</h4>

				</div>

				<div class="modal-body">

					<div class="js text-center">

						<input type="file" name="compress-file-input[]" id="compress-file-input" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" />

						<label for="compress-file-input"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>

					</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-primary" onclick="submit_file()">Submit</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>

			</div>

			<!-- End Modal content-->
		</div>

	</div>

	<!-- End Modal-->



	<?php require( 'inc/footer.php' ); ?>



