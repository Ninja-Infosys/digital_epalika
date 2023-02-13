function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
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
                    const {labels, dataSets} = response[key];
                    createChart(targetElement, labels, dataSets);
                }
            })
        },
        error: (error) => {
            console.error(`Error fetching chart data: ${error}`);
        },
    })

    function createChart(element, labels, dataSets) {
        const chartDatasets = [];
        const pieDataSet =[];
        dataSets.forEach((dataset) => {
            chartDatasets.push({
                name: dataset.label,
                data: dataset.data,
            });
        });
        dataSets.forEach((dataset)=>{
            pieDataSet.push({
                name: dataset.label,
                y: dataset.data,
            })
        })

        // setBarChart(element,'pie',labels,chartDatasets)
        setPieChart(element,'pie',labels,pieDataSet)
}

    function setBarChart(element,charType='pie',labels,dataSets){
        Highcharts.chart(element, {
            chart: {
                type: charType
            },
            title: false,
            xAxis: {
                categories: labels,
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
            series: dataSets
        });
    }

    function setPieChart(element,chartType='pie', labels, dataSets){
        Highcharts.chart(element, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: chartType
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
                    y: 70.67
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
    }
})
