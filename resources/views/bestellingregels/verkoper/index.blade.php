<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex-col">
                    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">Bestelling</h2>
                    <table>
                        <tr>
                            <td>
                                <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bestelling: {{ $bestelling->id }}</h2>
                            </td>
                            <td>
                            </td>
                            <td>
                                <a href="{{ route('bestellingregel.create', ['bestelling' => $bestelling]) }}" class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                                    <span class="">Bestellingregel toevoegen</span>
                                </a>
                            </td>
                        </tr>
                            <td>
                                <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bedrijf: {{ $bestelling->klant->bedrijfsnaam }}</h2>
                            </td>
                            <td>
                                <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Tel: {{ $bestelling->klant->telefoonnummer }}</h2>
                            </td>
                            <td>
                            </td>
                        <tr>
                            <td>
                                <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate outline">Bedrijf: {{ $bestelling->klant->contactpersoon }}</h2>
                            </td>
                            <td>
                            </td>
                            <td>
                                <a href="{{ route('bestelling.edit', $bestelling) }}" class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                                    <span class="">Bestelling bewerken</span>
                                </a>
                            </td>
                        </tr>
                    </table>
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
                                acties
                            </h2>
                            </th>
                            @foreach ($bestelling->bestellingregels as $bestellingregel)
                                <tr>
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
                                    <td class="flex border border-slate-400">
                                        <a href="{{ route('bestellingregel.edit', ['bestellingregel' => $bestellingregel]) }}">
                                            <button class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                                                bewerken
                                            </button>
                                        </a>
                                        <form action="{{ route('bestellingregel.destroy', ['bestellingregel' => $bestellingregel]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input
                                                name="verwijderen"
                                                type="submit"
                                                class="bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                                                value="Verwijderen">
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
