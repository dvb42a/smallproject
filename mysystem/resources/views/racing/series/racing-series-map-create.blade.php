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
                {{ __(' Step 2 : Choose tracks(2/3)') }} 
            </p>
        </div>
    </x-slot>
        <div id="dialog" title="Warming">
           
            <br>
          
            <p>All the information cannot redo when you are submited</p>
            <br>
            <p>*Checked the back up map buttom when it selected, it will auto generate even you have selected maps</p>
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
                    <form method="POST" action="{{route('racing-series-map-create',$seriess->rs_id)}}" enctype="multipart/form-data">
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
                                <h1>Select Maps</h1> 
                               
                                <ul>
                                    <h4>Select at least 4 of T1 maps for the series main playing track</h4>
                                    <hr>
                                    <br>
                                    @foreach($track as $tracks)
                                        @if($tracks->mrs_id==1)
                                        <li>   
                                            <input type="checkbox" name="m_id[]" value="{{$tracks->m_id}}" > 
                                            <strong>[{{$tracks->trackstate->mrs_name}}]{{$tracks->m_name}}</strong>
                                            <br>
                                            Track Rating: {{$tracks->m_finalrate}}
                                            <img src="/trackimage/{{$tracks->m_photoname}}" width="400px"  height="200px" alt="" />
                                        </li>     
                                        @endif
                                     @endforeach           
                                </ul>    
                                <ul>
                                        Select at least 2 of T2 maps for the series backup/extra playing track
                                        <hr>
                                        <br>
                                        @foreach($track as $tracks)
                                        @if($tracks->mrs_id==2)
                                        <li>   
                                            <input type="checkbox" name="m_id_extra[]" value="{{$tracks->m_id}}" > 
                                            <strong>[{{$tracks->trackstate->mrs_name}}]{{$tracks->m_name}}</strong>
                                            <br>
                                            Track Rating: {{$tracks->m_finalrate}}
                                            <img src="/trackimage/{{$tracks->m_photoname}}" width="400px"  height="200px" alt="" />
                                        </li>     
                                        @endif
                                     @endforeach           
                                </ul>     
                            </div>
                        </section>    
                        <br>  
                        <hr>
                        <label for="comfirm" class="inline-flex items-center">
                            <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                            <span class="ml-2 text-sm6 text-gray-600">{{ __('是否隨機安排地圖順序') }}</span>
                        </label>
                        
                        <br>   
                        <label for="comfirm" class="inline-flex items-center">
                            <input id="comfirm2" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm2" checked>
                            <span class="ml-2 text-sm6 text-gray-600">{{ __('默認選擇後備地圖且隨機排序') }}</span>
                        </label>
                        <br>   
                        <center>
                            <x-button class="m1-6" onclick="if(confirm('請確定已選擇內容為)) this.form.submit();"> {{ __('Update') }}</x-button>
                        </center>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    @include('noteSeccess')
    @include('dropdownbar')
</x-app-layout>