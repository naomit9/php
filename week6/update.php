<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php
    include('reusables/nav.php')
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">
                    Update Student Profile
                </h1>
            </div>
        </div>

        <?php
        $id = $_GET['id'];
            $connect = mysqli_connect('localhost', 'root', 'root', 'http5225');
            $query = "SELECT * FROM students WHERE `id` = '$id' ";
            $student = mysqli_query($connect, $query);

            $result = $student -> fetch_assoc();
        ?>
        
            <form action="./includes/updateStudent.php" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo $result['id'] ?>">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $result['fname'] ?>" >
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $result['lname'] ?>" >
            </div>
            <div class="mb-3">
                <label for="marks" class="form-label">Marks</label>
                <input type="number" class="form-control" id="marks" name="marks" value="<?php echo $result['marks'] ?>" >
            </div>
            <div class="mb-3">
                <label for="imageURL" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="imageURL" name="imageURL" value="<?php echo $result['imageURL'] ?>" >
            </div>
            
            
            <button type="submit" name="updateStudent" class="btn btn-primary">Update</button>
            </form>
    </div>
</body>