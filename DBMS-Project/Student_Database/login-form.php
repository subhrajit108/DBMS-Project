<html>
    <head>
        <title>IIIT Guwahati</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

    <?php
    include_once('db-connectivity.php');
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['who'])){
        if($_POST['email'] == '' || $_POST['password'] == '' || $_POST['who'] == 'No Option'){
            include_once('error-message.php');
            setErrorMessage('All fields are mandatory.');
        }
        else{
            if($_POST['who'] == 'Admin'){
                if($_POST['email'] == 'admin@iiitg.ac.in' && $_POST['password'] == 'admin1234'){ // Setting the ID and Password
                    session_start();
                    $_SESSION['rollno'] = '';
                    echo '<meta http-equiv="refresh" content="0; URL=admin-index.php">';
                }
                else{
                    include_once('error-message.php');
                    setErrorMessage('Invalid email id or password.'); 
                }
            }
            else{
                $sql_student_validate = "SELECT * from student where Email_Id ='".$_POST['email']."' and Password = '".$_POST['password']."'";

                if($res = mysqli_query($link, $sql_student_validate)){
                    if(mysqli_num_rows($res)>0){
                        if($row = mysqli_fetch_assoc($res)){
                            session_start();
                            $_SESSION['rollno'] = $row['RollNumber'];
                            echo '<meta http-equiv="refresh" content="0; URL=student-index.php">';
                        }
                    }
                    else{
                        include_once('error-message.php');
                        setErrorMessage('Invalid email id or password.');
                    }
                }
            }
        }
    }
?>

<div class="container mt-3">
  <h2>Login Form</h2>
  <form action="" method = "post">
    
    <div class="mb-3">
      <label for="pwd">Username (Use Email ID as username)</label>
      <input type = "email" name = "email" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Password</label>
      <input type = "password" name = "password" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Who are you?</label>
      <select class="form-select" aria-label="Default select example" name = "who">
        <option selected value = "No Option">Select your choice</option>
        <option value="Admin">Admin</option>
        <option value="Student">Student</option>
      </select>
    </div>

    <center><button type="submit" class="btn btn-success">Login</button></center>
  </form>
</div>
</body>
</html>