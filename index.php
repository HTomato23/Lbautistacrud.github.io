<?php
    include 'db.php'; // Include db.php for database connection

    // Retrieve data from the database
    $sql = "SELECT * FROM student_info";//selects all columns from users table
    $result = mysqli_query($conn, $sql);//executes mysqli query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        body {
            font-family: 'Outfit';
            margin: 0;
            padding: 20px;
            background-color: #F0F6F9;
        }
        h2 {
            color: #1A1717;
            text-align: center;
            font-weight: 800;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #1A1717;
            text-align: center;
            padding: 8px;
            color: #1A1717;
        }
        th {
            background-color: #1A1717;
            color: #F1F6F9;
        }

        button {
            height: 40px;
            width: 130px;
            border-style: none;
            border-radius: 30px;
            color: #1A1717;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
            background-color: #F1F6F9;
            box-shadow: 7px 10px 15px -8px #00000060;
            cursor: pointer;   
            transition: 0.5s;
            margin: 20px 5px;
        }

        button:hover {
            background-color: #1A1717;
            color: #F1F6F9;
        }
    </style>
</head>
<body>

    <h2>SIMPLE CRUD SYSTEM</h2>
    <a href="add.php"><button>INSERT</button></a>
    
    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Suffix</th>
            <th>Course</th>
            <th>Year & Section</th>
            <th>Action</th>
        </tr>
        <?php
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {// "mysqli_fetch_assoc()" used to fetch a record in a table.
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";//displays the id 
                echo "<td>" . $row['first_name'] . "</td>";//displays the first name
                echo "<td>" . $row['middle_name'] . "</td>";//displays the middle name
                echo "<td>" . $row['last_name'] . "</td>";//displays the last name 
                echo "<td>" . $row['suffix'] . "</td>";//displays the suffix
                echo "<td>" . $row['Course'] . "</td>";//displays the course 
                echo "<td>" . $row['year_section'] . "</td>";//displays the year & section 
            
            
                echo "<td>";
                echo "<a href='delete.php?student_id=" . $row['student_id'] . "'><button>Delete</button></a>";//delete button
                echo "<a href='update.php?student_id=" . $row['student_id'] . "'><button>update</button></a>";//update button

                echo "</td>";
                echo "</tr>";
            }
        ?>

    </table>
</body>
</html>
