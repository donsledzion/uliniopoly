<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs">
                    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 " method="POST" action="{{route('fieldtypes.update')}}">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">
                                {{__('uliniopoly.field_types.name')}}
                            </label>
                            <input
                                class="bg-gray-100 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name"
                                name="name"
                                type="text"
                                value="{{$fieldType->name}}"
                            />
                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-gray-600 text-sm font-semibold mb-2"
                                for="description"
                            >
                                {{__('uliniopoly.field_types.description')}}
                            </label>
                            <textarea
                                rows="4"
                                cols="50"
                                class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description"
                                name="description"
                                type="text"
                            />{{$fieldType->description}}</textarea>
                        </div>

                        <!-- This is an example component -->
                        <div class="flex justify-left">
                            <label for="unique" class="flex items-center  cursor-pointer">
                                <div class="px-2">{{__('uliniopoly.field_types.unique')}} ?</div>
                                <!-- toggle -->
                                <div class="relative">
                                    <input id="unique" name="unique" type="checkbox" class="hidden" @if($fieldType->unique) checked="checked" @endif />
                                    <!-- path -->
                                    <div
                                        class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner"
                                    ></div>
                                    <!-- circle -->
                                    <div
                                        class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0"
                                    ></div>
                                </div>
                            </label>

                        </div>
                        <div class="py-2"></div>



                        <style>

                            .toggle-path {
                                transition: background 0.3s ease-in-out;
                            }
                            .toggle-circle {
                                top: 0.2rem;
                                left: 0.25rem;
                                transition: all 0.3s ease-in-out;
                            }
                            input:checked ~ .toggle-circle {
                                transform: translateX(100%);
                            }
                            input:checked ~ .toggle-path {
                                background-color:#81E6D9;
                            }
                        </style>

                        <div class="flex items-center justify-between">
                            <button class="add-field-type bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
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

                $('.add-field-type').click(function(){
                    $.ajax({
                        url: baseUrl + "fieldtypes",
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
                                window.location.href = "{{route('fieldtypes.create')}}";
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
