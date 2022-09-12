<form method="POST" action="{{route('db_data')}}" enctype="multipart/form-data">
    @csrf
    <div>
        If you don't know the default data. Please read the excel file<br><br>
        <x-label for="name" :value="__('Series earn score')" />
        <br>
            @for ($i=1; $i<11 ; $i++) 
                {{$i}}<x-input id="ct_name" class="block mt-1 w-full" type="text" name="score[]" : required autofocus />
                <br>
            @endfor
        <br><br>
        <x-label for="name" :value="__('User Level of admin name')" />
        <x-input id="ct_name" class="block mt-1 w-full" type="text" name="lv_name" : required autofocus />
        <br><br>
        <x-label for="name" :value="__('Series States')" />
        <br>
        @for ($i=0; $i<3 ; $i++) 
        <x-input id="ct_name" class="block mt-1 w-full" type="text" name="state[]" : required autofocus />
        <br>
        @endfor
        <br>
        <x-label for="name" :value="__('Map ranking')" />
        <br>

        @for ($i=0; $i<3 ; $i++) 
        <x-input id="ct_name" class="block mt-1 w-full" type="text" name="rank[]" : required autofocus />
        <br>
        @endfor
        <br>
        <x-button class="m1-6">
            {{ __('Create') }}
        </x-button>
    </div>
    <br>

</form>