Apex.grid = {padding: {right: 0, left: 0}};
Apex.dataLabels = {enabled: !1};

function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}

function createChart(element, chartType, labels, data, dataSets) {
    const chartDatasets = [];
    const colors = [];

    if (chartType === 'pie' || chartType === 'donut') {
        data.forEach(() => {
            colors.push(getRandomColor());
        });
    } else {
        dataSets.forEach((dataset) => {
            chartDatasets.push({
                name: dataset.label,
                data: dataset.data,
            });
            colors.push(getRandomColor());
        });
    }

    const options = {
        chart: {height: 320, type: chartType},
        series: (chartType === 'pie' || chartType === 'donut') ? data : chartDatasets,
        labels: labels,
        colors: colors,
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 7,
        },
        responsive: [
            {
                breakpoint: 600,
                options: {
                    chart: {height: 240},
                    legend: {show: false},
                },
            },
        ],
    };
    const chart = new ApexCharts(element, options);
    chart.render();
}

$(document).ready(() => {
    const url = $('#charts').data('chart-url');
    $.ajax({
        method: 'GET',
        url,
        async: true,
        cache: false,
        success: (response) => {
                Object.keys(response).forEach((key) => {
                    const targetElement = document.getElementById(key);
                    if (targetElement) {
                        const {chartType, labels, data, dataSets} = response[key];
                        createChart(targetElement, chartType, labels, data, dataSets);
                    }
                })
        },
        error: (error) => {
            console.error(`Error fetching chart data: ${error}`);
        },
    })
})
