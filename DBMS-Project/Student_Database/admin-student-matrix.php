<html>
    <head>
        <title>STUDENT MATRIX</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('admin-navbar.php'); ?>
        <br/>
        <center>Student Matrices</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Matrix</th>
                <th>Male</th>
                <th>Female</th>
                <th>General</th>
                <th>OBC</th>
                <th>SC</th>
                <th>ST</th>
                <th>Total</th>
            </tr>

            <?php
            include_once('db-connectivity.php');
            $sql_btech_cse_full_male = "SELECT * from student where Category = 'B.Tech' and Department = 'CSE' and Programme = 'Full Time' and Gender = 'Male'"
            $sql_btech_cse_full_male = "SELECT * from student where Category = 'B.Tech' and Department = 'CSE' and Programme = 'Full Time' and Gender = 'Male'"
            $sql_btech_cse_full_male = "SELECT * from student where Category = 'B.Tech' and Department = 'CSE' and Programme = 'Full Time' and Gender = 'Male'"
            $sql_btech_cse_full_male = "SELECT * from student where Category = 'B.Tech' and Department = 'CSE' and Programme = 'Full Time' and Gender = 'Male'"
            ?>
        </table>
    </body>
</html>