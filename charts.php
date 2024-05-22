<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart with Dragula and Resizable</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .draggable {
            position: relative;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: move;
            /* Change cursor to indicate draggable */
        }

        .resizable {
            overflow: hidden;
            /* Prevent content from overflowing when resized */
        }
    </style>
</head>

<body>
    <div id="chart" style="display:flex">
        <div id="chart_div" class="draggable resizable" style="width: 400px; height: 300px; border: 1px solid #ccc;">
        </div>
        <div id="piechart_3d" class="draggable resizable" style="width: 400px; height: 300px; border: 1px solid #ccc;">
        </div>
        <div id="donutchart" class="draggable resizable" style="width: 400px; height: 300px; border: 1px solid #ccc;">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Dragula for drag-and-drop
            var drake = dragula([document.getElementById('chart')]);

            // Load Google Charts and draw charts
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawCharts);

            function drawCharts() {
                drawChart1();
                drawChart2();
                drawChart3();

                // Add resizable behavior to each resizable element
                $('.resizable').resizable({
                    handles: 'se', // Only allow resizing from the bottom-right corner
                    start: function (event, ui) {
                        // Cancel Dragula dragging when resizing starts
                        drake.cancel(true);
                    }
                });
            }

            function drawChart1() {
                var data = google.visualization.arrayToDataTable([
                    ['Dinosaur', 'Length'],
                    ['Acrocanthosaurus (top-spined lizard)', 12.2],
                    // Add more data here
                ]);

                var options = {
                    title: 'Lengths of dinosaurs, in meters',
                    legend: { position: 'none' },
                };

                var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
                chart.draw(data, options);
            }

            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work', 11],
                    // Add more data here
                ]);

                var options = {
                    title: 'My Daily Activities',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }

            function drawChart3() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work', 11],
                    // Add more data here
                ]);

                var options = {
                    title: 'My Daily Activities',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        });
    </script>
</body>

</html>