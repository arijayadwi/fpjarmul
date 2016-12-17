
<!DOCTYPE HTML>
<html>
<head>
<?php
	session_start();
	if(!isset($_SESSION['user'])) header('Location: ../index.php');
	include("../connect.php");
	$sql = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video ORDER BY RAND() LIMIT 2";
	$sql1 = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video";
	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
?>
<?php include("header.php");?>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="../images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="#recommended" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Recommended</a></li>
					<li><a href="topvideos.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Top Videos</a></li>
					<li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
					<li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Sports<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-1">
							<li><a href="sports.html">Football</a></li>                                             
							<li><a href="sports.html">Cricket</a></li>
							<li><a href="sports.html">Tennis</a></li> 
							<li><a href="sports.html">Shattil</a></li>  
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					</div>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Recent Videos</h3>
					</div>
					<?php while($row = $result->fetch_assoc()) {
						$SendJudul = preg_replace('/\s+/', '', $row["Judul"]);
			         	echo"	
			         			<div class='col-md-4 resent-grid recommended-grid slider-top-grids'>
									<div class='resent-grid-img recommended-grid-img'>
										<a href='insert_views.php?ID=". $row["Indexes"]."&t=0'><img src='../Thumbnail/". $row["Thumbnail"].".jpg' alt='' /></a>
										<div class='time'>
											<p>". $row["Times"]."</p>
										</div>
										<div class='clck'>
											<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
										</div>
									</div>
									<div class='resent-grid-info recommended-grid-info'>
										<h3><a href='insert_views.php?ID=". $row["Indexes"]."&t=0' class='title title-info'>". $row["Judul"]."</a></h3>
										<ul>
											<li><p class='author author-info'><a href='#'' class='author'>". $row["Uploader"]."</a></p></li>
											<li class='right-list'><p class='views views-info'>". $row["Views"]." views</p></li>
										</ul>
									</div>
								</div>         																							
							";
			     	} ?>
					<div class="clearfix"> </div>
				</div>
				<div class="recommended" id="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Recommended</h3>
						<?php while($row1 = $result1->fetch_assoc()) {						
			         	echo"	
			         			<div class='col-md-3 resent-grid recommended-grid'>
									<div class='resent-grid-img recommended-grid-img'>
										<a href='insert_views.php?ID=". $row1["Indexes"]."&t=0'><img src='../Thumbnail/". $row1["Thumbnail"].".jpg' alt='' /></a>
										<div class='time small-time'>
											<p>". $row["Times"]."</p>
										</div>
										<div class='clck small-clck'>
											<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
										</div>
									</div>
									<div class='resent-grid-info recommended-grid-info video-info-grid'>
										<h5><a href='insert_views.php?ID=". $row1["Indexes"]."&t=0' class='title'>". $row1["Judul"]."</a></h5>
										<ul>
											<li><p class='author author-info'><a href='#'' class='author'>". $row1["Uploader"]."</a></p></li>
											<li class='right-list'><p class='views views-info'>". $row1["Views"]." views</p></li>
										</ul>
									</div>
								</div>    																							
							";
			     	} ?>
					</div>					
				</div>
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Sports</h3>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="../images/g.jpg" alt="" /></a>
								<div class="time small-time">
									<p>7:30</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
									<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="../images/g1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>9:34</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Nullam interdum viverra nullam metus varius sit sed viverra</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
									<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="../images/g2.jpg" alt="" /></a>
								<div class="time small-time">
									<p>5:34</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Varius sit sed viverra nullam viverra nullam interdum metus</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
									<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="../images/g3.jpg" alt="" /></a>
								<div class="time small-time">
									<p>6:55</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Nullam interdum metus viverra nullam varius sit sed viverra</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
									<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					
				</div>
			</div>
			<!-- footer -->
			<?php include("footer.php");?>
			<!-- //footer -->
		</div>
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
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>