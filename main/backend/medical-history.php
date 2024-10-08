<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .container {
            width: 60%;
            margin: 20px;
            display: flex;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .side-bar {
            width: 30px;
            background: linear-gradient(to bottom, #003366 0%, #003366 50%, #007bff 50%, #007bff 100%);
        }

        .content {
            padding: 20px;
            flex-grow: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 50px;
        }

        .header p {
            font-size: 14px;
        }

        .medical-history,
        .consultation,
        .medicine {
            margin: 20px 0;
        }

        .medical-history h2,
        .consultation h2,
        .medicine h2 {
            font-size: 16px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .consultation p {
            margin: 5px 0;
        }

        .medicine table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .medicine table,
        .medicine th,
        .medicine td {
            border: 1px solid #ddd;
        }

        .medicine th,
        .medicine td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
        }

        .disclaimer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<?php
include('config.php');
$uid = $_GET['form_id'];
$get = $conn->query("SELECT * FROM medical_form INNER JOIN medical_certificate ON medical_form.id = medical_certificate.id WHERE medical_certificate.id = '$uid'");
$row = $get->fetch_assoc();
$fullname = $row['first_name'] . " " . $row['middle_initial'] . ", " . $row['last_name'];
// print_r($row);
$ninfo = $conn->query("SELECT * FROM med_form_status WHERE form_id = $uid");
$row2 = $ninfo->fetch_assoc();
$nurseid = $row2['nurse_id'];
if ($nurseid == 1) {
    $nursename = "Admin Admin";
} else {
    $getinfonurse = $conn->query("SELECT * FROM nurse WHERE user_id = '$nurseid'");
    $row3 = $getinfonurse->fetch_assoc();
    $nursename = $row3['first_name'] . " " . $row3['middle_initial'] . ", " . $row3['last_name'];
}
?>

<body>
    <div class="container" id="contentToPrint">
        <div class="side-bar"></div>
        <div class="content">
            <div class="header">
                <div>
                    <p><?= date('F d, Y', strtotime($row['date_med'])); ?></p>
                </div>
                <div>
                    <img src="../img/assets/GENKI.png" alt="Genki Logo">
                </div>
            </div>
            <div class="medical-history">
                <h2>MEDICAL HISTORY</h2>
                <p><strong><?= ucwords($fullname) ?></strong></p>
                <p><?= $row['place_of_birth'] ?></p>
                <p><?= $row['address'] ?></p>
            </div>
            <div class="consultation">
                <h2>CONSULTATION</h2>
                <p><strong>Grade: </strong><?= $row['grade'] ?></p>
                <p><strong>Adviser:</strong> <?= ucwords($row['adviser']) ?></p>
                <p><strong>Allergies:</strong> <?= ucfirst($row['alergy']) ?></p>
                <p><strong>Illness:</strong> <?= ucfirst($row['findings']) ?></p>
                <p><? ucfirst($row['reasons']) ?></p>
            </div>
            <div class="medicine">
                <h2>Medicine</h2>
                <table>
                    <tr>
                        <th>Medicine</th>
                        <th>QTY</th>
                    </tr>
                    <tr>
                        <td><?= ucfirst($row['medications']) ?></td>
                        <td><?= $row['quantity'] ?></td>
                    </tr>
                </table>
                <p><?= ucfirst($row['special_treatment']) ?></p>

            </div>
            <div class="footer">
                <p>Feel free to email us at pnjkiscms@gmail.com for any inquiries, assistance, or further information. We're here to help!</p>
                <br>
                <br>
                <p>___________________________</p>
                <p><?= ucwords($nursename); ?></p>
            </div>
            <div class="disclaimer">
                <p>This slip was prepared for you by Genki Clinic Management System</p>
                <p>© Genki 2024. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script>
        window.addEventListener('message', function(event) {
            if (event.data === 'generatePdf') {
                html2canvas($('#contentToPrint')[0], {
                    onrendered: function(canvas) {
                        var imgData = canvas.toDataURL('image/png');
                        var doc = new jsPDF('p', 'mm', 'a4');
                        var imgWidth = 210;
                        var pageHeight = 297;
                        var imgHeight = canvas.height * imgWidth / canvas.width;
                        var heightLeft = imgHeight;
                        var position = 0;

                        doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;

                        while (heightLeft >= 0) {
                            position = heightLeft - imgHeight;
                            doc.addPage();
                            doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                            heightLeft -= pageHeight;
                        }
                        doc.save('page.pdf');
                    }
                });
            }
        });
    </script>
</body>

</html>