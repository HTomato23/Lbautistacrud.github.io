<?php
    // Include db.php for database connection
    include 'db.php';

    //get the information based on the id
    if(isset($_REQUEST['student_id'])) {
        $student_id = $_REQUEST['student_id'];

        // Execute SQL query to select user information'
        $sql = "SELECT * FROM student_info WHERE student_id = '$student_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assign user information to variables
            $fname = $row["first_name"];
            $mname = $row["middle_name"];
            $lname = $row["last_name"];
            $suffix = $row["suffix"];
            $course = $row["Course"];
            $year_section = $row["year_section"];
        } else {
            echo "No user found with the given ID.";
            exit(); // Stop script execution if ID not found
        }
    } else {
        echo "No ID provided.";
        exit(); // Stop script execution if ID not provided
    }

    // Updates the records.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $student_id = $_POST['student_id'];
        $fname = $_POST['first_name'];
        $mname = $_POST['middle_name'];
        $lname = $_POST['last_name'];
        $suffix = $_POST['suffix'];
        $course = $_POST['Course'];
        $year_section = $_POST['year_section'];

        // Prepare and execute SQL query for update
        $sql = "UPDATE student_info SET first_name='$fname', middle_name='$mname', last_name='$lname', suffix='$suffix', Course='$course', year_section='$year_section' WHERE student_id = '$student_id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <form method="POST">
        Student Information<br><br>
        <input type="hidden" name="student_id" value="<?php echo $student_id ?>"><br> <!-- "echo $id"  used to display value-->
        First Name:
        <input type="text" name="first_name" value="<?php echo $fname ?>"><br><br>
        Middle Name:
        <input type="text" name="middle_name" value="<?php echo $mname ?>"><br><br>
        Last Name:
        <input type="text" name="last_name" value="<?php echo $lname ?>"><br><br>
        Suffix:
        <input type="text" name="suffix" value="<?php echo $suffix ?>"><br><br>
        Course:
        <input type="text" name="Course" value="<?php echo $course ?>"><br><br>
        Year & Section:
        <input type="text" name="year_section" value="<?php echo $year_section ?>"><br><br>
        <input type="submit" value="Update"> 
        <a href="index.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>
