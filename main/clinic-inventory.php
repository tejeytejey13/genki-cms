<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<link rel="stylesheet" href="css/admin-nurse.css">

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
                            <li>Clinic Dispensary</li>
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
                                Clinic Dispensary
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
                    <!-- Filter Search -->
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <div class="control" style="display: flex; margin: 5px; gap: 10px;">
                                    <input class="input" type="text" id="searchInput" onkeyup="searchTable()"
                                        placeholder="Enter search ">

                                    <button class="btn btn-info" onclick="openModal()"
                                        style="display: flex; margin: 0 auto; text-align: center; align-items: center; font-size: 20px;">Add
                                        <i class="mdi mdi-plus"></i></button>
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
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Item Quantity</th>
                                        <th>Date Placed</th>
                                        <th>Date Updated</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable-inventory">

                                </tbody>
                            </table>
                        </div>
                        <div class="notification">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="buttons has-addons" id="paginationButtons">
                                            <!-- <button class="button " onclick="inventoryTable(1, 10)">1</button>
                                            <button class="button " onclick="inventoryTable(2, 10)">2</button>
                                            <button class="button" onclick="inventoryTable(3, 10)">3</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item" id="paginationStatus">
                                        <!-- <small>Page 1 of 3</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Add -->

    <div id="modal" class="modal">
        <div class="modal-content">
            <form id="add_inventory" method="POST">
                <span class="close jb-modal-close" aria-label="close">&times;</span>
                <div class="modal-content-main" style="font-size: 30px; font-weight: 900;">
                    <!-- <h2 class="modal-title">Nurse Accounts Form</h2> -->
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="iten_id">Item ID</label>
                                <input id="#" name="Item_id" type="text" placeholder="Item ID" />
                            </div>

                            <div class="col">
                                <label for="item_quantity">Item Quantity</label>
                                <input id="item_quantity" name="Item_quantity" type="number" placeholder="Item Quantity" />
                            </div>

                        </div>

                        <div class="col">
                            <label for="item_name">Item Name</label>
                            <input id="item_name" name="Item_name" type="text" placeholder="Item Name"
                                style="width: 30vw;" />
                        </div>
                    </div>
                    <div class="modal-footer" style="display: flex; justify-content: end; gap: 5px;">
                        <button class="button is-success jb-modal-close" type="submit">Save</button>
                        <button class="button jb-modal-close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   

    <!-- Modal View Quantity -->
    <div id="modal1" class="modal">
        <div class="modal-lead" style=" width: 40vw;">
            <span class="close" onclick="closeModal1()">&times;</span>
            <form method="POST" id="updateItem">
                <div class="input-group"
                    style="display: flex; justify-content: center; align-items: center; margin: 10px auto;">
                    <input id="item_id" type="text" name="quantity" hidden>
                    <div class="group">
                        <label for="">Quantiy</label>
                        <input type="number" id="id_item" name="itemID" hidden>
                        <input type="text" id="quantity_item" name="quantity">
                    </div>

                    <!-- <div class="group">
                        <label for="">Price</label>
                        <input type="number" name="price" id="price_item">
                    </div> -->
                </div>
                <button class="button is-success save-med-item" id="save-med-item" type="submit">Save</button>
            </form>
        </div>
    </div>
    <?php require 'component/footer.php' ?>

    <style>
    .modal-lead {
        max-height: 100%;
    }

    .modal-lead .input-group {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px auto;
    }

    .modal-lead .group {
        margin-right: 20px;
    }

    .modal-lead label {
        font-size: 16px;
        color: #333;
        margin-bottom: 5px;
    }

    .modal-lead input[type="number"],
    .modal-lead input[type="text"] {
        width: 120px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .modal-lead input[type="number"]:focus,
    .modal-lead input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
    }

    @media (max-width: 768px) {
        .modal-lead {
            width: 80vw;

        }
    }

    @media (max-width: 576px) {
        .modal-lead {
            width: 90vw;

        }

        .modal-lead .input-group {
            flex-direction: column;
            align-items: flex-start;
        }

        .modal-lead .group {
            margin-right: 0;
            margin-bottom: 10px;
        }
    }
    </style>