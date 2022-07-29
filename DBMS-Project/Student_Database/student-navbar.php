<?php
include('db-connectivity.php');
        $sql = 'SELECT * FROM Student where RollNumber='.$_SESSION["rollno"];
        if ($res = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_array($res)) {
                include_once('search-navbar-student.php');
                setName($row['First Name'], $row['Last Name']);
            }
        }
?>