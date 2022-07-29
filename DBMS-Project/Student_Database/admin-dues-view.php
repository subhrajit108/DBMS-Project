<html>
    <head>
        <title>DUES HISTORY</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('admin-navbar.php'); ?>
        <br/>
        <center>Dues History</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Due Id</th>
                <th>Roll Number</th>
                <th>Type of Due</th>
                <th>Amount Payable</th>
                <th>Paid Amount</th>
                <th>Amount to be Paid</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from dues';

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('admin-dues-view-row.php');
                        setAttributesAllDues($row['Due_Id'], $row['Roll_Number'], $row['Type_of_Due'], $row['Amount_Payable'], $row['Amount_Paid'], $row['Amount_to_be_Paid'], $row['Due_Date'], $row['Status']);
                    }
                }
            ?>
        </table>
    </body>
</html>