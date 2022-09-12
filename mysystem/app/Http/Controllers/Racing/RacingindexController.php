<?php

namespace App\Http\Controllers\Racing;

use App\Http\Controllers\Auth\userlevelController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GFC;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Driver;
use App\Models\Cartype;
use App\Models\Car;
use App\Models\RaceHistory;
use App\Models\Track;
use App\Models\TrackState;
use App\Models\Series;
use App\Models\SeriesState;
use App\Models\SeriesTrack;
use App\Models\SeriesCar;
use App\Models\CarSource;
use Illuminate\Validation\Rule;
use GlobalFunctionFile;

class RacingindexController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    /**Global function */
    public function cartypeasc()
    {
        // final stage 
        $cartypesss=DB::table("cardata")
                    ->rightJoin("cartype", function($join){
                        $join->on("cartype.ct_id", "=", "cardata.ct_id");
                    })
                    ->selectRaw('*, count(cardata.ct_id) as ct_count')
                    ->groupBy("cartype.ct_id")
                    ->orderBy('ct_name','asc')
                    ->get();
        //dd($cartypesss)->array();
        
        return ($cartypesss);
    }
    
    public function driver()
    {
        $driver=
        DB::table("cardata")
        ->rightJoin("driverdata", function($join){
            $join->on("driverdata.d_id", "=", "cardata.d_id");
        })
        ->selectRaw('*, count(cardata.d_id) as d_count')
        ->groupBy("driverdata.d_id")
        ->orderBy('d_count','desc')
        ->get();
        //dd($driver);
        return($driver);
    }

    public function commit_racing_viewer()
    {

        $user_level=Auth::user()->lv_id;
        if($user_level == 1 or $user_level==2 )
        {
            return('1');
        }     
        else
        {
            return('0');
        }

    }



    /**Race menu  */
    public function index()
    {
        $history=db::table('racehistory')
        ->orderBy('rh_id','desc')
        ->first();

        $series=db::table('raceseries')
        ->rightjoin('cartype','cartype.ct_id','raceseries.ct_id')
        ->orderBy('rs_id','desc')
        ->first();

        $record=DB::table('racehistory')
        ->select('racehistory.rh_id','rh_time','racehistory.c_id','racehistory.m_id','racehistory.rs_id','cardata.c_name','driverdata.d_name','driverdata.d_num','driverdata.d_id','raceseries.rs_name','mapdata.m_name')
        ->leftjoin('cardata','cardata.c_id','racehistory.c_id')
        ->leftjoin('cartype','cartype.ct_id','cardata.ct_id')
        ->leftjoin('driverdata','driverdata.d_id','cardata.d_id')
        ->leftjoin('raceseries','raceseries.rs_id','racehistory.rs_id')
        ->leftjoin('mapdata','mapdata.m_id','racehistory.m_id')
        ->orderBy('rh_id','desc')
        ->first();

        $check=DB::table('raceseriesgetsource')
        ->first();
        //dd($record)->array();

        if($check!= NULL)
        {
            return view('\Racing\racing-index',compact('history','series','record'));
        }
        else
        {
            return redirect()->route('dashboard');
        }
        
       
    }

    public function admin()
    {
     
        //return('true');
        //dd($history)->array();
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\racing-admin');
        }
        else
        {
            return view ('nocommit');
        }
        
    }

    public function manage()
    {
        $cartype=RacingindexController::cartypeasc();
        
        //print($cartype);
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\racing-manage', compact('cartype'));
        }
        else
        {
            return view ('nocommit');
        }
       
    }
    
    /**Driver  */
    public function driverIndex()
    {

        $driver=RacingindexController::driver();
        $car=Car::all();
        //$driver=Driver::all();
        //return('true');
        //dd($car)->array();
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\driver\racing-driver-index',compact('driver','car'));
        }
        else
        {
            return view ('nocommit');
        }
        
    }

    public function driverCreate()
    {
        //return('true');
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\driver\racing-driver-create');
        }
        else
        {
            return view ('nocommit');
        }
       
    }

    public function driverStore(Request $request)
    {
        $request->validate([
            'd_name' => ['required', 'string', 'max:150', 'unique:driverdata'],
            'd_num' =>['required', 'string', 'max:3', 'unique:driverdata'],
            'comfirm'=>'required_without_all',
        ]);

        $driver = new Driver;
        $driver->d_name = $request->d_name;
        $driver->d_num = $request->d_num;
        $driver->created_at= date('Y-m-d H:i:s');
        $driver->save();
        session()->flash('message');
        $driver=RacingindexController::driver();
        $car=Car::all();

        return redirect()->route('racing-driver-index',compact('driver','car'));
    }

    public function driverUpdate(Request $request)
    {
        
        $request->validate([
               
            'd_num' =>['required', 'string', 'max:3', Rule::unique('driverdata')->ignore($request->num , 'd_id')  ],
            'd_name' => ['required', 'string', 'max:150', Rule::unique('driverdata')->ignore($request->num , 'd_id')],
        ]);
   
        

        DB::table('driverdata')
        ->where('d_id', $request->num)
        ->update([
            'd_name'=>$request->d_name,
            'updated_at'=> date('Y-m-d H-i-s')]);

        $driver=RacingindexController::driver();
        $car=car::all();
        session()->flash('message_update');
        return view('\Racing\driver\racing-driver-index',compact('driver','car'));
      
    }


    /**Car info  */
    public function carCreate()
    {
        $cartype=cartype::all();
        $owner=driver::all();
        
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\car\racing-car-create', compact('cartype','owner'));
        }
        else
        {
            return view ('nocommit');
        }

       
    }

    public function carStore(Request $request)
    {
        $request->validate(([
            'c_name' =>'required','string','max:50','unique:cardata',
            'c_sname'=>'required','string','max:50','unique:cardata',
            'd_id'=>'required',
            'ct_id'=>'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'comfirm'=>'required_without_all',
        ]));
        
        if(isset($request->path))
        {
            $name=$request->file('path')->getClientOriginalName();
            $path=$request->file('path')->store('image');
            $file=$request->file('path')->move(public_path('carimage'), $name); 
        }
        else
        {
            $path=NULL;
            $name=NULL;
        }
        

        $car=Car::create([
            'c_name'=>$request->c_name,
            'c_sname'=>$request->c_sname,
            'd_id'=>$request->d_id,
            'ct_id'=>$request->ct_id,
            'c_photopath'=>$path,
            'c_photoname'=>$name,
            'created_at'=> (date('Y-m-d H-i-s')),
        ]);
        session()->flash('message');

        return redirect()->route('racing-driver-index');
    }


    /**Car type  */
    public function cartypeCreate()
    {
      
        return view('\Racing\cartype\racing-cartype-create');
    }

    public function cartypeStore(Request $request)
    {
        
        $request->validate(([
            'ct_name' =>['required','string','max:150','unique:cartype',
            'comfirm'=>'required_without_all']
        ]));

        $cartypec=cartype::create([
            'ct_name'=>$request->ct_name,
            'created_at'=> (date('Y-m-d H-i-s')),
        ]);
        $cartype=RacingindexController::cartypeasc();
        session()->flash('message');
        return view('\Racing\racing-manage', compact('cartype'));
    }

    public function cartypeUpdate(Request $request)
    {
        $request->validate(([
            'ct_name' =>['required','string','max:150','unique:cartype']
        ]));

        DB::table('cartype')
        ->where('ct_id', $request->num)
        ->update([
            'ct_name'=>$request->ct_name,
            'updated_at'=> date('Y-m-d H-i-s')]);

        $cartype=RacingindexController::cartypeasc();
        session()->flash('message_update');
        return view('\Racing\racing-manage', compact('cartype'));
    }

    public function ct_destory($ct_id)
    {
        DB::table('cartype')->where('ct_id',$ct_id)->delete();
        session()->flash('message_delete');

        return redirect(RouteServiceProvider::RCM);
    }

    /**Track  */
    public function Trackindex()
    {
        $track=DB::table("racehistory")
        ->rightJoin("mapdata" , function($join){
            $join->on("racehistory.m_id", "=", "mapdata.m_id");
        })
        ->leftJoin("maprankingstate" , function($join){
            $join->on("maprankingstate.mrs_id", "=", "mapdata.mrs_id");
        })
        ->selectRaw('*, count(racehistory.m_id) as m_count')
        ->groupBy("mapdata.m_id")
        ->orderBy('m_finalrate','desc')
        ->get();
        //dd($track)->array();
        //$track=Track::all();

        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\track\racing-track-index',compact('track'));
        }
        else
        {
            return view ('nocommit');
        }
        
    }
    public function trackCreate()
    {
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\track\racing-track-create');
        }
        else
        {
            return view ('nocommit');
        }
       
    }
    public function trackStore(Request $request)
    {
        $request->validate(([
            'm_name' =>'required','string','max:50','unique:mapdata',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'm_safe'=>'between:1,10',
            'm_smooth'=>'between:1,10',
            'm_cont'=>'between:1,10',
            'm_design'=>'between:1,10',
            'm_pro'=>'between:1,10',
            'm_rate'=>'between:1,10',
            'comfirm'=>'required_without_all',
        ]));

        $final=$request->m_safe+$request->m_smooth+$request->m_cont+$request->m_design+$request->m_pro+$request->m_rate;
        $finalrate=$final/6;
        $rank=0;
        if($finalrate>=8)
        {
            $rank=1;
        }
        elseif($finalrate<=8 and $finalrate>4)
        {
            $rank=2;
        }
        else
        {
            $rank=3;
        }


        $name=$request->file('path')->getClientOriginalName();
        $path=date('YmdHi').$request->file('path')->store('image');
        $file=$request->file('path')->move(public_path('trackimage'), $name);
        $car=Track::create([
            'm_name'=>$request->m_name,
            'm_safe'=>$request->m_safe,
            'm_smooth'=>$request->m_smooth,
            'm_cont'=>$request->m_cont,
            'm_design'=>$request->m_design,
            'm_pro'=>$request->m_pro,
            'm_rate'=>$request->m_rate,
            'm_photopath'=>$path,
            'm_photoname'=>$name,
            'm_final'=>$final,
            'm_finalrate'=>$finalrate,
            'created_at'=> (date('Y-m-d H-i-s')),
            'mrs_id'=>$rank,
            ]);
        session()->flash('message');
        $track=Track::all();
        return redirect()->route('racing-track-index');
    }
    public function trackUpdate(Request $request)
    {
        $request->validate(([
            'm_name' =>'required','string','max:50','unique:mapdata',
            'm_safe'=>'required','between:1,10',
            'm_smooth'=>'required','between:1,10',
            'm_cont'=>'required','between:1,10',
            'm_design'=>'required','between:1,10',
            'm_pro'=>'required','between:1,10',
            'm_rate'=>'required','between:1,10',
        ]));

        $final=$request->m_safe+$request->m_smooth+$request->m_cont+$request->m_design+$request->m_pro+$request->m_rate;
        $finalrate=$final/6;

        $rank=0;
        if($finalrate>=8)
        {
            $rank=1;
        }
        elseif($finalrate<8 and $finalrate>5)
        {
            $rank=2;
        }
        else
        {
            $rank=3;
        }

        DB::table('mapdata')
        ->where('m_id', $request->num)
        ->update([
            'm_name'=>$request->m_name,
            'm_safe'=>$request->m_safe,
            'm_smooth'=>$request->m_smooth,
            'm_cont'=>$request->m_cont,
            'm_design'=>$request->m_design,
            'm_pro'=>$request->m_pro,
            'm_rate'=>$request->m_rate,
            'm_final'=>$final,
            'm_finalrate'=>$finalrate,
            'mrs_id'=>$rank,
            'updated_at'=> (date('Y-m-d H-i-s'))]);

        session()->flash('message');
        $track=Track::all();
        return redirect()->route('racing-track-index');
    }

    public function raceseriesIndex()
    {
        
        $series=series::with('SeriesState')->orderBy('updated_at','desc')->get();
        $cartype=DB::table('cartype')->orderBy('ct_name','asc')->get();
        $track=SeriesTrack::all();
        $car=SeriesCar::all();

        $success=DB::table("raceseries")
        ->select("rs_mstate", "rs_cstate",'rs_id')
        ->where("raceseries.rs_mstate", "=", 1)
        ->where("raceseries.rs_cstate", "=", 1)
        ->where('raceseries.rss_id',"=",1)
        ->get();
        
        if(isset($success))
        {
            foreach($success as $successs)
            {
                DB::table('raceseries')
                ->where('rs_id', $successs->rs_id)
                ->update([
                    'rss_id'=> 2,
                    'updated_at'=> date('Y-m-d H-i-s')]);
            }
        }

        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\series\racing-series-index',compact('series','cartype','track','car'));     
        }
        else
        {
            return view ('nocommit');
        }
           
    }

    public function raceseriesCreate()
    {
        $cartype=Cartype::all();
        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\series\racing-series-create',compact('cartype'));  
        }
        else
        {
            return view ('nocommit');
        }
      
    }

    public function raceseriesStore(Request $request)
    {
        $request->validate(([
            'rs_name' =>'required|string|max:50|unique:raceseries',
            'ct_id'=>'required',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]));

        $name=$request->file('path')->getClientOriginalName();
        $path=date('YmdHi').$request->file('path')->store('image');
        $file=$request->file('path')->move(public_path('seriesimage'), $name);

        $raceseries=Series::create([
            'rs_name'=>$request->rs_name,
            'ct_id'=>$request->ct_id,
            'rs_photopath'=>$path,
            'rs_photoname'=>$name,
            'created_at'=> (date('Y-m-d H-i-s')),
            'updated_at'=> (date('Y-m-d H-i-s')),
            'rss_id'=> '1', 

        ]);

        //dd($series)->array();
        return redirect()->route('racing-series-index');
    }

    public function raceseriesUpdate(Request $request)
    {
        $request->validate(([
            'rs_name' =>'string','max:50', Rule::unique('raceseries')->ignore($request->num , 'rs_id') ,
        ]));
        if($request->comfirm_play=true)
        {
            DB::table('raceseries')
            ->where('rs_id', $request->num)
            ->update([
            'rss_id'=>3,
            'updated_at'=> date('Y-m-d H-i-s')]);
        }
        DB::table('raceseries')
        ->where('rs_id', $request->num)
        ->update([
            'rs_name'=>$request->rs_name,
            'ct_id' => $request->ct_id,
            'updated_at'=> date('Y-m-d H-i-s')]);

        //dd($series)->array();
        session()->flash('message_update');
        return redirect()->route('racing-series-index');
    }

    public function raceseriestrackCreate()
    {

        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('\Racing\series\racing-series-track-create');        
        }
        else
        {
            return view ('nocommit');
        }
        
    }
    

    public function raceseriesstateIndex()
    {
        $series=SeriesState::all();

        $commit=RacingindexController::commit_racing_viewer();
        if($commit==1)
        {
            return view('racing\series\racing-statename-index', compact('series'));  
        }
        else
        {
            return view ('nocommit');
        }
        
    }

    public function raceseriesstateUpdate(Request $request)
    {
        $request->validate(([
            'rss_name' =>['required','string','max:150','unique:raceseriesstate']
        ]));

        DB::table('raceseriesstate')
        ->where('rss_id', $request->num)
        ->update([
            'rss_name'=>$request->rss_name,
            'updated_at'=> date('Y-m-d H-i-s')]);

        session()->flash('message_update');
        return redirect()->route('racing-statename-index');
    }

    public function raceseriesmapCreate($rs_id)
    {
        //can be sort to 2 t1 and t2 
       $series=series::
       with('cartype')
       ->where('rs_id', $rs_id)
       ->get();
       $track=track::with('TrackState')->get();
       $selected=DB::table("raceseriesmap")
       ->where("rs_id", "=", $rs_id)
       ->get();
       //DD($series)->array();
       return view('racing\series\racing-series-map-create',compact('series','track','selected'));
    }
    public function raceseriesmapStore( Request $request)
    {
        $track=$request->m_id;
        $track_extra=$request->m_id_extra;
        //dd($track_extra);

        $request->validate(([
            'm_id' =>['required']
        ]));
        //ramdom map order
        if($request->comfirm==true)
        {
            DB::table('raceseries')
            ->where('rs_id', $request->num)
            ->update(['rs_morder'=>'1']);
            shuffle($track);
        }

        //create main track
        $count_m_id=count($request->m_id);
        for($i=0; $i< $count_m_id ; $i++)
        {
            $trackcr= new SeriesTrack;
            $trackcr->rs_id =$request->num;
            $trackcr->m_id =$track[$i];
            $trackcr->rsm_mo= $i;
            $trackcr->rsm_state= 0;
            $trackcr->created_at=date('Y-m-d H:i:s');
            $trackcr->save();
        }

        //create extra map 
        if($request->comfirm2==true)
        {
            $extra=DB::table("mapdata")
            ->select("m_id")
            ->where("mapdata.mrs_id", "=", 2)
            ->get()
            ->toArray();
            shuffle($extra);
            //dd($extra);
            foreach($extra as $k => $extras)
            {
                $trackcr= new SeriesTrack;
                $trackcr->rs_id =$request->num;
                $trackcr->m_id =$extras->m_id;
                $trackcr->rsm_extra='1';
                $trackcr->rsm_mo= $k;
                $trackcr->rsm_state= 0;
                $trackcr->created_at=date('Y-m-d H:i:s');
                $trackcr->save();
            }
        }
        else
        {
            for($i=0; $i<=4; $i++)
            {
                $trackcr= new SeriesTrack;
                $trackcr->rs_id =$request->num;
                $trackcr->m_id =$track_extra[$i];
                $trackcr->rsm_extra='1';
                $trackcr->rsm_mo= $i;
                $trackcr->rsm_state= 0;
                $trackcr->created_at=date('Y-m-d H:i:s');
                $trackcr->save();
            }
        }
  
        DB::table('raceseries')
        ->where('rs_id', $request->num)
        ->update([
            'rs_mstate'=> '1',
            'updated_at'=> date('Y-m-d H-i-s')]);
       //DD($series)->array();
       session()->flash('message');
       return redirect()->route('racing-series-index');
    }
    
    public function raceseriescarCreate($rs_id)
    {

       $series=series::
       with('cartype')
       ->where('rs_id', $rs_id)
       ->get();

       $car=DB::table("raceseries")
        ->leftJoin("cardata", function($join){
           $join->on("cardata.ct_id", "=", "raceseries.ct_id");
       })
       ->leftjoin('driverdata','driverdata.d_id','cardata.d_id')
       ->select("c_id", "c_name", "c_sname", "c_photoname",  "rs_id", "raceseries.ct_id",'d_name','d_num')
       ->where('raceseries.rs_id',$rs_id)
       ->groupBy("cardata.c_id")
       ->get();
  
       //DD($car)->array();
       return view('racing\series\racing-series-car-create',compact('series','car'));
    }
    public function raceseriescarStore( Request $request)
    {

        $request->validate(([
            'c_id' =>['required']
        ]));
        $car=$request->c_id;
        shuffle($car);
        for($i=0; $i<count($car); $i++)
        {
            $trackcr= new SeriesCar();
            $trackcr->rs_id =$request->num;
            $trackcr->c_id =$car[$i];
            $trackcr->crs_order=$i;
            $trackcr->created_at=date('Y-m-d H:i:s');
            $trackcr->save();
        }

        DB::table('raceseries')
        ->where('rs_id', $request->num)
        ->update([
            'rs_cstate'=> '1',
            'updated_at'=> date('Y-m-d H-i-s')]);

       //DD($series)->array();
       session()->flash('message');
       return redirect()->route('racing-series-index');
    }
    

    //Race record
    public function racetimerecordCreate()
    {
        $car=db::table('cardata')
        ->orderby('c_sname','desc')
        ->get();
        $track=Track::all();
        return view('racing\timerecord\racing-timerecord-create',compact('car','track'));
    }
    public function racetimerecordStore(Request $request)
    {
        $request->validate(([
            'm_id' =>'required',
            'c_id'=>'required',
            'mm' => 'required|between:1,59|integer',
            'ss' => 'required|between:00,59|min:2',
            'ms' => 'required|between:000,999|min:3',
            'comfirm'=>'required_without_all',
        ]));

        $rh_time= $request->mm.':'.$request->ss.'.'.$request->ms;
        $race=RaceHistory::create([
            'm_id'=>$request->m_id,
            'c_id'=>$request->c_id,
            'created_at'=> (date('Y-m-d H-i-s')),
            'rh_time'=> $rh_time, 
        ]);
        session()->flash('message');
        return redirect()->route('racing-timerecord-create');
    }

    //Race series view
    public function racingseries()
    { 
        $series=DB::table("raceseries")
        ->leftJoin("cartype" , function($join){
            $join->on("cartype.ct_id", "=", "raceseries.ct_id");
        })
        ->groupBy("raceseries.rs_id")
        ->orderBy('raceseries.updated_at','desc')
        ->get();
        //dd($series);
        return view('racing\seriesindex\racing-seriesindex-index',compact('series'));
    }

    public function racingseriesdetail($rs_id)
    { 

        //update data

        //找出要更新成績的地圖
        $update_track=DB::table('raceseriesmap')
        ->select(
            'raceseriesmap.rsm_id',
            'raceseriesmap.rs_id',
            'raceseriesmap.m_id',
            'raceseriesmap.rsm_mo',
            'raceseriesmap.rsm_extra',
            'raceseriesmap.rsm_state',
            'raceseriesmap.rsm_mcount',
            DB::raw("(SELECT count(carinraceseries.crs_id)  from carinraceseries WHERE carinraceseries.rs_id = raceseriesmap.rs_id)  as c_count")
        )
        ->rightJoin('mapdata','mapdata.m_id','=','raceseriesmap.m_id')
        ->where('raceseriesmap.rs_id','=',$rs_id)
        ->whereNULL('rsm_extra')
        ->where('rsm_state','=',  DB::raw("(SELECT count(carinraceseries.crs_id)  from carinraceseries WHERE carinraceseries.rs_id = raceseriesmap.rs_id)"))
        ->where('rsm_mcount','=',0)
        ->orderBy('rsm_mo','asc')
        ->first();
 
        $mark=DB::table('raceseriesgetsource')
        ->select('raceseriesgetsource.rssgs_s')
        ->get();
         
         if(isset($update_track))
         {
            //抓全部同一系統+同一地圖的時間
            $history=DB::table('racehistory')
            ->select('rh_time','rh_id','m_id','c_id','rs_id')
            ->where('racehistory.rs_id',$update_track->rs_id)
            ->where('racehistory.m_id',$update_track->m_id)
            ->orderBy('rh_time','asc')
            ->get();
     
            //更新該地圖排名
            $num=1;
            foreach ($history as $k =>$historys)
            {   
                 
                $key=$num++;
                DB::table('racehistory')
                ->where('rh_id', $historys->rh_id)
                ->update(['rs_source'=>$key ,
                        'updated_at'=> date('Y-m-d H-i-s')]);
 
                DB::table('carinraceseries')
                        ->where('rs_id',$historys->rs_id)
                        ->where('c_id', $historys->c_id)
                        ->update(['crs_order'=>$k,
                                'updated_at'=> date('Y-m-d H-i-s')]);
                 
            }

            $updatedriversource=DB::table('racehistory')
                ->select('crs_id','racehistory.c_id','rssgs_s','rs_tsource','racehistory.rs_id')
                ->rightjoin('raceseriesgetsource','raceseriesgetsource.rssgs_id','racehistory.rs_source')
                ->rightjoin('carinraceseries','carinraceseries.c_id','racehistory.c_id')
                ->where('carinraceseries.rs_id',$update_track->rs_id)
                ->where('racehistory.rs_id',$update_track->rs_id)
                ->where('racehistory.m_id',$update_track->m_id)
                ->orderBy('rs_source','asc')
                ->get();

            //更新分數
            $num=1;
            foreach($updatedriversource as $updatedriversources)
            {
                DB::table('carinraceseries')
                ->where('crs_id', $updatedriversources->crs_id)
                ->update
                ([
                    'rs_tsource'=>$updatedriversources->rssgs_s+$updatedriversources->rs_tsource,
                    'crs_ranking'=>$num++,
                    'updated_at'=> (date('Y-m-d H-i-s')),
                ]);
            }

            //更新是否已經更新排名丶分數了
            DB::table('raceseriesmap')
                ->where('m_id', $update_track->m_id)
                ->update(['rsm_mcount'=> 1 ,
                    'updated_at'=> date('Y-m-d H-i-s')]);
        }


        //get information 
        $series=DB::table("raceseries")
        ->leftJoin("cartype" , function($join){
            $join->on("cartype.ct_id", "=", "raceseries.ct_id");
        })
        ->where('raceseries.rs_id','=', $rs_id)
        ->get();

        $tracknl=DB::table('raceseriesmap')
        ->rightjoin('mapdata',function($join){
            $join->on('mapdata.m_id',"=",'raceseriesmap.m_id');
        })
        ->where('raceseriesmap.rs_id',"=",$rs_id)
        ->where('raceseriesmap.rsm_extra',"=" , NULL)
        ->select('rsm_id','rs_id','mapdata.m_id','m_name','m_photoname','mrs_id','rsm_mcount')
        ->orderBy('raceseriesmap.rsm_mo','asc')
        ->get();

        $tracksp=DB::table('raceseriesmap')
        ->rightjoin('mapdata',function($join){
            $join->on('mapdata.m_id',"=",'raceseriesmap.m_id');
        })
        ->where('raceseriesmap.rs_id',"=",$rs_id)
        ->where('raceseriesmap.rsm_extra',"=" ,1)
        ->select('rsm_id','rs_id','mapdata.m_id','m_name','m_photoname','mrs_id')
        ->get();

        $car=DB::table('carinraceseries')
        ->where('carinraceseries.rs_id','=',$rs_id)
        ->leftjoin('cardata','cardata.c_id','carinraceseries.c_id')
        ->rightjoin('driverdata','driverdata.d_id','cardata.d_id')
        ->get();
        
        //setting for creation
        $carnum=DB::table('carinraceseries')
        ->where('carinraceseries.rs_id','=',$rs_id)
        ->get()
        ->count();

        $create=DB::table("raceseriesmap")
        ->where("raceseriesmap.rs_id", "=", $rs_id)
        ->where("raceseriesmap.rsm_mcount", "=", 1)
        ->where("raceseriesmap.rsm_state", "=", $carnum)
        ->where("raceseriesmap.rsm_extra", "=", NULL)
        ->get()
        ->count();

        $total=DB::table('raceseriesmap')
        ->where('raceseriesmap.rs_id','=',$rs_id)
        ->where('raceseriesmap.rsm_extra','=', NULL)
        ->get()
        ->count();
        $record=0;
        if($create == $total)
        {
            $record=1;
        }

        $state=DB::table('raceseries')
        ->select('raceseries.rss_id')
        ->where('raceseries.rs_id','=',$rs_id)
        ->first();

        //
        $history=DB::table('racehistory')
        ->select('racehistory.rh_id','racehistory.rs_id','racehistory.rh_time','racehistory.rs_source','racehistory.m_id',
        'cardata.c_id','cardata.c_name','c_sname','driverdata.d_name','rssgs_s'
        )
        ->leftjoin('cardata','cardata.c_id','racehistory.c_id')
        ->rightjoin('driverdata','driverdata.d_id','cardata.d_id')
        ->rightjoin('raceseriesgetsource','raceseriesgetsource.rssgs_id','racehistory.rs_source')
        ->where('racehistory.rs_id','=',$rs_id)
        ->orderby('racehistory.rs_source')
        ->get();

        $ranking=DB::table('carinraceseries')
        ->rightjoin('cardata','cardata.c_id','=','carinraceseries.c_id')
        ->leftjoin('driverdata','driverdata.d_id','=','cardata.d_id')
        ->where('carinraceseries.rs_id','=',$rs_id)
        ->orderby('rs_tsource','desc')
        ->get();
        
        //display track 
        $tracknlr=$tracknl
        ->where('rsm_mcount','=',1);

        $tracknnf=$tracknl
        ->where('rsm_mcount','=',0);

        $trackcrr=$tracknl
        ->where('rsm_mcount','=',0)
        ->first();

        $tracknxx=$tracknl
        ->where('rsm_mcount','=',0)
        ->skip(1);

        $commit=RacingindexController::commit_racing_viewer();
        //print($record);
        //dd($tracknlr)->array();
        return view('racing\seriesindex\racing-seriesindex-detail',
        compact('series','tracknl','tracksp','car','record','history','ranking','tracknlr','commit','tracknnf','tracknxx','trackcrr','state'));
    }
    public function racingseriesRecord($rs_id)
    { 
        $series=DB::table('raceseries')
        ->where('raceseries.rs_id','=',$rs_id)
        ->first();

        $track=
        DB::table('raceseriesmap')
        ->select(
            'raceseriesmap.rsm_id',
            'raceseriesmap.rs_id',
            'raceseriesmap.m_id',
            'raceseriesmap.rsm_mo',
            'raceseriesmap.rsm_extra',
            'raceseriesmap.rsm_state',
            'mapdata.m_name',
            'mapdata.m_photoname',
            DB::raw("(SELECT count(carinraceseries.crs_id)  from carinraceseries WHERE carinraceseries.rs_id = raceseriesmap.rs_id)  as c_count")
        )
        ->rightJoin('mapdata','mapdata.m_id','=','raceseriesmap.m_id')
        ->where('raceseriesmap.rs_id','=',$rs_id)
        ->whereNULL('rsm_extra')
        ->where('rsm_state','<',  DB::raw("(SELECT count(carinraceseries.crs_id)  from carinraceseries WHERE carinraceseries.rs_id = raceseriesmap.rs_id)"))
        ->orderBy('rsm_mo','asc')
        ->first();
        $map=$track->m_id;

        $car=DB::table('carinraceseries')
        ->where('carinraceseries.rs_id','=',$rs_id)
        ->leftjoin('cardata','cardata.c_id','carinraceseries.c_id')
        ->rightjoin('driverdata','driverdata.d_id','cardata.d_id')
        ->rightjoin('raceseriesmap','raceseriesmap.rs_id','carinraceseries.rs_id')
        ->where('raceseriesmap.m_id',$map)
        ->whereNotExists( function ($query) {
            $query->from('racehistory')
                ->select('racehistory.rh_id')
                ->where('racehistory.c_id','=',DB::raw('carinraceseries.c_id'))
                ->where('racehistory.m_id','=',DB::raw('raceseriesmap.m_id'))
                ->where('racehistory.rs_id','=', DB::raw('carinraceseries.rs_id'));
        })
        ->orderBy('crs_order','asc')
        ->first();
        //print($map);
        //dd($car)->array();

        return view('racing\seriesindex\racing-seriesindex-record',compact('series','car','track'));
    }

    public function racingseriesRecordStore(Request $request)
    {
        $request->validate(([
            'mm' => 'required|between:1,59',
            'ss' => 'required|between:00,59|min:2',
            'ms' => 'required|between:000,999|min:3',
            'comfirm'=>'required_without_all',
        ]));
        $track=DB::table('raceseriesmap')
        ->where('rsm_id','=',$request->rsm_id)
        ->first();

        $rh_time= $request->mm.':'.$request->ss.'.'.$request->ms;
        $race=RaceHistory::create([
        'm_id'=>$request->m_id,
        'rs_id'=>$request->rs_id,
        'c_id'=>$request->c_id,
        'created_at'=> (date('Y-m-d H-i-s')),
        'rh_time'=> $rh_time, 
        ]);
        $state=DB::table('raceseriesmap')
        ->where('rsm_id', $request->rsm_id)
        ->update([
            'rsm_state'=>$track->rsm_state+1,
        ]);

        //dd($track)->array();

        session()->flash('message');
        return redirect()->route('racing-seriesindex-detail',$request->rs_id);
    }
    
    //Track details
    public function racingtracksIndex()
    {
        $track=DB::table("racehistory")
        ->rightJoin("mapdata" , function($join){
            $join->on("racehistory.m_id", "=", "mapdata.m_id");
        })
        ->leftJoin("maprankingstate" , function($join){
            $join->on("maprankingstate.mrs_id", "=", "mapdata.mrs_id");
        })
        ->selectRaw('*, count(racehistory.m_id) as m_count')
        ->groupBy("mapdata.m_id")
        ->orderBy('m_finalrate','desc')
        ->get();
        //dd($track)->array();
        return view('racing\trackindex\racing-trackindex-index',compact('track'));
    }

    public function racingtracksDetail($m_id)
    {
        $record=DB::table('racehistory')
        ->select('racehistory.rh_id','rh_time','racehistory.c_id','racehistory.m_id','racehistory.rs_id','cardata.c_name','driverdata.d_name','driverdata.d_num','driverdata.d_id','raceseries.rs_name')
        ->rightjoin('cardata','cardata.c_id','racehistory.c_id')
        ->rightjoin('cartype','cartype.ct_id','cardata.ct_id')
        ->rightjoin('driverdata','driverdata.d_id','cardata.d_id')
        ->leftjoin('raceseries','raceseries.rs_id','racehistory.rs_id')
        ->where('m_id','=',$m_id)
        ->orderBy('rh_time','asc')
        ->get();
        
        $mapdata=DB::table('mapdata')
        ->where('m_id','=',$m_id)
        ->first();


        //dd($record)->array();
        return view('racing\trackindex\racing-trackindex-detail',compact('record','mapdata'));
    }

    //Driver details
    public function racingdriverIndex()
    {
        $driver=RacingindexController::driver();
        return view('racing\driverindex\racing-driverindex-index',compact('driver'));
    }

    public function racingdriverDetail($d_id)
    {
        //driver information
        $driver=DB::table('driverdata')
        ->where('driverdata.d_id',$d_id)
        ->first();

        //driver's owned cars
        $car=DB::table('cardata')
        ->where('cardata.d_id',$d_id)
        ->get();

        //driver's played series
        $series=DB::table('carinraceseries')
        ->select('carinraceseries.crs_id','carinraceseries.rs_id','carinraceseries.c_id','carinraceseries.rs_tsource','carinraceseries.crs_ranking','cardata.c_name','cardata.c_sname','cardata.ct_id','cardata.d_id','raceseries.rs_name')
        ->leftjoin('cardata','cardata.c_id','carinraceseries.c_id')
        ->rightjoin('raceseries','raceseries.rs_id','carinraceseries.rs_id')
        ->where('cardata.d_id',$d_id)
        ->get();

        //driver's earn series score
        $score=DB::table('carinraceseries')
        ->rightjoin('cardata','cardata.c_id','carinraceseries.c_id')
        ->where("cardata.d_id", "=",$d_id)
        ->sum('rs_tsource');

        $joined=$series
        ->count();

        $carcount=$car->count();

        $firstplace=$series->where('crs_ranking','=',1)->count();

        //dd($joined)->array();
        return view('racing\driverindex\racing-driverindex-detail',compact('driver','car','series','score','joined','carcount','firstplace'));
    }
}