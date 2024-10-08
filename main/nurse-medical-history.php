<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<?php
include 'component/head.php';
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
                            <li>Appointment History</li>
                        </ul>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <div class="buttons is-right">
                            <a href="#" class="button is-primary" id="downloadPdfHistory">
                                <span class="icon"><span class="mdi mdi-file-chart"></span></span>
                                <span>Download Reports</span>
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
                                Appointment History
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
            <div class="filter-container" style="display: flex; gap: 30px;">
                <div class="field">
                    <label class="label">Date:</label>
                    <div class="control">
                        <div class="input">
                            <input type="date" id="dateFilterHistory"/>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Section:</label>
                    <div class="control">
                        <div class="select">
                            <select id="sectionFilterHistory">
                                <option value="" hidden selected>All Sections</option>
                                <?php
                                $getsect = mysqli_query($conn, "SELECT section_name FROM section");
                                while ($col = mysqli_fetch_assoc($getsect)) {
                                    echo "<option value='" . $col['section_name'] . "'>" . $col['section_name'] . "</option>";
                                }
                                ?>
                                <!-- <option value="A">Section A</option>
                                <option value="B">Section B</option>
                                <option value="C">Section C</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Grade:</label>
                    <div class="control">
                        <div class="select">
                            <select id="gradeFilterHistory">
                                <option value="" hidden selected>All Grades</option>
                                <?php
                                $getlvl = mysqli_query($conn, "SELECT level FROM grade_levels");
                                while ($row = mysqli_fetch_assoc($getlvl)) {
                                    echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card has-table has-table-container-upper-radius">
                <div class="card-content">
                    <div class="b-table has-pagination">
                        <div class="table-wrapper has-mobile-cards">
                            <table id="historyToDownload" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <!-- <th class="is-checkbox-cell">
                                            <label class="b-checkbox checkbox ">
                                                <input type="checkbox" class="selectAll" value="false">
                                                <span class="check"></span>
                                            </label>
                                        </th> -->
                                        <th></th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>Date of Clinic</th>
                                        <th>Status</th>
                                        <!-- <th></th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="nurseHistoryTable">

                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons">
                                            <button type="button" class="button">1</button>
                                            <button type="button" class="button">2</button>
                                            <button type="button" class="button">3</button>
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
            </div>

        </section>

        <div id="view-med-form" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" style="font-weight: 500">Appointment Form
                        <button class="delete1 jb-modal-close" aria-label="close">&times</button>
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