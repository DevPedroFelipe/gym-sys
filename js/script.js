let carregarGrafico = (arrayRetorno) => {

    console.log(arrayRetorno);

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Grátis', arrayRetorno[0]],
            ['Normal', arrayRetorno[1]],
            ['Prêmio', arrayRetorno[2]]
        ]);

        var options = {
            title: 'Dashboard - Quantidade de Clientes por Categoria',
            pieSliceText: 'value',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3d'));

        chart.draw(data, options);
    }

}