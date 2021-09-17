<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
            {{ __('uliniopoly.fields.fields') }}
        </h2>
        <button class="add-field">
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
                                        {{__('uliniopoly.fields.name')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.fields.description')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.fields.type')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        {{__('uliniopoly.fields.pricing')}}
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
                            @foreach($fields as $field)
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                                <td class="p-2 border-r">{{$field->id}}</td>
                                <td class="p-2 border-r">{{$field->name}}</td>
                                <td class="p-2 border-r">{{$field->description}}</td>
                                <td class="p-2 border-r">{{$field->type->name}}</td>
                                <td class="p-2 border-r">
                                    @if($field->pricing)
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>{{__('pricing.service')}}</th>
                                                <th>{{__('pricing.price')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($field->pricing->getFillable() as $price)
                                            <tr>
                                                <td>{{__('pricing.'.$price)}}</td><td>{{$field->pricing->$price}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        {{__('pricing.none')}}
                                    @endif
                                </td>
                                <td class="justify-center">
                                    <a href="{{route('fields.edit',$field->id)}}" data-id="{{$field->id}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('buttons.edit')}}</a>
                                    <button data-id="{{$field->id}}" data-class="fields" data-prompt="{{__('swalerts.fields.delete.contents')}}" class="delete bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__('buttons.remove')}}</button>
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
                $('.add-field').click(function(){
                    window.location.href = "{{route('fields.create')}}";
                })
            })
        @endsection
        @section('js-files')
            <script src="{{ asset('js/delete.js') }}" ></script>
        @endsection
    </div>
</x-app-layout>
