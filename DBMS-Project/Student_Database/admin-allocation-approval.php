<html>
    <head>
        <title>ALLOCATION APPROVAL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php session_start(); include('admin-navbar.php'); ?>
        <br/>
        <center>Allocation History</center>
        <hr/>
        <table class="table table-striped">
            <tr>
                <th>Allocation Number</th>
                <th>Hostel Number</th>
                <th>Room Number</th>
                <th>Roll Number</th>
                <th>Location</th>
                <th>Type</th>
                <th>Status</th>
                <th>Last Activity On</th>
                <th>Staying From</th>
                <th>Staying To</th>
                <th>ACTION 1</th>
                <th>ACTION 2</th>
            </tr>

            <?php
                include_once('db-connectivity.php');

                $sql_allocation_history = 'Select * from allocation where Status = "Pending Approval"';

                if($res = mysqli_query($link, $sql_allocation_history)){
                    while($row = mysqli_fetch_assoc($res)){
                        include_once('admin-allocation-approval-row.php');
                        setAttributesApproval($row['Allocation_Id'], $row['Hostel_Id'], $row['Room_Id'], $row['Roll_Number'], $row['Hostel_Type'], $row['Conditioning'], $row['Staying_From'], $row['Staying_To'], $row['Status'], $row['Last_Activity']);
                    }
                }
            ?>
        </table>
    </body>
</html>