<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<?php
include 'component/head.php';
if(isset($_GET['status'])){
    $getURL = $_GET['status'];
}
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
                            <li>Clinic <?=ucfirst($getURL == 'approved' ? 'Consultation' : ' ') ?> Appointments</li>
                        </ul>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <div class="buttons is-right">
                            <a href="#" id="archived-appointments" class="button is-primary">
                                <span class="icon"><span class="mdi mdi-archive-arrow-down"></span></span>
                                <span>Archived Appointments</span>
                            </a>
                        </div>
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
                                Clinic <?=ucfirst($getURL == 'approved' ? 'Consultation' : ' ') ?> Appointments
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


            <div class="card has-table has-table-container-upper-radius is-fullwidth">
                <div class="card-content">
                    <div class="b-table has-pagination">
                        <div class="table-wrapper has-mobile-cards">
                            <table class="table is-fullwidth is-striped is-hoverable">
                                <thead id="nurseTableHeader">
                                    <tr>
                                        <!-- <th class="is-checkbox-cell">
                                            <label class="b-checkbox checkbox ">
                                                <input type="checkbox" class="selectAll" value="false">
                                                <span class="check"></span>
                                            </label>
                                        </th> -->
                                        <th>Name</th>
                                        <th>Grade Level</th>
                                        <th>Parent's Name</th>
                                        <th>Section</th>
                                        <th>Date Created</th>
                                        <th>Date of Clinic</th>
                                        <th>Clinic Status</th>
                                        <?=ucfirst($getURL == 'approved' ? '<th> Form Status </th>' : ' ')?>
                                        <th>Action</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody id="nurseTable">

                                </tbody>
                                <tbody id="archivedTable" hidden>

                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons" id="paginationButtonsTable">
                                            <!-- <button type="button" class="button">1</button>
                                            <button type="button" class="button">2</button>
                                            <button type="button" class="button">3</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <small>Page 1 of 3</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <div id="nurse-view-med-form" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" style="font-weight: 900">Clinic Forms <button class="delete1 jb-modal-close"
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
                                    <!-- <p id="attending-nurse" class="attending-nurse">Attending Nurse: John Doe</p> -->
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

        <div id="nurse-edit-med-form" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content modal-content-main-1">
                <div class="modal-header">
                    <h1 class="modal-title" style="font-weight: 900">Clinic Forms <button class="delete1 jb-modal-close"
                            aria-label="close">&times</button>
                    </h1>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="patient-details">
                                        <h2 id="heading-name-edit">Client Name</h2>
                                        <p class="heading-date">Select Status:</p>
                                        <div class="select is-narrow">
                                            <select id="heading-status-edit" name="status">
                                                <option selected hidden>Select Status</option>
                                                <!-- <option value="pending">Pending</option> -->
                                                <option value="approved">Approved</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" styles="display: flex; justify-content: center: gap: 30px;">
                        <button id="update-form-btn" type="submit" class="button is-success">Update</button>
                </form>
                <button class="button is-danger">Cancel</button>
            </div>
        </div>
    </div>
    </div>
    <?php require 'component/footer.php' ?>