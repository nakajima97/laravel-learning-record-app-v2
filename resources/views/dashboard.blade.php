<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
                        <div class="container px-5 py-6 mx-auto">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">
                                今月の総学習時間：
                                @if ($total_study_time_this_month >= 60)
                                    {{ floor($total_study_time_this_month / 60) }}時間
                                @endif
                                {{ $total_study_time_this_month % 60 }}分
                            </h1>
                        </div>
                    </section>
                    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
                        <div class="container px-5 py-6 mx-auto">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">
                                今日の総学習時間：
                                @if ($total_study_time_today >= 60)
                                    {{ floor($total_study_time_today / 60) }}時間
                                @endif
                                {{ $total_study_time_today % 60 }}分
                            </h1>
                        </div>
                    </section>
                    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
                        <div class="container px-5 py-6 mx-auto">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">今日の学習記録</h1>
                            @foreach ($today_records as $today_record)
                                <div class="-my-8 divide-y-2 divide-gray-800">
                                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                                        <div class="md:flex-grow">
                                            <h2 class="text-2xl font-medium text-white title-font mb-2">
                                                {{ $today_record->category->name }}</h2>
                                            <p class="leading-relaxed">{{ $today_record->created_at }}</p>
                                            <p class="leading-relaxed">時間：{{ $today_record->minute }}分</p>
                                            <p class="leading-relaxed">{{ $today_record->note }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
