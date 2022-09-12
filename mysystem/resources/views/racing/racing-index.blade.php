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
           
            <h1>Latest Track Record </h1> 

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Record creator</th>
                        <th>Used car</th>
                        <th>Map</th>
                        <th>Race Series</th>
                        <th>Record</th>
                    </tr>
                </thead>
                <tbody>
                    @if($history!=NULL and $series!=NULL)
                    <tr>
                        <th><a href="{{route('racing-driverindex-detail',$record->d_id)}}" target="_blank">[{{$record->d_num}}]{{$record->d_name}}</a></th>
                        <th>{{$record->c_name}}</th>
                        <th><a href="{{route('racing-trackindex-detail',$record->m_id)}}" target="_blank">{{$record->m_name}}</a></th>
                        <th>
                            @if(isset($record->rs_name))
                            <a href="{{route('racing-seriesindex-detail',$record->rs_id)}}" target="_blank"> {{$record->rs_name}}</a>
                            @else
                            Normal Time Attack
                            @endif
                        </th>
                        <th>{{$record->rh_time}}</th>
                    </tr>
                    @endif
                
                </tbody>
            </table>
            <h1 style="font-size:15px;"> <a href="{{route('racing-trackindex-index')}}" >More Record </a></h1> 
            <br><br>
            <h1>Latest Series </h1> 
            <ul>
                @if(isset($series))
                <li>
                   
                    <strong>{{$series->rs_name}}</strong>
                    <img  style="display:block; margin:auto;" src="/seriesimage/{{$series->rs_photoname}}" width="350px"  height="200px" alt="" />
                    <br>
                    <br> 
                    <span class="purchase-description">{{$series->ct_name}}</span> 
                    <br>
                    <br>
                    <span class="purchase-button"><a href="{{route('racing-seriesindex-detail',$series->rs_id)}}">點我了解更多</span>
                    </a>
                   
                </li>
                @endif
                <li>
                    <a href="{{route('racing-seriesindex-index')}}">
                    <strong> viewing others series</strong>
                    <img  style="display:block; margin:auto;" src="/seriesimage/series.png" width="350px"  height="200px" alt="" />
                    <br>
                    <br> 
                    <span class="purchase-description">Click Me</span> 
                    <br>
                    <br>
                    <span class="purchase-button">點我了解更多</span>
                    </a>
                </li>
            </ul>          
            <br>
        </div>
    </section>  
    
    
</x-app-layout>