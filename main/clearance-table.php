<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<?php
include 'component/head.php';
$results_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $results_per_page;

// Get total number of users
$total_query = $conn->query("SELECT COUNT(*) FROM `user_slot_clearance`");
$total_row = $total_query->fetch_row();
$total_records = $total_row[0];
$total_pages = ceil($total_records / $results_per_page);

// Fetch users for current page
$getClearance = $conn->query("SELECT * FROM `user_slot_clearance` LIMIT $start_from, $results_per_page")

?>

<body>
    <div id="app">
        <?php
        include 'component/nav.php';
        include 'component/side.php';
        ?>
        <section class="section is-title-bar">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <ul>
                            <?= ($user_type == 'nurse') ? '<li>Nurse</li>' : '<li>Admin</li>'; ?>
                            <li>Medical Clearance List</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <section class="hero is-hero-bar">
            <div class="hero-body">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h1 class="title">
                                Medical Clearance List
                            </h1>
                        </div>
                    </div>
                    <div class="level-right" style="display: none;">
                        <div class="level-item"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section is-main-section">

            <!-- <div class="notification is-info">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <div>
                                <span class="icon"><i class="mdi mdi-buffer default"></i></span>
                                <b>Tightly wrapped.</b> Table header becomes card header
                            </div>
                        </div>
                    </div>
                    <div class="level-right">
                        <button type="button" class="button is-small is-white jb-notification-dismiss">Dismiss</button>
                    </div>
                </div>
            </div> -->


            <div class="card has-table has-table-container-upper-radius">
                <div class="card-content">
                    <div class="b-table has-pagination">
                        <div class="table-wrapper has-mobile-cards">
                            <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th class="is-checkbox-cell">
                                            <label class="b-checkbox checkbox ">
                                                <input type="checkbox" class="selectAll" value="false">
                                                <span class="check"></span>
                                            </label>
                                        </th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>Date of Clearance</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="clearanceTable">
                                    <?php 
                                        // $getClearance = $conn->query("SELECT * FROM `user_slot_clearance`");
                                        while ($row = $getClearance->fetch_assoc()) {
                                            $client_uid = $row['user_id'];
                                            $getUserInfo = $conn->query("SELECT * FROM `medical_form` WHERE `user_id` = '$client_uid'");
                                            $user = $getUserInfo->fetch_assoc();
                                            $fn = $user['first_name'].' '.$user['last_name'];
                                            $getSlotInfo = $conn->query("SELECT * FROM `clearance_slots` WHERE `id` = '$row[slot_id]'");
                                            $slot = $getSlotInfo->fetch_assoc();
                                            $time = $slot['time'];

                                            if($time == 'AM'){
                                                $slots = '9:00 - 12:00 '.$time;
                                            }else{
                                                $slots = '12:00 - 5:00 '.$time;
                                            }
                                    ?>
                                    <tr>
                                        <td class="is-checkbox-cell">
                                            <label class="b-checkbox checkbox">
                                                <input type="checkbox" value="false">
                                                <span class="check"></span>
                                            </label>
                                        </td>
                                        <td class="is-image-cell">
                                            <div class="image">
                                                <img src="https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg"
                                                    class="is-rounded">
                                            </div>
                                        </td>
                                        <td data-label="Name"><?=ucwords($fn);?></td>
                                        <td data-label="Company"><?=$user['grade']?></td>
                                        <td data-label="City"><?=$user['section']?></td>
                                        <!-- <td data-label="Progress" class="is-progress-cell">
                                            <progress max="100" class="progress is-small is-primary"
                                                value="100">17</progress>
                                        </td> -->
                                        <td data-label="Created">
                                            <small class="has-text-grey is-abbr-like" title="Feb 12, 2020"><?=date('F d, Y', strtotime($slot['date']));?></small>
                                        </td>
                                        <td data-label="Created">
                                            <small class="has-text-grey is-abbr-like" title="Feb 12, 2020"><?=$slots?></small>
                                        </td>
                                        <td class="is-actions-cell">
                                            <div class="buttons is-left">
                                                <!-- <button class="button is-small is-primary" type="button">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </button> -->
                                                <button class="button is-small is-danger" type="button">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                                <a href="clearance-table.php?page=<?= $i ?>" class="button"><?= $i ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <small>Page <?= $page ?> of <?= $total_pages ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="user-view-med-form" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" style="font-weight: 900">Medical Form <button class="delete1 jb-modal-close"
                            aria-label="close">&times</button>
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="patient-details">
                                    <h2 id="heading-name">Client Name</h2>
                                    <p id="heading-date" class="heading-date"></p>
                                    <p id="heading-date1" class="heading-date1"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="status-details">
                                    <p id="heading-status" class="heading-status"></p>
                                    <p id="attending-nurse" class="attending-nurse">Attending Nurse: John Doe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" status="display: flex; justify-content: center; gap: 30px;">
                    <!-- <button class="button jb-modal-close">Cancel</button>
            <button class="button is-success jb-modal-close">Delete</button> -->
                </div>
            </div>
        </div>


    </div>
    <?php require 'component/footer.php' ?>