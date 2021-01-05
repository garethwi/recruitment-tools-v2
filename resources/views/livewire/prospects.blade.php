<div class="flex flex-col mt-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model="search"
                               id="search"
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                               placeholder="Search" type="search">
                    </div>
                </div>
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <a href="{{ route('prospect-lists.create') }}"
                           class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            New List
                        </a>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('name')"
                                        class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </button>
                                <x-sort-icon
                                    field="name"
                                    :sortField="$sortField"
                                    :sortAsc="$sortAsc"
                                />
                            </div>
                        </th>
                        <th class="gridjs-th px-6 py-3 bg-white text-left text-sm font-medium text-gray-500">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prospects as $prospect)
                        <tr>
                            <td data-column-id="id"
                                class="gridjs-td px-6 py-4 whitespace-no-wrap text-sm text-gray-500">{{ $prospect->name }}</td>
                            <td data-column-id="name"
                                class="gridjs-td px-6 py-4 whitespace-no-wrap text-sm text-gray-500">
                                <a href="{{ route('prospect-lists.edit', ['prospectList' => $prospect->id]) }}" class="bg-green-400 hover:bg-green-200 text-grey font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    &nbsp;edit
                                </a>
                                <a wire:click="delete('{{ $prospect->id }}')" class="bg-red-400 hover:bg-red-200 text-grey font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    &nbsp;delete
                                </a>
                                <a href="{{ route('prospect-lists.show', ['prospectList' => $prospect->id]) }}" class="bg-white hover:bg-grey-200 text-grey font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                    </svg>
                                    &nbsp;show
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                {{ $prospects->links() }}
            </div>
        </div>
    </div>
    <div class="h-96"></div>
</div>
