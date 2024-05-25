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
                            <?= ($user_type == 'nurse') ? '<li>Nurse</li>' : (($user_type == 'admin') ? '<li>Admin</li>' : '<li>Client</li>'); ?>
                            <li>Medical Clearance</li>
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
                                Medical Clearance
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
            <?php
            if ($user_type == 'client') :
                $getClientslots = "SELECT * FROM user_slot_clearance WHERE user_id = $user_id";
                $func = mysqli_query($conn, $getClientslots);
                $getrow = mysqli_fetch_assoc($func);
                if (mysqli_num_rows($func) < 1) :

            ?>
            <!-- <div class="notification is-success">You have no clearance slots yet.</div> -->
            <div class="calendar-container">
                <div id="calendar"></div>
                <!-- <div id="show-slots">
                            <?php
                            $getSlots = "SELECT * FROM clearance_slots";
                            $query = mysqli_query($conn, $getSlots);
                            while ($row = mysqli_fetch_array($query)) {

                                $date = date('F d, Y', strtotime($row['date']));
                            ?>
                                <div class="container-selectedDate">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                            <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                            <span class="menu-item-label"><?= $date ?></span>
                                            <span class="dropdown-icon">Slots: <?= $row['slots'] ?></span>
                                            <span class="dropdown-icon">Time: <?= $row['time'] ?></span>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> -->
            </div>
            <?php else : ?>
            <div class="notification is-success">You successfully selected clearance appointment.</div>
            <section class="section is-main-section">
                <!-- 404 Container -->
                <!-- <div class="container-404">
                            <img src="./img/assets/medical_logo.svg" alt="Medical Logo" class="logo-404">
                            <h1>Not Found</h1>
                            <p>Sorry, the page you are looking for is not available.</p>

                        </div> -->
                <div class="container-clearance">
                    <div class="card-clearance-1">
                        <h2>clearance appointment</h2>
                    </div>
                    <div class="barcode" id="barcode"></div>

                    <div class="content">
                        <div class="photo">
                            <img src="img/assets/john.jpg" alt="Student Photo">
                        </div>
                        <div class="info">
                            <div class="logo">
                                <img src="img/assets/GENKI.png" alt="Genki Logo">
                            </div>
                            <p>This is proof that I have an appointment for clearance.</p>
                        </div>
                        <div class="details">
                            <div class="barcode1" id="barcode1"></div>

                            <p>Student Name:<br>FIRST NAME, LAST NAME </p>
                            <p>Day: AM</p>
                            <p>Date: 5/20/2024</p>
                            <p>Grade: 12</p>
                            <p>Section: Keiken</p>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php else : ?>
            <div class="calendar-container">
                <div id="calendar"></div>
                <div id="show-slots">
                    <?php
                        $getSlots = "SELECT * FROM clearance_slots";
                        $query = mysqli_query($conn, $getSlots);
                        while ($row = mysqli_fetch_array($query)) {

                            $date = date('F d, Y', strtotime($row['date']));
                        ?>
                    <div class="container-selectedDate">
                        <div class="dropdown">
                            <button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label"><?= $date ?></span>
                                <!-- <span class="dropdown-icon"></span> -->
                                <span class="dropdown-icon">Slots: <?= $row['slots'] ?></span>
                                <span class="dropdown-icon">Time: <?= $row['time'] ?></span>
                            </button>
                            <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>John Doe</li>
                                            <li>John Cena</li>
                                        </ul> -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php endif; ?>
        </section>

    </div>
    <div id="modal" class="modal">
        <form method="POST">
            <div class="modal-lead">
                <span class="close">&times;</span>
                <div class="modal-content-main" style="font-size: 30px; font-weight: 900;">

                </div>

            </div>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownToggle = document.querySelector('.container-selectedDate .dropdown-toggle');
        const dropdownMenu = document.querySelector('.container-selectedDate .dropdown-menu');

        dropdownToggle.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            const isClickInside = dropdownToggle.contains(event.target) || dropdownMenu.contains(event
                .target);
            if (!isClickInside) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
    </script>

    <script>
    const barcodeContainer = document.getElementById('barcode');
    const numberOfBars = 50; // Number of bars and spaces

    for (let i = 0; i < numberOfBars; i++) {
        // Create a bar
        const bar = document.createElement('div');
        bar.className = 'bar';
        barcodeContainer.appendChild(bar);

        // Create a space
        const space = document.createElement('div');
        space.className = 'space';
        barcodeContainer.appendChild(space);
    }

    const barcodeContainer1 = document.getElementById('barcode1');
    const numberOfBars1 = 30; // Number of bars and spaces

    for (let i = 0; i < numberOfBars; i++) {
        // Create a bar
        const bar1 = document.createElement('div');
        bar1.className = 'bar1';
        barcodeContainer1.appendChild(bar1);

        // Create a space
        const space1 = document.createElement('div');
        space1.className = 'space1';
        barcodeContainer1.appendChild(space1);
    }
    </script>
    <?php require 'component/footer.php' ?>
    <script src="backend/js-backend/calendar.js?ver=1"></script>