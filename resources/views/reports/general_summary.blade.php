<div class="col-md-6 text-center">
    <div id="yearly_overview">
        <h4>Aperçu Annuel</h4>
        <canvas id="yearly_overview_inner"></canvas>
    </div><!-- /.col -->
</div>
<div class="col-md-6 text-center">
    <div id="payment_overview">
        <h4>Aperçu Paiement</h4>
        <canvas id="payment_overview_inner"></canvas>
    </div><!--/.col -->
</div>
<script>
    var income_data     = JSON.parse('{{ $yearly_income }}');
    var expense_data    = JSON.parse('{{ $yearly_expense }}');
    var lineChartData   = {
        labels : ["Janv","Fébr","Mars","Avr","Mai","Juin","Juill","Août","Sept","Oct","Nov","Déc"],
        datasets : [{
            label               : "Revenus",
            fillColor           : "rgba(14,172,147,0.1)",
            strokeColor         : "rgba(14,172,147,1)",
            pointColor          : "rgba(14,172,147,1)",
            pointStrokeColor    : "#fff",
            pointHighlightFill  : "rgba(54,73,92,0.8)",
            pointHighlightStroke: "rgba(54,73,92,1)",
            data                : income_data
        },
            {
                label               : "Expenditure",
                fillColor           : "rgba(244,167,47,0)",
                strokeColor         : "rgba(244,167,47,1)",
                pointColor          : "rgba(217,95,6,1)",
                pointStrokeColor    : "#fff",
                pointHighlightFill  : "rgba(54,73,92,0.8)",
                pointHighlightStroke: "rgba(54,73,92,1)",
                data                : expense_data
            }
        ]
    }
    var pieData = [
        {
            value: '{{ $total_payments[0]->received_amount }}',
            color:"#2FB972",
            highlight: "#37D484",
            label: "Montant Réçu"
        },

        {
            value: '{{ $total_outstanding }}',
            color:"#C84135",
            highlight: "#EA5548",
            label: "Montant en cours"
        },
    ];


    $(function() {
        Chart.defaults.global.scaleFontSize = 12;
        var chartDiv = document.getElementById("yearly_overview_inner").getContext("2d");
        lineChart = new Chart(chartDiv).Line(lineChartData, {
            responsive: true
        });
        $('#yearly_overview').append( lineChart.generateLegend() )


        var chartDiv = document.getElementById("payment_overview_inner").getContext("2d");
        pieChart = new Chart(chartDiv).Pie(pieData, {
            responsive : true
        });
        $('#payment_overview').append( pieChart.generateLegend() )
    });
</script>