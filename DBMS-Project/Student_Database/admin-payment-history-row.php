<?php

function setAttributesAllPayment($pay_id, $due_id, $roll_number, $pay_type, $amount, $date_of_payment){
    echo'
    <form action="" method = "post">
<tr>
    <td>'.$pay_id.'</td>
    <td>'.$due_id.'</td>
    <td>'.$roll_number.'</td>
    <td>'.$pay_type.'</td>
    <td>'.$amount.'</td>
    <td>'.$date_of_payment.'</td>
</tr>
</form>
';
}
?>