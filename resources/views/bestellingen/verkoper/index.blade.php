<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">Bestellingen</h2>

                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bestellingen</h2>

                    {{-- zoek --}}
                    <form action="{{ route('bestelling.zoek') }}" method="GET">
                        <input type="text" name="search" required/>
                        <button
                            type="submit"
                            class="bg-gray-100 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded">
                                Search
                        </button>
                    </form>

                    <div class="flex flex-row items-center justify-between">
                        <table class="table-auto  border border-slate-400">
                            <th>
                                <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                nummer
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                bedrijfsnaam
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                contactpersoon
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                actie
                            </h2>
                            </th>
                            @foreach ($bestellingen as $bestelling)
                                <tr>
                                    <td class="border border-slate-400">
                                        {{ $bestelling->id }}
                                    </td>
                                    <td class="border border-slate-400">
                                        {{ $bestelling->klant->bedrijfsnaam }}
                                    </td>
                                    <td class="border border-slate-400">
                                        {{ $bestelling->klant->contactpersoon }}
                                    </td>
                                    <td class="border border-slate-400">
                                        <form action="{{ route('bestellingregel.index', $bestelling) }}" method="get">
                                            <input type="hidden" name="bestelling" value="{{ $bestelling->id }}">
                                            <input
                                                type="submit"
                                                class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                                                value="Bekijken">
                                        </form>
                                </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
