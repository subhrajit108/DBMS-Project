<?php

function setName($firstName, $LastName){
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Site Logo Here -->
        <a class="navbar-brand" href="student-index.php">IIIT Guwahati</a>
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileToggle" aria-controls="navbarMobileToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMobileToggle">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="allocation.php">Request New Room</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="room-allotment-status.php">Room Allotment Status</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="student-dues-pending.php">Dues Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student-payment-history.php">Payment History</a>
                </li>
            </ul>

            <!-- Right Side -->
            <div class="btn-group float-end">
                <a href="#" class="dropdown-toggle text-decoration-none text-light" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                <span>'.$firstName.' '.$LastName.'</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="student-information.php" class="dropdown-item"><i class="bi bi-gear-fill"></i> Your Information</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="login-form.php" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
';
}
?>