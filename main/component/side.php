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
            <!-- <li>
                <a href="component/page404.php" class="<?php echo ($current_page == 'email.php') ? 'is-active' : ''; ?> router-link-active has-icon">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Emails</span>
                </a>
            </li> -->
        </ul>
        <p class="menu-label">Appointments</p>
        <ul class="menu-list">
            <?php if ($user_type == 'client') : ?>
                <li>
                    <a class="<?php echo ($current_page == 'appointment.php' || $current_page == 'medical-clearance.php') ? 'is-active' : ''; ?> has-icon has-dropdown-icon">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Clinic App</span>
                        <div class="dropdown-icon">
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="appointment.php" class="<?php echo ($current_page == 'appointment.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Clinic Appointment</span>
                            </a>
                        </li>
                        <li>
                            <a href="medical-clearance.php" class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Clearance Appointment</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
                <li>
                    <a class="<?php echo ($current_page == 'nurse-table.php') ? 'is-active' : ''; ?> has-icon has-dropdown-icon">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Clinic</span>
                        <div class="dropdown-icon">
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="nurse-table.php?status=pending" class="<?php echo ($current_page == 'nurse-table.php?status=pending') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Pending Appointments</span>
                            </a>
                        </li>
                        <li>
                            <a href="nurse-table.php?status=approved" class="<?php echo ($current_page == 'nurse-table.php?status=approved') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Approved Appointments</span>
                            </a>
                        </li>
                        <!-- <li>
                        <a 
                            class="#">
                            <span><i class="mdi mdi-view-list"></i> Consultation Form</span>
                        </a>
                    </li> -->
                    </ul>
                </li>
                <li>
                    <a class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?> has-icon has-dropdown-icon">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Clearance</span>
                        <div class="dropdown-icon">
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </div>
                    </a>
                    <ul>
                        <li>
                            <a href="medical-clearance.php" class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                                <span><i class="mdi mdi-view-list"></i> Set Appointment</span>
                            </a>
                        </li>
                        <li>
                            <a class="#">
                                <span><i class="mdi mdi-view-list"></i> See Appointments List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="nurse-medical-history.php" class="<?php echo ($current_page == 'nurse-medical-history.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Appointment History</span>
                    </a>
                </li>
                <li>
                    <a href="nurse-medical-record.php" class="<?php echo ($current_page == 'nurse-medical-record.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Medical Record</span>
                    </a>
                </li>
            <?php endif; ?>
            <!-- <li>
                <a
                    class="<?php echo ($current_page == 'client-table.php' || $current_page == 'medical-clearance.php' || $current_page == 'nurse-medical-history.php') ? 'is-active' : ''; ?> has-icon has-dropdown-icon">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Medical</span>
                    <div class="dropdown-icon">
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </div>
                </a>
                <ul>
                    <?php if ($user_type == 'client') : ?>
                    <li>
                        <a href="client-table.php"
                            class="<?php echo ($current_page == 'client-table.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Medical History</span>
                        </a>
                    </li>
                    <li>
                        <a href="medical-clearance.php"
                            class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                        </a>
                    </li>
                    <li>
                        <a href="medical-clearance.php"
                            class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                        </a>
                    </li>

                    <?php elseif ($user_type == 'nurse' || $user_type == 'admin') : ?>
                    <li>
                        <a href="nurse-medical-history.php"
                            class="<?php echo ($current_page == 'nurse-medical-history.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Medical History</span>
                        </a>
                    </li>
                    <li>
                        <a href="medical-clearance.php"
                            class="<?php echo ($current_page == 'medical-clearance.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Medical Clearance</span>
                        </a>
                    </li>
                    <li>
                        <a href="medical-certificate.php"
                            class="<?php echo ($current_page == 'medical-certificate.php') ? 'is-active' : ''; ?>">
                            <span><i class="mdi mdi-view-list"></i> Consultation Form</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li> -->
        </ul>

        <?php if ($user_type == 'nurse' || $user_type == 'admin') : ?>
            <p class="menu-label">Clinic Management</p>
            <ul class="menu-list">
                <li>
                    <a href="clinic-inventory.php" class="<?php echo ($current_page == 'clinic-inventory.php') ? 'is-active' : ''; ?> has-icon">
                        <span class="icon"><i class="mdi mdi-database"></i></span>
                        <span class="menu-item-label">Clinic Dispensary</span>
                    </a>
                </li>
            </ul>
            <?php if ($user_type == 'admin') : ?>
                <ul class="menu-list">
                    <li>
                        <a href="admin-nurse-accounts.php" class="<?php echo ($current_page == 'admin-nurse-accounts.php') ? 'is-active' : ''; ?> has-icon">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label">Nurse Accounts</span>
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
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    <span class="menu-item-label">About Us</span>
                </a>
            </li>
        </ul>
    </div>
</aside>