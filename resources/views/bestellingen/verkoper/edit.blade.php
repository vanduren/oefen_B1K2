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
                    <div class="flex-row">
                        <div class="flex-col">
                            <h3>Bestellingnummer</h3>
                            <p>{{ $bestelling->id }}</p>
                        </div>
                        <div class="flex-col">
                            <h3>Artkelnummer</h3>
                            {{-- <p>{{ $bestelling->bestellingregels->artikelnummer }}</p> --}}
                        </div>
                    </div>
                        {{-- {!! redirect()->route('bestelling.index') !!} --}}
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
