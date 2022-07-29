<html>
    <head>
        <title>ALLOCATION APPROVAL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('admin-navbar.php'); ?>
        <br/>
        <center>Delete Student</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Category</th>
                <th>Department</th>
                <th>Programme</th>
                <th>Mobile</th>
                <th>Email ID</th>
                <th>Action</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from student';

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('admin-student-delete-row.php');
                        setAttributesStudent($row['RollNumber'], $row['First Name'].' '.$row['Last Name'], $row['Address'], $row['Gender'], $row['Category'], $row['Department'], $row['Programme'], $row['Mobile_Number'], $row['Email_Id']);
                    }
                }
            ?>
        </table>
    </body>
</html>