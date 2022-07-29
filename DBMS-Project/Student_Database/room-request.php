<?php
include('room-request-process.php');
?>
<div class="container mt-3">
  <h2>Room Allocation Request form</h2>
  <form action="allocation.php" method = "post">
    <div class="mb-3">
      <label for="pwd">Room Size</label>
      <select class="form-select" aria-label="Default select example" name = "roomsize">
        <option selected value = "No Option">Select your choice</option>
        <option value="Single Bed">Single Bed</option>
        <option value="Double Bed">Double Bed</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="pwd">Air Conditioning</label>
      <select class="form-select" aria-label="Default select example" name = "aircond">
        <option selected value = "No Option">Select your choice</option>
        <option value="AC">AC</option>
        <option value="Non AC">Non AC</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>