<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @include('racing.racing-header')  
            <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                
            </div>
        </div>
    </div>
    <section class="purchase" id="buy-now">
        <div class="container">
            <h1>Race series</h1> 
            <ul>
                @foreach($series as $seriess)
                <li>
                    
                    <strong>{{$seriess->rs_name}}</strong>
                    <img  style="display:block; margin:auto;" src="/seriesimage/{{$seriess->rs_photoname}}" width="350px"  height="200px" alt="" />
                    <br>
                    <br> 
                    <span class="purchase-description">{{$seriess->ct_name}}</span> 
                    <br>
                    <br>

                    <span class="purchase-button"><a href="{{route('racing-seriesindex-detail',$seriess->rs_id)}}">點我了解更多</span>
                    </a>
                </li>
                @endforeach
            </ul>               
        </div>
    </section>  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            
            </div>
        </div>
    </div>
   
</x-app-layout>