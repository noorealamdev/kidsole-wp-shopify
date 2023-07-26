<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Result Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>


    <style>


    </style>
</head>
<body>


<?php

global $wpdb;

$total_rows = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "thankyou_survey");
$google_search_rows = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "thankyou_survey WHERE option = 'google_search'");
$clinical_recommendation_rows = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "thankyou_survey WHERE option = 'clinical_recommendation'");
$heard_from_friend_rows = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "thankyou_survey WHERE option = 'heard_from_friend'");

$total_rows_count = count($total_rows);
$google_search_count = count($google_search_rows);
$clinical_recommendation_count = count($clinical_recommendation_rows);
$heard_from_friend_count = count($heard_from_friend_rows);
?>

    <div class="container mt-4">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <h5 class="mt-4 text-center">Total Participation: <?php echo $total_rows_count ?></h5>
    </div>


<script>
    window.onload = function () {

        var options = {
            animationEnabled: true,
            title: {
                text: "How did you hear about us? - Result"
            },
            data: [{
                type: "doughnut",
                innerRadius: "40%",
                showInLegend: true,
                legendText: "{label}",
                indexLabel: "{label}: #percent%",
                dataPoints: [
                    { label: "Google Search", y: <?php echo $google_search_count ?> },
                    { label: "Clinical Recommendation", y: <?php echo $clinical_recommendation_count ?> },
                    { label: "Heard from a friend", y: <?php echo $heard_from_friend_count ?> }
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }
</script>

</body>
</html>


