<?php
include_once('db-connectivity.php');
include_once('admin-due-process.php');
echo'
<div class="container mt-3">
  <h2>Due Register Request form</h2>
  <form action="admin-due-register.php" method = "post">
    <div class="mb-3">
      <label for="pwd">Roll Number</label>
      <select class="form-select" aria-label="Default select example" name = "rollno">
        <option selected value = "No Option">Select your choice</option>';

        $sql_fetch_students = 'select * from student';

        if($res = mysqli_query($link, $sql_fetch_students)){
            while($row = mysqli_fetch_assoc($res)){
                echo'<option value="'.$row['RollNumber'].'">'.$row['RollNumber'].'</option>';
            }
        }
        echo'
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Due Type</label>
      <select class="form-select" aria-label="Default select example" name = "dueoption">
        <option selected value = "No Option">Select your choice</option>
        <option value="Tution Fees">Tution Fees</option>
        <option value="Hostel Fees">Hostel Fees</option>
        <option value="Mess Dues">Mess Dues</option>
        <option value="Library Fine">Library Fine</option>
        <option value="Late Fine">Late Fine</option>
        <option value="Disciplinary Fine">Disciplinary Fine</option>
        <option value="Past Dues">Past Dues</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Due Amount</label>
      <input type = "number" name = "amount" placeholder = "Enter Amount" style = "width:100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Due Date</label>
      <input type = "date" name = "duedate" placeholder = "Enter Due Date" style = "width:100%;" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
';
?>