<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<link rel="stylesheet" href="css/admin-nurse.css">
<?php
include 'component/head.php';
// Pagination settings
$results_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $results_per_page;

// Get total number of users
$total_query = $conn->query("SELECT COUNT(*) FROM `users` WHERE user_type = 'client'");
$total_row = $total_query->fetch_row();
$total_records = $total_row[0];
$total_pages = ceil($total_records / $results_per_page);

// Fetch users for current page
$getusers = $conn->query("SELECT * FROM `users` WHERE user_type = 'client' LIMIT $start_from, $results_per_page");

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
                            <li>Admin</li>
                            <li>User Accounts</li>
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
                                User Accounts
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
                <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <div class="control" style="display: flex; margin: 5px; gap: 10px;">
                                    <input class="input" type="text" id="searchAccountInput" 
                                        placeholder="Enter search ">
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                <?php
                                    while ($row = $getusers->fetch_assoc()) {
                                        $id = $row['id'];
                                        $school_id = $row['school_id'];
                                        $email = $row['email'];
                                        if ($row['user_type'] == 'client') {
                                            $getClient = $conn->query('SELECT * FROM `client` WHERE `user_id` = "' . $id . '"');
                                            $client = $getClient->fetch_assoc();

                                            $fullname = $client['first_name'] . " " . $client['last_name'];
                                            $profile = $client['profile'];
                                            $status = $client['status'];

                                            $stats = ($status !== 'active') ? 'dead' : 'open';

                                            $pfp = empty($profile) ? "https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg" : 'img/profile/' . $profile;
                                    ?>
                                            <tr>
                                                <td class="is-checkbox-cell">
                                                    <label class="b-checkbox checkbox">
                                                        <input type="checkbox" value="false">
                                                        <span class="check"></span>
                                                    </label>
                                                </td>
                                                <td class="is-image-cell">
                                                    <div class="image">
                                                        <img src="<?= $pfp ?>" class="is-rounded">
                                                    </div>
                                                </td>
                                                <td data-label="Name"><?= $school_id ?></td>
                                                <td data-label="Company"><?= ucwords($fullname) ?></td>
                                                <td data-label="City"><?= $email ?></td>
                                                <td data-label="Status" class="status <?= $stats ?>"><?= $status ?></td>
                                                <td class="is-actions-cell">
                                                    <div class="buttons is-left">
                                                        <button class="button is-small is-primary edit-user-status" data-target-uid="<?= $id ?>" data-target-name="<?= ucwords($fullname) ?>" type="button">
                                                            <span class="icon"><i class='mdi mdi-pen'></i></span>
                                                        </button>
                                                        <!-- <button class="button is-small is-danger" onclick="deleteAccountUser('<?= $id ?>')" type="button">
                                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                        </button> -->
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                                <a href="account-management.php?page=<?= $i ?>" class="button"><?= $i ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <small>Page <?= $page ?> of <?= $total_pages ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="user-edit-modal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content modal-content-main-1">
                <div class="modal-header" style="display: flex;">
                    <h2 class="modal-title" style="font-weight: 900">User Status</h2>
                    <button class="delete1 jb-modal-close" aria-label="close">&times</button>
                </div>
                <form id="user-status-update" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="patient-details">
                                        <h2 id="heading-nurse-name-edit">User Name: <a id="user-edit-stts"></a></h2>
                                        <input type="text" id="user-edit-id" name="user-id" value="" hidden/>
                                        <p class="heading-date">Select Status:</p>
                                        <div class="select is-narrow">
                                            <select id="status-edit" name="status_nurse_change">
                                                <option selected hidden>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" styles="display: flex; justify-content: center: gap: 30px;">
                        <button type="submit" class="button is-success">Update</button>
                </form>
                <!-- <button class="button jb-modal-close">Cancel</button> -->
            </div>
        </div>

    </div>
    <?php require 'component/footer.php' ?>