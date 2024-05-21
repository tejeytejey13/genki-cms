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
                            <li>Medical Form</li>
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
                                Medical Form
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
            <?php include('medical-form.php'); ?>
        </section>

        <div id="success-modal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Medical Form</p>
                    <button class="delete jb-modal-close" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <p>Your Medical Form is <b id="status"></b></p>
                    <p>Please Wait for Nurse Confirmation.</p>
                </section>
                <footer class="modal-card-foot">
                    <!-- <button class="button jb-modal-close">Cancel</button>
                    <button class="button is-success jb-modal-close">Delete</button> -->
                </footer>
            </div>
            <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
        </div>
    </div>
<?php include 'component/footer.php'; ?>