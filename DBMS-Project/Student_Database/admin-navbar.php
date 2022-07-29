<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Site Logo Here -->
        <a class="navbar-brand" href="admin-index.php">IIIT Guwahati</a>
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileToggle" aria-controls="navbarMobileToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMobileToggle">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="admin-allocation-approval.php">Room Allotment Approvals</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Submenu-Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dues
                    </a>
                    <ul class="dropdown-menu rounded-3" aria-labelledby="Submenu-Dropdown">
                        <li><a class="dropdown-item" href="admin-due-register.php">Request Due</a></li>
                        <li><a class="dropdown-item" href="admin-dues-view.php">View All Dues</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin-payment-history.php">Student Payment History</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="Submenu-Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Student Management
                    </a>
                    <ul class="dropdown-menu rounded-3" aria-labelledby="Submenu-Dropdown">
                        <li><a class="dropdown-item" href="admin-create-student.php">Create Student</a></li>
                        <li><a class="dropdown-item" href="admin-student-upload-file.php">Upload Student Records</a></li>
                        <li><a class="dropdown-item" href="admin-student-delete.php">Delete Student</a></li>
                    </ul>
                </li>

            </ul>

            <!-- Right Side -->
            <div class="btn-group float-end">
                <a href="#" class="dropdown-toggle text-decoration-none text-light" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                <span>Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="login-form.php" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>