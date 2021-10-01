<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('uliniopoly.games.game') }} {{ __($game->name) }}
        </h2>
        <div id="game_id" data-id="{{ $game->id }}"></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-wrap">
                    <div id="stats" class="inline bg-gray-200 flex w-80">
                        <div class="p-3">
                            <table id="players_stats">
                                <thead>
                                    <tr>
                                        <th>{{__('uliniopoly.players.player')}}</th>
                                        <th>{{__('uliniopoly.games.balance')}}</th>
                                        <th>{{__('uliniopoly.fields.field')}}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($game->players as $key => $player)
                                    <tr id="player_{{($key+1)}}_stats_row">
                                        <td>#{{$key+1}} {{$player->user->name}}</td>
                                        <td id="player_{{($key+1)}}_balance">${{$player->balance}}</td>
                                        <td id="player_{{$key+1}}_field">{{$player->field_no}}</td>
                                        <td id="player_{{$key+1}}_active"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <button class="move bg-green-500 p-2 m-2 text-white hover:shadow-lg disabled:opacity-30 text-xl font-thin" type="button">
                                {{__('buttons.move')}}
                            </button>

                            <button class="end-turn bg-green-500 p-2 m-2 text-white hover:shadow-lg disabled:opacity-30 text-xl font-thin" type="button">
                                {{__('buttons.end_turn')}}
                            </button>
                            <div id="drawn_dices" class="flex flex-wrap inline" style="width:72px;">
                                <div id="drawn_dice_1" class="flex inline"></div>
                                <div id="drawn_dice_2" class="flex inline"></div>
                            </div>
                            <div id="drawn_total"></div>

                        </div>
                    </div>
                    <div class="flex flex-wrap m-auto overflow-hidden inline" style="width:600px;height:600px;">

                        {{-- TOP ROW!!!--}}

                        <x-corner :id="21"><x-field_parking></x-field_parking></x-corner>
                            <x-field-top :id="22"></x-field-top>
                            <x-field-top :id="23"></x-field-top>
                            <x-field-top :id="24"></x-field-top>
                            <x-field-top :id="25"></x-field-top>
                            <x-field-top :id="26"></x-field-top>
                            <x-field-top :id="27"></x-field-top>
                            <x-field-top :id="28"></x-field-top>
                            <x-field-top :id="29"></x-field-top>
                            <x-field-top :id="30"></x-field-top>
                        <x-corner :id="31"><x-field_go_to_jail></x-field_go_to_jail></x-corner>

                        {{-- MIDDLE ROW!!!--}}

                        {{-- MIDDLE ROW - LEFT COLUMN--}}
                        <div class="h-3/4 overflow-hidden" style="width:12.5%;">
                            <x-field-left :id="20"></x-field-left>
                            <x-field-left :id="19"></x-field-left>
                            <x-field-left :id="18"></x-field-left>
                            <x-field-left :id="17"></x-field-left>
                            <x-field-left :id="16"></x-field-left>
                            <x-field-left :id="15"></x-field-left>
                            <x-field-left :id="14"></x-field-left>
                            <x-field-left :id="13"></x-field-left>
                            <x-field-left :id="12"></x-field-left>
                        </div>

                        {{-- MIDDLE ROW - CENTRAL COLUMN--}}

                        <div class="w-3/4 h-3/4 overflow-hidden flex flex-wrap">
                            <div id="infobox_1" style="width:48%;height:50%;background-color: #7B7D62; display:inline-block; padding:2px;">
                                <h1 style="text-align: center; font-weight: bold;">{{__('uliniopoly.games.table.game_status')}}</h1>
                                <table style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Info:
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--************************** ROW SEPARATOR-->
                                        <tr>
                                            <td>
                                                Aktualny gracz:
                                            </td>
                                            <td id="current_player">

                                            </td>
                                        </tr>
                                        <!--************************** ROW SEPARATOR-->
                                        <tr>
                                            <td>
                                                Rzut:
                                            </td>
                                            <td id="result">

                                            </td>
                                        </tr>
                                        <!--************************** ROW SEPARATOR-->
                                        <tr>
                                            <td>
                                                Akcja:
                                            </td>
                                            <td id="actions">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="infobox_2" style="width:48%;height:50%;background-color: teal; font-size: 16px; display:inline-block; padding:2px;">
                                <table>
                                    <thead>
                                        <tr class="border">
                                            <th>{{__('uliniopoly.games.table.item')}}</th>
                                            <th>{{__('uliniopoly.games.table.value')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border">
                                            <td>{{__('uliniopoly.games.table.game_description')}}:</td>
                                            <td style="font-size: 12px;">{{__($game->board->description)}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td>{{__('uliniopoly.games.table.players_counter')}}:</td>
                                            <td id="players_count">{{$game->players->count()}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td>{{__('uliniopoly.games.table.current_player')}}:</td>
                                            <td id="current_player">{{$game->current_player}}</td>
                                        </tr>
                                        <tr class="border"></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- MIDDLE ROW - RIGHT COLUMN--}}

                        <div class="h-3/4 overflow-hidden" style="width:12.5%;">
                            <x-field-right :id="32"></x-field-right>
                            <x-field-right :id="33"></x-field-right>
                            <x-field-right :id="34"></x-field-right>
                            <x-field-right :id="35"></x-field-right>
                            <x-field-right :id="36"></x-field-right>
                            <x-field-right :id="37"></x-field-right>
                            <x-field-right :id="38"></x-field-right>
                            <x-field-right :id="39"></x-field-right>
                            <x-field-right :id="40"></x-field-right>
                        </div>

                        {{-- BOTTOM ROW!!!--}}

                        <x-corner :id="11"><x-field_jail></x-field_jail></x-corner>
                        <x-field-bottom :id="10"></x-field-bottom>
                        <x-field-bottom :id="9"></x-field-bottom>
                        <x-field-bottom :id="8"></x-field-bottom>
                        <x-field-bottom :id="7"></x-field-bottom>
                        <x-field-bottom :id="6"></x-field-bottom>
                        <x-field-bottom :id="5"></x-field-bottom>
                        <x-field-bottom :id="4"></x-field-bottom>
                        <x-field-bottom :id="3"></x-field-bottom>
                        <x-field-bottom :id="2"></x-field-bottom>
                        <x-corner :id="1"><x-field_start></x-field_start></x-corner>

                        {{--END OF BOTTOM ROW--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('javascript')
        const baseUrl = "{{ url('') }}/" ;
    @endsection
    @section('js-files')

        <script src="{{ asset('js/game.js') }}" ></script>
    @endsection
</x-app-layout>
