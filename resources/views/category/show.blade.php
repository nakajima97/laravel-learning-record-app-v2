<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            カテゴリー詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6">
                        <div>
                            <button type="button" onclick="history.back()"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">前のページへ戻る</button>
                        </div>
                        <div class="p-4 w-full">
                            <p>カテゴリー名：{{ $category->name }}</p>
                        </div>
                        <div>
                            @if (!$category->is_archive)
                                <form action="{{ route('categories.archive', ['id' => $category->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">アーカイブする</button>
                                </form>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
