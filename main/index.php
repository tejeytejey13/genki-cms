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
        if ($user_type == 'nurse' || $user_type == 'admin') {
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
                        <div class="card tile is-child" onclick="">
                            <div class="overlay"></div>
                            <div class="card-content">
                                <div class="level is-mobile">
                                    <div class="level-item">
                                        <div class="is-widget-label">
                                            <h3 class="subtitle is-spaced">
                                                Students
                                            </h3>
                                            <!-- <p class="help">Pending Appointments</p> -->
                                            <h1 class="title">
                                                <?= $user_count ?>
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
                        <div class="card tile is-child" onclick="window.location.href = 'nurse-medical-history.php'">
                            <div class="overlay"></div>

                            <div class="card-content">

                                <div class="level is-mobile">
                                    <div class="level-item">
                                        <div class="is-widget-label">
                                            <h3 class="subtitle is-spaced">
                                                Clinic
                                            </h3>
                                            <h1 class="title">
                                                <?= $form_count ?>
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
                        <div class="card tile is-child" onclick="window.location.href = 'clinic-inventory.php'">
                            <div class="overlay"></div>

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
                                        <div class="is-widget-icon"><span class="icon has-text-success is-large"><i
                                                    class="mdi mdi-finance mdi-48px"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tile is-parent">
                        <div class="card tile is-child" onclick="window.location.href='account-management.php'">
                        <div class="overlay"></div>

                        <div class="card-content">
                                <div class="level is-mobile">
                                    <div class="level-item">
                                        <div class="is-widget-label">
                                            <h3 class="subtitle is-spaced">
                                                Accounts
                                            </h3>
                                            <h1 class="title">
                                                <?= $account_count ?>
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
                    </div> -->
                </div>
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon"><i class="mdi mdi-finance"></i></span>
                            Total Cases
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
                                <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor"
                                    style="display: block; height: 400px; width: 1197px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon"><i class="mdi mdi-finance"></i></span>
                            Total Cases
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
                                <canvas id="big-bar-graph" width="2992" height="1000" class="chartjs-render-monitor"
                                    style="display: block; height: 400px; width: 1197px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            $query = $conn->query("SELECT created_at, findings, COUNT(*) as count FROM `medical_certificate` GROUP BY created_at, findings");
            $labels = [];
            while ($row = $query->fetch_assoc()) {
                $labels[] = $row;
            }
        } else {
            include('user-index.php');
        }
        ?>
    </div>
    <script>
        $(document).ready(function () {
            var randomChartData = function (r) {
                for (var o = [], a = 0; a < r; a++) o.push(Math.round(200 * Math.random()));
                return o;
            },
                chartColors = {
                    default: {
                        primary: "#00D1B2",
                        info: "#209CEE",
                        danger: "#FF3860"
                    },
                },
                data = <?= json_encode($labels) ?>;
            finding_labels = data.map(item => item.findings);
            finding_counts = data.map(item => item.count);
            findings_date = data.map(item => item.created_at);

            var ctx = document.getElementById("big-line-chart").getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    datasets: [{
                        fill: !1,
                        borderColor: chartColors.default.primary,
                        borderWidth: 2,
                        borderDash: [],
                        borderDashOffset: 0,
                        pointBackgroundColor: chartColors.default.primary,
                        pointBorderColor: "rgba(255,255,255,0)",
                        pointHoverBackgroundColor: chartColors.default.primary,
                        pointBorderWidth: 20,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 15,
                        pointRadius: 4,
                        data: finding_counts,
                    },
                        // {
                        //     fill: !1,
                        //     borderColor: chartColors.default.info,
                        //     borderWidth: 2,
                        //     borderDash: [],
                        //     borderDashOffset: 0,
                        //     pointBackgroundColor: chartColors.default.info,
                        //     pointBorderColor: "rgba(255,255,255,0)",
                        //     pointHoverBackgroundColor: chartColors.default.info,
                        //     pointBorderWidth: 20,
                        //     pointHoverRadius: 4,
                        //     pointHoverBorderWidth: 15,
                        //     pointRadius: 4,
                        //     data: randomChartData(9),
                        // },
                        // {
                        //     fill: !1,
                        //     borderColor: chartColors.default.danger,
                        //     borderWidth: 2,
                        //     borderDash: [],
                        //     borderDashOffset: 0,
                        //     pointBackgroundColor: chartColors.default.danger,
                        //     pointBorderColor: "rgba(255,255,255,0)",
                        //     pointHoverBackgroundColor: chartColors.default.danger,
                        //     pointBorderWidth: 20,
                        //     pointHoverRadius: 4,
                        //     pointHoverBorderWidth: 15,
                        //     pointRadius: 4,
                        //     data: randomChartData(9),
                        // },
                    ],
                    // labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09"],
                    labels: finding_labels,
                },
                options: {
                    maintainAspectRatio: !1,
                    legend: {
                        display: !1
                    },
                    responsive: !0,
                    tooltips: {
                        backgroundColor: "#f5f5f5",
                        titleFontColor: "#333",
                        bodyFontColor: "#666",
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest",
                    },
                    scales: {
                        yAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: !1,
                                color: "rgba(29,140,248,0.0)",
                                zeroLineColor: "transparent",
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "#9a9a9a"
                            },
                        },],
                        xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: !1,
                                color: "rgba(225,78,202,0.1)",
                                zeroLineColor: "transparent",
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "#9a9a9a"
                            },
                        },],
                    },
                },
            });

            const groupedData = data.reduce((acc, item) => {
                const formattedDate = new Date(item.created_at).toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
                if (!acc[formattedDate]) {
                    acc[formattedDate] = [];
                }
                acc[formattedDate].push({ finding: item.findings, count: item.count });
                return acc;
            }, {});

            const dates = Object.keys(groupedData);

            const datasets = dates.flatMap(date =>
                groupedData[date].map(findingData => ({
                    label: `${findingData.finding} on ${date}`,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: Array(dates.length).fill(0).map((_, i) => (dates[i] === date ? findingData.count : 0)),
                }))
            );

            const ctz = document.getElementById("big-bar-graph").getContext("2d");
            new Chart(ctz, {
                type: "bar",
                data: {
                    labels: dates,
                    datasets: datasets
                },
                options: {
                    maintainAspectRatio: !1,
                    responsive: !0,
                    // legend: {
                    //     display: !1,
                    // },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.dataset.label}: ${tooltipItem.raw} cases`;
                            }
                        },
                        backgroundColor: "#f5f5f5",
                        titleFontColor: "#333",
                        bodyFontColor: "#666",
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest",
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: "#9a9a9a"
                            }
                        },
                        x: {
                            ticks: {
                                color: "#9a9a9a"
                            }
                        }
                    }
                }
            });

            // var ctz = document.getElementById("big-bar-graph").getContext("2d");
            // new Chart(ctz, {
            //     type: "bar",
            //     data: {
            //         datasets: [{
            //             backgroundColor: [
            //                 'rgba(255, 99, 132, 0.2)',
            //                 'rgba(54, 162, 235, 0.2)',
            //                 'rgba(255, 206, 86, 0.2)',
            //                 'rgba(75, 192, 192, 0.2)',
            //                 'rgba(153, 102, 255, 0.2)',
            //                 'rgba(255, 159, 64, 0.2)'
            //             ],
            //             borderColor: [
            //                 'rgba(255, 99, 132, 1)',
            //                 'rgba(54, 162, 235, 1)',
            //                 'rgba(255, 206, 86, 1)',
            //                 'rgba(75, 192, 192, 1)',
            //                 'rgba(153, 102, 255, 1)',
            //                 'rgba(255, 159, 64, 1)'
            //             ],
            //             borderWidth: 1,
            //             data: finding_counts,
            //         }, ],
            //         labels: findings_date,
            //     },
            //     options: {
            //         maintainAspectRatio: !1,
            //         legend: {
            //             display: !1
            //         },
            //         responsive: !0,
            //         tooltips: {
            //             backgroundColor: "#f5f5f5",
            //             titleFontColor: "#333",
            //             bodyFontColor: "#666",
            //             bodySpacing: 4,
            //             xPadding: 12,
            //             mode: "nearest",
            //             intersect: 0,
            //             position: "nearest",
            //         },
            //         scales: {
            //             yAxes: [{
            //                 barPercentage: 1.6,
            //                 gridLines: {
            //                     drawBorder: !1,
            //                     color: "rgba(29,140,248,0.0)",
            //                     zeroLineColor: "transparent",
            //                 },
            //                 ticks: {
            //                     padding: 20,
            //                     fontColor: "#9a9a9a"
            //                 },
            //             }, ],
            //             xAxes: [{
            //                 barPercentage: 1.6,
            //                 gridLines: {
            //                     drawBorder: !1,
            //                     color: "rgba(225,78,202,0.1)",
            //                     zeroLineColor: "transparent",
            //                 },
            //                 ticks: {
            //                     padding: 20,
            //                     fontColor: "#9a9a9a"
            //                 },
            //             }, ],
            //         },
            //     },
            // });

        });
    </script>
    <?php include './component/footer.php'; ?>