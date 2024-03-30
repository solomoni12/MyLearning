<html>
    <script src=
    "https://d3js.org/d3.v4.min.js"></script>
    <script src=
    "https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet"
        href=
    "https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <link rel=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        type="text/css" />

    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>

    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
    </script>

    <style>
        body {
            text-align: center;
            color: green;
        }

        h2 {
            text-align: center;
            font-family: "Verdana", sans-serif;
            font-size: 40px;
        }
    </style>

    <body>
        <div class="col-xs-12 text-center">
            <h2>Donut Chart</h2>
        </div>

        <div id="donut-chart"></div>

        <script>
            let chart = bb.generate({
                data: {
                    columns: [
                        ["Blue", 2],
                        ["orange", 4],
                        ["green", 3],
                    ],
                    type: "donut",
                    onclick: function (d, i) {
                        console.log("onclick", d, i);
                    },
                    onover: function (d, i) {
                        console.log("onover", d, i);
                    },
                    onout: function (d, i) {
                        console.log("onout", d, i);
                    },
                },
                donut: {
                    title: "70",
                },
                bindto: "#donut-chart",
            });
        </script>
    </body>
</html>
