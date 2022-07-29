<?php

function setAttributesApproval($allocation_id, $hostel_id, $room_id, $roll_number, $hostel_type, $room_type, $from_stay, $to_stay, $status, $last_activity){
    echo'
    <form action="" method = "post">
<tr>
    <input type = \'hidden\' value = "'.$allocation_id.'" name = "allocid" />
    <td>'.$allocation_id.'</td>
    <td>'.$hostel_id.'</td>
    <td>'.$room_id.'</td>
    <td>'.$roll_number.'</td>
    <td>'.$hostel_type.'</td>
    <td>'.$room_type.'</td>
    <td>'.$status.'</td>
    <td>'.$last_activity.'</td>
    <td><input type = \'date\' name = "stayFrom" /></td>
    <td><input type = \'date\' name = "stayTo" /></td>
    <td><button class = \'btn btn-success\' name = \'approve-button'.$allocation_id.'\' type = \'submit\'>APPROVE</button></td>
    <td><button class = \'btn btn-warning\' name = \'reject-button'.$allocation_id.'\' type = \'submit\'>REJECT</button></td>
</tr>
</form>
';

include('db-connectivity.php');

if(array_key_exists('approve-button'.$allocation_id, $_POST)) {
    include('db-connectivity.php');
    if(isset($_POST['allocid']) && isset($_POST['stayFrom']) && isset($_POST['stayTo'])){
        $sql_student_details = 'Select * from student where RollNumber = '.$roll_number;

        $student_name = '';

        if($res = mysqli_query($link, $sql_student_details)){
            if($row = mysqli_fetch_assoc($res)){
                $student_name = $row['First Name'].' '.$row['Last Name'];
            }
        }

        $allotted_to = $student_name.' Roll Number : '.$roll_number;

        $sql_update_allocation = 'UPDATE `allocation` SET `Status` = "Approved", Staying_From = \''.$_POST['stayFrom'].'\', Staying_To = \''.$_POST['stayTo'].'\' WHERE Allocation_Id = '.$allocation_id;
        mysqli_query($link, $sql_update_allocation);

        $sql_update_allocation_prev = 'UPDATE `allocation` SET `Status` = "Terminated" WHERE Allocation_Id != '.$allocation_id.' and Roll_Number = '.$roll_number;
        mysqli_query($link, $sql_update_allocation_prev);

        $sql_update_room_prev = 'UPDATE `room details` SET `Status` = "Available", Requested_By = "", Allotted_To = "", Allotted_Roll_Number = "" WHERE Allotted_Roll_Number = '.$roll_number;
        mysqli_query($link, $sql_update_room_prev);

        $sql_update_room = 'UPDATE `room details` SET `Status` = "Allotted", Allotted_To = "'.$allotted_to.'",  Allotted_Roll_Number = "'.$roll_number.'" WHERE Room_Id = '.$room_id;
        mysqli_query($link, $sql_update_room);

        //echo $sql_update_allocation;
        include_once('success-message.php');
        setSuccessMessage('Request succesfully approved...Redirecting in few seconds..Please wait...');
        echo '<meta http-equiv="refresh" content="3; URL=admin-index.php">';
        //header( "refresh:2;Location=admin-allocation-approval.php" );
    }
    else{
        include_once('error-message.php');
        setErrorMessage('All fields are mandatory');
    }
}

else if(array_key_exists('reject-button'.$allocation_id, $_POST)) {
    //echo 'hi reject';
    include('db-connectivity.php');
    if(isset($_POST['allocid'])){
        $sql_student_details = 'Select * from student where RollNumber = '.$roll_number;

        $student_name = '';

        if($res = mysqli_query($link, $sql_student_details)){
            if($row = mysqli_fetch_assoc($res)){
                $student_name = $row['First Name'].' '.$row['Last Name'];
            }
        }

        $allotted_to = $student_name.' Roll Number : '.$roll_number;

        $sql_update_allocation = 'UPDATE `allocation` SET `Status` = "Rejected" WHERE Allocation_Id = '.$allocation_id;
        mysqli_query($link, $sql_update_allocation);
        $sql_update_room = 'UPDATE `room details` SET `Status` = "Allotted", Allotted_To = "", Requested_By = "", `Status` = "Available" WHERE Room_Id = '.$room_id;
        mysqli_query($link, $sql_update_room);

        include_once('success-message.php');
        setSuccessMessage('Request succesfully rejected...Redirecting in few seconds..Please wait...');
        //header( "refresh:2;Location=admin-allocation-approval.php" );
        echo '<meta http-equiv="refresh" content="3; URL=admin-index.php">';
    }
    else{
        include_once('error-message.php');
        setErrorMessage('All fields are mandatory');
    }
}
}

?>