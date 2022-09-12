<x-app-layout>
    <x-slot name="header" >
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @include('racing.racing-admin-header')  
                    
            <!-- select box file-->
            <link rel="stylesheet" href="{{ asset('css/checkboxsearch.css') }}">

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('racing-timerecord-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Track Name')" />
                            <div class="block mt-1 w-full">
                                <select name="m_id" class="chosen">
                                    <option value="">Select the type of the car using in this series  </option>
                                    @foreach($track as $tracks)
                                        <option value="{{$tracks->m_id}}">{{$tracks->m_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <x-label for="name" :value="__('Car')" />
                            <div class="block mt-1 w-full">
                                <select name="c_id" class="chosen">
                                    <option value="">Select the type of the car using in this series</option>
                                    @foreach($car as $carss)
                                            <option value="{{$carss->c_id}}">[{{$carss->c_sname}}]{{$carss->c_name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                            <br>
                            <x-label for="name" :value="__('Record')" />
                            <x-input id="mm" class="block mt-1 w-12" type="text" name="mm" : required autofocus style=" display: inline;" />:
                            <x-input id="ss" class="block mt-1 w-12" type="text" name="ss" : required autofocus style=" display: inline;"/>.
                            <x-input id="ms" class="block mt-1 w-12" type="text" name="ms" : required autofocus style=" display: inline;" />
                            
                            <br>
                            <br>
                            
                            <br><br>
                            <label for="comfirm" class="inline-flex items-center">
                                <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Comfirm for Record') }}</span>
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
    @include('noteSeccess')
    @include('uploadimage')
    <script >

        $(".chosen").chosen();
  
  </script>
</x-app-layout>