<h4 class="header-title">6rf45t</h4>
<div class="mt-4 chartjs-chart">
    <canvas id="myPieChart" height="350"></canvas>
</div>

@once
    @push('scripts')

        <script>
            const pie = document.getElementById('myPieChart');
            const myPieChart = new Chart(pie, {
                type: 'pie',
                data: {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                        datasets: [{
                            label: 'My First Dataset',
                            data: [300, 50, 100],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }],


                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


    @endpush
@endonce
