<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
            <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style=" display: inline;">
                {{ __('Create Series') }} 
            </h2>
            &emsp; 
            <p style=" display: inline;">
                {{ __(' Step 3 : Select car to join(3/3)') }} 
            </p>
        </div>
    </x-slot>
        <div id="dialog" title="Warming">
           
            <br>
            <p>All the information cannot redo when you are submited</p>
        </div>
        <script>
        $( function() {
          $( "#dialog" ).dialog();
        } );
        </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    @foreach($series as $seriess)
                    <hr>
                    <br>
                    <form method="POST" action="{{route('racing-series-car-create',$seriess->rs_id)}}" enctype="multipart/form-data">
                        @csrf
                        
                        <input id="num" name="num" value="{{$seriess->rs_id}}" type="hidden">
                        Race Series Name:{{$seriess->rs_name}}
                        <br>
                        Race Series Cartype:{{$seriess->Cartype->ct_name}}
                        <br><br>
                        <hr>
                        <br>
                        @endforeach
                        <section class="purchase" id="buy-now">
                            <div class="container">
                                <h1>Select Cars join this series</h1> 
                                <ul>
                                    @foreach($car as $cars)
                                    
                                    <li>   
                                        <input type="checkbox" name="c_id[]" value="{{$cars->c_id}}">
                                        <strong>{{$cars->c_name}}</strong>
                                        <span class="purchase-description">Owner:[{{$cars->d_num}}]{{$cars->d_name}}</span> 
                                        <img src="/carimage/{{$cars->c_photoname}}" width="400px"  height="200px" alt="" />
                                    </li>   
                                                 
                                    @endforeach
                                </ul>               
                            </div>
                        </section>    
                        <br>  
                        <hr>
                        <br>        
                        <center><x-button class="m1-6" > {{ __('Update') }}</x-button></center>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    @include('noteSeccess')
    @include('dropdownbar')
</x-app-layout>