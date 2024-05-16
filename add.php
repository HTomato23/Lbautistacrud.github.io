<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit';
        }

        body {
            background-color: #F1F6F9;

        }

        h1 {
            text-align: center;
            margin: 20px auto;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
        }

        form {
            border: 1px solid #1A1717;
            border-radius: 20px;
            padding: 40px;
            height: 600px;
            width: 500px;
        }

        input {
            height: 30px;
            width: 420px;
            margin: 5px auto;
        }
    </style>
</head>
<body>
<h1>Student Information Form</h1>
        <div class="container">
            <form method="POST">
                Student ID:<br>
                <input type="int" name="student_id" required><br>
                First Name:<br>
                <input type="text" name="first_name" required><br>
                Middle Name:<br>
                <input type="text" name="middle_name" required><br>
                Last Name:<br>
                <input type="text" name="last_name" required><br>
                Suffix:<br>
                <input type="text" name="suffix" required><br>
                Course:<br>
                <input type="text" name="Course" required><br>
                Year & Section:<br>
                <input type="text" name="year_section" required><br>
                <input type="submit" value="Add">
                <input type="reset" value="Clear">
                <a href="index.php"><input type="button" value="Back"></a>
            </form>
        </div>
        <?php
            include 'db.php'; // Include db.php for database connection

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Collect form data
                $student_id = $_POST['student_id'];
                $fname = $_POST['first_name'];
                $mname = $_POST['middle_name'];
                $lname = $_POST['last_name']; 
                $suffix = $_POST['suffix']; 
                $course = $_POST['Course']; 
                $year_section = $_POST['year_section']; 

                // Insert data into database
                $sql = "INSERT INTO student_info (student_id, first_name, middle_name, last_name, suffix, Course, year_section) VALUES ('$student_id', '$fname', '$mname', '$lname', '$suffix', '$course', '$year_section')";
                
                
                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>  
</body>
</html>

