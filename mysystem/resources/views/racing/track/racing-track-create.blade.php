<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Track') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('racing-track-create')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Track name')" />
                            <x-input id="lv_name" class="block mt-1 w-full" type="text" name="m_name" : required autofocus style=" display: inline;"/>
                            <br>
                            <br>
                            
                            <div style="display: inline;">
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width=auto cellspacing="0">
                                <x-label for="name" :value="__('Standed of the track')" />
                                <thead>
                                    <tr>
                                        <th class="text-center">安全性</th>
                                        <th class="text-center">路面平順度</th>
                                        <th class="text-center">連貫性</th>
                                        <th class="text-center">整體設計</th>
                                        <th class="text-center">賽道專業性</th>
                                        <th class="text-center">直覺評分</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td><x-input id="m_safe" class="block mt-1 w-full" type="text" name="m_safe"  /></td>
                                        <td><x-input id="m_smooth" class="block mt-1 w-full" type="text" name="m_smooth"  /></td>
                                        <td><x-input id="m_cont" class="block mt-1 w-full" type="text" name="m_cont"  /></td>
                                        <td><x-input id="m_design" class="block mt-1 w-full" type="text" name="m_design"  /></td>
                                        <td><x-input id="m_pro" class="block mt-1 w-full" type="text" name="m_pro"  /></td>
                                        <td><x-input id="m_rate" class="block mt-1 w-full" type="text" name="m_rate"  /></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                                </div>
                            </div>
                            <br>
                       
                            <x-label for="name" :value="__('Photo')" />
                            <x-input id="path" class="block mt-1 w-full" type="file" name="path" onchange="readURL(this);"/>
                            
                            <img id="blah" src="#" alt="image" />
                            <br><br>
                            <label for="comfirm" class="inline-flex items-center">
                                <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Comfirm for create the Track') }}</span>
                            </label>
                            <br>
                            <x-button class="m1-6">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li >*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('uploadimage')
</x-app-layout>