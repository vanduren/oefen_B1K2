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
                        Regel bewerken
                    </h2>
                    <table class="table-auto">
                    <form action="{{ route('bestellingregel.update', $bestellingregel) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <tr>
                            <td>
                                <h3>Bestellingnummer</h3>
                                <input
                                    type="text"
                                    value={{ $bestellingregel->bestelling_id }}
                                    name="bestelling_id"
                                    readonly
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                >
                            </td>
                            <td>
                                <h3>Artikel</h3>
                                <select name="artikel_id" id="artikel_id">
                                    @foreach($bestellingregel->artikel->all() as $artikel)
                                        <option value="{{ $artikel->id }}" {{$bestellingregel->artikel_id == $artikel->id  ? 'selected' : ''}}>
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
                                    value={{ $bestellingregel->aantal }}
                                    name="aantal"
                                >
                            </td>
                            <td>
                                <h3>Eenheid</h3>
                                <select name="eenheid_id" id="eenheid_id">
                                    @foreach($bestellingregel->eenheid->all() as $eenheid)
                                        <option value="{{ $eenheid->id }}" {{$bestellingregel->eenheid_id == $eenheid->id  ? 'selected' : ''}}>
                                            {{ $eenheid->eenheid }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Aanpassen" class="w-full bg-gray-200 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
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
