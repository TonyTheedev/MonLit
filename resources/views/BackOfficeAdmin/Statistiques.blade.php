@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>
    #derniereFactures_wrapper {
        width: 100%;
    }
</style>
@endsection


@section('body')

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-8 shadow-lg p-3 mb-5 bg-white" style="right: 10px;border-radius: 15px;">
            <canvas width="800" height="450" id="line-chart"> </canvas>
        </div>
        <div class="col-4 shadow-lg p-3 mb-5 bg-white" style="border-radius: 15px;">
            <canvas width="330" height="400" id="myChart"></canvas>
        </div>
    </div>
    <div class="row shadow-lg p-3 mb-5 bg-white" style="border-radius: 15px;">
        <table class="table table-hover" id="derniereFactures">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#linkStats').addClass('activeLink');
    });
</script>
<script>
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: [0, "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
            datasets: [{
                data: [0, 1000, 800, 760, 870, 900, 950, 1000, 900, 532, 1100, 1250, 1400],
                label: "en Dirhams",
                borderColor: "#3e95cd",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: "Gains d'argent (par mois)",
                fontSize: 15,
            }
        }
    });
</script>
<script>
    let ctx = document.getElementById("myChart").getContext("2d");

    Chart.defaults.global.defaultFontColor = "#888";
    Chart.defaults.global.maintainAspectRatio = true;

    let t = "0.8";

    let myChart = new Chart(ctx, {
        plugins: [{
            beforeInit: function(chart) {
                chart.legend.afterFit = function() {
                    this.height = this.height + 20;
                };
            }
        }],
        type: "pie",

        data: {
            labels: ["Paiement en attente", "Facturés & payés", "Livraison avec succés"],
            datasets: [{
                label: "Demandes",
                backgroundColor: [
                    `rgba(241, 224, 90, ${t})`,
                    `rgb(227, 76, 38, ${t})`,
                    "#F57C70"
                ],
                borderColor: [
                    "#f1e05a",
                    "#e34c26",
                    "#F57C70"
                ],
                borderWidth: 2.4,
                data: [20, 10, 50],
                barThickness: 30
            }]
        },
        options: {
            cutoutPercentage: 65,
            legend: {
                display: true,
                position: "bottom",
                align: "center",
                labels: {
                    boxWidth: 7,
                    padding: 14,
                    usePointStyle: true
                }
            },
            tooltips: {
                mode: "point",
                titleFontColor: "black",
                bodyFontColor: "black",
                backgroundColor: "#eee"
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#derniereFactures').DataTable();
    });
</script>
@endsection