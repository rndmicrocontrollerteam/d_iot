@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <div class="title flex items-center justify-between lg:pr-4">
            <h1 class="text-2xl opacity-80">Statistic</h1>
            <h2 class="text-xl opacity-80 flex items-center gap-1"><span class="material-symbols-outlined flex items-center">
                    article
                </span>Jumlah Artikel</h2>
        </div>

        <div>
            <canvas id="myChart"></canvas>
        </div>

        <div class="mt-6">
            <div class="title flex items-center justify-between lg:pr-4">
                <h1 class="text-2xl opacity-80">Statistic</h1>
                <h2 class="text-xl opacity-80 flex gap-1 items-center"><span class="material-symbols-outlined">
                        emoji_people
                    </span>Jumlah Pengunjung</h2>
            </div>
            <canvas id="visitor">

            </canvas>
        </div>
        {{-- <div class="linktodashboard bottom-0 fixed text-zinc-600 hover:underline">
            <a href="{{ url('/dashboard') }}">Kembali Ke Dashboard</a>
        </div> --}}

    </div>
    <div class="mb-96"></div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var _ydata = JSON.parse('{!! json_encode($months) !!}')
        var _xdata = JSON.parse('{!! json_encode($monthCount) !!}')
        console.log(_ydata)
        const labels = _ydata

        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Artikel',
                backgroundColor: 'rgb(79 70 229)',
                borderColor: 'rgb(79 70 229)',
                data: _xdata,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                aspectRatio: 3
            }
        };
    </script>
    <script>
        const label = Utils.months({
            count: 7
        });
        const datanya = {
            labels: label,
            datasets: [{
                label: 'My First Dataset',
                datas: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    <script>
        const configs = {
            type: 'bar',
            datanya: data,
            options: {
                aspectRatio: 3,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
    </script>
    <script>
        const myCharts = new Chart(
            document.getElementById('visitor'),
            configs
        );
    </script>
@endsection
