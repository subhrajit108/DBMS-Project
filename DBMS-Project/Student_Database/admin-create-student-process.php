<?php
if(isset($_POST['rollno']) && isset($_POST['firstname']) && isset($_POST['lastname']) && 
   isset($_POST['address']) && isset($_POST['gender']) && isset($_POST['category']) && isset($_POST['department']) && 
   isset($_POST['Programme']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['password'])){

    if($_POST['rollno'] == '' || $_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['address'] == '' || 
       $_POST['gender'] == 'No Option' || $_POST['category'] == 'No Option' || $_POST['department'] == 'No Option' || $_POST['Programme'] == 'No Option' || 
       $_POST['mobile'] == '' || $_POST['email'] == '' || $_POST['password'] == ''){
            include_once('error-message.php');
            setErrorMessage('All fields are mandatory');
    }

    else{
        $roll_no = $_POST['rollno'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $category = $_POST['category'];
        $department = $_POST['department'];
        $Programme = $_POST['Programme'];
        $mobile = $_POST['mobile'];
        $email_id = $_POST['email'];
        $password = $_POST['password'];

        include_once('db-connectivity.php');
        $sql_duplicate_email = 'select * from student where Email_Id = \''.$email_id.'\' or RollNumber = \''.$roll_no.'\'';

        if($res = mysqli_query($link, $sql_duplicate_email)){
            //echo mysqli_num_rows($res);
            if(mysqli_num_rows($res)>0){
                include_once('error-message.php');
                setErrorMessage('Email ID already used. Please try another ID');
            }
            else{
                $sql_insert_student = 'INSERT into student (RollNumber, `First Name`, `Last Name`, `Address`, Gender, Category, Department, Programme, Mobile_Number, Email_Id, `Password`) 
                VALUES ('.$roll_no.', \''.$first_name.'\', \''.$last_name.'\', \''.$address.'\', \''.$gender.'\', \''.$category.'\', \''.$department.'\', \''.$Programme.'\', 
                '.$mobile.', \''.$email_id.'\', \''.$password.'\')';

                mysqli_query($link, $sql_insert_student);
                include_once('success-message.php');
                setSuccessMessage('Student succesfully created...Redirecting in few seconds..Please wait...');
                header( "refresh:2;url=admin-index.php" );
            }
        }
    }
       
   }