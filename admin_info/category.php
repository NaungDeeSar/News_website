<?php include 'include/header.php';

if(isset($_POST['save'])){

  $name=$_POST['name'];

  $sql="INSERT INTO category(name)VALUES(:cat_name)";

  $stmt=$pdo->prepare($sql);

  $stmt->bindParam('cat_name',$name);
  $stmt->execute();

}

?>  

   
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">  
       
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-muted">Category</h1>
   
  </div>
   
   <div class="row">
     <div class="col-12 col-md-6">
       <form method="POST" action="">
      <!--   <div class="md-form">
                      <input type="text" id="form1" class="form-control">
                      <label for="form1" class="">Basic example</label>
        </div> -->
        <div class="md-form">
                    <i class="fa fa-arrows" aria-hidden="true"></i>
                      <input type="text" id="form10" class="form-control validate" name="name">
                      <label for="form10" data-error="wrong" data-success="right">Title</label>
                  </div>
        
       <input type="submit" name="save" value="Save" class="btn btn-primary">
       </form>
       <br>
       <?php
        if(isset($_POST['update'])){
        $id=$_POST['id'];
       
        $name=$_POST['name'];

        $sql="UPDATE category SET name=:cat_name WHERE id=:cat_id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam('cat_id',$id);
        $stmt->bindParam('cat_name',$name);      

        $stmt->execute();

       
}
        ?>
      
      

         
         <form method="POST" action="">
         
           <?php 
                if(isset($_GET['edit'])){
                  $id=$_GET['edit'];
                 

                  $sql="SELECT * FROM category where id=:cat_id";
                  $stmt=$pdo->prepare($sql);
                  $stmt->bindParam('cat_id',$id);
                  $stmt->execute();
                  $cat=$stmt->fetch(PDO::FETCH_ASSOC);

        ?>
      
        <div class="md-form">
          <input type="hidden" name="id" value="<?php echo $cat['id'] ?>">
                    <i class="fa fa-arrows" aria-hidden="true"></i>
                      <input type="text" id="form10" class="form-control validate" name="name" value="<?php echo $cat['name'] ?>">
                      <label for="form10" data-error="wrong" data-success="right">Title</label>
                  </div>
        
       <input type="submit" name="update" value="Update" class="btn btn-primary">
         <?php 


     }

   

        ?>
       </form>
     

     </div>
      <div class="col-12 col-md-6">
        <!--Card-->
          <div class="card">
         <!--Card content-->

            <div class="card-body">
              <!-- Table  -->
              <table class="table table-hover">
                <!-- Table head -->
                <thead class="blue-grey lighten-4">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                 
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <?php 

          $sql="SELECT * FROM category";
          $stmt=$pdo ->prepare($sql);
          $stmt ->execute();
          $items=$stmt->fetchAll();
          $i=0;
          foreach ($items as $item) { 
            $i++;

           ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td>
                     <a href="category.php?edit=<?php echo $item['id']; ?>" name="edit" class="btn btn-outline-success btn-sm waves-effect btn-sm">Edit</a>
                    
                     <a  href="cat_del.php?id=<?php echo $item['id'] ?>" class="btn btn-outline-danger btn-sm waves-effect">Delete</a>
                    
                    </td>
                   
                  </tr>
                 <?php } ?>
                 
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>
          </div>
      </div>
   </div>
    </div>
  </main>
  <!--Main layout-->

<?php include 'include/footer.php';?>  
