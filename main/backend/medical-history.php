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
        .medical-history, .consultation, .medicine {
            margin: 20px 0;
        }
        .medical-history h2, .consultation h2, .medicine h2 {
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
        .medicine table, .medicine th, .medicine td {
            border: 1px solid #ddd;
        }
        .medicine th, .medicine td {
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
<body>
    <div class="container">
        <div class="side-bar"></div>
        <div class="content">
            <div class="header">
                <div>
                    <p>MAY 7, 2024</p>
                </div>
                <div>
                    <img src="../img/assets/GENKI.png" alt="Genki Logo">
                </div>
            </div>
            <div class="medical-history">
                <h2>MEDICAL HISTORY</h2>
                <p><strong>Bailey Dupont</strong></p>
                <p>Studio Shadowe</p>
                <p>123 Anywhere St., Any City, ST 12345</p>
            </div>
            <div class="consultation">
                <h2>CONSULTATION</h2>
                <p><strong>Grade 12- Kansha</strong></p>
                <p><strong>Adviser:</strong> Jane Doegs</p>
                <p><strong>Allergies:</strong> Patatas</p>
                <p><strong>Illness:</strong> High Fever</p>
                <p>Bailey reports experiencing a high fever for the past [insert duration]. He describes the fever as persistent and associated with [any other symptoms such as chills, sweating, body aches, etc.].</p>
            </div>
            <div class="medicine">
                <h2>Medicine</h2>
                <table>
                    <tr>
                        <th>Medicine</th>
                        <th>QTY</th>
                    </tr>
                    <tr>
                        <td>Paracetamol 500mg</td>
                        <td>1</td>
                    </tr>
                </table>
                <p>Medicine received at [TIME_RECEIVED], intake scheduled for [TIME_INTAKE]</p>
            </div>
            <div class="footer">
                <p>Feel free to email us at pnjkiscms@gmail.com for any inquiries, assistance, or further information. We're here to help!</p>
                <p>Signature of Authorized Person</p>
            </div>
            <div class="disclaimer">
                <p>This slip was prepared for you by Genki Clinic Management System</p>
                <p>© Genki 2024. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
