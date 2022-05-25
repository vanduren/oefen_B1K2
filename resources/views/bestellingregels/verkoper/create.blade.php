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
                    @can('isVerkoper')
                    <h2>
                        Regel toevoegen
                    </h2>
                    <table class="table-auto">
                    <form action="{{ route('bestellingregel.store', $bestelling) }}" method="POST">
                        @csrf
                        <tr>
                            <td>
                                <h3>Bestellingnummer</h3>
                                <input
                                    type="text"
                                    value="{{ $bestelling->id }}"
                                    name="bestelling_id"
                                    readonly
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                >
                            </td>
                            <td>
                                <h3>Artikel</h3>
                                <select name="artikel_id" id="artikel_id">
                                    @foreach($artikelen as $artikel)
                                        <option value="{{ $artikel->id }}"}}>
                                            {{ $artikel->omschrijving }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Aantal</h3>
                                <input type="text"
                                    value=1
                                    name="aantal"
                                >
                            </td>
                            <td>
                                <h3>Eenheid</h3>
                                <select name="eenheid_id" id="eenheid_id">
                                    @foreach($eenheden as $eenheid)
                                        <option value="{{ $eenheid->id }}">
                                            {{ $eenheid->eenheid }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Toevoegen" class="w-full bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                            </td>
                        </tr>
                    </form>
                    </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
