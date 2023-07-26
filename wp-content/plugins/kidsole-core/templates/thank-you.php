<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        body {
            background: linear-gradient(#3800e7, #8a15ff);
            height: 100vh;
            font-size: calc(14px + (26 - 14) * ((100vw - 300px) / (1600 - 300)));
            font-family: "DM Mono", monospace;
            font-weight: 300;
            overflow: hidden;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 0.2em;
        }

        h2 {
            font-size: 2em;
        }

        .main {
            height: 100vh;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            position: relative;
            justify-content: center;
            align-items: center;
        }

        .main:before, .main:after {
            content: "";
            display: block;
            position: absolute;
            z-index: -3;
        }

        .main:before {
            right: 0;
            bottom: -19;
            height: 30em;
            width: 30em;
            border-radius: 30em;
            background: linear-gradient(#3800e7, #8a15ff);
            align-self: flex-end;
            animation: gradient-fade 8s ease-in-out 3s infinite alternate;
        }

        .main:after {
            top: 0;
            left: 30;
            height: 10em;
            width: 10em;
            border-radius: 10em;
            background: linear-gradient(#3800e7, #8a15ff);
            animation: gradient-fade-alt 6s ease-in-out 3s infinite alternate;
        }

        .main__text-wrapper {
            position: relative;
            padding: 2em;
        }

        .main__text-wrapper:before, .main__text-wrapper:after {
            content: "";
            display: block;
            position: absolute;
        }

        .main__text-wrapper:before {
            z-index: -1;
            top: -3em;
            right: -3em;
            width: 13em;
            height: 13em;
            opacity: 0.7;
            border-radius: 13em;
            background: linear-gradient(#15e0ff, #8a15ff);
            animation: rotation 7s linear infinite;
        }

        .main__text-wrapper:after {
            z-index: -1;
            bottom: -20em;
            width: 20em;
            height: 20em;
            border-radius: 20em;
            background: linear-gradient(#d000c5, #8a15ff);
            animation: rotation 7s linear infinite;
        }

        .arrow {
            z-index: 1000;
            opacity: 0.5;
            position: absolute;
        }

        .arrow--top {
            top: 0;
            left: -5em;
        }

        .arrow--bottom {
            bottom: 0;
            right: 3em;
        }

        .circle {
            transform: translate(50%, -50%) rotate(0deg);
            transform-origin: center;
        }

        .circle--ltblue {
            height: 20em;
            width: 20em;
            border-radius: 20em;
            background: linear-gradient(#15e0ff, #3800e7);
        }

        .backdrop {
            position: absolute;
            width: 100vw;
            height: 100vh;
            display: block;
            background-color: pink;
        }

        .dotted-circle {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0.3;
            animation: rotation 38s linear infinite;
        }

        .draw-in {
            stroke-dasharray: 1000;
            stroke-dashoffset: 10;
            animation: draw 15s ease-in-out alternate infinite;
        }

        @keyframes draw {
            from {
                stroke-dashoffset: 1000;
            }
            to {
                stroke-dashoffset: 0;
            }
        }

        .item-to {
            animation-duration: 10s;
            animation-iteration-count: infinite;
            transform-origin: bottom;
        }

        .bounce-1 {
            animation-name: bounce-1;
            animation-timing-function: ease;
        }

        .bounce-2 {
            animation-name: bounce-2;
            animation-timing-function: ease;
        }

        .bounce-3 {
            animation-name: bounce-3;
            animation-timing-function: ease;
        }

        @keyframes bounce-1 {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(50px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes bounce-2 {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-30px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes bounce-3 {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(30px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes gradient-fade {
            from {
                transform: translate(10%, -10%) rotate(0deg);
            }
            to {
                transform: translate(50%, -50%) rotate(360deg);
            }
        }

        @keyframes gradient-fade-alt {
            from {
                transform: translate(-20%, 20%) rotate(0deg);
            }
            to {
                transform: translate(-60%, 60%) rotate(360deg);
            }
        }
    </style>
</head>
<body>

<div class="arrow arrow--top">
    <svg xmlns="http://www.w3.org/2000/svg" width="270.11" height="649.9" overflow="visible">
        <style>
            .geo-arrow {
                fill: none;
                stroke: #fff;
                stroke-width: 2;
                stroke-miterlimit: 10
            }
        </style>
        <g class="item-to bounce-1">
            <path class="geo-arrow draw-in" d="M135.06 142.564L267.995 275.5 135.06 408.434 2.125 275.499z"/>
        </g>
        <circle class="geo-arrow item-to bounce-2" cx="194.65" cy="69.54" r="7.96"/>
        <circle class="geo-arrow draw-in" cx="194.65" cy="39.5" r="7.96"/>
        <circle class="geo-arrow item-to bounce-3" cx="194.65" cy="9.46" r="7.96"/>
        <g class="geo-arrow item-to bounce-2">
            <path class="st0 draw-in" d="M181.21 619.5l13.27 27 13.27-27zM194.48 644.5v-552"/>
        </g>
    </svg>
</div>
<div class="arrow arrow--bottom">
    <svg xmlns="http://www.w3.org/2000/svg" width="31.35" height="649.9" overflow="visible">
        <style>
            .geo-arrow {
                fill: none;
                stroke: #fff;
                stroke-width: 2;
                stroke-miterlimit: 10
            }
        </style>
        <g class="item-to bounce-1">
            <circle class="geo-arrow item-to bounce-3" cx="15.5" cy="580.36" r="7.96"/>
            <circle class="geo-arrow draw-in" cx="15.5" cy="610.4" r="7.96"/>
            <circle class="geo-arrow item-to bounce-2" cx="15.5" cy="640.44" r="7.96"/>
            <g class="item-to bounce-2">
                <path class="geo-arrow draw-in" d="M28.94 30.4l-13.26-27-13.27 27zM15.68 5.4v552"/>
            </g>
        </g>
    </svg>
</div>

<?php
$action_param = $_GET['action'];
$user_selected_option = '';
if (isset($action_param)) {
    if ($action_param == 'google_search') {
        $user_selected_option = 'Google Search';
    } elseif ($action_param == 'clinical_recommendation') {
        $user_selected_option = 'Clinical Recommendation';
    } elseif ($action_param == 'heard_from_friend') {
        $user_selected_option = 'Heard from a friend';
    } else {
        $user_selected_option = '';
    }

    $option = $action_param;
    $ip = $_SERVER['REMOTE_ADDR'];

    global $wpdb;
    $table_name = $wpdb->prefix . "thankyou_survey";
    $wpdb->insert( $table_name, array(
        'option' => $option,
        'ip' => $ip,
    ) );
}


?>
<div class="main">
    <div class="main__text-wrapper">
        <h1 class="main__title">Thank you for let us know</h1>
        <p>You selected: <?php echo $user_selected_option; ?></p>
        <svg xmlns="http://www.w3.org/2000/svg" class="dotted-circle" width="352" height="352" overflow="visible">
            <circle cx="176" cy="176" r="174" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10"
                    stroke-dasharray="12.921,11.9271"/>
        </svg>
    </div>
</div>


</body>
</html>


