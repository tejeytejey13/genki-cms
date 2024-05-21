<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <link rel="stylesheet" href="css/admin-nurse.css">
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
                            <li>Admin</li>
                            <li>Nurse Accounts</li>
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
                                Nurse Accounts
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
            <button class="btn btn-info" id="addnursebtn"
                style="font-size: 15px; font-weight: 900; margin-bottom: 10px; text-align: center; align-items: center;">
                Add <i class="mdi mdi-plus"></i>
            </button>

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
                                        <th>Nurse ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="nurseAccounts">

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
        <div id="addnursemodal" class="modal">
            <div class="modal-content">
                <form id="add_nurse" method="POST">
                    <span class="close jb-modal-close" aria-label="close">&times;</span>
                    <div class="modal-content-main" style="font-size: 30px; font-weight: 900;">
                        <h2 class="modal-title">Nurse Accounts Form</h2>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" name="fname" type="text" placeholder="First Name" required/>
                                </div>

                                <div class="col">
                                    <label for="middle_name">Middle Name</label>
                                    <input id="middle_name" name="mname" type="text" placeholder="Middle Name" required/>
                                </div>

                                <div class="col">

                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" name="lname" type="text" placeholder="Last Name" required/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="phone_num">Phone Number</label>
                                    <input id="phone_num" name="pnum" type="text" placeholder="Phone Number" required/>
                                </div>
                                <div class="col">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="text" placeholder="Email" required/>
                                </div>
                                <div class="col">
                                    <label for="password">password</label>
                                    <input id="password" name="password" type="password" placeholder="Password" />
                                </div>
                            </div>

                            
                        </div>
                        <div class="modal-footer" style="display: flex; justify-content: end; gap: 5px;">
                            <button class="button is-success jb-modal-close" id="submitnursebtn" type="submit">Save</button>
                            <button class="button jb-modal-close">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="vd-nurse-status" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content modal-content-main-1">
                <div class="modal-header" style="display: flex;">
                    <h2 class="modal-title" style="font-weight: 900">Nurse Status</h2>
                    <button class="delete1 jb-modal-close" aria-label="close">&times</button>
                </div>
                <form id="nurseStatus" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="patient-details">
                                        <h2 id="heading-nurse-name-edit">Nurse Name: <a id="status_nurse_name"></a></h2>
                                        <p class="heading-date">Select Status:</p>
                                        <div class="select is-narrow">
                                            <select id="status_nurse_edit" name="status_nurse_change">
                                                <option selected hidden>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" styles="display: flex; justify-content: center: gap: 30px;">
                        <button id="aptupdate" type="submit" class="button is-success">Update</button>
                </form>
                <button class="button jb-modal-close">Cancel</button>
            </div>
        </div>
        
    </div>
    <?php require 'component/footer.php' ?>