<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern CV for Print</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #000;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage">
            <!-- Profile -->
            <div style="text-align: center;">
                <h1>John Doe</h1>
                <p>Web Developer</p>
            </div>

            <!-- Contact Information -->
            <div style="text-align: center;">
                <p>Email: john.doe@example.com | Phone: +1234567890</p>
            </div>

            <!-- About Me Section -->
            <h2>About Me</h2>
            <p>Dynamic professional with excellent communication skills and ability to work under pressure...</p>

            <!-- Skills Section -->
            <h2>Skills</h2>
            <ul>
                <li>HTML/CSS</li>
                <li>JavaScript</li>
                <li>PHP & MySQL</li>
                <li>Project Management</li>
            </ul>

            <!-- Employment History -->
            <h2>Employment History</h2>
            <h3>XYZ Corp - Senior Web Developer</h3>
            <p>January 2020 - Present</p>
            <ul>
                <li>Managed a team of developers to deploy end-to-end web solutions.</li>
                <li>Implemented modern design principles to improve user experience.</li>
            </ul>
            <!-- Additional entries here -->

            <!-- Education Section -->
            <h2>Education</h2>
            <h3>University of ABC - BSc in Computer Science</h3>
            <p>2015 - 2019</p>
            <!-- Additional entries here -->
        </div>
    </div>
</div>
<script>
    window.onafterprint = function(){
        console.log("Printing completed.");
    }
</script>

</body>
</html>