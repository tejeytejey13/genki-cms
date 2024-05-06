<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<link rel="stylesheet" href="css/admin-nurse.css">
<?php
include 'component/head.php';
?>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

.input-container {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 5px;
}



.btn-submit {
    background-color: #4CAF50;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

@media (max-width: 768px) {
    .input-container {
        width: 100%;
    }
}
</style>

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
            <!-- <button class="btn btn-info" id="addnursebtn"
                style="font-size: 15px; font-weight: 900; margin-bottom: 10px; text-align: center; align-items: center;">
                Add <i class="mdi mdi-plus"></i>
            </button> -->

            <div class="card has-table has-table-container-upper-radius">
                <div class="card-content">
                    <div class="b-table has-pagination">
                        <div class="table-wrapper has-mobile-cards">
                            <form>
                            <div class="input-container">
                                    <label for="date">Date:</label>
                                    <input type="date" id="date" name="date" required>
                                </div>
                                <div class="input-container">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="input-container">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="input-container">
                                    <label for="age">Age:</label>
                                    <input type="number" id="age" name="age" required>
                                </div>
                                <div class="input-container">
                                    <label for="residing">Residing At:</label>
                                    <input type="text" id="residing" name="residing" required>
                                </div>
                                <div class="input-container">
                                    <label for="treatment_since">Was under my treatment since:</label>
                                    <input type="date" id="treatment_since" name="treatment_since" required>
                                </div>
                                <div class="input-container">
                                    <label for="suffering_from">Suffering From:</label>
                                    <input type="text" id="suffering_from" name="suffering_from" required>
                                </div>
                                <div class="input-container">
                                    <label for="advice">He/She is/Was advised treatment or rest for this period:</label>
                                    <textarea id="advice" name="advice" rows="3" cols="200" required></textarea>
                                </div>
                                <button type="submit" class="btn-submit">Submit</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>


    </div>
    <?php require 'component/footer.php' ?>