<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            カテゴリー編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6">
                        <div class="flex justify-between">
                            <div>
                                <button type="button" onclick="history.back()"
                                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">前のページへ戻る</button>
                            </div>
                            <div>
                                @if (!$category->is_archive)
                                    <form action="{{ route('categories.archive.store', ['id' => $category->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">アーカイブする</button>
                                    </form>
                                    @else
                                    <form action="{{ route('categories.archive.destroy', ['id' => $category->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">アーカイブ解除する</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="p-4 w-full">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="flex flex-col gap-2">
                                @csrf
                                @method('PUT')
                                <p>
                                    <label for="name">カテゴリー名</label>
                                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full dark:bg-gray-800 bg-opacity-40 rounded border dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:bg-gray-900 dark:focus:ring-2 focus:ring-indigo-900 text-base outline-none dark:text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </p>
                                <div class="flex justify-end">
                                    <input type="submit" value="更新" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" />
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
