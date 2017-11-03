<?php  $this->layout('Public/Header',$staticOption ) ?>

<body>
<header>
	<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<strong>Welcome to KOOLTUBE!</strong>
				</div>
				<div class="col-md-6 col-sm-6">
					<ul class="list-inline top-link link">
						<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="contact.html"><i class="fa fa-comments"></i> Contact</a></li>
						<li><a href="#"><i class="fa fa-question-circle"></i> FAQ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	
	<!--Navigation-->
    <nav id="menu" class="navbar">
		<div class="container">
			<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			  <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account</a>
						<div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
									<li><a href="archive.html">Login</a></li>
									<li><a href="archive.html">Register</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-play-circle-o"></i> Video</a>
						<div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
									<li><a href="archive.html">Text 201</a></li>
									<li><a href="archive.html">Text 202</a></li>
									<li><a href="archive.html">Text 203</a></li>
									<li><a href="archive.html">Text 204</a></li>
									<li><a href="archive.html">Text 205</a></li>
								</ul>
							</div> 
						</div>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i> Category</a>
						<div class="dropdown-menu" style="margin-left: -203.625px;">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
									<li><a href="archive.html">Text 301</a></li>
									<li><a href="archive.html">Text 302</a></li>
									<li><a href="archive.html">Text 303</a></li>
									<li><a href="archive.html">Text 304</a></li>
									<li><a href="archive.html">Text 305</a></li>
								</ul>
								<ul class="list-unstyled">
									<li><a href="archive.html">Text 306</a></li>
									<li><a href="archive.html">Text 307</a></li>
									<li><a href="archive.html">Text 308</a></li>
									<li><a href="archive.html">Text 309</a></li>
									<li><a href="archive.html">Text 310</a></li>
								</ul>
								<ul class="list-unstyled">
									<li><a href="archive.html">Text 311</a></li>
									<li><a href="archive.html">Text 312</a></li>
									<li><a href="archive.html#">Text 313</a></li>
									<li><a href="archive.html#">Text 314</a></li>
									<li><a href="archive.html">Text 315</a></li>
								</ul>
							</div>
						</div>
					</li>
					<li><a href="archive.html"><i class="fa fa-cubes"></i> Blocks</a></li>
					<li><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="header-slide">
		<div id="owl-demo" class="owl-carousel">
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/2.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/3.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/4.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/5.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/6.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/7.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/8.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Video's Tag</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="<?php echo $static_url ?>/static/images/9.jpg" />
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
    <div id="page-content" class="index-page">
	
		<div class="container">
			<div class="row">
				<div class="featured">
					<div class="main-vid">
						<div class="col-md-6">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Video's Tag</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="<?php echo $static_url ?>/static/images/1.jpg" />
							</div>
						</div>
					</div>
					<div class="sub-vid">
						<div class="col-md-3">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Video's Tag</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="<?php echo $static_url ?>/static/images/2.jpg" />
							</div>
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Video's Tag</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="<?php echo $static_url ?>/static/images/3.jpg" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Video's Tag</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="<?php echo $static_url ?>/static/images/4.jpg" />
							</div>
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Video's Tag</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="<?php echo $static_url ?>/static/images/6.jpg" />
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-globe"></i> Featured Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/7.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<p class="more">Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan.</p>
									<a href="single.html" class="btn btn-1">Read More</a>
									<div class="line"></div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/8.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/9.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/6.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/9.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<p class="more">Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan.</p>
									<a href="single.html" class="btn btn-1">Read More</a>
									<div class="line"></div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/5.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/2.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-play-circle-o"></i> Random Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/3.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/4.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/5.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/6.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/7.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/8.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-globe"></i> Hot Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/9.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
									<p class="more">Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan.</p>
									<a href="single.html" class="btn btn-1">Read More</a>
								</div>
								<div class="col-md-6">
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/5.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/6.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/7.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-calendar"></i>25/3/2015</span> 
												<span><i class="fa fa-heart"></i>1,200</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-vimeo-square"></i> New Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/2.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/8.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/3.jpg" />
										</div>
										<h3 class="vid-name"><a href="#">Video's Name</a></h3>
										<div class="info">
											<h5>By <a href="#">Kelvin</a></h5>
											<span><i class="fa fa-calendar"></i>25/3/2015</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-follow">
						<div class="heading"><h4><i class="fa fa-users"></i> Follow Us</h4></div>
						<div class="content">
							<ul class="list-inline">
								<li>
									<a href="facebook.com/">
										<div class="box-facebook">
											<span class="fa fa-facebook fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-twitter">
											<span class="fa fa-twitter fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-google">
											<span class="fa fa-google-plus fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
							</ul>
							<img src="<?php echo $static_url ?>/static/images/banner.jpg" />
						</div>
						<div class="line"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-tags">
						<div class="heading"><h4><i class="fa fa-tags"></i> Tag</h4></div>
						<div class="content">
							<ul class="list-inline">
								<li><a href="#">animals ,</a></li>
								<li><a href="#">cooking ,</a></li>
								<li><a href="#">countries ,</a></li>
								<li><a href="#">home ,</a></li>
								<li><a href="#">likes ,</a></li>
								<li><a href="#">photo ,</a></li>
								<li><a href="#">travel ,</a></li>
								<li><a href="#">video</a></li>
							</ul>
						</div>
						<div class="line"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-post">
						<div class="heading"><h4><i class="fa fa-globe"></i> Category</h4></div>
						<div class="content">
							<div class="post wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>Video's Tag</span>
										<a href="single.html">
											<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
										</a>
										<p>Video's Name</p>
									</div>
									<img src="<?php echo $static_url ?>/static/images/7.jpg" />
								</div>
								<div class="wrapper">
									<h5 class="vid-name"><a href="#">Video's Name</a></h5>
									<div class="info">
										<h6>By <a href="#">Kelvin</a></h6>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
							<div class="post wrap-vid">
								<div class="zoom-container">
											<div class="zoom-caption">
												<span>Video's Tag</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="<?php echo $static_url ?>/static/images/8.jpg" />
										</div>
								<div class="wrapper">
									<h5 class="vid-name"><a href="#">Video's Name</a></h5>
									<div class="info">
										<h6>By <a href="#">Kelvin</a></h6>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
							<div class="post wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>Video's Tag</span>
										<a href="single.html">
											<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
										</a>
										<p>Video's Name</p>
									</div>
									<img src="<?php echo $static_url ?>/static/images/9.jpg" />
								</div>
								<div class="wrapper">
									<h5 class="vid-name"><a href="#">Video's Name</a></h5>
									<div class="info">
										<h6>By <a href="#">Kelvin</a></h6>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-news">
						<div class="heading"><h4><i class="fa fa-clock-o"></i> Top News</h4></div>
						<div class="content">
							<div class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>Video's Tag</span>
										<a href="single.html">
											<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
										</a>
										<p>Video's Name</p>
									</div>
									<img src="<?php echo $static_url ?>/static/images/3.jpg" />
								</div>
								<h3 class="vid-name"><a href="#">Video's Name</a></h3>
								<div class="info">
									<h5>By <a href="#">Kelvin</a></h5>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
							<div class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>Video's Tag</span>
										<a href="single.html">
											<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
										</a>
										<p>Video's Name</p>
									</div>
									<img src="<?php echo $static_url ?>/static/images/4.jpg" />
								</div>
								<h3 class="vid-name"><a href="#">Video's Name</a></h3>
								<div class="info">
									<h5>By <a href="#">Kelvin</a></h5>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
							<div class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>Video's Tag</span>
										<a href="single.html">
											<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
										</a>
										<p>Video's Name</p>
									</div>
									<img src="<?php echo $static_url ?>/static/images/5.jpg" />
								</div>
								<h3 class="vid-name"><a href="#">Video's Name</a></h3>
								<div class="info">
									<h5>By <a href="#">Kelvin</a></h5>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-post">
						<div class="heading"><h4><i class="fa fa-comments"></i> Comment</h4></div>
						<div class="content">
							<div class="post">
								<a href="single.html">
									<img src="<?php echo $static_url ?>/static/images/user.png" />
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-comments"></i>1,200</li>
									</ul>
								</div>
							</div>
							<div class="post">
								<a href="single.html">
									<img src="<?php echo $static_url ?>/static/images/user.png" />
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-comments"></i>1,200</li>
									</ul>
								</div>
							</div>
							<div class="post">
								<a href="single.html">
									<img src="<?php echo $static_url ?>/static/images/user.png" />
								</a>
								<div class="wrapper">
									<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i>25/3/2015</li> 
										<li><i class="fa fa-comments"></i>1,200</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="widget wid-banner">
						<img src="<?php echo $static_url ?>/static/images/banner-2.jpg" />
					</div>
				</div>
			</div>
		</div> 
	</div> 

	<?php $this->insert('Public/Footer',$staticOption ) ?>


	<!-- JS -->
	<script src="owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4]
      });

    });
    </script>
	
</body>
</html>
