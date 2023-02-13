function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}
$(document).ready(() => {
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in May, 2020',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Chrome',
                y: 70.67,
                sliced: true,
                selected: true
            }, {
                name: 'Edge',
                y: 14.77
            },  {
                name: 'Firefox',
                y: 4.86
            }, {
                name: 'Safari',
                y: 2.63
            }, {
                name: 'Internet Explorer',
                y: 1.53
            },  {
                name: 'Opera',
                y: 1.40
            }, {
                name: 'Sogou Explorer',
                y: 0.84
            }, {
                name: 'QQ',
                y: 0.51
            }, {
                name: 'Other',
                y: 2.6
            }]
        }]
    });
//     function createChart(element, chartType, labels, data, dataSets) {
//         const chartDatasets = [];
//         const colors = [];
//
//         if (chartType === 'pie' || chartType === 'donut') {
//             data.forEach(() => {
//                 colors.push(getRandomColor());
//             });
//         } else {
//             dataSets.forEach((dataset) => {
//                 chartDatasets.push({
//                     name: dataset.label,
//                     data: dataset.data,
//                 });
//                 colors.push(getRandomColor());
//             });
//         }
//
//         const options = {
//             chart: {height: 320, type: chartType},
//             series: (chartType === 'pie' || chartType === 'donut') ? data : chartDatasets,
//             labels: labels,
//             colors: colors,
//             legend: {
//                 show: true,
//                 position: 'bottom',
//                 horizontalAlign: 'center',
//                 verticalAlign: 'middle',
//                 floating: false,
//                 fontSize: '14px',
//                 offsetX: 0,
//                 offsetY: 7,
//             },
//             responsive: [
//                 {
//                     breakpoint: 600,
//                     options: {
//                         chart: {height: 240},
//                         legend: {show: false},
//                     },
//                 },
//             ],
//         };
//         const chart = new ApexCharts(element, options);
//         chart.render();
// }
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
