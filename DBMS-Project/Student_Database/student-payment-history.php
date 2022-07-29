<html>
    <head>
        <title>PAYMENT HISTORY</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('student-navbar.php'); ?>
        <br/>
        <center>Payment History</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Payment ID</th>
                <th>Date of Payment</th>
                <th>Due ID</th>
                <th>Payment Mode</th>
                <th>Amount Paid</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from payment where Roll_Number = '.$_SESSION['rollno'];

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('student-payment-history-row.php');
                        setStudentPaymentAttributes($row['Pay_Id'], $row['Date_of_Payment'], $row['Due_Id'], $row['Pay_Type'], $row['Amount']);
                    }
                }
            ?>
        </table>
    </body>
</html>