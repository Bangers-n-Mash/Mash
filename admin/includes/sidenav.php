<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="admin.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-tachometer-alt"></em></div>
                    Dashboard
                </a>


                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link" href="users.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-user"></em></div>
                    Users
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFleet" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-car"></em></div>
                    Group Management
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse" id="collapseFleet" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavManagementPages">

                        <a class="nav-link" href="groups.php">
                            Groups
                        </a>

                        <a class="nav-link" href="groupcontent.php">
                            Content
                        </a>

                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBooking" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-calendar"></em></div>
                    Content Management
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse" id="collapseBooking" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavBookingPages">

                        <a class="nav-link" href="documents.php">
                            Documents
                        </a>

                        <a class="nav-link" href="artwork.php">
                            Artwork
                        </a>

                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Analytics</div>

                <a class="nav-link" href="collaborators.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-chart-area"></em></div>
                    Users
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo "{$_SESSION['username']}"; ?>
        </div>
    </nav>
</div>