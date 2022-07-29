<html>
    <head>
        <title>PAYMENT HISTORY</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('admin-navbar.php'); ?>
        <br/>
        <center>Payment History</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Pay Id</th>
                <th>Due Id</th>
                <th>Roll Number</th>
                <th>Payment Mode</th>
                <th>Paid Amount</th>
                <th>Payment Date</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from payment';

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('admin-payment-history-row.php');
                        setAttributesAllPayment($row['Pay_Id'], $row['Due_Id'], $row['Roll_Number'], $row['Pay_Type'], $row['Amount'], $row['Date_of_Payment']);
                    }
                }
            ?>
        </table>
    </body>
</html>