<?php
  include_once('admin-create-student-process.php');
?>

<div class="container mt-3">
  <h2>Create Student Form</h2>
  <form action="" method = "post">
    <div class="mb-3">
      <label for="pwd">Roll Number</label>
      <input type = "text" name = "rollno" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">First Name</label>
      <input type = "text" name = "firstname" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Last Name</label>
      <input type = "text" name = "lastname" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Address</label>
      <input type = "textarea" name = "address" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Gender</label>
      <select class="form-select" aria-label="Default select example" name = "gender">
        <option selected value = "No Option">Select your choice</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Category</label>
      <select class="form-select" aria-label="Default select example" name = "category">
        <option selected value = "No Option">Select your choice</option>
        <option value="B.Tech">B.Tech</option>
        <option value="M.Tech">M.Tech</option>
        <option value="PhD">PhD</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Department</label>
      <select class="form-select" aria-label="Default select example" name = "department">
        <option selected value = "No Option">Select your choice</option>
        <option value="CSE">CSE</option>
        <option value="ECE">ECE</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Programme</label>
      <select class="form-select" aria-label="Default select example" name = "Programme">
        <option selected value = "No Option">Select your choice</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="pwd">Mobile Number</label>
      <input type = "number" name = "mobile" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Email ID</label>
      <input type = "email" name = "email" style = "width :100%;" />
    </div>

    <div class="mb-3">
      <label for="pwd">Password</label>
      <input type = "password" name = "password" style = "width :100%;" />
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>