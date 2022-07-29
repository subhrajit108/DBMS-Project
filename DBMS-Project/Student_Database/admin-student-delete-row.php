<?php

function setAttributesStudent($roll_number, $name, $address, $gender, $category, $department, $programme, $mobile, $email){
    echo'
    <form action="" method = "post">
<tr>
    <td>'.$roll_number.'</td>
    <td>'.$name.'</td>
    <td>'.$address.'</td>
    <td>'.$gender.'</td>
    <td>'.$category.'</td>
    <td>'.$department.'</td>
    <td>'.$programme.'</td>
    <td>'.$mobile.'</td>
    <td>'.$email.'</td>
    <td><button class = \'btn btn-warning\' name = \'delete-btn'.$roll_number.'\' type = \'submit\'>DELETE</button></td>
</tr>
</form>
';

if(array_key_exists('delete-btn'.$roll_number, $_POST)){
    include('db-connectivity.php');
    $sql_delete_student = 'Delete from student where RollNumber = '.$roll_number;
    //echo $sql_delete_student;
    mysqli_query($link, $sql_delete_student);

    include_once('success-message.php');
    setSuccessMessage('Student deletion in process...Redirecting in few seconds..Please wait...');
    echo '<meta http-equiv="refresh" content="3; URL=admin-index.php">';
}
}

?>