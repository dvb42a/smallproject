<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @include('racing.racing-admin-header')  
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div  style="text-align:right;margin-right:1px">
                        <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-series-create')}} ">Create a Race series</a>
                    </div>
                    <hr>
                    <br>
                                        <!-- DataTables-->
                                        <div class="card mb-5">
                                            <div class="card-header">Race series</div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                <th>Series name</th>
                                                                <th>Count of car</th>
                                                                <th>Create State</th>
                                                                
                                                                <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($series as $seriess)
                                                                    <form method="POST" action="{{route('racing-series-index')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <tr>
                                                                            <input id="num" name="num" value="{{$seriess->rs_id}}" type="hidden">
                                                                            @if($seriess->rss_id<=2)
                                                                            <td><x-input id="rs_name" class="block mt-1 w-full" type="text" name="rs_name" : required autofocus value="{{$seriess->rs_name}}" /></td>
                                                                            <td>
                                                                                <select name="ct_id" class="selectbox">
                                                                                    <option value="">Select the type of the car</option>
                                                                                    @if(isset($cartype))
                                                                                        @foreach($cartype as $cartypes )
                                                                                            <option value="{{$cartypes->ct_id}}"    @selected($seriess->ct_id == $cartypes->ct_id) >{{$cartypes->ct_name}}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            @else
                                                                            <td><a href="{{route('racing-seriesindex-detail',$seriess->rs_id)}}" >{{$seriess->rs_name}}</td>
                                                                            <td>{{$seriess->cartype->ct_name}}</td>
                                                                            @endif
                                                                            <td>
                                                                                {{$seriess->SeriesState->rss_name}}
                                                                                @if($seriess->rss_id ==1)
                                                                                    @if($seriess->rs_mstate==1)
                                                                                    <p style="color:green; display:inline;">已選擇賽道</p>
                                                                                    @else
                                                                                    <p style="color:red; display:inline;">未選擇賽道</p>
                                                                                    @endif
                                                                                    /
                                                                                    @if($seriess->rs_cstate==1)
                                                                                    <p style="color:green; display:inline;">已選擇參賽者</p>
                                                                                    @else
                                                                                    <p style="color:red; display:inline;">未選擇參賽者</p>
                                                                                    @endif
                                                                                
                                                                                @elseif($seriess->rss_id==2)
                                                                                    <div align="left"><input id="comfirm_play" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">請確定資料是否正確並勾選開始聯賽
                                                                                    </div>
                                                                                        @endif
                                                                            </td>
                                                                            
                                                                            <td>
                                                                                @if($seriess->rss_id<=2)
                                                                                <x-button class="m1-6"> {{ __('Update') }}</x-button> 
                                                                                @endif
                                                                    </form>
                                                                    @if($seriess->rs_mstate!=1)
                                                                    <form action="{{ route('racing-series-map-create' , $seriess->rs_id) }}"  style=" display: inline;">
                                                                    <x-button class="m1-6" > [<i class="fa fa-map-o" aria-hidden="true"></i>]</x-button> 
                                                                    </form>
                                                                    @endif
                                                                    @if($seriess->rs_cstate!=1)
                                                                    <form action="{{ route('racing-series-car-create' , $seriess->rs_id) }}"  style=" display: inline;">
                                                                        <x-button class="m1-6" > [<i class="fa fa-car" aria-hidden="true"></i>]</x-button> 
                                                                    </form>
                                                                    @endif
                                                                    @if($seriess->rs_mstate!=0 or $seriess->rs_cstate!=0)
                                                                    <div id="dropdown " style=" display: inline;">
                                                                        <button class="btn btn-secondary" onclick="btnOpen('ttt{{$seriess->rs_id}}')" id="{{$seriess->rs_id}}">v</button>
                                                                    </div>
                                                                    @endif
                                                                </td>
                                                                <tr>
                                                                    <td colspan="13" class="ttt" id="ttt{{$seriess->rs_id}}">
                                                                        <div id="myDropdown" class="dropdown-content">
                                                                            The last time update: {{$seriess->updated_at}}<br><br>
                                                                            是否已選擇賽程隨機: @if($seriess->rs_morder==1)  <p style="color:green; display:inline;">YES</p> @else NO @endif
                                                                            <br>
                                                                            Map in this series Order by : <br>
                                                                            
                                                                            @foreach($track as  $tracks)
                                                                                @if($tracks->rs_id==$seriess->rs_id and $tracks->rsm_extra==0)
                                                                                    {{$tracks->track->m_name}}<br>
                                                                                @endif
                                                                            @endforeach
                                                                            <br>
                                                                            Map of back up in this series: 
                                                                            <br>
                                                                            @foreach($track as $tracks)
                                                                                @if($tracks->rs_id==$seriess->rs_id and $tracks->rsm_extra==1)
                                                                                    {{$tracks->track->m_name}}<br>
                                                                                @endif
                                                                            @endforeach
                                                                            <br>
                                                                            Driver and car information:
                                                                            <br>
                                                                            @foreach($car as $cars)
                                                                                @if($cars->rs_id==$seriess->rs_id)
                                                                                    {{$cars->car->driver->d_name}} 的 {{$cars->car->c_name}}<br>
                                                                                @endif
                                                                            @endforeach

                                                                        </div>
                                                                    </td>      
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
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