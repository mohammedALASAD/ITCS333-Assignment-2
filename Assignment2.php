<?php
// Define the URL for the API that provides student data for IT bachelor's programs.
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Start a cURL session to request data from the API.
$CH = curl_init($URL);

// Tell cURL to return the response as a string instead of printing it.
curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);

// Execute the API request and save the response.
$response = curl_exec($CH);

// Close the cURL session to free up resources.
curl_close($CH);

// Check if the response failed (e.g., no connection, server issue).
if ($response === false) {
    die('Cannot fetch data from the API'); // Stop the script and show an error message.
}

// Convert the JSON response into a PHP array for easier handling.
$result = json_decode($response, true);

// Check if the JSON data is valid; stop the script if it's not.
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON data: ' . json_last_error_msg());
}
?>

[8:55 pm, 27/11/2024] Ahmed Abdulla: <?php
// Define the URL for the API that provides student data for IT bachelor's programs.
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Start a cURL session to request data from the API.
$CH = curl_init($URL);

// Tell cURL to return the response as a string instead of printing it.
curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);

// Execute the API request and save the response.
$response = curl_exec($CH);

// Close the cURL session to free up resources.
curl_close($CH);

// Check if the response failed (e.g., no connection, server issue).
if ($response === false) {
    die('Cannot fetch data from the API'); // Stop the script and show an error message.
}

// Convert the JSON response into a PHP array for easier handling.
$result = json_decode($response, true);

// Check if the JSON data is valid; stop the script if it's not.
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON data: ' . json_last_error_msg());
}
?>
[8:55 pm, 27/11/2024] Ahmed Abdulla: <!DOCTYPE html>
<html lang="en">
<head>
    <title>University of Bahrain Students Enrollment by Nationality</title>
    <!-- Add a simple CSS framework (Pico.css) for styling -->
    <link rel="stylesheet" href="https://unpkg.com/picocss/pico.min.css">
    <style>
        /* Custom styles for better readability and design */
        body {
            font-family: 'Arial', sans-serif;
            margin: 2rem auto;
            max-width: 1200px;
            background-color: #f9f9f9;
            color: #333;
            padding: 1rem;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #0056b3;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        th {
            background-color: #0056b3;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e8f4fd;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }
            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <main>
        <h1 style="text-align: center;">UOB Student Nationality Data</h1>
        
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Student Nationality</th>
                        <th>Number of Students</th>
                        <th>College</th>
                        <th>Program</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if we got any valid data from the API.
                    if ($result && isset($result['results']) && count($result['results']) > 0) {
                        // Loop through each record in the API response.
                        foreach ($result['results'] as $record) {
                            // Get each field or use 'N/A' if it's missing.
                            $year = isset($record['year']) ? $record['year'] : 'N/A';
                            $semester = isset($record['semester']) ? $record['semester'] : 'N/A';
                            $nationality = isset($record['nationality']) ? $record['nationality'] : 'N/A';
                            $num_students = isset($record['number_of_students']) ? $record['number_of_students'] : 'N/A';
                            $college = isset($record['colleges']) ? $record['colleges'] : 'N/A';
                            $program = isset($record['the_programs']) ? $record['the_programs'] : 'N/A';

                            // Output a table row with the data (escaped for security).
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($year) . "</td>";
                            echo "<td>" . htmlspecialchars($semester) . "</td>";
                            echo "<td>" . htmlspecialchars($nationality) . "</td>";
                            echo "<td>" . htmlspecialchars($num_students) . "</td>";
                            echo "<td>" . htmlspecialchars($college) . "</td>";
                            echo "<td>" . htmlspecialchars($program) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no data is available, show a message.
                        echo "<tr><td colspan='6'>No data available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
