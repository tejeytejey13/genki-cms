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
            <div class="calendar-container">

                <div id="calendar"></div>

                <div id="show-slots">
                    <!-- <div class="container-selectedDate" >
                        <div class="dropdown">
                            <button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">April 12, 2024</span>
                                <span class="dropdown-icon"><i class="mdi mdi-plus"></i></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>John Doe</li>
                                <li>John Cena</li>
                            </ul>
                        </div>
                    </div> -->
                </div>

            </div>



        </section>

    </div>
    <div id="modal" class="modal">
        <div class="modal-lead">
            <span class="close">&times;</span>
            <div class="modal-content-main" style="font-size: 30px; font-weight: 900;">
                
            </div>

        </div>
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
    <?php require 'component/footer.php' ?>
    <script src="backend/js-backend/calendar.js?ver=1"></script>