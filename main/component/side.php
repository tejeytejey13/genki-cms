<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="aside is-placed-left is-expanded">
    <div class="menu is-menu-main" style="margin-top: 30px">
        <img src="./img/assets/GENKI LOGO ORIGINAL.png" alt="" srcset="" style="width: 20vw; margin-top: -90px">
        <p class="menu-label">Dashboard</p>
        <ul class="menu-list">
            <li>
                <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'is-active' : ''; ?> router-link-active has-icon">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="<?php echo ($current_page == 'email.php') ? 'is-active' : ''; ?> router-link-active has-icon">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Emails</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Medical Information</p>
        <ul class="menu-list">
            <?php if ($user_type == 'client'): ?>
                <li>
                    <a href="appointment.php" class="<?php echo ($current_page == 'appointment.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Medical Form</span>
                    </a>
                </li>
            <?php elseif ($user_type == 'nurse'): ?>
                <li>
                    <a href="nurse-table.php" class="<?php echo ($current_page == 'nurse-table.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Clinic Appointments</span>
                    </a>
                </li>
            <?php elseif ($user_type == 'admin'): ?>
                <li>
                    <a href="client.php" class="<?php echo ($current_page == 'nurse-table.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Clinic Appointments</span>
                    </a>
                </li>
            <?php endif; ?>

            <li>
                <a class="<?php echo ($current_page == 'client-table.php' || $current_page == 'medical-clearance.php' || $current_page == 'nurse-medical-history.php') ? 'is-active' : ''; ?> has-icon has-dropdown-icon">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Medical</span>
                    <div class="dropdown-icon">
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </div>
                </a>
                <ul>
                    <?php if ($user_type == 'client'): ?>
                        <li>
                            <a href="client-table.php" class="<?php echo ($current_page == 'client-table.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Medical History</span>
                            </a>
                        </li>
                        <li>
                            <a href="medical-clearance.php" class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                            </a>
                        </li>
                    <?php elseif ($user_type == 'nurse' || $user_type == 'admin'): ?>
                        <li>
                            <a href="nurse-medical-history.php" class="<?php echo ($current_page == 'nurse-medical-history.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Medical History</span>
                            </a>
                        </li>
                        <li>
                            <a href="medical-clearance.php" class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>

        <?php if ($user_type == 'nurse' || $user_type == 'admin'): ?>
            <p class="menu-label">Clinic Management</p>
            <ul class="menu-list">
                <li>
                    <a href="clinic-inventory.php" class="<?php echo ($current_page == 'clinic-inventory.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Clinic Inventory</span>
                    </a>
                </li>
            </ul>
            <?php if ($user_type == 'admin'): ?>
            <ul class="menu-list">
                <li>
                    <a href="admin-nurse-accounts.php" class="<?php echo ($current_page == 'admin-nurse-accounts.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Nurse Management</span>
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        <?php endif; ?>

        <p class="menu-label">OTHERS</p>
        <ul class="menu-list">
            <li>
                <a href="profile.php" class="<?php echo ($current_page == 'profile.php') ? 'is-active' : ''; ?> has-icon">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li>
                <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'is-active' : ''; ?> has-icon">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">About Us</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
