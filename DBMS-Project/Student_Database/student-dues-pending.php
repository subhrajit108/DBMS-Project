<html>
    <head>
        <title>DUES PENDING</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('student-navbar.php'); ?>
        <br/>
        <center>Dues History</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Due Number</th>
                <th>Due Type</th>
                <th>Total Amount</th>
                <th>Amount Paid</th>
                <th>Amount to be Paid</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Amount Paid</th>
                <th>Pay Via</th>
                <th>Pay</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from dues where Roll_Number = '.$_SESSION['rollno'].' order by Status desc';

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('student-dues-pending-row.php');
                        setStudentDueAttributes($row['Due_Id'], $row['Type_of_Due'], $row['Amount_Payable'], $row['Amount_Paid'], $row['Amount_to_be_Paid'], $row['Due_Date'], $row['Status']);
                    }
                }
            ?>
        </table>
    </body>
</html>