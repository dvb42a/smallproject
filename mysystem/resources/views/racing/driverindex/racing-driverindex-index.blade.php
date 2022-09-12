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
                        <div class="card-header">Drivers Details</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Driver's name</th>
                                            <th>Owned cars</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($driver as $drivers)
                                          
                                                <tr>
                                                    <th>
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <th> <a href="{{route('racing-driverindex-detail',$drivers->d_id)}}" target="_blank">[{{$drivers->d_num}}]{{$drivers->d_name}}</a></th>
                                                    <th>{{$drivers->d_count}}</th>
                                                   
                                                       
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