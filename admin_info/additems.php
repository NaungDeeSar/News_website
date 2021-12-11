<?php include 'include/header.php';
$msg="";
if(isset($_POST['insert'])){

  $title=$_POST['title'];
  $cat_id=$_POST['cat_id'];
  $tags=$_POST['tags'];
  $content=$_POST['content'];
  $photo=$_FILES['photo'];

$basepath="img/items/";
$fullpath=$basepath.$photo['name'];
move_uploaded_file($photo['tmp_name'],$fullpath);

  $sql="INSERT INTO items(title,cat_id,image,tag,content)VALUES(:item_name,:item_cat_id,:item_image,:item_tag,:item_content)";

  $stmt=$pdo->prepare($sql);

  $stmt->bindParam('item_name',$title);

  $stmt->bindParam('item_cat_id',$cat_id);

  $stmt->bindParam('item_image',$fullpath);

  $stmt->bindParam('item_tag',$tags);

  $stmt->bindParam('item_content',$content);
  $stmt->execute();

  if($stmt->rowCount()){
    $msg="Insert Item Successfully!";
  }

}

?>  

   
  <!--Main Navigation-->
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5"> 
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-muted">Items Add</h1>    
      <a href="items.php" class="btn btn-outline-primary waves-effect waves-light">
           
             <i class="far fa-hand-point-left"></i>
              <span>Go Back</span>
          </a>
  </div>
  <div class="col-md-8 offset-md-2">
                  <form  method="POST" enctype="multipart/form-data">

                      <!--Form without header-->
                      <div class="card">
                       

                          <div class="card-body mx-4">
                             <h2 class="text-danger py-2 ml-2"><?php echo $msg; ?></h2>

                              <!--Body-->
                              <div class="md-form">
                                  <input type="text" id="Form-email1" class="form-control" name="title">
                                  <label for="Form-email1" class="">Title</label>
                              </div>

                              
                               <label for="Form-selet1" class="">Category</label>

                              <select class="mdb-select md-form form-control" id="Form-selet1" name="cat_id">
                                <option value="" disabled selected>Choose your option</option>
                                <?php 
         $sql="SELECT * FROM category";
          $stmt=$pdo ->prepare($sql);
          $stmt ->execute();
          $cats=$stmt->fetchAll();
           foreach ($cats as $cat) {
            $id=$cat['id'];
            $name=$cat['name'];

           ?>
            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
          <?php } ?>
                              </select>

                               <label for="Form-selet1" class="">Photo</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                                  aria-describedby="inputGroupFileAddon01" name="photo">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                              <div class="md-form">
                                  <input type="text" id="Form-tag1" class="form-control" name="tags">
                                  <label for="Form-tag1" class="">Tags</label>
                              </div>

                              <div class="md-form">
                                <i class="fas fa-pencil-alt prefix"></i>
                                <textarea id="form10" class="md-textarea form-control" rows="3" name="content"></textarea>
                                <label for="form10">Content</label>
                              </div>


                              

                              <div class="row my-3 d-flex justify-content-center">
                                  <!--Facebook-->
                                  <button type="submit" class="btn btn-white btn-rounded mr-md-3 z-depth-1a waves-effect waves-light" name="insert">
                                      <i class="fas fa-plus fa-lg blue-text text-center" ></i> Add Item
                                  </button>
                                  
                              </div>

                          </div>

                   

                      </div>
                      <!--/Form without header-->

                  </form>

              </div>
   

   <!-- <div class="row">
     <div class="col-12 col-md-8 offset-md-2">
        <h2 class="text-danger"><?php echo $msg; ?></h2>
       <form method="POST" action="" enctype="multipart/form-data">
         <div class="form-group">
         <label>Title:</label>
         <input type="text" name="title" class="form-control">
       </div>
        <div class="form-group">
         <label>Category:</label>
         <select name="cat_id" class="form-control">
           <option>Selected Category</option>
           <?php 
         $sql="SELECT * FROM category";
          $stmt=$pdo ->prepare($sql);
          $stmt ->execute();
          $cats=$stmt->fetchAll();
           foreach ($cats as $cat) {
            $id=$cat['id'];
            $name=$cat['name'];

           ?>
            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
          <?php } ?>
         </select>
       </div>
       <div class="form-group">
         <label for="photo">Photo</label><br>
         <input type="file" name="photo">

       </div>
         <div class="form-group">
         <label>Tags:</label>
         <input type="text" name="tags" class="form-control">
       </div>
         <div class="form-group">
         <label>Content:</label>
        <textarea name="content" class="form-control">
          
        </textarea>
       </div>
       <input type="submit" name="insert" value="Save" class="btn btn-primary">
       </form>
     </div>
      
   </div> -->

      



    </div>
  </main>
  <!--Main layout-->

<?php include 'include/footer.php';?>  
