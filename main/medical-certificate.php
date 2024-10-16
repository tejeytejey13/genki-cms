<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<link rel="stylesheet" href="css/admin-nurse.css">
<link rel="stylesheet" href="css/suggestion.css">

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
                            <li>Consultation Form</li>
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
                                Consultation Form
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
                        Consultation Form
                    </p>
                </header>
                <?php
                $formuid = $_GET['form_id'];
                $studid = $_GET['student_id'];
                $sql = "SELECT * FROM medical_form INNER JOIN users ON medical_form.user_id = users.id WHERE medical_form.id = '$formuid'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $datemed = date('F d, Y h:i A', strtotime($row['date_med']));
                $alergy = $row['alergy'];
                $immunization = $row['immunization'];
                ?>
                <script>
                    $(document).ready(function() {
                        var alergy = <?= json_encode($alergy) ?>;
                        var immunization = <?= json_encode($immunization) ?>;

                        switch (alergy) {
                            case "medicine":
                                $("#yes").attr('checked', true);
                                break;
                            case "food":
                                $("#no").attr('checked', true);
                                break;
                            case "none":
                                $("#none").attr('checked', true);
                                break;
                            default:
                        }
                        switch (immunization) {
                            case "yes":
                                $('#immunizationyes').find('input').attr('checked', true);
                                break;
                            case "no":
                                $('#immunizationno').find('input').attr('checked', true);
                                break;
                            default:
                        }
                    });
                </script>
                <div class="card-content">
                    <form id="medical-certificate-form" method="POST">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Student Details</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control">
                                        <p class="control is-expanded has-icons-left suggestions-container">
                                            <input name="stud_user_id" type="text" value="<?= $studid ?>" hidden>
                                            <input name="stud_form_id" type="text" value="<?= $formuid ?>" hidden>
                                            <input class="input" id="stud_id" name="student_id" type="text" value="<?= $row['school_id'] ?>" placeholder="Student ID" readonly>
                                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" name="student_name" id="student_fullname" type="text"
                                            placeholder="Student Name" value="<?= ucfirst($row['first_name']) . ' ' . ucfirst($row['middle_initial']) . ', ' . ucfirst($row['last_name']) ?>" readonly>
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
                                            <input class="input" id="grade_level" name="grade_lvl" type="text"
                                                placeholder="Grade Level" value="<?= $row['grade'] ?>" readonly>
                                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" id="adviser" name="adviser" type="text"
                                            placeholder="Adviser" value="<?= ucfirst($row['adviser']) ?>" readonly>
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
                                        <input class="input" name="birthdate" type="date" placeholder="Date of Birth"
                                            readonly value="<?= $row['birthdate'] ?>">
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                    <p class="help">
                                        Birthdate
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" name="birthplace" type="text" placeholder="Place of Birth"
                                            value="<?= $row['place_of_birth'] ?>" readonly>
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
                                        <input class="input" name="address" type="text" placeholder="Address"
                                            value="<?= $row['address'] ?>" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Parent/Guardian Details</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="parent_name" type="text" placeholder="Parent/Guardian's Name"
                                            value="<?= ucfirst($row['parent_guardian']) ?>" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" name="parent_name" type="text" placeholder="Relationship to Student"
                                            value="<?= ucfirst($row['rel_to_stud']) ?>" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Allergies & Vaccination</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow mt-5">
                                    <div class="control">
                                        <label class="b-checkbox checkbox">
                                            <input class="checkbox selectedOption" name="alergy" value="medicine" id="yes"
                                                type="checkbox">
                                            <span class="check"></span>
                                            &nbsp;
                                            Medicine
                                        </label>
                                        <label class="b-checkbox checkbox">
                                            <input class="checkbox selectedOption" name="alergy" value="food" id="no" type="checkbox">
                                            <span class="check"></span>
                                            &nbsp;
                                            Food
                                        </label>
                                        <label class="b-checkbox checkbox">
                                            <input class="checkbox selectedOption" name="alergy" value="none" id="none" type="checkbox">
                                            <span class="check"></span>
                                            &nbsp;
                                            None
                                        </label>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="#">Reason/s</label>
                                    <p class="control">
                                        <input class="input" name="reason" type="text" value="<?= $row['reason'] ?>" placeholder="" required>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="#">Special Treatment</label>
                            </div>
                            <div class="field-body">

                                <div class="field">
                                    <label class="#">Specify treatment for these allergies</label>
                                    <div class="control">
                                        <input class="input" name="treatment" value="<?= $row['treatment'] ?>" type="text"
                                            placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Immunization</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control mt-2">
                                        <label class="b-checkbox checkbox" id="immunizationyes">
                                            <input class="checkbox selectedOption" name="option" value="yes" id="yes"
                                                type="checkbox">
                                            <span class="check"></span>
                                            &nbsp;
                                            Yes
                                        </label>
                                        <label class="b-checkbox checkbox" id="immunizationno">
                                            <input class="checkbox selectedOption" name="option" value="no" id="no" type="checkbox">
                                            <span class="check"></span>
                                            &nbsp;
                                            No
                                        </label>
                                    </div>
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
                                        <!-- <input class="input" id="type_findings" name="type_findings" type="text" placeholder="Type">
                                        <div id="autocompleteList"></div> -->
                                        <select class="select is-fullwidth" id="type_findings" placeholder="Input Type" name="type_findings">
                                            <option value="1">A</option>
                                            <option value="2">E</option>
                                            <option value="3">O</option>
                                            <option value="4">U</option>
                                            <option value="5">S</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <input class="input" name="reason_findings" type="text" placeholder="Reason/s">
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
                                            <select name="medications_cert">
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
                                        <input class="input" name="quantity_med" type="text" placeholder="Quantity">
                                    </p>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="input" name="special_trtmnt" type="text"
                                            placeholder="Specify treatment for the findings">
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
                                        <input class="input" name="date_med" type="text" placeholder="#" value="<?= $datemed ?>" readonly>
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
                                            <button id="submit-med-form" class="button is-primary">
                                                <span>Submit</span>
                                            </button>
                                        </div>
                                        <div class="control">
                                            <button type="button" onclick="window.history.back()" class="button is-primary is-outlined">
                                                <span>Cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php  ?>
            </div>
        </section>


    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <?php require 'component/footer.php' ?>