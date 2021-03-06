<tr>
    <td data-column-id="id"
        class="gridjs-td px-6 py-4 whitespace-no-wrap text-sm text-gray-500">{{ $linkedInUrl }}</td>
    <td data-column-id="name"
        class="gridjs-td px-6 py-4 whitespace-no-wrap text-sm text-gray-500">
        @if ($status == 'new')
            <a wire:click="search()" class="bg-green-400 hover:bg-green-200 text-grey font-bold py-2 px-4 rounded inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="15" height="15">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                search
            </a>
            <div wire:loading>
                Searching for data...
            </div>
        @endif
        @if ($status == 'failed')
            Not found
        @endif
        @if ($status == 'success')
            Success!
        @endif
    </td>
</tr>
