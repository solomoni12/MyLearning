<html>
    <link rel=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        type="text/css" />
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
            type="text/javascript">
    </script>
    <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
    <style>
        .container {
            width: 70%;
            margin: 15px auto;
        }

        body {
            text-align: center;
            color: green;
        }

        h2 {
            text-align: center;
            font-family: "Verdana", sans-serif;
            font-size: 30px;
        }
    </style>

    <body>
        <div class="container">
            <h2>Line Chart</h2>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </body>

    <script>
        let ctx = document.getElementById("myChart").getContext("2d");
        let myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday",
                ],
                datasets: [
                    {
                        label: "work load",
                        data: [2, 9, 3, 17, 6, 3, 7],
                        backgroundColor: "rgba(153,205,1,0.6)",
                    },
                    {
                        label: "free hours",
                        data: [2, 2, 5, 5, 2, 1, 10],
                        backgroundColor: "rgba(155,153,10,0.6)",
                    },
                ],
            },
        });
    </script>
</html>
