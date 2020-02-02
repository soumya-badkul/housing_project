<?php include './_navbar.php';?>
<style>
    .nav-pills .nav-link {
        color: #9111ff;
        border-radius: 0.25rem;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #b66dff;
    }
</style>
<div class="page-header">
    <h3 class="page-title ">Expense Analysis </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item "><a href="fintabs.php">Finance And Accounting</a></li>
            <li class="breadcrumb-item "><a href="analysis.php">Analysis</a></li>
            <li class="breadcrumb-item ">Expense Analysis</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
            <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab1-tab">

            </div>
        </div>
    </div>

    <?php  include './footer.html';?>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js">
    </script>
    <script>
        var listoflabels;
        $(document).ready(function () {
            readInExp();
        });

        function readInExp() {
            $.ajax({
                type: "post",
                url: "../backend_files/expense_details.inc.php",
                data: {
                    allexp: 'allexp'
                },
                success: function (r) {
                    var response = JSON.parse(r);
                    $('#pills-tab1').html(response.table);
                    $('#allexptable').DataTable();
                    listoflabels = response.graph1;
                    drawgraphforall(response.graph2);
                }
            });
        }

        function changetimeline() {
            var value = $('#select_timeline').val();
            if (value == 'Yearly') {
                $('#sel_year').show();
                $('#sel_mon').hide();
            } else if (value == 'Monthly') {
                $('#sel_year').hide();
                $('#sel_mon').show();
            } else if (value == 'all') {
                $('#sel_year').hide();
                $('#sel_mon').hide();
            }
        }
        function changesubtypes(){
            var subtype = $('#select_subtype').val();
            // var time = $('#select_timeline').val();
            // var timeline = $('#select_timeline').val();
            if(subtype=='null'){
                readInExp();
            }else{
                readSpecificInexp(subtype);
            }
        }

        function readSpecificInexp(subtype){
            $.ajax({
                type: "post",
                url: "../backend_files/expense_details.inc.php",
                data: {
                    specexp: 'specexp',
                    subtype:subtype
                },
                success: function (r) {
                    var response = JSON.parse(r);
                    $('#pills-tab1').html(response.table);
                    $('#allexptable').DataTable();
                    listoflabels = response.graph1;
                    drawgraphforall(response.graph2);
                }
            });
        }

        function drawgraphforall(graphdata) {
            Chart.defaults.global.legend.labels.usePointStyle = true;
            var ctx = document.getElementById('visit-sale-chart').getContext("2d");

            var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
            gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
            gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
            var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

            var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
            gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
            var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // labels: listoflabels,
                    datasets: [{
                        label: "Income",
                        borderColor: gradientStrokeRed,
                        backgroundColor: gradientStrokeRed,
                        hoverBackgroundColor: gradientStrokeRed,
                        legendColor: gradientLegendRed,
                        pointRadius: 0,
                        fill: true,
                        borderWidth: 1,
                        fill: 'origin',
                        data: graphdata,
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    legendCallback: function (chart) {
                        var text = [];
                        text.push('<ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                            text.push('<li><span class="legend-dots" style="background:' +
                                chart.data.datasets[i].legendColor +
                                '"></span>');
                            if (chart.data.datasets[i].label) {
                                text.push(chart.data.datasets[i].label);
                            }
                            text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join('');
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                display: true,
                            },
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(219,219,219,1)',
                                zeroLineColor: 'rgba(235,237,242,1)'
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                                color: 'rgba(0,0,0,1)',
                                zeroLineColor: 'rgba(235,237,242,1)'
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "#555",
                                autoSkip: true,
                            },
                            categoryPercentage: 0.7,
                            barPercentage: 0.8
                        }]
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                }
            })
            $("#visit-sale-chart-legend").html(myChart.generateLegend());
        }
    </script>