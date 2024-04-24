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
                            <li>Clinic Appointments</li>
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
                                Clinic Appointments
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
                                        <th>Grade Level</th>
                                        <th>Parent's Name</th>
                                        <th>Date Created</th>
                                        <th>Date of Clinic</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="nurseTable">
                                    <!-- <tr>
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
                                        <td data-label="Name">Lonzo Steuber</td>
                                        <td data-label="Company">Skiles Ltd</td>
                                        <td data-label="City">Marilouville</td>
                                        <td data-label="Progress" class="is-progress-cell">
                                            <progress max="100" class="progress is-small is-primary"
                                                value="17">17</progress>
                                        </td>
                                        <td data-label="Created">
                                            <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">Feb 12,
                                                2020</small>
                                        </td>
                                        <td class="is-actions-cell">
                                            <div class="buttons is-right">
                                                <button class="button is-small is-primary" type="button">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </button>
                                                <button class="button is-small is-danger" type="button">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                       
                </div>
            </div>
        </section>
        <div id="nurse-view-med-form" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-header" style="display: flex;">
                    <h2 class="modal-title">Medical Form</h2>
                    <button class="delete jb-modal-close" aria-label="close"></button>

                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="patient-details">
                                    <h2 id="heading-name">Client Name</h2>
                                    <p id="heading-date" class="heading-date">Date Created: January 1, 2022</p>
                                    <p id="heading-date1" class="heading-date1">Date of Clinic: January 1, 2022</p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="status-details">
                                    <p id="heading-status" class="heading-status">Status: In Progress</p>
                                    <p id="attending-nurse" class="attending-nurse">Attending Nurse: John Doe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" status="display: flex; justify-content: center: gap: 30px;">
                    <!-- <button class="button jb-modal-close">Cancel</button>
                    <button class="button is-success jb-modal-close">Delete</button> -->
                </div>

            </div>
        </div>
        <div id="nurse-edit-med-form" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content modal-content-main-1">
                <div class="modal-header" style="display: flex;">
                    <h2 class="modal-title">Medical Form</h2>
                    <button class="delete jb-modal-close" aria-label="close"></button>
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
                                                <option value="pending">Pending</option>
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
                <button class="button jb-modal-close">Cancel</button>
            </div>
        </div>
    </div>
    </div>
    <?php require 'component/footer.php' ?>