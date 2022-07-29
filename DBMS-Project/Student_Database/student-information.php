<html>
    <head>
        <title>HOME - STUDENT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <?php 
        session_start();
        include('student-navbar.php');
        include('student-information-card.php');
        $sql_student_information = 'Select * from student where RollNumber = '.$_SESSION['rollno'];

        if($res = mysqli_query($link, $sql_student_information)){
            if($row = mysqli_fetch_assoc($res)){
                studentInformation($row['First Name'], $row['Last Name'], $row['Gender'], $row['Address'], $row['Email_Id'], $row['Mobile_Number'], $row['Category'], $row['Department'], $row['Programme'], $row['RollNumber']);
            }
        }
        ?>
    </body>
</html>