<?php
include_once('db-connectivity.php');

if(isset($_POST['rollno']) && isset($_POST['dueoption']) && isset($_POST['amount']) && isset($_POST['duedate'])){
  $roll_no = $_POST['rollno'];
  $due_option = $_POST['dueoption'];
  $amount = $_POST['amount'];
  $duedate = $_POST['duedate'];

  if($roll_no == 'No Option' || $due_option == 'No Option' || $amount == '' || $duedate == ''){
      include_once('error-message.php');
      setErrorMessage('All fields are mandatory');
  }

  else{
      $due_number = rand(72615,918351);
    $sql_insert_due_request = "INSERT INTO dues (Due_Id, Roll_Number, Type_of_Due, Amount_Payable, Amount_to_be_Paid, `Status`, Due_Date) VALUES (".$due_number.", ".$roll_no.", '".$due_option."', ".$amount.", ".$amount.", 'Pending Approval', '".$duedate."')";
    //echo $sql_insert_due_request;

    mysqli_query($link, $sql_insert_due_request);
    include_once('success-message.php');
    setSuccessMessage('Request succesfully submitted...Redirecting in few seconds..Please wait...');
    header( "refresh:2;url=admin-index.php" );
  }
}
?>