$(document).ready(() => {
    const url = $('#charts').data('chart-url');
    $.ajax({
        method: 'GET',
        url,
        success: (response) => {
            Object.keys(response).forEach((key) => {
                const targetElement = document.getElementById(key);
                if (targetElement) {
                    createChart(targetElement, response[key]);
                }
            })
        },
        error: (error) => {
            console.error(`Error fetching chart data: ${error}`);
        },
    })

    function createChart(element, data) {
        const chartType = $(element).attr('chart-type');
        if (['pie', 'donut'].includes(chartType)) {
            if (Array.isArray(data)) {
                const pieData = data.map(val => {
                    return {
                        name: val.name,
                        y: val.data
                    }
                })
                setPieChart(element, chartType, pieData)
            } else {
                toastMessage('error', 'पाई चार्ट डाटा मान्य ढाँचामा छैन')
            }
        } else {
            if (typeof data === 'object' && data.labels && data.dataSets) {
                const chartDatasets = [];
                data.dataSets.forEach((dataset) => {
                    chartDatasets.push({
                        name: dataset.label,
                        data: dataset.data,
                    });
                });
                setBarChart(element, chartType, data.labels, chartDatasets)
            } else {
                toastMessage('error', 'बार चार्ट डाटा मान्य ढाँचामा छैन')
            }
        }
    }

    function setBarChart(element, charType = 'column', labels, dataSets) {
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
                title: false,
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
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

    function setPieChart(element, chartType = 'pie', data) {
        Highcharts.chart(element, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: chartType
            },
            title: false,
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
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'डाटा',
                colorByPoint: true,
                data: data
            }]
        });
    }
})

function toastMessage(type, title) {
    swal.fire({
        title: title,
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        width: 450,
        timer: 3000,
        timerProgressBar: true,
        icon: type,
    });
}
