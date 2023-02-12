Apex.grid = {padding: {right: 0, left: 0}}, Apex.dataLabels = {enabled: !1};
colors = ["#CED4DC", "#6658dd"];
(dataColors = $("#apex-mixed-1").data("colors")) && (colors = dataColors.split(","));
options = {
    chart: {height: 380, type: "line"},
    stroke: {width: 2, curve: "smooth"},
    series: [{name: "TEAM A", type: "area", data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33]}, {
        name: "TEAM B", type: "line", data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43]
    }],
    colors: colors,
    fill: {type: "solid", opacity: [.35, 1]},
    labels: ["Dec 01", "Dec 02", "Dec 03", "Dec 04", "Dec 05", "Dec 06", "Dec 07", "Dec 08", "Dec 09 ", "Dec 10", "Dec 11"],
    markers: {size: 0},
    yaxis: [{title: {text: "Series A"}}, {opposite: !0, title: {text: "Series B"}}],
    tooltip: {
        shared: !0, intersect: !1, y: {
            formatter: function (e) {
                return void 0 !== e ? e.toFixed(0) + " points" : e
            }
        }
    },
    legend: {offsetY: 7}
};
(chart = new ApexCharts(document.querySelector("#apex-mixed-1"), options)).render();
colors = ["#6658dd", "#4fc6e1", "#4a81d4", "#00b19d", "#f1556c"];
(dataColors = $("#apex-pie-1").data("colors")) && (colors = dataColors.split(","));
options = {
    chart: {height: 320, type: "pie"},
    series: [44, 55, 41, 17, 15],
    labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
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
(chart = new ApexCharts(document.querySelector("#apex-pie-1"), options)).render();
