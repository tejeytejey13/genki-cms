<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<?php
    include './component/head.php';
?>

<body>
    <div id="app">
        <!--Nav Bar-->
        <?php
        include './component/nav.php';
        include './component/side.php';
        ?>

        <section class="section is-title-bar">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <ul>
                        <?= ($user_type == 'client') ? '<li>Student</li>' : (($user_type == 'nurse') ? '<li>Nurse</li>' : '<li>Admin</li>'); ?>
                            <li>Dashboard</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <?php 
            if($user_type == 'nurse' || $user_type == 'admin') {
        ?>
        <section class="hero is-hero-bar">
            <div class="hero-body">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h1 class="title">
                                Dashboard
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
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced">
                                            Students
                                        </h3>
                                        <h1 class="title">
                                            <?=$user_count?>
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
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced">
                                            Clinic Appointment
                                        </h3>
                                        <h1 class="title">
                                            <?=$form_count?>
                                        </h1>
                                    </div>
                                </div>
                                <div class="level-item has-widget-icon">
                                    <div class="is-widget-icon"><span class="icon has-text-info is-large"><i class="mdi mdi-calendar-multiple-check mdi-48px"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="card tile is-child">
                        <div class="card-content">
                            <div class="level is-mobile">
                                <div class="level-item">
                                    <div class="is-widget-label">
                                        <h3 class="subtitle is-spaced">
                                            Inventory
                                        </h3>
                                        <h1 class="title">
                                            <?= $inv_count ?>
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
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-finance"></i></span>
                        Performance
                    </p>
                    <a href="#" class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-reload"></i></span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="chart-area">
                        <div style="height: 100%;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div></div>
                                </div>
                            </div>
                            <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }else{ 
                include('component/404.php');
            }
        ?>     
    </div>
<?php include './component/footer.php'; ?>