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
                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">Bestelling</h2>

                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bestelling: {{ $bestelling->id }}</h2>
                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bedrijf: {{ $bestelling->klant->bedrijfsnaam }}</h2>
                    <form action="{{ route('bestelling.update', $bestelling) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input
                            name="afgerond"
                            type="submit"
                            class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                            @if($bestelling->afgerond) disabled @endif
                            value="Bestelling afgerond">
                    </form>
                    <div class="flex flex-row items-center justify-between">
                        <table class="table-auto  border border-slate-400">
                            <th>
                                <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                artikel
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                aantal
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                eenheid
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                locatie
                            </h2>
                            </th>
                            <th>
                            <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-base sm:leading-9 sm:truncate">
                                actie
                            </h2>
                            </th>
                            @foreach ($bestelling->bestellingregels as $bestellingregel)
                                <tr>
                                <form action="{{ route('bestellingregel.update', ['bestellingregel' => $bestellingregel]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <td class="border border-slate-400">
                                        {{ $bestellingregel->artikel_id }}
                                    </td>
                                    <td class="border border-slate-400">
                                        {{ $bestellingregel->aantal }}
                                    </td>
                                    <td class="border border-slate-400">
                                        {{ $bestellingregel->eenheid->eenheid }}
                                    </td>
                                    <td class="border border-slate-400">
                                        {{-- als er geen locatie is dan dat wat achter ?? staat --}}
                                        {{ $bestellingregel->artikel->voorraadregels->last()->locatie ?? 'geen locatie' }}
                                    </td>
                                    <td class="border border-slate-400">
                                        @if($bestellingregel->picked_bestelregel)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @else
                                            <input
                                                name="picken"
                                                type="submit"
                                                class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                                                value="Picken">
                                            <input type="hidden" name="picked_bestelregel" value="1">
                                        @endif
                                    </td>
                                </form>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
