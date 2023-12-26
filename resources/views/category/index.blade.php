<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            カテゴリー一覧
        </h2>
    </x-slot>

    <div class="py-12" x-data='{open: 1}'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6">
                        <div class="p-4 w-full">
                            <a href="{{ route('categories.create') }}"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">カテゴリー追加</a>
                        </div>
                    </section>
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6">
                        <ul
                            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                            <li class="me-2">
                                <a href="#" aria-current="page" @click="open = 1"
                                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                    x-bind:class="{ 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500': open === 1 }">一覧</a>
                            </li>
                            <li class="me-2">
                                <a href="#" @click="open = 2"
                                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                    x-bind:class="{ 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500': open === 2 }">アーカイブ済み</a>
                            </li>
                        </ul>
                    </section>
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6"
                        x-show='open === 1'>
                        @foreach ($categories as $category)
                            <div class="mb-2">
                                <x-category.category-item :name="$category->name" :id="$category->id" />
                            </div>
                        @endforeach
                    </section>
                    <section class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden p-6"
                        x-show='open === 2'>
                        アーカイブ済み一覧
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
