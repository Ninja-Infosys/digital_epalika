Apex.grid = {padding: {right: 0, left: 0}}, Apex.dataLabels = {enabled: !1};

$(window).on('load',function () {
    $.ajax({
        method: 'get',
        url: $('#charts').attr('data-chart-url'),
        success: function (res) {
            Object.keys(res).forEach(key => {
                const targetElement = document.getElementById(key);
                if (targetElement) {
                    if (res[key].chartType === 'pie' || res[key].chartType==='donut') {
                        setPieData(targetElement, res[key].labels, res[key].data)
                    } else {
                        setBarData(targetElement, res[key].labels, res[key].dataSets)
                    }
                }
            })
        }
    })
})

function randomColors() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}

function setBarData(el, labels, dataSets) {
    const chartDatasets = []
    const colors = []
    dataSets.forEach(dataset => {
        chartDatasets.push({
            name: dataset.label,
            data: dataset.data
        })
        colors.push(randomColors())
    })
    console.log(chartDatasets)
    const options = {
        chart: {height: 320, type: "bar"},
        series: chartDatasets,
        labels: labels,
        colors: colors,
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0,
            offsetY: 7
        },
        responsive: [{breakpoint: 600, options: {chart: {height: 240}, legend: {show: !1}}}]
    };
    (chart = new ApexCharts(el, options)).render();
}

function setPieData(el, labels, data) {
    const colors = [];
    for (let i = 0; i < data.length; i++) {
        colors.push(randomColors());
    }
    let options = {
        chart: {height: 320, type: "pie"},
        series: data,
        labels: labels,
        colors: colors,
        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0,
            offsetY: 7
        },
        responsive: [{breakpoint: 600, options: {chart: {height: 240}, legend: {show: !1}}}]
    };
    (chart = new ApexCharts(el, options)).render();
}

