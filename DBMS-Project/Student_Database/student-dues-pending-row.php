<?php

function setStudentDueAttributes($due_id, $due_type, $total_amount, $amount_pay_database, $amount_to_be_paid_database, $due_date, $status){
    echo '
    <form action="student-dues-pending.php" method = "post">
    <tr>
        <td>'.$due_id.'</td>
        <td>'.$due_type.'</td>
        <td>'.$total_amount.'</td>
        <td>'.$amount_pay_database.'</td>
        <td>'.$amount_to_be_paid_database.'</td>
        <td>'.$due_date.'</td>
        <td>'.$status.'</td>';
        if($status != 'Cleared'){
        echo '<td><input type = \'number\' name = "amount" /></td>
        <td>
        <select class="form-select" aria-label="Default select example" name = "payvia">
            <option selected value = "No Option">Select your choice</option>
            <option value="UPI">UPI</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
        </select>
        </td>
        <td><button class = \'btn btn-success\' name = \'pay-'.$due_id.'\' type = \'submit\'>PAY</button></td>';
        }
        else{
            echo '<td><input type = \'number\' name = "amount" disabled = "true" /></td>
            <td>
            <select class="form-select" aria-label="Default select example" name = "payvia" disabled = "true">
            <option selected value = "No Option">Select your choice</option>
            <option value="UPI">UPI</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
            </select>
            </td>
            <td><button class = \'btn btn-success\' name = \'pay-'.$due_id.'\' type = \'submit\' disabled = "true">PAY</button></td>'; 
        }
        echo '
    </tr>
    </form>
    ';

    if(array_key_exists('pay-'.$due_id, $_POST)) {
        if(isset($_POST['amount']) && isset($_POST['payvia'])){
            if($_POST['amount'] == '' || $_POST['payvia'] == 'No Option'){
                include_once('error-message.php');
                setErrorMessage('All Fields are mandatory');
            }

            else if($_POST['amount'] > $amount_to_be_paid_database){
                include_once('error-message.php');
                setErrorMessage('Paid amount cannot be greater than the actual payable amount');
            }

            else if($_POST['amount'] <0){
                include_once('error-message.php');
                setErrorMessage('Paid amount cannot be less than 0');
            }

            else{
                include('db-connectivity.php');
                $amount_paid = $_POST['amount'];
                $pay_via = $_POST['payvia'];

                $date_payed = date('Y-m-d');
                $roll_number = $_SESSION['rollno'];
                $pay_id = rand(178281, 8918278);

                $sql_insert_payment_info = 'INSERT into payment (Pay_Id, Due_Id, Roll_Number, Pay_Type, Amount, Date_of_Payment) values ('.$pay_id.', '.$due_id.', '.$roll_number.', \''.$pay_via.'\', '.$amount_paid.', \''.$date_payed.'\')';
                //echo $sql_insert_payment_info;
                mysqli_query($link, $sql_insert_payment_info);

                $paid = (int) $amount_pay_database + (int) $amount_paid;
                //echo 'Paid : '.$paid;
                $amount_to_be_paid = (int) $total_amount - (int) $paid;
                //echo 'Amount to be Paid : '.$amount_to_be_paid;

                if($amount_to_be_paid>0){
                    $sql_update_dues_info = "update dues set Amount_Payable = ".$total_amount.", Amount_Paid = ".$paid.", Amount_to_be_Paid = ".$amount_to_be_paid.", Status = 'Partially Paid' where Due_Id = ".$due_id;
                    //echo $sql_update_dues_info;
                    mysqli_query($link, $sql_update_dues_info);
                }

                else{
                    $sql_update_dues_info = "update dues set Amount_Paid = ".$paid.", Amount_to_be_Paid = ".$amount_to_be_paid.", Status = 'Cleared' where Due_Id = ".$due_id;
                    mysqli_query($link, $sql_update_dues_info);
                }

                include_once('success-message.php');
                setSuccessMessage('Payment Succesfull...Redirecting...Please wait....');
                echo '<meta http-equiv="refresh" content="3; URL=student-index.php">';
            }
        }
    }
}
?>