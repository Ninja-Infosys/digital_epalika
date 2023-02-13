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
    Highcharts.chart('test', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
                194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
                106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
                51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8,
                51.1]

        }]
    });
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
