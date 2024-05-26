<section class="section is-main-section">
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="card tile is-child" onclick="alert('Coming Soon')">
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
                            <div class="is-widget-icon"><span class="icon has-text-primary is-large"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
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
                            <div class="is-widget-icon"><span class="icon has-text-success is-large"><i class="mdi mdi-finance mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container is-fullwidth" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="card has-table has-table-container-upper-radius" style="width: 100%">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Clinic Appointment
                </p>
            </header>
            <div class="card-content">
                <div class="b-table has-pagination">
                    <div class="table-wrapper has-mobile-cards">
                        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
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
                                        while($row = $getAppointments->fetch_assoc()){
                                            if($row['status'] !== 'approved'){
                                                $stats = 'in-progress';
                                            }else{
                                                $stats = 'open';
                                            }
                                            $date = date('F d, Y', strtotime($row['date_med']));
                                            echo '
                                            <tr>
                                                <td data-label="Name">'.$row['form_id'].'</td>
                                                <td data-label="Created">
                                                    <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">'.
                                                    $date.'</small>
                                                </td>
                                                <td data-label="Status" class="status '.$stats.'">'.$row['status'].'</td>
                                            </tr>
                                            ';
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
        <div class="card has-table has-table-container-upper-radius" style="width: 100%;">
        <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Clinic Form
                </p>
            </header>
            <div class="card-content">
                <div class="b-table has-pagination">
                    <div class="table-wrapper has-mobile-cards">
                        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
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