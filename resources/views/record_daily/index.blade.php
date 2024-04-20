<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            直近7日間の学習時間
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <canvas id="myChart"></canvas>
                        <script>
                            var ctx = document.getElementById("myChart");
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [{!! $daily_records->map(function ($daily_record) {
                                        return '"' . $daily_record->month . '月' . $daily_record->day . '日' . '"';
                                    })->implode(",") !!}],
                                    datasets: [{
                                        label: '分',
                                        data: [{{ $daily_records->implode('total_time', ',') }}],
                                        borderWidth: 1
                                    }]
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
