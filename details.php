<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1c1c1c 0%, #272727 100%);
            color: #f1f1f1;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .details {
            background: linear-gradient(135deg, #2a2a2a, #1c1c1c);
            padding: 40px;
            border-radius: 20px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        .details:hover {
            transform: translateY(-10px);
        }

        h1 {
            color: #ffffff;
            font-size: 30px;
            margin-bottom: 25px;
            border-bottom: 2px solid #444;
            padding-bottom: 15px;
            letter-spacing: 1px;
        }

        p {
            font-size: 18px;
            margin: 12px 0;
            line-height: 1.6;
        }

        p strong {
            color: #ffffff;
        }

        .buttons {
            margin-top: 40px;
            display: flex;
            gap: 20px;
        }

        .button {
            padding: 14px 28px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            flex: 1;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button.apply {
            background-color: #28a745;
        }

        .button.apply:hover {
            background-color: #218838;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .modal-content h2 {
            color: #ffffff;
            margin-bottom: 20px;
        }

        .modal-content input[type="email"],
        .modal-content input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #1e1e1e;
            color: #fff;
        }

        .modal-content input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .modal-content input[type="submit"]:hover {
            background-color: #218838;
        }

        .close {
            color: #ffffff;
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .details {
                padding: 20px;
                font-size: 14px;
            }

            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }

            .buttons {
                flex-direction: column;
                gap: 15px;
            }

            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <div class="details">
        <?php
        include "db.php";

        // Get ID and type from URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $type = isset($_GET['type']) ? $_GET['type'] : 'internship';

        if ($type === 'internship') {
            // Fetch internship details
            $sql = "SELECT * FROM internships WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $internship = $result->fetch_assoc();
                echo '<h1>' . htmlspecialchars($internship["title"]) . '</h1>';
                echo '<p><strong>Company:</strong> ' . htmlspecialchars($internship["company"]) . '</p>';
                echo '<p><strong>Location:</strong> ' . htmlspecialchars($internship["location"]) . '</p>';
                echo '<p><strong>Duration:</strong> ' . htmlspecialchars($internship["duration"]) . '</p>';
                echo '<p><strong>Salary:</strong> ' . htmlspecialchars($internship["stipend"]) . '</p>';
                echo '<p><strong>Description:</strong> ' . htmlspecialchars($internship["description"]) . '</p>';
            } else {
                echo '<h1>Internship Not Found</h1>';
            }
        } elseif ($type === 'job') {
            // Fetch job details
            $sql = "SELECT * FROM jobs WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $job = $result->fetch_assoc();
                echo '<h1>' . htmlspecialchars($job["title"]) . '</h1>';
                echo '<p><strong>Company:</strong> ' . htmlspecialchars($job["company"]) . '</p>';
                echo '<p><strong>Location:</strong> ' . htmlspecialchars($job["location"]) . '</p>';
                echo '<p><strong>Duration:</strong> ' . htmlspecialchars($job["duration"]) . '</p>';
                echo '<p><strong>Salary:</strong> ' . htmlspecialchars($job["salary"]) . '</p>';
                echo '<p><strong>Description:</strong> ' . htmlspecialchars($job["description"]) . '</p>';
            } else {
                echo '<h1>Job Not Found</h1>';
            }
        } else {
            echo '<h1>Invalid Type</h1>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <div class="buttons">
            <a href="javascript:void(0);" onclick="window.history.back();" class="button back">Back to Listings</a>
            <a href="javascript:void(0);" onclick="openModal();" class="button apply">Apply Now</a>
        </div>
    </div>

    <!-- Modal -->
    <div id="applyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Apply</h2>
            <form id="applyForm" method="POST" action="submit_application.php" enctype="multipart/form-data">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="resume">Upload Resume:</label>
                <input type="file" id="resume" name="resume" required>

                <input type="submit" value="Submit Application">
            </form>
        </div>
    </div>

    <script>
        // Modal handling functions
        function openModal() {
            document.getElementById('applyModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('applyModal').style.display = 'none';
        }

        // Close modal on outside click
        window.onclick = function (event) {
            if (event.target == document.getElementById('applyModal')) {
                closeModal();
            }
        };
    </script>

</body>

</html>