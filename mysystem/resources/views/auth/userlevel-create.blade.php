<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User Level') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('userlevel')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Level Name')" />
                            <x-input id="lv_name" class="block mt-1 w-full" type="text" name="lv_name" : required autofocus />
                            <br>
                            <x-label for="name" :value="__('Photo')" />
                            <x-input id="path" class="block mt-1 w-full" type="file" name="path" />
                            <br><br>
                            <label for="comfirm" class="inline-flex items-center">
                                <input id="comfirm" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="comfirm">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Comfirm for create the User Level') }}</span>
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
</x-app-layout>