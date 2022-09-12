<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($de_setting==1)
                        <center>
                            <a href="{{route('db_data')}}" onclick="window.open('db_data','js4','width=800,height=1500,directories=no,location=no,menubar=no,scrollbars=yes,status=no,toolbar=no,resizable=no,left=180,top=100,screenX=500,screenY=0');return false" >[Important]Click me to create the base data</a>
                            <br>
                            <br>
                            <br>
                            <br>
                            Why I need to create base information??
                            <br>
                            Ans:
 
                            This website have some default and modify function / selection, So it needs admin to create some base database.
                        </center>
                    @else 
                        [<strong>{{"$user_level_n"}}</strong>]{{ Auth::user()->name }}  Welcome to SmartLiveSystem Beta.
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
