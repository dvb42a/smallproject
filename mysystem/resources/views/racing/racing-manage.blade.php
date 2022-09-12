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
                        <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent  " href="{{route('racing-cartype-create')}} ">Create a Car Type</a>
                    </div>
                    <hr>
                    <br>
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Car's type</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Car's type name</th>
                                            <th>Count of car</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartype as $cartypes)
                                                <form method="POST" action="{{route('racing-cartype-update')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <tr>
                                                        <input id="num" name="num" value="{{$cartypes->ct_id}}" type="hidden">
                                                        <td><x-input id="ct_name" class="block mt-1 w-full" type="text" name="ct_name" : required autofocus value="{{$cartypes->ct_name}}" /></td>
                                                            <td>{{$cartypes->ct_count}}</td>
                                                            <td>{{$cartypes->created_at}} </td>
                                                            <td><x-button class="m1-6"> {{ __('Update') }}</x-button> 
                                                </form>
                                                            <div id="dropdown " style=" display: inline;">
                                                                <button class="btn btn-secondary" onclick="btnOpen('ttt{{$cartypes->ct_id}}')" id="{{$cartypes->ct_id}}">v</button>
                                                            </div>
                                                        @if($cartypes->ct_count<=0 )
                                                        <form method="POST" action="{{route('cartype-delete', $cartypes->ct_id)}}" style=" display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-secondary" onclick="if(confirm('Are you comfirm to delete??')) return true;else return false" >
                                                                <img src="{{ asset('image/del.png') }}" title="delete" width="20px">
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td colspan="13" class="ttt" id="ttt{{$cartypes->ct_id}}">
                                                            <div id="myDropdown" class="dropdown-content">
                                                                The last time update: {{$cartypes->updated_at}}
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