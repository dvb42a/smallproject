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
                        <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-driver-create')}} ">Create a Driver data</a>
                        <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-car-create')}} ">Create a Car data</a>
                    </div>
                    <hr>
                    <br>
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Driver's details</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Driver num</th>
                                            <th>Driver name</th>

                                            <th>Owned cars</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($driver as $drivers)
                                                    <tr>
                                                        <form method="POST" action="{{route('racing-driver-index')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input id="num" name="num" value="{{$drivers->d_id}}" type="hidden">
                                                        <td><x-input id="d_num" class="block mt-1 w-25" type="text" name="d_num" : required autofocus value="{{$drivers->d_num}}" /></td>
                                                        <td ><x-input id="d_name" class="block mt-1 w-full" type="text" name="d_name" : required autofocus value="{{$drivers->d_name}}" /></td>
                                                        <td>{{$drivers->d_count}}  </td>
                                                        <td>  
                                                            <div id="dropdown " style=" display: inline;">
                                                                <x-button class="m1-6"> {{ __('Update') }}</x-button>
                                                            </div>
                                                        </form>
                                                        @if($drivers->d_count!=0)
                                                        <button class="btn btn-secondary" onclick="btnOpen('ttt{{$drivers->d_id}}')" id="{{$drivers->d_id}}">v</button>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td colspan="13" class="ttt" id="ttt{{$drivers->d_id}}">
                                                            <div id="myDropdown" class="dropdown-content">
                                       
                                                                    <table>
                                                                        
                                                                        <br>
                                                                        <x-label for="name" :value="__('Standed of the Car')" />
                                                                        <thead>
                                                                            <tr >
                                                                                <th class="text-center"></th>
                                                                                <th class="text-center">Car's name</th>
                                                                                <th class="text-center">Car's Type</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                            @foreach($car as $cars)
                                                                            @if($cars->d_id==$drivers->d_id)
                                                                            <tr>
                                                                                <td><img src="./carimage/{{$cars->c_photoname}}" width="160px"  height="90px" alt="" /></td>
                                                                                <td>[{{$cars->c_sname}}]{{$cars->c_name}}</td>
                                                                                <td>{{$cars->cartype->ct_name}}</td>
                                                                            </tr>
                                                                            @endif
                                                                            @endforeach
                                                                            
                                                                        </tbody>
                                                                        </table>
                                                               
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
    @include('noteSeccess')
    @include('dropdownbar')
</x-app-layout>