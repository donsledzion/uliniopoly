<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('uliniopoly.boards.board') }} {{ $board->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap m-auto overflow-hidden" style="width:600px;height:600px;">

                        {{-- TOP ROW!!!--}}

                        <x-corner :id="20"/>

                        <div id="field_21" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_22" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_23" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_24" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_25" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_26" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_27" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_28" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_29" class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <x-corner :id="30"/>

                        {{-- MIDDLE ROW!!!--}}

                        {{-- MIDDLE ROW - LEFT COLUMN--}}
                        <div class="h-3/4 overflow-hidden h-3/4" style="width:12.5%;">

                            <div id="field_19"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_18"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_17"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_16"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_15"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_14"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_13"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_12"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_11"  class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                        </div>

                        {{-- MIDDLE ROW - CENTRAL COLUMN--}}

                        <div class="w-3/4 h-3/4 overflow-hidden" {{--style="width:12.5%;"--}}>
                            <div id="infobox_1" class="overflow-hidden border border-collapse w-1/2 h-1/2"></div>
                            <div id="infobox_2" class="overflow-hidden border border-collapse w-1/2 h-1/2">{{$board->description}}</div>



                        </div>

                        {{-- MIDDLE ROW - RIGHT COLUMN--}}

                        <div class="h-3/4 overflow-hidden" style="width:12.5%;">

                            <div id="field_31" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_32" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_33" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_34" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_35" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_36" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_37" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_38" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>

                            <div id="field_39" class="field overflow-hidden border border-collapse" style="height:11.11%;">

                            </div>
                        </div>

                        {{-- BOTTOM ROW!!!--}}

                        <x-corner :id="10"/>

                        <div id="field_9"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_8"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_7"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_6"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_5"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_4"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_3"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_2"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <div id="field_1"  class="field w-1/12 overflow-hidden border border-collapse">

                        </div>

                        <x-corner :id="0"/>

                        {{--END OF BOTTOM ROW--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('javascript')
        $(function(){
            $('.field').mouseover(function(){
                $('#infobox_1').text("id = "+$(this).attr("id"));
            }).mouseout(function(){
                $('#infobox_1').text("");
            });
        })
    @endsection
</x-app-layout>
