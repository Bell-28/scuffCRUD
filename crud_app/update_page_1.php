<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>  


    <?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
 

            $query = "select * from `students` where `id` = '$id'";

            $result = mysqli_query($connection, $query);

                if(!$result){
                 die("query failed".mysqli_error());
                }
                else{

                    $row = mysqli_fetch_assoc($result);
                    
                    
                     
                }
            }
    ?>


        <?php

            if(isset($_POST['update_students'])){

                if(isset($_GET['id_new'])){
                    $idnew = $_GET['id_new'];
                }

                $fname = $_POST['f_name'];
                $lname = $_POST['l_name'];
                $age = $_POST['age'];

                $query = "update `students` set `FirstName` = '$fname', `LastName` = '$lname', `Age` = '$age' where `id` = '$idnew'";

                $result = mysqli_query($connection, $query);

                if(!$result){
                 die("query failed".mysqli_error());
                }
                else{
                    header('location:index.php?update_msg=Successful update');
                }


            }

        ?>



        <form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="f_name"> First Name </label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['FirstName']?>">
           </div>  
           <div class="form-group">
                <label for="l_name"> Last Name </label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row['LastName']?>">
           </div> 
           <div class="form-group">
                <label for="age"> Age </label>
                <input type="text" name="age" class="form-control" value="<?php echo $row['Age']?>">
           </div> 
           <input type="submit" class="btn btn-success" name="update_students" value="Update">
        </form>

    
<?php include('footer.php'); ?>