<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('uliniopoly.boards.new_board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs">
                    <form class="board-form bg-white rounded px-8 pt-6 pb-8 mb-4 " method="POST" action="{{route('boards.store')}}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                {{__('uliniopoly.boards.name')}}
                            </label>
                            <input
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name"
                                name="name"
                                type="text"
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-gray-600 text-sm font-semibold mb-2"
                                for="description"
                            >
                                {{__('uliniopoly.boards.description')}}
                            </label>
                            <textarea
                                rows="4"
                                cols="50"
                                class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                name="description"
                            ></textarea>
                        </div>

                        @for($i = 1 ; $i < 41 ; $i++)
                            <div class="mb-4">
                                <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                    {{__('uliniopoly.fields.field')}} #{{ $i }}
                                </label>
                                <select
                                    class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="slot_{{$i}}"
                                    name="slot_{{$i}}"
                                >
                                    <option value="-1" selected disabled hidden>
                                        {{__('uliniopoly.fields.pick')}}
                                    </option>
                                    @foreach($fields as $field)
                                        <option value="{{$field->id}}">{{__($field->name)}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endfor
                        <div class="flex items-center justify-between">
                            <button class="add-board bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
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



        @endsection

        @section('js-files')

        @endsection
    </div>
</x-app-layout>
