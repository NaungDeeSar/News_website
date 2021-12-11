<?php 
include "include/header.php";
?>
	<!-- 	navbar end -->

	<!-- content start -->
	<div class="container-fluid  py-5 content">
		<div class="container breakingNews">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="d-flex justify-content-between align-items-center bg-white shadow-sm bg-white" style="border:0px solid #f21dc1;border-radius: 1px">
						<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center py-2 text-white px-1 news" style="background-color:#f21dc1">
							<span class="align-items-center" >&nbsp;BreakingNews</span>
						</div>
						<marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">

                            <?php
                                $sql="SELECT * FROM items  ORDER BY id  DESC LIMIT 6";
                                $stmt=$pdo->prepare($sql);

                                $stmt->execute();
                                $items=$stmt->fetchAll();


                                foreach ($items as $item) {


                                    ?>



							<a href="detail.php?id=<?php echo $item['id'] ?>">
                                <?php echo $item['title'] ?>
                            </a>
							<span class="dot"></span>
                                <?php } ?>


                        </marquee>

					</div>
				</div>
			</div>
		</div>
		<div class="container my-3">	 
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">	 						
							<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="img/international/img.jpg" class="d-block w-100" alt="...">
										<div class="img-overlay"></div>
										<div class="carousel-caption">
											<a href="home.php" style="text-decoration: none;color: #fff;">
												<h4 class="py-2" style="background:#F21DC1;">ဗိုင်းရပ်စ်ကူးစက်ခံရပေမယ့် ထရမ့်မောင်နှံ ကျန်းမာရေးကောင်းမွန်နေတယ်လို့ ဆရာဝန် ပြော</h4>
											</a>
											<h6 class="my-3">
											<i class="far fa-clock"></i>7th Oct,2020 <i class="fas fa-user-cog"></i> Info-Channel</h6>
										</div>
									</div>
									<div class="carousel-item">
										<img src="img/international/img1.jpg" class="d-block w-100" alt="image1">
										<div class="img-overlay"></div>
										<div class="carousel-caption">
											<a href="home.php" style="text-decoration: none;color: #fff;">
												<h4 class="bg-success py-2">ကိုဗစ်ပိုးက သွေးအချိုဓာတ်ကို ပိုတက်စေတဲ့အတွက် ဆီးချိုရောဂါအခံရှိသူတွေ သေဆုံးမှုများနေခြင်းဖြစ်</h4>
											</a>
											<h6 class="my-3">
											<i class="far fa-clock"></i>6th Oct,2020 <i class="fas fa-user-cog"></i> Info-Channel</h6>
										</div>
									</div>
									

								</div>
								<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						

						</div>
						<!-- slider end -->
						<div class="col-lg-12 col-md-12 col-12 my-4">
							<div class="row no-gutters">
								<?php
    $limit = 4;
    $s = $pdo->prepare("SELECT * FROM items");
    $s->execute();
    $allResp = $s->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($allResp);
    $total_results = $s->rowCount();
    $total_pages = ceil($total_results/$limit);
    
    if (!isset($_GET['page'])) {
        $page = 1;
    } else{
        $page = $_GET['page'];
    }


    $start = ($page-1)*$limit;

    $stmt =$pdo->prepare("SELECT * FROM items ORDER BY id DESC LIMIT $start, $limit");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    $items = $stmt->fetchAll();
       
   

?>



        <?php
        
         foreach($items as $item){?>
								<div class="col-4 col-md-3">
									<a href="detail.php?id=<?php echo $item->id ?>">
										<img src="admin_info/<?php echo $item->image ?>" class="img-fluid" alt="...">
									</a>

								</div>
								<div class="col-8 col-md-9 py-2 post_content">      
									<h5 class="text-dark  ml-3">
										<a href="detail.php?id=	<?php echo $item->id ?>" class="post_title">
											<?php echo $item->title ?>
										</a>
									</h5>
									<p class="ml-3 p9">
                                        <?php
                                        $str=substr($item->content,0,460);
                                        echo $str;
                                        ?>
                                    <p class="ml-3"><small class="text-muted">
										<i class="far fa-calendar-check"></i>
									September 29,2020</small></p>

								</div>


							<?php } ?>


							</div>

						
						</div>

					</div>
					<!-- pagination -->
					<nav aria-label="Page navigation">
					 <ul class="pagination justify-content-left">
        <li class="page-item">
        	<a class="page-link" href="?page=1">First</a></li>
        
        <?php for($p=1; $p<=$total_pages; $p++){?>
            
            <li class="<?= $page == $p ? 'active' : ''; ?> page-item">
            	<a href="<?= '?page='.$p; ?>" class="page-link"><?= $p; ?></a></li>
        <?php }?>
        <li class="page-item"><a class="page-link" href="?page=<?= $total_pages; ?>">Last</a></li>
    </ul>
</nav>
	
				
				</div>

				<div class="col-lg-4 col-md-12 col-sm-12 side_right">
					<div class="recent_post">

						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">

								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
									<i class="far fa-clock"></i>
									RECENT
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
									<i class="fas fa-heart"></i>
									POPULAR
								</a>
							</li>

						</ul>

						<div class="tab-content">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <table class="table">
                                    <?php
                                    $sql="SELECT items.*,category.name as cat_name  FROM items INNER JOIN category ON items.cat_id=category.id  ORDER BY id  DESC LIMIT 4";
                                    $stmt=$pdo->prepare($sql);

                                    $stmt->execute();
                                    $items=$stmt->fetchAll();


                                    foreach ($items as $item) {


                                        ?>
									<tr>
										<td>
									<a href="detail.php?id=<?php echo $item['id'] ?>">
										<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
									</a>
								</td>
										<td>
											<span class="text-danger">
                                                <?php echo $item['cat_name'] ?>
                                              </span>
											<a href="detail.php?id=<?php echo $item['id'] ?>">
												<p class="text-muted">
											<?php echo $item['title'] ?>
                                                </p>
											</a>

										</td>
									</tr>
                                        <?php } ?>
								</table>

							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<table class="table">
                                    <?php
                                    $sql="SELECT items.*,category.name as cat_name  FROM items INNER JOIN category ON items.cat_id=category.id  WHERE count >9 ORDER BY id  DESC LIMIT 4";
                                    $stmt=$pdo->prepare($sql);

                                    $stmt->execute();
                                    $items=$stmt->fetchAll();


                                    foreach ($items as $item) {


                                        ?>
									<tr>
										<td>
										<a href="detail.php?id=<?php echo $item['id'] ?>">
											<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
										</a>
										</td>
										<td>
											<span class="text-danger">
                                                <?php echo $item['cat_name'] ?></span>
											<a href="detail.php?id=<?php echo $item['id'] ?>">
												<p class="text-muted">
											<?php echo $item['title'] ?></p>
											</a>
										</td>
									</tr>
									<?php } ?>
								</table>


							</div>

						</div>

					</div>




					<div class="category_right my-3">
						<h6 class="text-dark"> Categories</h6>
						<hr>
						<?php 
					$sql="SELECT * FROM category";
					$stmt=$pdo->prepare($sql);
					$stmt->execute();
					$cats=$stmt->FetchAll();

					foreach ($cats as $cat) {
						# code...
					
					 ?>
					
						<a href="category.php?id=<?php echo $cat['id']?>" class="btn btn-outline-link"><?php echo $cat['name']; ?></a> 
						

					<?php } ?>
						

					</div>
					<!-- follow -->
					<div class="category_right my-3">
						<h6 class="text-dark">Follow Us</h6>
						<hr>
						<div class="fb-page" data-href="https://www.facebook.com/Info-Channel-109463740923509" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Info-Channel-109463740923509" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Info-Channel-109463740923509">Info-Channel</a></blockquote></div>
						
					</div>


				</div>


			</div>
			<!-- row end -->

		</div>
	</div>

<?php 
include "include/footer.php";
?>