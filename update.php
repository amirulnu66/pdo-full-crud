<?php 
   include "config.php";
   include "Database.php";
?>

<?php
   $id = $_GET['id'];
   $db = new Database();
   $query = "SELECT * FROM crud_tbl WHERE id=$id";
   $getData = $db->selectData($query)->fetch_assoc();


   if(isset($_POST['submit'])){
          $name = mysqli_real_escape_string($db->conn, $_POST['name']); 
          $email = mysqli_real_escape_string($db->conn, $_POST['email']); 
          $skil =  mysqli_real_escape_string($db->conn, $_POST['skil']); 

         if($name == '' or $email == '' or $skil == ''){
            $error = "Field must not be empty !!";
         }else{

            $query = "UPDATE crud_tbl 
            SET 
               name ='$name',
               email ='$email',
               skil ='$skil'
               WHERE id=$id";

            $update = $db->update($query);
         }
   }

?>

<?php
   if(isset($_POST['delete'])){
      $query = "DELETE FROM crud_tbl WHERE id=$id";
      $deleteData= $db->delete($query);
   }

?>

<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title>Medicen coneer</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
   </head>
   <body>
      <header>
         <div class="container">
            <div class="col-lg-12">
               
            </div>
         </div>
      </header>
      <section>
         <div class="container">
            <div class="jumbotron">
               <h2>Live With Traning project <span>AI curd</span>   </h2>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-3"></div>
                  <div class="col-md-6">
                     <div class="panel panel-primary">
                        <div class="panel-heading">CRUD Project sadfsdf</div> 
                        <?php
                           if(isset($error)){
                              echo "<span style='color:red'>".$error."</span>";
                           }
                           ?>   
                           <form method="post"  action="update.php?id=<?php echo $id; ?>">
                              <table class="table table-hover">
                                 <tr>
                                    <td>User name</td>
                                    <td><input type="text" class="form-control" name="name" value="<?php echo $getData['name']; ?>"></td>
                                 </tr> 
                                 <tr>
                                    <td>Email</td>
                                    <td><input type="email" class="form-control" name="email" value="<?php echo $getData['email']; ?>"></td>
                                 </tr>
                                 <tr>
                                    <td>Skill</td>
                                    <td><input type="text" class="form-control" name="skil" value="<?php echo $getData['skil']; ?>"></td>
                                 </tr>
                                   
                                 <tr>
                                    
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Update"></td>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="delete" value="Delete"></td>
                                 </tr>
                              </table>
                           </form>
                     
                       
                     </div>
                  </div>

               <div class="col-md-3"></div>  
               <a href="index.php">Edit</a> 
            </div>
         </div>
      </section>
   </body>
</html>