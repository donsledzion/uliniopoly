<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('uliniopoly.games.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs">
                    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 " method="POST" action="{{route('games.store')}}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                {{__('uliniopoly.games.name')}}
                            </label>
                            <input
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name"
                                name="name"
                                type="text"
                                value="{{__('uliniopoly.games.default_name')}}"
                            />
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="start_balance">
                                {{__('uliniopoly.games.start_balance')}}
                            </label>
                            <input
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="start_balance"
                                name="start_balance"
                                type="number" step="100"
                                value="1500" min="100" max="65000"
                            />
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="board_id">
                                {{__('uliniopoly.boards.board')}}
                            </label>

                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="board_id"
                                name="board_id"
                            >

                                @foreach($boards as $board)
                                    <option value="{{$board->id}}">{{__($board->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="player_1">
                                {{__('uliniopoly.players.player')}} 1
                            </label>

                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="player_1"
                                name="players[]"
                            >
                                <option value="null" selected disabled hidden>
                                    {{__('uliniopoly.players.pick')}}
                                </option>
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="player_2">
                                {{__('uliniopoly.players.player')}} 2
                            </label>

                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="player_2"
                                name="players[]"
                            >
                                <option value="null" selected disabled hidden>
                                    {{__('uliniopoly.players.pick')}}
                                </option>
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="player_3">
                                {{__('uliniopoly.players.player')}} 3
                            </label>

                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="player_3"
                                name="players[]"
                            >
                                <option value="null" selected disabled hidden>
                                    {{__('uliniopoly.players.pick')}}
                                </option>
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="player_4">
                                {{__('uliniopoly.players.player')}} 4
                            </label>

                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="player_4"
                                name="players[]"
                            >
                                <option value="null" selected disabled hidden>
                                    {{__('uliniopoly.players.pick')}}
                                </option>
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="py-2"></div>

                        <div class="flex items-center justify-between">
                            <button class="add-game bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                {{__('buttons.add')}}
                            </button>

                        </div>
                    </form>
                    <p class="text-center text-gray-500 text-xs">
                        &copy;2020 BT-7274. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
        @section('javascript')
            const baseUrl = "{{ url('') }}/" ;
            {{--const confirmDelete = "{{ __('kidbook.messages.delete_confirm') }}"--}}
            $(function(){

                $('.add-game1').click(function(){
                    $.ajax({
                        url: baseUrl + "games",
                        method: "post",
                        data: $('form').serialize()
                    })
                    .done(function(data){
                        Swal.fire(
                        data.status,
                        data.message,
                        data.status
                        ).then((result)=>{
                            if(result.isConfirmed){
                                window.location.href = "{{route('games.index')}}";
                                }
                            }
                        )}
                    )
                    .fail(function(data){
                        Swal.fire({
                        icon: 'error',
                        title: 'Błąd',
                        text: data.responseJSON.message + ''
                        });
                    });
                })
            });

        @endsection

        @section('js-files')
            {{--<script src="{{ asset('js/submit.js') }}" ></script>--}}
        @endsection
    </div>
</x-app-layout>
