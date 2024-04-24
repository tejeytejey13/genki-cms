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
                            <li>Nurse</li>
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
        <button class="btn btn-info" style="font-size: 20px; font-weight: 900; margin-bottom: 15px;">Add <span class="icon" ><i class="mdi mdi-plus"></i></span></button>

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
                                    <!-- <tr>
                                        <td class="is-checkbox-cell">
                                            <label class="b-checkbox checkbox">
                                                <input type="checkbox" value="false">
                                                <span class="check"></span>
                                            </label>
                                        </td>
                                        <td class="is-image-cell">
                                            <div class="image">
                                                <img src="https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg"
                                                    class="is-rounded">
                                            </div>
                                        </td>
                                        <td data-label="Name">Lonzo Steuber</td>
                                        <td data-label="Company">Skiles Ltd</td>
                                        <td data-label="City">Marilouville</td>
                                        <td data-label="Progress" class="is-progress-cell">
                                            <progress max="100" class="progress is-small is-primary"
                                                value="17">17</progress>
                                        </td>
                                        <td data-label="Created">
                                            <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">Feb 12,
                                                2020</small>
                                        </td>
                                        <td class="is-actions-cell">
                                            <div class="buttons is-right">
                                                <button class="button is-small is-primary" type="button">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </button>
                                                <button class="button is-small is-danger" type="button">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons">
                                            <button type="button" class="button is-active">1</button>
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


    </div>
    </div>
    <?php require 'component/footer.php' ?>