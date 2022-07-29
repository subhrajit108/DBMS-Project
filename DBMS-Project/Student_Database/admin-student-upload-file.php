<html>
    <head>
        <title>CREATE STUDENT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        
        <?php
        include('admin-navbar.php');
        include_once('db-connectivity.php');
        
        if (isset($_FILES["studentfile"])){
            if($_FILES['studentfile']['error'] == 0){
            $name = $_FILES['studentfile']['name'];
            //$ext = strtolower(end(explode('.', $_FILES['studentfile']['name'])));
            $type = $_FILES['studentfile']['type'];
            //echo $type;
            $tmpName = $_FILES['studentfile']['tmp_name'];

            if($type === 'text/csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    // necessary if a large csv file
                    set_time_limit(0);

                    $row = 1;

                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        // number of fields in the csv
                        $col_count = count($data);

                        // get the values from the csv
                        $firstName = $data[0];
                        $lastName = $data[1];
                        $rollNumber = $data[2];
                        $address = $data[3];
                        $gender = $data[4];
                        $category = $data[5];
                        $department = $data[6];
                        $programme = $data[7];
                        $mobile = $data[8];
                        $email = $data[9];
                        $password = $data[10];

                      //  echo 'Name : '.$firstName.' '.$lastName;

                        $sql_insert_student = 'INSERT into student (RollNumber, `First Name`, `Last Name`, `Address`, Gender, Category, Department, Programme, Mobile_Number, Email_Id, `Password`) 
                            VALUES ('.$rollNumber.', \''.$firstName.'\', \''.$lastName.'\', \''.$address.'\', \''.$gender.'\', \''.$category.'\', \''.$department.'\', \''.$programme.'\', 
                            '.$mobile.', \''.$email.'\', \''.$password.'\')';

                        mysqli_query($link, $sql_insert_student);
                        $row++;
                    }
                    include_once('success-message.php');
                    setSuccessMessage('Student succesfully created...Redirecting in few seconds..Please wait...');
                    echo '<meta http-equiv="refresh" content="2; URL=admin-index.php">';
                    fclose($handle);
                }
            }
            }
        }
        ?>

        <div class="container mt-3">
            <h2>Upload Student Information</h2>
            <form action="" method = "post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="pwd">Upload file here</label>
                    <input type = "file" id = "studentfile" name = "studentfile" style = "width :100%;" />
                </div>
                <center><button type="submit" class="btn btn-primary">Upload</button></center>
            </form>
        </div>
    </body>
</html>