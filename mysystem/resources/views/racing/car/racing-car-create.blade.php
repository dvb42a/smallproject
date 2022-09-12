<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Car data') }} 
        </h2>
         <!-- select box file-->
         <link rel="stylesheet" href="{{ asset('css/checkboxsearch.css') }}">

         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     
         <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    </x-slot>
    
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('racing-car-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Car Name ex:EK9 Red')" />
                            <x-input id="c_name" class="block mt-1 w-full" type="text" name="c_name" : required autofocus />
                            <br>
                            <x-label for="name" :value="__('Car short name ex:EK9R')" />
                            <x-input id="c_sname" class="block mt-1 w-full" type="text" name="c_sname" : required autofocus />
                            <br>
                            <x-label for="name" :value="__('Car Type')" />
                            <div class="block mt-1 w-full">
                                <select name="ct_id" class="chosen">
                                    <option value="">Select the type of the car</option>
                                    @foreach($cartype as $cartypes )
                                    <option value="{{$cartypes->ct_id}}">{{$cartypes->ct_name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                         
                            <br>
                            <x-label for="name" :value="__('Owner of the car')" />

                            <div class="block mt-1 w-full">
                                <select name="d_id" class="chosen">
                                    <option value="">Select the Owner</option>
                                    @foreach($owner as $owners )
                                    <option value="{{$owners->d_id}}">{{$owners->d_name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                            <br>
                            <x-label for="name" :value="__('Photo')" />
                            <x-input id="path" class="block mt-1 w-full" type="file" name="path" onchange="readURL(this);"/>
                            
                            <img id="blah" src="#" alt="image" />
                            
                            <br><br>
                            <label for="comfirm" class="inline-flex items-center">
                                <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Comfirm for create the car data') }}</span>
                            </label>
                            <br>
                            <x-button class="m1-6">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li >*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    @include('noteSeccess')
    @include('uploadimage')
    <script >

        $(".chosen").chosen();
  
  </script>
</x-app-layout>