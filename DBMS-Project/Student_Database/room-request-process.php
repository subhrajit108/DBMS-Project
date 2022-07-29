<?php
//session_start();
$rollNumber = $_SESSION['rollno'];

if(isset($_POST['roomsize']) && isset($_POST['aircond'])){
  $room_size = $_POST['roomsize'];
  $air_conditioning = $_POST['aircond'];

  if($room_size == 'No Option' || $air_conditioning == 'No Option'){
      include_once('error-message.php');
      setErrorMessage('All fields are mandatory');
  }

  else{

    include_once('db-connectivity.php');

    $hostel_type = '';
    $requested_by = '';
    $sql_student_info = 'SELECT * FROM student where RollNumber = '.$rollNumber;
    if($res = mysqli_query($link, $sql_student_info)){
      if($row = mysqli_fetch_assoc($res)){
        $requested_by = $row['First Name'].' '.$row['Last Name'].' Roll Number : '.$row['RollNumber'];
        if($row['Gender'] == 'Male'){
          $hostel_type = 'Boys Hostel';
        }
        else{
          $hostel_type = 'Girls Hostel';
        }
      }
    }

    $sql_room_det = 'SELECT * FROM `room details` where `Room_Size` = \''.$room_size.'\' and Conditioning = \''.$air_conditioning.'\' and Status = \'Available\' and `Hostel_Id` in (Select `Hostel_Id` from `hostel details` where `Hostel_Type` like \'%'.$hostel_type.'%\')';
    //echo $sql_room_det;
    //echo 'Hi';
    $allocation_number = rand(1526718, 3999999);
    if($res = mysqli_query($link, $sql_room_det)){
      //echo mysqli_num_rows($res);

      if(mysqli_num_rows($res)>0){
        if($row = mysqli_fetch_assoc($res)){
          //echo 'Hostel Number : '.$row['Hostel_Id'];
          //echo 'Room Number : '.$row['Room_Id'];
          $last_activity =  date('Y-m-d');
          //echo $last_activity;

          $sql_insert_allocation_request = "INSERT INTO allocation (Allocation_Id, Room_Id, Hostel_Id, Hostel_Type, Roll_Number, `Status`, Conditioning, Last_Activity) VALUES (".$allocation_number.", ".$row['Room_Id'].", ".$row['Hostel_Id'].", '".$hostel_type."', ".$rollNumber.", 'Pending Approval', '".$air_conditioning."', '".$last_activity."')";
          //echo $sql_insert_allocation_request;
          mysqli_query($link, $sql_insert_allocation_request);
          
          $sql_update_room_booking = 'UPDATE `room details` SET `Status` = "Booked and Pending for Approval", Requested_By = "'.$requested_by.'" WHERE Room_Id = '.$row['Room_Id'];
          mysqli_query($link, $sql_update_room_booking);

          include_once('success-message.php');
          setSuccessMessage('Request succesfully submitted...Redirecting in few seconds..Please wait...');
          header( "refresh:2;url=student-index.php" );
        }
      }
      else{
        include_once('error-message.php');
        setErrorMessage('No rooms available. Please contact the administration');
      }
  }
    //header( "refresh:2;url=student-index.php" );
  }
}
?>