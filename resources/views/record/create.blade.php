<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            学習記録追加
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-400 bg-gray-900 body-font relative">
                        <form action="{{ route('records.store') }}" method="POST">
                            @csrf
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="category_id"
                                                    class="leading-7 text-sm text-gray-400">カテゴリー</label>
                                                <select id="category_id" name="category_id"
                                                    class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    @foreach ($records as $record)
                                                        <option value="{{ $record->id }}">{{ $record->name }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="minute" class="leading-7 text-sm text-gray-400">時間</label>
                                                <div class="w-full flex items-center gap-2">
                                                    <input type="number" id="minute" name="minute"
                                                        class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <p>分</p>
                                                </div>
                                                <x-input-error :messages="$errors->get('minute')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="note" class="leading-7 text-sm text-gray-400">メモ</label>
                                                <textarea id="note" name="note"
                                                    class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                                <x-input-error :messages="$errors->get('note')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <button
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">記録追加</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
