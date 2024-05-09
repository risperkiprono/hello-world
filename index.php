<?php
session_start();
require ('dbconnect.php');
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student Info</title>
  </head>
  <body>

  <div class="container mt-5">

    <?php include('message.php') ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> Student Details
              <a href="create_student.php" role="button" class="btn btn-primary float-end">Add Students</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Email Address</th>
                  <th>Telephone Number</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
              </thead>
          <tbody>
                <?php
                $query=" SELECT * FROM  students";
                $query_result=mysqli_query($con, $query);
                if(mysqli_num_rows($query_result)>0)
                {
                  foreach($query_result as $student)
                  {
                    ?>
         <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['student_name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['phone']; ?></td>
            <td><?php echo $student['course']; ?></td>
            <td>
                <a href="view.php?id=<?php echo base64_encode(urlencode($student['id'])); ?>" class="btn btn-success btn-sm">View</a>
                <a href="edit.php?id=<?php echo base64_encode(urlencode($student['id'])); ?>" class="btn btn-info btn-sm">Edit</a>
                <form action="crud.php" method="POST" class="d-inline">
                  <button type="submit"  name = "delete_student"  value = "<?php echo base64_encode(urlencode($student['id'])); ?>"class="btn btn-danger btn-sm">Delete</a>
                </form>
            </td>
        </tr>
                <?php
                  }

                }
                else
                {
                  echo"No record found";
                }
                ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>