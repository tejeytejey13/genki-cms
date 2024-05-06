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
                            <li>Nurse</li>
                            <li>Medical Certificate</li>
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
                                Medical Certificate
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
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Medical Certificate
                    </p>
                </header>
                <div class="card-content">
                    <form id="medical-certificate-form" method="POST">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Student Details</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control">
                                        <p class="control is-expanded has-icons-left">
                                            <input class="input" id="stud_search" name="search_stud" type="text" placeholder="Search Student by ID">
                                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" name="student_name" id="student_fullname" type="text" placeholder="Student Name" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <!-- <label class="label">Student Address</label> -->
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control">
                                        <p class="control is-expanded has-icons-left">
                                            <input class="input" id="grade_level" name="grade_lvl" type="text" placeholder="Grade Level">
                                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" id="adviser" name="adviser" type="text" placeholder="Adviser" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <!-- <label class="label">Student Address</label> -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="birthdate" type="date" placeholder="Date of Birth" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                    <p class="help">
                                        Birthdate
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" name="birthplace" type="text" placeholder="Place of Birth" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <!-- <label class="label">Student Address</label> -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" name="address" type="text" placeholder="Address" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Doctors Details</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="parent_name" type="text" placeholder="Doctors Name">
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="birthdate" type="date" placeholder="Date of Birth">
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                    <p class="help">
                                        Date of Clinic
                                    </p>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Findings</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <p class="control">
                                        <input class="input" name="reason" type="text" placeholder="Type">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <input class="input" name="reason" type="text" placeholder="Reason/s">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Special Treatment</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="alergy">
                                                <option selected hidden>Medications</option>
                                                <?php
                                                $sql = "SELECT * FROM med_despensary";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-narrow">
                                    <p class="control">
                                        <input class="input" name="reason" type="text" placeholder="Quantity">
                                    </p>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="input" name="treatment" type="text" placeholder="Specify treatment for the findings">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Date of Medical</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="date_med" type="date" placeholder="#">
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button type="submit" class="button is-primary">
                                                <span>Submit</span>
                                            </button>
                                        </div>
                                        <div class="control">
                                            <button type="button" class="button is-primary is-outlined">
                                                <span>Reset</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </div>
    <?php require 'component/footer.php' ?>