<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            1週間の学習時間
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    1週間の学習時間を表示します
                    @foreach ($daily_records as $daily_record)
                    {{ $daily_record->month }}月{{ $daily_record->day }}日: {{ floor($daily_record->total_time / 60) }}時間{{ $daily_record->total_time % 60 }}分<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>