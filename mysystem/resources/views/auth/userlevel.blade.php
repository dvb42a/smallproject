<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Level Setting') }}  
        </h2>
        
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                       
                    <a class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 border border-slate-300 rounded-md shadow-sm outline outline-2 outline-offset-2 outline-indigo-500 dark:bg-slate-700 dark:text-slate-200 dark:border-transparent " href="{{route('userlevel-create')}} ">Create UserLevel</a>
                    <br>
                    <br>
                     
                   
                    
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Member</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Email</th>
                                                <th>Register Data</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                                    @foreach($user as $users)
                                                        <form method="POST" action="{{route('users-update')}}" enctype="multipart/form-data">
                                                            @csrf
                                                        <tr>
                                                            <input id="num" name="num" value="{{$users->id}}" type="hidden">
                                                            <td><x-input id="name" class="block mt-1 w-full" type="text" name="name" : required autofocus value="{{$users->name}}" /></td>
                                                            <td>
                                                                @if(isset($user_level))
                                                                    <select name="lv_id" class="selectbox">
                                                                        <option value="" >Select the user level</option>
                                                                        @foreach($user_level as $user_levels)
                                                                            <option value={{$user_levels->lv_id}} @if($users->lv_id==$user_levels->lv_id) selected @endif>{{$user_levels->lv_name}}</option>
                                                                        @endforeach 
                                                                    </select>
                                                                @endif
                                                            </td>
                                                                <td><x-input id="mail" class="block mt-1 w-full" type="text" name="mail" : required autofocus value="{{$users->email}}" /></td>
                                                                <td>{{$users->created_at}} </td>
                                                                <td><x-button class="m1-6"> {{ __('Update') }}</x-button> 
                                                         </form>
                                                                <div id="dropdown " style=" display: inline;">
                                                                    <button class="btn btn-secondary" onclick="btnOpen('ttt{{$users->id}}')" id="{{$users->id}}">v</button>
                                                                </div>
                                                        @if($users->id!==1)
                                                            <form method="POST" action="{{route('user-delete', $users->id)}}" style=" display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-secondary" onclick="if(confirm('Are you comfirm to delete??')) return true;else return false" >
                                                                    <img src="{{ asset('image/del.png') }}" title="delete" width="20px">
                                                                </button>
                                                            </form>
                                                        @endif    
                                                    </td>
                                                        <tr>
                                                             <td colspan="13" class="ttt" id="ttt{{$users->id}}">
                                                                <div id="myDropdown" class="dropdown-content">
                                                                    The last time update: {{$users->updated_at}}
                                                                </div>
                                                            </td>
                                                                    
                                                                    
                                                        </tr> 
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('noteSeccess')
    @include('dropdownbar')
</x-app-layout>