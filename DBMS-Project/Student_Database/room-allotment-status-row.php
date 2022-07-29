<?php

function setAttributes($allocation_id, $hostel_id, $room_id, $hostel_type, $room_type, $from_stay, $to_stay, $status, $last_activity){
    echo'
<tr>
    <td>'.$allocation_id.'</td>
    <td>'.$hostel_id.'</td>
    <td>'.$room_id.'</td>
    <td>'.$hostel_type.'</td>
    <td>'.$room_type.'</td>
    <td>'.$from_stay.'</td>
    <td>'.$to_stay.'</td>
    <td>'.$status.'</td>
    <td>'.$last_activity.'</td>
</tr>
';
}
?>