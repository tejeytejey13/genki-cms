<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Clinic Form
        </p>
    </header>
    <div class="card-content">
        <form id="medical-form" method="POST">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Student Details</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input " name="lname" type="text" value="<?= ucfirst($user_lname) ?>" readonly>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="fname" type="text" value="<?= ucfirst($user_fname) ?>" readonly>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="mname" type="text" value="<?= ucfirst($user_mname) ?>" readonly>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <!-- <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input is-success" type="email" placeholder="Email" readonly>
                                        <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                                        <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                                    </p>
                                </div> -->
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <!-- <label class="label">Student Address</label> -->
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="grade-level">
                                    <option selected hidden>Grade Level</option>
                                    <?php
                                    $sql = "SELECT * FROM grade_levels";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="grade-level">
                                    <option selected hidden>Section</option>
                                    <?php
                                    $sql = "SELECT * FROM grade_levels";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input class="input" name="adviser" type="text" placeholder="Adviser">
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
                            <input class="input" name="birthdate" type="date" placeholder="Date of Birth">
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input class="input" name="birthplace" type="text" placeholder="Place of Birth">
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
                            <input class="input" name="address" type="text" placeholder="Address">
                            <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                            <span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="field is-horizontal">
                            <div class="field-label"></div>
                            <div class="field-body">
                                <div class="field is-expanded">
                                    <div class="field has-addons">
                                        <p class="control">
                                            <a class="button is-static">
                                                +63
                                            </a>
                                        </p>
                                        <p class="control is-expanded">
                                            <input class="input" type="tel" placeholder="Your phone number">
                                        </p>
                                    </div>
                                    <p class="help">Do not enter the first zero</p>
                                </div>
                            </div>
                        </div> -->
            <hr>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Parent's Details</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="parent_name" type="text" placeholder="Parent/Gurdian's Name">
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="rel_to_stud" type="text" placeholder="Relationship to Student">
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label"></div>
                <div class="field-body">
                    <div class="field is-expanded">
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-static">
                                    +63
                                </a>
                            </p>
                            <p class="control is-expanded">
                                <input class="input" name="contact_num" type="tel" placeholder="Phone number">
                            </p>
                        </div>
                        <p class="help">Do not enter the first zero</p>
                    </div>
                </div>
            </div>
            <!-- <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Course</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-narrow">
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select>
                                                <option>Business development</option>
                                                <option>Marketing</option>
                                                <option>Sales</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Contact Information</label>

                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="emerg_name" type="text" placeholder="Name">
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                        <p class="help">Other Contact Person/s during emergency</p>
                    </div>
                    <div class="field is-expanded">
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-static">
                                    +63
                                </a>
                            </p>
                            <p class="control is-expanded">
                                <input class="input" name="emerg_num" type="tel" placeholder="Phone number">
                            </p>
                        </div>
                        <p class="help">Do not enter the first zero</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Allergies & Vaccination</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="alergy">
                                    <option selected hidden>Alergy Selection</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="food">Food</option>
                                    <option value="others">Others (Specify)</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <p class="control">
                            <input class="input" name="reason" type="text" placeholder="Reason/s">
                        </p>
                    </div>
                    <!-- <div class="field">
                                    <div class="control">
                                        <input class="input is-danger" type="text" placeholder="e.g. Partnership opportunity" required>
                                    </div>
                                    <p class="help is-danger">
                                        This field is required
                                    </p>
                                </div> -->
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Special Treatment</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" name="treatment" type="text" placeholder="Specify treatment for these allergies">
                        </div>
                    </div>
                    <!-- <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" placeholder="Explain how we can help you"></textarea>
                                    </div>
                                </div> -->

                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Immunization</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <label class="b-checkbox checkbox">
                                <input class="checkbox selectedOption" name="option" value="yes" id="yes" type="checkbox">
                                <span class="check"></span>
                                &nbsp;
                                Yes
                            </label>
                            <label class="b-checkbox checkbox">
                                <input class="checkbox selectedOption" name="option" value="no" id="no" type="checkbox">
                                <span class="check"></span>
                                &nbsp;
                                No
                            </label>
                        </div>
                    </div>
                    <!-- <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" placeholder="Explain how we can help you"></textarea>
                                    </div>
                                </div> -->

                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Date of Medical</label>
                </div>
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="time">
                                    <option selected hidden>Time Selection</option>
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                                <button type="button" id="reset-form" class="button is-primary is-outlined">
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