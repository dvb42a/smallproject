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
                    <hr>
                    <br>
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Track Details</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th></th>
                                            <th>Track's name</th>
                                            <th>Played Times</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($track as $tracks)
                                                <tr>
                                                    <th>
                                                        @if($tracks->mrs_id==1)
                                                        <p style="color:rgb(0, 255, 0); display:inline;">
                                                        @elseif($tracks->mrs_id==2)
                                                        <p style="color:orange; display:inline;">
                                                        @else
                                                        <p style="color:red; display:inline;">
                                                        @endif
                                                            {{$tracks->mrs_name}}
                                                        </p>
                                                    </th>
                                                    <th> <a href="{{route('racing-trackindex-detail',$tracks->m_id)}}" target="_blank">{{$tracks->m_name}}</a></th>
                                                    <th>{{$tracks->m_count}}</th>
                                                   
                                                       
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