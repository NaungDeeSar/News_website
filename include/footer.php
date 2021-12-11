	<footer class="container-fluid py-2">
		<div class="container">
			<div class="row">
				<div class="col-12  col-md-12 col-lg-4">
					<h5 class="my-3" style="border-bottom: 2px groove #f21dc1;width: 60px">About</h5>

					<img src="img/info1.png" class="img-fluid py-2">
					<p class="text-justify" > 
					Info channel is a online  news platform in Myanmar.
					Info-channel brings you myanmar news,international news,sports,entertainment 
					and Knowledge and features.
					Visit us on Facebook Page.
				</p>
				
				</div>
				<div class="col-12  col-md-12 col-lg-4">
					<h5 class="my-3" style="border-bottom: 2px groove #f21dc1;width: 120px">Latest News</h5>

					<div class="row no-gutters">
						<?php 
							$sql="SELECT * FROM items ORDER BY  id DESC LIMIT 2";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
						<div class="col-3 col-md-2 col-lg-4 latest_img">
                            <a href="detail.php?id=	<?php echo $item['id'] ?>">
                                <img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid" alt="...">

                            </a>

						</div>
						<div class="col-9 col-md-10 col-lg-8">
							<a href="detail.php?id=	<?php echo $item['id'] ?>" style="text-decoration: none;" class="text-dark">
								<h6 class="lasted-title">
						<?php 
									$str=substr($item['content'],0,200);
									echo $str;

									 ?>
							</h6>
							</a>
							<p><small class="text-muted">
								<i class="far fa-calendar-check"></i>
							September 29,2020</small></p>
						</div>
					<?php } ?>

						
					</div>


				</div>
				<div class="col-12  col-md-12 col-lg-4">
					<h5 class="my-3" style="border-bottom: 2px groove #f21dc1;width: 110px">Contact Us</h5>


					<p class="text-muted ml-2">
					<label class="text-danger font-weight-bold">Address: </label> New Mingalar Market, Yangon
						
						 <br>
						 <label class="text-danger font-weight-bold">	Tel:  </label> 
						 (+95)2593xxxxx
						
						 <br>
					<label class="text-danger font-weight-bold">	Email:  </label> 
						infochannel2020@info.com
						
						 <br>

						 
					</p>
						<ul class="footer_nav my-4">
						<li>
							<a href="" class="text-decoration-none wrapper" title="Facebook">
								<span class="fa-stack fa-1x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
								</span>

							</a>
						</li>
						<li>
							<a href="" class="text-decoration-none wrapper" title="instagram">
								<span class="fa-stack fa-1x">
									<i class="fas fa-circle fa-stack-2x"></i>

									<i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
								</span>

							</a>
						</li>					

						<li>
							<a href="#" class="text-decoration-none wrapper" title="twitter">
								<span class="fa-stack fa-1x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
								</span>

							</a>
						</li>
						<li>
							<a href="" class="text-decoration-none wrapper" title="email">
								<span class="fa-stack fa-1x">
									<i class="fas fa-circle fa-stack-2x"></i>

									<i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
								</span>

							</a>
						</li>


					</ul>

				</div>
			</div>

		</div>
		<hr>
		<div class="footer_bottom">

			<h6 class="text-muted text-center py-2">

				@2020 Info-Channel

			</h6>

		</div>

	</footer>

		<a href="#" class="back-to-top" style="text-decoration: none;">
  <i class="far fa-arrow-alt-circle-up"></i>
</a>

	


	

 


	<!--===============================================================-->	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="WBwsOahe"></script>

	<!--================================================================-->	
</body>
</html>