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
                    <!-- DataTables-->
                    <div class="card mb-5">
                        <div class="card-header">Series States</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th> Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($series as $seriess)
                                                    <form method="POST" action="{{route('racing-statename-index')}}" enctype="multipart/form-data">
                                                        @csrf
                                                            <tr>
                                                                <input id="num" name="num" value="{{$seriess->rss_id}}" type="hidden">
                                                                <td><x-input id="rss_name" class="block mt-1 w-full" type="text" name="rss_name" : required autofocus value="{{$seriess->rss_name}}" /></td>
                                                                <td><x-button class="m1-6"> {{ __('Update') }}</x-button> 
                                                            </tr>
                                                    </form>
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
</x-app-layout>