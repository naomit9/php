<?php 
    if (isset($_POST['grades'])) {    // check if the submit button is clicked, submit should have a name value, pass this name
    //print_r($_POST);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $marks = $_POST['marks'];
    $imageURL = $_POST['imageURL'];

    // Connection String
    include('../includes/connect.php');

    $query = "INSERT INTO students(fname, lname, marks, imageURL) VALUES ('$fname', '$lname', '$marks', '$imageURL')";
    
    $students = mysqli_query($connect, $query);

    if ($students) {
        echo ("Success");
    } else {
        echo ("Failed") . mysqli_error($connect);
    }
    } else {
        echo ("You should not be here");
    }
?>