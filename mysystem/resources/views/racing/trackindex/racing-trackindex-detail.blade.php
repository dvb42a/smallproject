<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @include('racing.racing-header')  
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                
                <div class="p-6 bg-white border-b border-gray-200 ">
                   <p class="text-center" style="font-size: 30px;">{{$mapdata->m_name}}</p>
                   <br>
                    <hr>
                    
                    <br>
                    
                    <!-- DataTables-->

                    <div class="card mb-5">
                        <div class="card-header"></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr >
                                                <th class="text-center">安全性</th>
                                                <th class="text-center">路面平順度</th>
                                                <th class="text-center">連貫性</th>
                                                <th class="text-center">整體設計</th>
                                                <th class="text-center">賽道專業性</th>
                                                <th class="text-center">直覺評分</th>
                                                <th class="text-center">最終評價</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{$mapdata->m_safe}}</td>
                                                <td class="text-center">{{$mapdata->m_smooth}}</td>
                                                <td class="text-center">{{$mapdata->m_cont}}</td>
                                                <td class="text-center">{{$mapdata->m_design}}</td>
                                                <td class="text-center">{{$mapdata->m_pro}}</td>
                                                <td class="text-center">{{$mapdata->m_rate}}</td>
                                                <td class="text-center">{{$mapdata->m_finalrate}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-header">   <br></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Record creator</th>
                                                <th>Used car</th>
                                                <th>Race Series</th>
                                                <th>Record</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($record as $records)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <th><a href="{{route('racing-driverindex-detail',$records->d_id)}}" target="_blank">[{{$records->d_num}}]{{$records->d_name}}</a></th>
                                                <th>{{$records->c_name}}</th>
                                                <th>
                                                    @if(isset($records->rs_name))
                                                    <a href="{{route('racing-seriesindex-detail',$records->rs_id)}}" target="_blank"> {{$records->rs_name}}</a>
                                                    @else
                                                    -
                                                    @endif
                                                </th>
                                                <th>{{$records->rh_time}}</th>
                                                
                                            </tr>
                                           @endforeach
                                           
                                            
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
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
    </div>

    
    @include('noteSeccess')
    @include('dropdownbar')
</x-app-layout>