(function ($) {
    "use strict";
    const data = {
        csrf: $('meta[name="csrf-token"]').attr("content"),
        checkPinUrl: $('meta[name="check-pin-url"]').attr("content"),
    };
    const plugins = {
        selectInit: function () {
            $('[data-toggle="select2"]').select2({
                width: '100%'
            })
        },
        chartInit: function () {
            const url = $('#charts').data('chart-url');
            const loading = $(".loading");
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
                    loading.addClass('d-none');
                    const url = window.location.href;
                    history.pushState({url: url}, '', url);
                },
                error: () => {
                    loading.html('<p class="text-center">डाटा छैन !!!</p>');
                },

            })

            function createChart(element, data) {
                const chartType = $(element).attr('chart-type');

                if (chartType === 'pie' || chartType === 'donut') {
                    if (Array.isArray(data)) {
                        const pieData = data.map(function (val) {
                            return {name: val.name, y: val.data};
                        });
                        setPieChart(element, chartType, pieData);
                    } else {
                        toastmessage('Invalid pie chart data format.', 'error');
                    }
                } else {
                    if (typeof data === 'object' && Array.isArray(data.dataSets) && Array.isArray(data.labels)) {
                        const chartDatasets = data.dataSets.map(function (dataset) {
                            return {name: dataset.label, data: dataset.data};
                        });
                        setBarChart(element, chartType, data.labels, chartDatasets);
                    } else {
                        toastmessage('Invalid pie chart data format.', 'error');
                    }
                }
            }

            function setBarChart(element, charType, labels, datasets) {
                const title = $(element).attr('chart-title');
                Highcharts.chart(element, {
                    chart: {type: charType},
                    title: {text: title, align: 'left', style: {fontFamily: 'Mukta'}},
                    xAxis: {categories: labels, crosshair: true},
                    yAxis: {min: 0, title: {text: null}},
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td><td style="padding:0"><b>{point.y}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {column: {pointPadding: 0.2, borderWidth: 0}},
                    series: datasets
                });
            }

            function setPieChart(element, chartType, data) {
                const title = $(element).attr('chart-title');
                const isDonut = chartType === 'donut' ? '60%' : '0%';
                Highcharts.chart(element, {
                    chart: {type: 'pie'},
                    title: {text: title, align: 'left', style: {fontFamily: 'Mukta'}},
                    tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
                    accessibility: {point: {valueSuffix: '%'}},
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            innerSize: isDonut,
                            dataLabels: {enabled: true},
                            // showInLegend: true
                        }
                    },
                    series: [{name: 'डाटा', colorByPoint: true, data: data}]
                });
            }
        },
    };
    const extra = {
        addMore: function () {
            $('[data-toggle="add-more"]').each(function () {
                const $this = $(this);
                const content = $this.data("content");
                const target = $this.data("target");

                $this.on("click", function (e) {
                    e.preventDefault();
                    $(target).append(content);
                });
            });
        },
        scrollToBottom: function () {
            $(".scroll-to-btm").each(function (i, el) {
                el.scrollTop = el.scrollHeight;
            });
        },
        removeParent: function () {
            $(document).on("click", '[data-toggle="remove-parent"]', function () {
                const $this = $(this);
                const parent = $this.data("parent");
                $this.closest(parent).remove();
            });
        },
        checkPin: function () {
            $(document.body).delegate('#pinData', 'submit', function (e) {
                e.preventDefault();
                const pin = $("input[name=pin]").val();
                const submitButton = $("#submitBtn");
                const url = $(this).attr('data');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        pin: pin,
                    },
                    beforeSend: function () {
                        submitButton.attr('disabled', true);
                        submitButton.html("<i class='fa fa-spinner fa-spin'></i> loading");
                    },
                    success: function (response) {
                        swal.fire({
                            title: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            width: 400,
                            icon: 'success',
                        });
                        $('#staticBackdrop').modal('hide');

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        submitButton.attr('disabled', false);
                        submitButton.html("पेश गर्नुहोस्");
                        $("#error_message").html(XMLHttpRequest.responseJSON.message);
                    },
                });
            });
        },
        cacheClear: function () {
            $('.cacheButton').on('click', function (e) {
                const cacheButton = $("#cacheBtn");
                e.preventDefault()
                $.ajax({
                    method: "GET",
                    url: $(this).attr("data"),
                    beforeSend: function () {
                        cacheButton.attr('disabled', true);
                        cacheButton.html("<i class='fa fa-spinner fa-spin'></i>");
                    },
                    success: function (response) {
                        swal.fire({
                            title: response.message,
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                            width: 400,
                            icon: 'success',
                        });
                        cacheButton.attr('disabled', false);
                        cacheButton.html("<i class='fas fa-brush'></i>");
                    }, error: function () {
                        cacheButton.attr('disabled', false);
                        cacheButton.html("<i class='fas fa-brush'></i>");
                    }
                });
            })
        },
        deleteConfirm: function () {
            $('.show_confirm').click(function (event) {
                const form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: "के तपाइँ मेटाउन निश्चित हुनुहुन्छ ?",
                    text: "यदि तपाईंले यसलाई मेटाउनुभयो भने, यो सदाको लागि हट्नेछ।",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    confirmButtonText: "Delete",

                })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            form.submit();
                        }
                    });
            });
        },
        confirmPin: function () {
            $('.confirm_pin').click(function (event) {
                event.preventDefault();
                swal.fire({
                    title: 'प्रविष्ट कोड',
                    input: 'password',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    cancelButtonText: 'रद्द गर्नुहोस्',
                    confirmButtonText: 'पेश गर्नुहोस्',
                    showLoaderOnConfirm: true,
                    preConfirm: (pin) => {
                        return new Promise((resolve, reject) => {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': data.csrf
                                }
                            });
                            $.ajax({
                                url: data.checkPinUrl,
                                type: 'POST',
                                data: {pin: pin},
                                success: function (response) {
                                    console.log(response, response.valid);
                                    if (response == true) {
                                        resolve();
                                    } else {
                                        extra.invalidPin()
                                    }
                                },
                                error: function () {
                                    extra.invalidPin()
                                }
                            });
                        });
                    },
                    allowOutsideClick: () => !swal.isLoading(),
                    backdrop: true
                }).then((result) => {
                    if (result.value) {
                        // get value in data bs type
                        var type = $(this).data('bs-type');
                        if (type == 'delete') {
                            $(this).closest('form').submit();
                        } else if (type == 'edit') {
                            // get href value
                            var href = $(this).attr('href');
                            window.location.href = href;
                        }
                    }
                });
            });
        },
        invalidPin: function () {
            let timerInterval
            Swal.fire({
                title: 'पुन: प्रयास गर्नुहोस्',
                html: 'कृपया मान्य कोड प्रविष्ट गर्नुहोस्',
                timer: 2000,
                timerProgressBar: true,

                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        },
        searchFocusOut: function () {
            $('.filter-form').focusout(function () {
                $(this).closest('form').submit();
            });
        }
    };
    $(document).ready(function() {
        // plugins
        plugins.selectInit();
        plugins.chartInit();
        // extra
        extra.checkPin();
        extra.addMore();
        extra.removeParent();
        extra.confirmPin();
        extra.deleteConfirm();
        extra.cacheClear();
        extra.searchFocusOut();
    });
})(jQuery);

function toastmessage(message, type) {
    swal.fire({
        title: message,
        toast: true,
        position: 'top-right',
        timer: 3000,
        showConfirmButton: false,
        timerProgressBar: true,
        width: 400,
        icon: type,
    });
}

function copyText(el) {
    try {
        navigator.clipboard.writeText(el);
        toastmessage('Copied to clipboard', 'success')
    } catch (err) {
        toastmessage('Unable to copy', 'error')
    }
}
