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
    <div class="container is-fullwidth" style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px;">
        <div class="card has-table has-table-container-upper-radius" style="width: 100%">
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
                            <tbody id="indexHistory">
                                <tr>
                                    <td data-label="Name">Lonzo Steuber</td>
                                    <td data-label="Created">
                                        <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">Feb 12,
                                            2020</small>
                                    </td>
                                    <td data-label="Status" class="status open">Status</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card has-table has-table-container-upper-radius" style="width: 100%">
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
                            <tbody id="indexHistory">
                                <tr>
                                    <td data-label="Name">Lonzo Steuber</td>
                                    <td data-label="Created">
                                        <small class="has-text-grey is-abbr-like" title="Feb 12, 2020">Feb 12,
                                            2020</small>
                                    </td>
                                    <td data-label="Status" class="status open">Status</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>