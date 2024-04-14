<aside class="aside is-placed-left is-expanded">
    <div class="menu is-menu-main" style="margin-top: 30px">
        <img src="./img/assets/GENKI LOGO ORIGINAL.png" alt="" srcset="" style="width: 20vw; margin-top: -90px">
        <p class="menu-label">Dashboard</p>
        <ul class="menu-list">
            <li>
                <a href="index.php" class="is-active router-link-active has-icon">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="router-link-active has-icon">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Emails</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Medical Information</p>
        <ul class="menu-list">
            <?php
            if ($user_type == 'client') {
                echo '<li>
                <a href="appointment.php" class="has-icon">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Medical Form</span>
                </a>
            </li>';
            } else if ($user_type == 'nurse') {
                echo '';
            } else if ($user_type == 'admin') {
                echo '';
            }
            ?>

            <?php
            if ($user_type == 'client') {
                echo '';
            } else if ($user_type == 'nurse') {
                echo '<li>
                    <a href="nurse-table.php" class="has-icon">
                        <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Clinic Appointments</span>
                    </a>
                </li>';
            } else if ($user_type == 'admin') {
                echo '<li>
                <a href="client.php" class="has-icon">
                    <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Tables</span>
                </a>
            </li>';
            }
            ?>

            <li>
                <a class="has-icon has-dropdown-icon">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Medical</span>
                    <div class="dropdown-icon">
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </div>
                </a>
                <ul>
                    <?php
                    if ($user_type == 'client') {
                        echo '<li>
                        <a href="client-table.php">
                            <span><i class="mdi mdi-view-list"></i> Medical History</span>
                        </a>
                    </li>';
                    } else if ($user_type == 'nurse') {
                        echo '<li>
                        <a href="nurse-medical-history.php">
                            <span><i class="mdi mdi-view-list"></i> Medical History</span>
                        </a>
                    </li>';
                    } else if ($user_type == 'admin') {
                        echo '<li>
                        <a href="client-table.php">
                            <span><i class="mdi mdi-view-list"></i> Medical History</span>
                        </a>
                    </li>';
                    
                    }
                    ?>
                    <?php
                    if ($user_type == 'client') {
                        echo '';
                    } else if ($user_type == 'nurse') {
                        echo '<li>
                        <a href="medical-clearance.php">
                            <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                        </a>
                    </li>';
                    } else if ($user_type == 'admin') {
                        echo '<li>
                        <a href="medical-clearance.php">
                            <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                        </a>
                    </li>';
                    }
                    ?>
                </ul>
            </li>
        </ul>

        <?php
        if ($user_type == 'client') {
            echo '';
        } else if ($user_type == 'nurse') {
            echo '
                <p class="menu-label">Clinic Management</p>
                <ul class="menu-list">
                    <li>
                <a href="clinic-inventory.php" class="has-icon">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Clinic Inventory</span>
                </a>
            </li>
            </ul>';
        } else if ($user_type == 'admin') {
            echo '
                <p class="menu-label">Clinic Management</p>
                <ul class="menu-list">
                <li>
                <a href="clinic-inventory.php" class="has-icon">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Clinic Inventory</span>
                </a>
            </li>
            </ul>';
        }
        ?>

        <p class="menu-label">OTHERS</p>
        <ul class="menu-list">
            <li>
                <a href="profile.php" class="has-icon">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li>
                <a href="about.php" class="has-icon">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">About Us</span>
                </a>
            </li>
        </ul>
    </div>
</aside>