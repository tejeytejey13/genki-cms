<?php 
    $userforminfo = $conn->query("SELECT * FROM client WHERE user_id = $user_id");
    $userrow = $userforminfo->fetch_assoc();

    $getextras = $conn->query("SELECT * FROM medical_form WHERE user_id = $user_id ORDER BY id DESC LIMIT 1");
    if($getextras->num_rows > 0){
        $rowform = $getextras->fetch_assoc();
        $parentName = $rowform['parent_guardian'];
        $rel_to_stud = $rowform['rel_to_stud'];
        $con_num = $rowform['contact_num'];
        $emergency_name = $rowform['emergency_name'];
        $emergency_num = $rowform['emergency_num'];
        $allergy = $rowform['alergy'];
        $reason = $rowform['reason'];
        $treatment = $rowform['treatment'];
        $immunization = $rowform['immunization'];

    }else{
        $parentName = "";
        $rel_to_stud = "";
        $con_num = "";
        $emergency_name = "";
        $emergency_num = "";
        $allergy = "";
        $reason = "";
        $treatment = "";
        $immunization = "";
    }
?>
<script>
    $(document).ready(function() {
       var allergy = <?= json_encode($allergy) ?>;
       switch(allergy){
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

       var immunization = <?=json_encode($immunization)?>;
       switch(immunization){
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
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Clinic Form
        </p>
    </header>
    <div class="card-content" id="modal-container">
        <form id="medical-form" method="POST">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Student Details</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input " name="lname" type="text" value="<?= ucfirst($user_lname) ?>" readonly>
                            <span class="icon is-small is-left" id="icon"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="fname" type="text" value="<?= ucfirst($user_fname) ?>" readonly>
                            <span class="icon is-small is-left" id="icon"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="mname" type="text" value="<?= ucfirst($user_mname) ?>" readonly>
                            <span class="icon is-small is-left" id="icon"><i class="mdi mdi-account"></i></span>
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
                                <select id="grade-level" name="grade-level" required>
                                    <option selected hidden>Grade Level</option>
                                    <?php
                                    $sql = "SELECT * FROM grade_levels";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($userrow['grade_level'] == $row['level']){
                                            echo "<option value='" . $row['level'] . "' selected>" . $row['level'] . "</option>";
                                        }else{
                                            echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>";
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select id="section" name="section" required>
                                    <option selected hidden>Section</option>
                                    <?php
                                    $sql = "SELECT * FROM section";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($userrow['section'] == $row['section_name']){
                                            echo "<option value='" . $row['section_name'] . "' selected>" . $row['section_name'] . "</option>";
                                        }else{
                                            echo "<option value='" . $row['section_name'] . "'>" . $row['section_name'] . "</option>";
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input class="input" name="adviser" type="text" value="<?=$userrow['adviser']?>" placeholder="Adviser" required>
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
                            <input class="input" name="birthdate" type="date" value="<?=$userrow['birthdate']?>" placeholder="Date of Birth" required>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input class="input" name="birthplace" type="text" value="<?=$userrow['place_of_birth']?>"  placeholder="Place of Birth" required>
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
                            <input class="input" name="address" type="text" value="<?=$userrow['address']?>" placeholder="Address" required>
                            <span class="icon is-small is-left" id="icon"><i class="mdi mdi-mail"></i></span>
                            <span class="icon is-small is-right" id="icon"><i class="mdi mdi-check"></i></span>
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
                        <label for="parent_name">Parent/Gurdian's Name</label>
                        <p class="control is-expanded has-icons-left">
                            <input class="input" id="parent_name" name="parent_name" type="text" placeholder="" value="<?=$parentName?>" required>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <label for="parent_name">Relationship to Student</label>
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="rel_to_stud" type="text" placeholder="" value="<?=$rel_to_stud?>" required>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label"></div>
                <div class="field-body">
                    
                    <div class="field is-expanded">
                    <label for="parent_name">Phone Number</label>
                        <div class="field has-addons">
                            
                            <p class="control">
                                <a class="button is-static">
                                    +63
                                </a>
                            </p>
                            <p class="control is-expanded">
                                <input class="input" name="contact_num" type="tel" placeholder="" value="<?=$con_num?>" required>
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
                    <label for="parent_name">Name</label>
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="emerg_name" type="text" value="<?=$emergency_name?>" placeholder="" required>
                            <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                        </p>
                        <p class="help">Other Contact Person/s during emergency</p>
                    </div>
                    <div class="field is-expanded">
                    <label for="parent_name">Phone number</label>
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-static">
                                    +63
                                </a>
                            </p>
                            <p class="control is-expanded">
                                <input class="input" name="emerg_num" type="tel" value="<?=$emergency_num?>" placeholder="" required>
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
                        <!-- <div class="control">
                            <div class="select is-fullwidth">
                                <select name="alergy" required>
                                    <option selected hidden>Alergy Selection</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="food">Food</option>
                                    <option value="others">Others (Specify)</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="control mt-5">
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
                            <input class="input" name="reason" type="text" value="<?=$reason?>" placeholder="" required>
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
                    <label class="#">Specify treatment for these allergies</label>
                        <div class="control">
                            <input class="input" name="treatment" value="<?=$treatment?>" type="text"
                                placeholder="" required>
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
                                <select name="time" required>
                                    <option selected hidden>Time Selection</option>
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input" name="date_med" type="date" placeholder="#" required>
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById('success-modal');
    const accountIcon = document.querySelectorAll('.icon');
    const dropdowns = document.querySelectorAll('.field');

    function openModal() {
        modal.classList.add('is-active'); 
        accountIcon.forEach(icon => {
            icon.style.display = 'none';
        });
        dropdowns.forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }

});
</script>