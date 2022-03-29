<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="admin.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-tachometer-alt"></em></div>
                    Dashboard
                </a>
            
                <a class="nav-link" href="news.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-newspaper"></em></div>
                    News
                </a>


                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link" href="users.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-user"></em></div>
                    Users
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFleet" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-car"></em></div>
                    Fleet Management
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse" id="collapseFleet" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavManagementPages">

                        <a class="nav-link" href="campus.php">
                            Campus
                        </a>

                        <a class="nav-link" href="vehicle.php">
                            Vehicles
                        </a>

                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBooking" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-calendar"></em></div>
                    Booking Management
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse" id="collapseBooking" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavBookingPages">

                        <a class="nav-link" href="calendar.php">
                            Calendar
                        </a>

                        <a class="nav-link" href="booking.php">
                            Current Bookings
                        </a>

                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Logs</div>
                <a class="nav-link" href="checks.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-search"></em></div>
                    Vehicle Check Sheets
                </a>
                <a class="nav-link" href="trips.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-map-marker"></em></div>
                    Trip Logs
                </a>

                <div class="sb-sidenav-menu-heading">Analytics</div>

                <a class="nav-link" href="subscribers.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-chart-area"></em></div>
                    Users
                </a>

                <a class="nav-link" href="sessions.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-table"></em></div>
                    Vehicles
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo "{$_SESSION['forename']}"; ?>
        </div>
    </nav>
</div>