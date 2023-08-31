<div class="modal-overlay fixed inset-0 bg-black opacity-50" x-show="showModal" @click="showModal = false"></div>
<div id="stopwathModal" tabindex="-1" aria-hidden="true" x-show="showModal"
    class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center"
    x-data="{
        start: 0,
        current: 0,
        stop: null,
        interval: null
    }">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" @click.away="showModal = false">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    ストップウォッチ
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="defaultModal" @click="showModal=false">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <span x-text="getMinute(current, start)"></span>分<span x-text="getSecond(current, start)" /></span>秒
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    x-show="!start"
                    @click="
                        start = Date.now()
                        current = start
                        interval = setInterval(() => {current = Date.now()}, 1000)">
                    Start</button>
                <button type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                    x-show="start"
                    @click="
                        clearInterval(interval);setMinuteInput(current, start);showModal=false">
                    Finish
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    const getMinute = (current, start) => Math.trunc(((current - start) / 1000) / 60);
    const getSecond = (current, start) => Math.trunc(((current - start) / 1000) % 60);

    const setMinuteInput = (current, start) => {
        document.querySelector('#{{ $timeInputId }}').value = Math.trunc(((current - start) / 1000) / 60);
    }
</script>
