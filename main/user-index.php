<section class="section is-main-section">
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="card tile is-child" onclick="window.location.href='client-table.php'">
                <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h3 class="subtitle is-spaced">
                                    Total Appointments
                                </h3>
                                <h1 class="title">

                                </h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon"><span class="icon has-text-primary is-large"><i
                                        class="mdi mdi-account-multiple mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="card tile is-child" onclick="alert('comming soon')">
                <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h3 class="subtitle is-spaced">
                                    Pending Appointments
                                </h3>
                                <h1 class="title">

                                </h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon">
                                <span class="icon has-text-info is-large">
                                    <i class="mdi mdi-calendar-multiple-check mdi-48px">

                                    </i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="card tile is-child" onclick="alert('comming soon')">
                <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h3 class="subtitle is-spaced">
                                    Approved Appointments
                                </h3>
                                <h1 class="title">

                                </h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon"><span class="icon has-text-success is-large"><i
                                        class="mdi mdi-finance mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container-row {
        display: flex;
        justify-content: space-around;
        padding: 20px;
    }

    .container-column {
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 45%;
        overflow: hidden;
    }

    .card-header {
        background-color: #134280;
        color: white;
        padding: 10px 15px;
        display: flex;
        align-items: center;
    }

    .card-header-title {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .card-content {
        padding: 15px;
    }

    .scrollable-content {
        max-height: 300px;
        overflow-y: auto;
    }

    .b-table {
        width: 100%;
    }

    .table-wrapper {
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f5f5f5;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .status.in-progress {
        color: #ffdd57;
    }

    .status.open {
        color: #23d160;
    }

    .has-text-grey {
        color: #7a7a7a;
    }

    .is-abbr-like {
        font-size: 14px;
    }
    </style>



    <div class="container-row">
        <div class="container-column">
            <header class="card-header">
                <p class="card-header-title" style="color: white;">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Clinic Appointment
                </p>
            </header>
            <div class="card-content scrollable-content">
                <div class="b-table has-pagination">
                    <div class="table-wrapper has-mobile-cards">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Date of Clinic</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $getAppointments = $conn->query("SELECT * 
                                FROM medical_form 
                                INNER JOIN med_form_status 
                                ON medical_form.id = med_form_status.form_id 
                                WHERE medical_form.user_id = '$user_id' 
                                ORDER BY med_form_status.date_updated DESC 
                                LIMIT 5;");
                                    if ($getAppointments->num_rows > 0) {
                                        while ($row = $getAppointments->fetch_assoc()) {
                                            if ($row['status'] !== 'approved') {
                                                $stats = 'in-progress';
                                            } else {
                                                $stats = 'open';
                                            }
                                            $date = date('F d, Y', strtotime($row['date_med']));

                                            if ($row['status'] !== 'archived') {
                                                echo '
                                        <tr>
                                            <td data-label="Name">' . $row['form_id'] . '</td>
                                            <td data-label="Created">
                                                <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">' .
                                                    $date . '</small>
                                            </td>
                                            <td data-label="Status" class="status ' . $stats . '">' . $row['status'] . '</td>
                                        </tr>
                                        ';
                                            }
                                        }
                                    } else {
                                        // If the table is empty, display a message
                                        echo '<tr><td colspan="3">No appointments found.</td></tr>';
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="container-column">
            <header class="card-header">
                <p class="card-header-title" style="color: white;">
                    <span class="icon"><i class="mdi mdi-ballot" ></i></span>
                    Clinic Form
                </p>
            </header>
            <div class="card-content scrollable-content">
                <div class="b-table has-pagination">
                    <div class="table-wrapper has-mobile-cards">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Date of Clinic</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                          

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


</section>