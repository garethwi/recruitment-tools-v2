<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-12 py-12">
                <div class="py-1">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-left">
                                <div class="flex items-center">
                                    LinkedIn Url
                                </div>
                            </th>
                            <th class="gridjs-th px-6 py-3 bg-white text-left text-sm font-medium text-gray-500">
                                <a wire:click="$emitTo('people-data-labs-summary', 'searchAll')" class="bg-green-400 hover:bg-green-200 text-grey font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    all
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($linkedInUrls as $linkedInUrl)
                            <livewire:people-data-labs-summary key="$linkedInUrl" :url="$linkedInUrl" />
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <button wire:click="export" class="bg-green-400 hover:bg-green-200 text-grey font-bold my-5 py-2 px-4 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download CSV
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
