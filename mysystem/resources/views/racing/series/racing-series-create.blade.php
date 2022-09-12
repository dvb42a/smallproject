<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style=" display: inline;">
            {{ __('Create Series') }} 
        </h2>
        &emsp; 
        <p style=" display: inline;">
            {{ __(' Step 1 : Creating the base information(1/3)') }} 
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('racing-series-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Race Series Name')" />
                            <x-input id="rs_name" class="block mt-1 w-full" type="text" name="rs_name"  style=" display: inline;"/>
                            <br>
                            <br>
                            <x-label for="name" :value="__('Car Type')" />
                            <div class="block mt-1 w-full">
                                <select name="ct_id" class="selectbox">
                                    <option value="">Select the type of the car using in this series</option>
                                    @if(isset($cartype))
                                        @foreach($cartype as $cartypes )
                                            <option value="{{$cartypes->ct_id}}">{{$cartypes->ct_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <br>
                            <br>
                            <x-label for="name" :value="__('Photo')" />
                            <x-input id="path" class="block mt-1 w-full" type="file" name="path" onchange="readURL(this);"/>
                            
                            <img id="blah" src="#" alt="image" />
                            <br><br>
                            <label for="comfirm" class="inline-flex items-center">
                                <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Comfirm for create the Track') }}</span>
                            </label>
                            <br>
                            <x-button class="m1-6">
                                {{ __('Create') }}
                            </x-button>
                    </form>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li >*{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif 
            </div>
        </div>
    </div>
    @include('uploadimage')
</x-app-layout>