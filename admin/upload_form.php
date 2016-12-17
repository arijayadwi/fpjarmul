<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<?php
		session_start();
		if(!isset($_SESSION['user'])) header('Location: ../index.php');
		include("../connect.php");
	?>
<?php include("header.php");?>
		<!-- upload -->
		<div class="upload">
			<!-- container -->
			<div class="container">
				<div class="upload-grids">
					<div class="upload-right">
						<div class="upload-file">
							<div class="services-icon">
								<span class="glyphicon glyphicon-open" aria-hidden="true"></span>
							</div>
							<form action="upload_video.php"  method="post" enctype="multipart/form-data">
							<input type="file" name="fileToUpload" id="fileToUpload" value="Choose file..">
							<br>
							 
						</div>
						<div class="upload-info">
							<h5>Select files to upload</h5>
							<!-- <span>or</span> -->
							<!-- <p>Drag and drop files</p> -->
							<input type="submit" class="btn btn-block" style="width:80px; margin: 0 auto;" value="Next" name="submit"  />
							</form>
						</div>
					</div>
					<?php include("container.php");?>
			<!-- //container -->
		</div>
		<!-- //upload -->
			<!-- footer -->
			<?php include("footer.php");?>
			<!-- //footer -->
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>