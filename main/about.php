<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<?php include 'component/head.php'; ?>

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
                            <li>Student</li>
                            <li>About Us</li>
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
                                About Us
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
            <div class="card has-table has-table-container-upper-radius">
                <div class="card-content">
                    <div class="b-table has-pagination">
                        <div class="table-wrapper has-mobile-cards">
                            <!-- About Us Section -->
                            <div class="about-us">
                                <h2>About School Clinic</h2>
                                <p style="padding: 20px;">Welcome to our School Clinic! We are dedicated to providing comprehensive healthcare
                                    services to our students and staff members. Our clinic is staffed with experienced
                                    healthcare professionals who are committed to promoting wellness and ensuring the
                                    well-being of our school community. From routine check-ups to addressing minor
                                    illnesses and injuries, our clinic is here to support the health needs of everyone
                                    in our school. We prioritize safety, confidentiality, and compassionate care in
                                    every interaction. Thank you for choosing our School Clinic as your healthcare
                                    provider.</p>
                                <div class="team-members">
                                    <div class="team-member">
                                        <img src="./img/assets/avatar1.jpg" alt="Team Member 1" class="avatar">
                                        <p class="member-name">Bench Paul Alegado</p>
                                    </div>
                                    <div class="team-member">
                                        <img src="./img/assets/avatar2.png" alt="Team Member 2" class="avatar">
                                        <p class="member-name">Irish Go</p>
                                    </div>
                                    <div class="team-member">
                                        <img src="./img/assets/avatar3.png" alt="Team Member 3" class="avatar">
                                        <p class="member-name">Khelly Rabe</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
    <?php include 'component/footer.php'; ?>