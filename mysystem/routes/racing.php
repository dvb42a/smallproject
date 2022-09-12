<?php

use App\Http\Controllers\Racing\RacingindexController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    //index
    Route::get('IndexRacingindex', [RacingindexController::class,'index'])
                ->name('racing-index');

    Route::get('racingAdmin', [RacingindexController::class,'admin'])
                ->name('racing-admin');
    Route::get('racingManage', [RacingindexController::class,'manage'])
                ->name('racing-manage');   

    //driver
    Route::get('racingDriverindex', [RacingindexController::class,'driverIndex'])
                ->name('racing-driver-index');

    Route::get('racingDriverCreate', [RacingindexController::class,'driverCreate'])
                ->name('racing-driver-create');
    
    Route::post('racingDriverCreate', [RacingindexController::class,'driverStore']);

    Route::post('racingDriverindex', [RacingindexController::class,'driverUpdate']);


    //car 
    Route::get('racingCarCreate', [RacingindexController::class,'carCreate'])
                ->name('racing-car-create');   
    Route::post('racingCarCreate',[RacingindexController::class,'carStore']);     


    
    //car type
    Route::get('racingCarTypeCreate', [RacingindexController::class,'cartypeCreate'])
                ->name('racing-cartype-create');   

    Route::post('racingCarTypeCreate',[RacingindexController::class,'cartypeStore']);     

    Route::post('racing-cartype-update',[RacingindexController::class,'cartypeUpdate'])
                ->name('racing-cartype-update');
    
    Route::delete('cartype-delete/{ct_id}', [RacingindexController::class,'ct_destory'])
            ->name('cartype-delete');
    



    //Track
    Route::get('racingTrackindex',[RacingindexController::class,'Trackindex'])
                ->name('racing-track-index');

    Route::get('racingTrackCreate',[RacingindexController::class,'trackCreate'])
                ->name('racing-track-create');  

    Route::post('racingTrackCreate', [RacingindexController::class,'trackStore']);

    Route::post('racingTrackindex', [RacingindexController::class,'trackUpdate']);



    //Race series
    Route::get('racingSerieCreate',[RacingindexController::class,'raceseriesCreate'])
                ->name('racing-series-create');
                
    Route::post('racingSerieCreate', [RacingindexController::class,'raceseriesStore']);

    Route::resource('racing', RacingindexController::class);

    Route::get('racing-series-track-create',[RacingindexController::class,'raceseriestrackCreate'])
                ->name('racing-series-track-create');

    Route::get('racingSeriesIndex',[RacingindexController::class,'raceseriesIndex'])
                ->name('racing-series-index');

    Route::post('racingSeriesIndex',[RacingindexController::class,'raceseriesUpdate']);

    Route::get('racing-statename-index',[RacingindexController::class,'raceseriesstateIndex'])
                ->name('racing-statename-index');

    Route::post('racing-statename-index',[RacingindexController::class,'raceseriesstateUpdate']);

    Route::get('racingSeriesMapCreate/{rs_id}',[RacingindexController::class,'raceseriesmapCreate'])
                ->name('racing-series-map-create');

    Route::post('racingSeriesMapCreate/{rs_id}',[RacingindexController::class,'raceseriesmapStore']); 
    
    Route::get('racingSeriesCarCreate/{rs_id}',[RacingindexController::class,'raceseriescarCreate'])
    ->name('racing-series-car-create');

    Route::post('racingSeriesCarCreate/{rs_id}',[RacingindexController::class,'raceseriescarStore']); 

                

    //Race Time History           
    Route::get('racingTimeRecordCreate',[RacingindexController::class,'racetimerecordCreate'])
                ->name('racing-timerecord-create');

    Route::post('racingTimeRecordCreate',[RacingindexController::class,'racetimerecordStore']);

    //Race series index
    Route::get('IndexRacinggSeries',[RacingindexController::class,'racingseries'])
                ->name('racing-seriesindex-index');

    Route::get('IndexRacingSeriesDetails/{rs_id}',[RacingindexController::class,'racingseriesdetail'])
                ->name('racing-seriesindex-detail');

    Route::get('IndexRacingSeriesRecord/{rs_id}',[RacingindexController::class,'racingseriesRecord'])
                ->name('racing-seriesindex-record');
    Route::post('IndexRacingSeriesRecord/{rs_id}',[RacingindexController::class,'racingseriesRecordStore']);

    //Track details
    Route::get('IndexRacingTracksIndex',[RacingindexController::class,'racingtracksIndex'])
                ->name('racing-trackindex-index');
    Route::get('IndexRacingTracksDetail/{m_id}',[RacingindexController::class,'racingtracksDetail'])
                ->name('racing-trackindex-detail');

    //Driver details
    Route::get('IndexRacingDriversIndex',[RacingindexController::class,'racingdriverIndex'])
                ->name('racing-driverindex-index');
    Route::get('IndexRacingDriversIndex/{d_id}',[RacingindexController::class,'racingdriverDetail'])
                ->name('racing-driverindex-detail');

});