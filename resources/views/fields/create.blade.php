<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('uliniopoly.fields.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs">
                    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 " method="POST" action="{{route('fields.store')}}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                {{__('uliniopoly.fields.name')}}
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
                                {{__('uliniopoly.fields.description')}}
                            </label>
                            <textarea
                                rows="4"
                                cols="50"
                                class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                name="description"
                            ></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                {{__('uliniopoly.fields.type')}}
                            </label>
                            <select
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="field_type_id"
                                name="field_type_id"
                            >
                                @foreach($fieldTypes as $fieldType)
                                    <option value="{{$fieldType->id}}">{{__($fieldType->name)}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-4">

                            <table class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <thead >
                                    <tr>
                                        <th class="px-2">
                                            {{__('pricing.service')}}
                                        </th>
                                        <th>
                                            {{__('pricing.price')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="buy">{{__('pricing.buy')}}</label>
                                        </td>
                                        <td>
                                            <input id="buy" name="buy" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="mortgage">{{__('pricing.mortgage')}}</label>
                                        </td>
                                        <td>
                                            <input id="mortgage" name="mortgage" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_single">{{__('pricing.stop_single')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_single" name="stop_single" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_1_cottage">{{__('pricing.stop_1_cottage')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_1_cottage" name="stop_1_cottage" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_2_cottage">{{__('pricing.stop_2_cottage')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_2_cottage" name="stop_2_cottage" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_3_cottage">{{__('pricing.stop_3_cottage')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_3_cottage" name="stop_3_cottage" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_4_cottage">{{__('pricing.stop_4_cottage')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_4_cottage" name="stop_4_cottage" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_hotel">{{__('pricing.stop_hotel')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_hotel" name="stop_hotel" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_1_of_kind">{{__('pricing.stop_1_of_kind')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_1_of_kind" name="stop_1_of_kind" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_2_of_kind">{{__('pricing.stop_2_of_kind')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_2_of_kind" name="stop_2_of_kind" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_3_of_kind">{{__('pricing.stop_3_of_kind')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_3_of_kind" name="stop_3_of_kind" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="block text-gray-600 text-sm font-semibold mb-2 px-2" for="stop_4_of_kind">{{__('pricing.stop_4_of_kind')}}</label>
                                        </td>
                                        <td>
                                            <input id="stop_4_of_kind" name="stop_4_of_kind" type="number" class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="py-2"></div>


                        <div class="flex items-center justify-between">
                            <button class="add-field bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
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

                $('.add-field').click(function(){
                    $.ajax({
                        url: baseUrl + "fields",
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
                                window.location.href = "{{route('fields.create')}}";
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
