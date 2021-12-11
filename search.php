<?php
include "include/header.php";


?>
    <!-- 	navbar end -->

    <!-- content start -->
    <div class="container-fluid  py-5 content">
        <div class="container breakingNews">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8">
                     <span class="text-white" style="background:#f21dc1;padding: 5px">Search</span>
                       <?php
                            $name=$_POST['search'];

                            ?>
                     <span class="bg-white text-dark" style="padding: 5px"> <?php echo $name; ?></span>
                </div>
            </div>
        </div>

        <div class="container my-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row no-gutters">
                        <?php
                        $search=$_POST['search'];
                        $sql="SELECT *  FROM items WHERE title LIKE '%$search%'";
                        $stmt=$pdo->prepare($sql);

                        $stmt->execute();
                        $items=$stmt->fetchAll();


                        foreach ($items as $item) {


                            ?>

                            <div class="col-4 col-md-3">
                                <a href="detail.php?id=	<?php echo $item['id'] ?>">
                                    <img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid" alt="...">
                                </a>

                            </div>
                            <div class="col-8 col-md-9 py-2 post_content">
                                <h5 class="text-dark  ml-3">
                                    <a href="detail.php?id=	<?php echo $item['id'] ?>" class="post_title">
                                        <?php echo $item['title'] ?>
                                    </a>
                                </h5>
                                <p class="ml-3 p9">
                                    <?php
                                    $str=substr($item['content'],0,460);
                                    echo $str;
                                    ?>
                                <p class="ml-3"><small class="text-muted">
                                        <i class="far fa-calendar-check"></i>
                                        September 29,2020</small></p>

                            </div>


                        <?php
                        }


                        ?>

                    </div>






                </div>


                <div class="col-lg-4 col-md-12 col-sm-12 side_right">


                    <!-- latest post -->
                    <div class="latest_post_right">
                        <h6 class="text-dark">Latest News</h6>
                        <table class=" table table_latest_post">
                            <?php
                            $sql="SELECT * FROM items ORDER BY id  DESC LIMIT 4";
                            $stmt=$pdo->prepare($sql);

                            $stmt->execute();
                            $items=$stmt->fetchAll();
                            foreach ($items as $item) {
                                # code...

                                ?>
                                <tr>
                                    <td style="width: 40%">
                                        <a href="detail.php?id=<?php echo $item['id'] ?>">
                                            <img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
                                            <?php
                                          echo $item['title'] ?>


                                        </a>
                                        <h6 class="text-muted" style="font-size: 13px;">
                                            <i class="far fa-clock"></i>5th Oct,2020</h6>

                                    </td>
                                </tr>

                            <?php } ?>


                        </table>



                    </div>
                    <!-- follow -->
                    <div class="category_right my-3">
                        <h6 class="text-dark">Follow Us</h6>
                        <hr>
                        <div class="fb-page" data-href="https://www.facebook.com/Info-Channel-109463740923509" data-tabs="timeline" data-width="300" data-height="170" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Info-Channel-109463740923509" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Info-Channel-109463740923509">Info-Channel</a></blockquote></div>

                    </div>





                </div>


            </div>
            <!-- row end -->

        </div>
    </div>
<?php
include "include/footer.php";
?>