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
                        <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-track-create')}} ">Create a Track data</a>
                    </div>

                    <hr>
                    <br>
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Track states</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th></th>
                                            <th>Track's name</th>
                                            <th>Played Times</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($track as $tracks)
                                                
                                                    <tr>
                                                        
                                                        <td align="center" valign="center"><img src="./trackimage/{{$tracks->m_photoname}}" width="160px"  height="90px" alt="" /></td>
                                                        <td align="center" valign="center"><a href="{{route('racing-trackindex-detail',$tracks->m_id)}}" target="_blank">{{$tracks->m_name}} </td>
                                                            <td align="center" valign="center">{{$tracks->m_count}}</td>
                                                            <td align="center" valign="center">
                                                                @if($tracks->mrs_id==1)
                                                                <p style="color:rgb(0, 255, 0); display:inline;">
                                                                @elseif($tracks->mrs_id==2)
                                                                <p style="color:orange; display:inline;">
                                                                @else
                                                                <p style="color:red; display:inline;">
                                                                @endif
                                                                    {{$tracks->mrs_name}}
                                                                </p>
                                                            </td>
                                                            <td>
                                                
                                                            <div id="dropdown " style=" display: inline;">
                                                                <button class="btn btn-secondary" onclick="btnOpen('ttt{{$tracks->m_id}}')" id="{{$tracks->m_id}}">v</button>
                                                            </div>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td colspan="13" class="ttt" id="ttt{{$tracks->m_id}}">
                                                            <div id="myDropdown" class="dropdown-content">
                                                                <form method="POST" action="{{route('racing-track-index')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input id="num" name="num" value="{{$tracks->m_id}}" type="hidden">
                                                                    <table>
                                                                    <x-label for="name" :value="__('Track name')" />
                                                                    <x-input id="ct_name" class="block mt-1 w-full" type="text" name="m_name" : required autofocus value="{{$tracks->m_name}}" />
                                                                    <br>
                                                                    <x-label for="name" :value="__('Standed of the track')" />
                                                                    <thead>
                                                                        <tr >
                                                                            <th class="text-center">安全性</th>
                                                                            <th class="text-center">路面平順度</th>
                                                                            <th class="text-center">連貫性</th>
                                                                            <th class="text-center">整體設計</th>
                                                                            <th class="text-center">賽道專業性</th>
                                                                            <th class="text-center">直覺評分</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><x-input id="m_safe" class="block mt-1 w-full" type="text" name="m_safe" value="{{$tracks->m_safe}}" /></td>
                                                                            <td><x-input id="m_smooth" class="block mt-1 w-full" type="text" name="m_smooth" value="{{$tracks->m_smooth}}" /></td>
                                                                            <td><x-input id="m_cont" class="block mt-1 w-full" type="text" name="m_cont" value="{{$tracks->m_cont}}" /></td>
                                                                            <td><x-input id="m_design" class="block mt-1 w-full" type="text" name="m_design" value="{{$tracks->m_design}}" /></td>
                                                                            <td><x-input id="m_pro" class="block mt-1 w-full" type="text" name="m_pro" value="{{$tracks->m_pro}}" /></td>
                                                                            <td><x-input id="m_rate" class="block mt-1 w-full" type="text" name="m_rate" value="{{$tracks->m_rate}}" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    </table>
                                                                    <br>
                                                                    <x-button class="m1-6"> {{ __('Update') }}</x-button>
                                                                </form>
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