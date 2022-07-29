<?php

function setAttributesAllDues($due_id, $roll_no, $due_type, $total_amount, $paid, $to_be_paid, $due_date, $status){
    echo'
    <form action="" method = "post">
<tr>
    <td>'.$due_id.'</td>
    <td>'.$roll_no.'</td>
    <td>'.$due_type.'</td>
    <td>'.$total_amount.'</td>
    <td>'.$paid.'</td>
    <td>'.$to_be_paid.'</td>
    <td>'.$due_date.'</td>
    <td>'.$status.'</td>
</tr>
</form>
';
}
?>