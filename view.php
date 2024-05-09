<?php
session_start();
require('dbconnect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student View Details</title>
  </head>
  <body>
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Student Information
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                <?php
                if(isset($_GET['id']))
                {

                    $student_id= base64_decode(urldecode($_GET['id'])); /*decoding the url */
                    $query = "SELECT * FROM students where id = '$student_id' "; 

                    $result=mysqli_query($con, $query);
                    if(mysqli_num_rows($result)>0)
                    {
                        $student= mysqli_fetch_array($result);
                        ?>
   
                        <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                        <div class="mb-3">
                            <label>Student Name</label>
                            <p class="form-control">
                                <?php echo $student['student_name']; ?>
                            </P>
                        </div>
                        <div class="mb-3">
                            <label for="">Email Address</label>
                            <p class="form-control">
                                <?php echo $student['email']; ?>
                            </P>
                        </div>
                        <div class="mb-3">
                            <label for="">Telephone Number</label>
                            <p class="form-control">
                                <?php echo $student['phone']; ?>
                            </P>
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <p class="form-control">
                                <?php echo $student['course']; ?>
                            </P>
                        </div>
                     <?php
                    }
                   
                    else{
                        echo "<h4> No such id </h4> ";
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>