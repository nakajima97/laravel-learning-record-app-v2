<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            月ごとの総学習時間
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table-auto">
                  <thead>
                    <tr>
                      <th class="px-4 py-2">年月</th>
                      <th class="px-4 py-2">学習時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($monthly_records as $record)
                      <tr>
                        <td class="border px-4 py-2">{{ $record->year }}年{{ $record->month }}月</td>
                        <td class="border px-4 py-2">{{ floor($record->total_time / 60) }}時間{{ $record->total_time % 60 }}分</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $monthly_records->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>