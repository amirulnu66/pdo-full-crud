<?php 
   include "Database.php";
   include "config.php";

?>
<?php
   $db = new Database;
   $query = "SELECT * FROM crud_tbl";
   $read = $db->selectData($query);
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
               <div class="col-md-2"></div>
                  <div class="col-md-8">
                     <div class="panel panel-primary">
                        <div class="panel-heading">CRUD Project</div>
                        <?php
                           if(isset($_GET['msg'])){
                              echo "<span style='color:green'>".$_GET['msg']."</span>";
                           }
                           ?>   

                           
                              <table class="table table-hover">
                                 
                                 <tr>
                                    
                                    <th width="10%">Serial</th>
                                    <th width="30%">Nmae</th>
                                    <th width="25%">Email</th>
                                    <th width="15%">Skill</th>
                                    <th width="15%">Action</th>
                                 </tr>

                                 <?php if($read){ ?>
                                    
                                    <?php 
                                    
                                       $i=1;
                                    while($row = $read->fetch_assoc()): ?>
                                 <tr>
                                    
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['skil'];?></td> 

                                    <td><a href="update.php?id=<?php echo $row['id'];?>">Edit</a></td>
                                 </tr>
                                   
                                    <?php endwhile;?>
                                <?php }else{?>
                                    <p>Data not a abolele !!</p>
                                <?php }?>
                              </table>
                           
                     
                       
                     </div>
                  </div>

               <div class="col-md-2"></div>  
               <a href="create.php">create</a> 
            </div>
         </div>
      </section>
   </body>
</html>