<?php
session_start();
require('dbconnect.php');

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id ='$student_id'";
    $result = mysqli_query($con, $query);

    if($result) 
    {
        $_SESSION['message'] = "Student info Deleted Successfully";
    } 
    else
    {
        $_SESSION['message'] = "Error: " . mysqli_error($con);
    }

    header("location:index.php");
    exit(0);
}



if(isset($_POST['update_student']))

{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE  students set student_name = '$name', email='$email', phone ='$telephone',course='$course' 
    WHERE id='$student_id' ";
    $result = mysqli_query($con, $query);
    if($result)
    {
        $_SESSION['message']="Student info updated Successfully";
        header("location:index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Student info not Updated";
        header("location:index.php");
        exit(0);
    }
}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (student_name,email,phone,course) values ('$name','$email','$telephone', '$course')";
    $result=mysqli_query($con, $query);
    if($result){

        $_SESSION['message']="Student Created Successfully";
        header("location:create_student.php");
        exit(0);

    }
    else{
        $_SESSION['message']="Student Not Created";
        header("location:create_student.php");
        exit(0);
    }
}
?>