<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-12 py-12">
                <div class="py-1">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-5 text-left">
                                <div class="flex items-center">
                                    LinkedIn Url
                                </div>
                            </th>
                            <th class="gridjs-th px-6 py-5 bg-white text-left text-sm font-medium text-gray-500">
                                <a wire:click="$emitTo('people-data-labs-summary', 'searchAll')"
                                   class="hover:bg-green-200 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <td class="py-5" colspan="2">
                                    <button wire:click="export" class="hover:bg-green-200 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
