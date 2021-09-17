<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ __('uliniopoly.games.games') }}
        </h2>
        <button class="add-game">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                </path></svg>
        </button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                            <tr class="bg-gray-50 border-b">

                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        ID
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.games.name')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.games.board_name')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.games.players')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500 w-1/6">
                                    <div class="flex items-center justify-center">
                                        {{__('labels.actions')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                                <td class="p-2 border-r">{{$game->id}}</td>
                                <td class="p-2 border-r">{{$game->name}}</td>
                                <td class="p-2 border-r">{{$game->board->name}}</td>
                                <td class="p-2 border-r">
                                    @if($game->players())
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>{{__('uliniopoly.players.name')}}</th>
                                                <th>{{__('uliniopoly.players.cash')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($game->players() as $player)
                                            <tr>
                                                <td>{{$player->user->name}}</td><td>{{$player->cash}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        {{__('pricing.none')}}
                                    @endif
                                </td>
                                <td class="justify-center">
                                    <a href="{{route('games.show',$game->id)}}" data-id="{{$game->id}}" class="bg-green-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('buttons.show')}}</a>
                                    <a href="{{route('games.edit',$game->id)}}" data-id="{{$game->id}}" class="bg-yellow-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('buttons.edit')}}</a>
                                    <button data-id="{{$game->id}}" data-class="games" data-prompt="{{__('swalerts.games.delete.contents')}}" class="delete bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('buttons.remove')}}</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @section('javascript')
            const deleteUrl = "{{ url('') }}/" ;
            const confirmDelete = "{{ __('swalerts.fields.delete.confirm') }}" ;
            const contents = "{{ __('swalerts.fields.delete.contents') }}";
            const yesResponse = "{{ __('swalerts.yes') }}";
            const noResponse = "{{ __('swalerts.no') }}";
            $(function(){
                $('.add-game').click(function(){
                    window.location.href = "{{route('games.create')}}";
                })
            })
        @endsection
        @section('js-files')
            <script src="{{ asset('js/delete.js') }}" ></script>
        @endsection
    </div>
</x-app-layout>
