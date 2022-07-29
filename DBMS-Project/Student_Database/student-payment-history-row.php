<?php
function setStudentPaymentAttributes($pay_id, $date_pay, $due_id, $pay_type, $amount_paid){
    echo'
    <tr>
        <td>'.$pay_id.'</td>
        <td>'.$date_pay.'</td>
        <td>'.$due_id.'</td>
        <td>'.$pay_type.'</td>
        <td>'.$amount_paid.'</td>
    </tr>
    ';
}
?>