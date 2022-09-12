<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\UserLevel;
use App\Models\SeriesSource;
use App\Models\SeriesState;
use App\Models\MapState;
use App\storage\sessions;


class userlevelController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function GL_userlevel()
    {
        $user_level = DB::table('user_level')->get();
        $userData = Auth::user()->lv_id;
        //print($userData);
        if(empty($userData))
        {
            $user_level_n="New users";
        }
        else
        {
            foreach($user_level as $users_level)
            {
                if($users_level->lv_id==$userData)
                {
                    $user_level_n=$users_level->lv_name;
                    break;
                }
            }
        }
        return($user_level_n);
    }
    
  

    public function userlevel()
    {
        $user_level_n=userlevelController::GL_userlevel();
        //print($user_level_n);

        //database basic 
        $db1=DB::table('raceseriesgetsource')
        ->count();
        $db2=DB::table('user_level')
        ->count();
        $db3=DB::table('raceseriesstate')
        ->count();
        $de_setting=0;
        if($db1==0 and $db2==0 and $db3 ==0)
        {
            $de_setting=1;
        }

        //print($de_setting);
        //dd($db3)->array();
        return view ('dashboard',compact('user_level_n','de_setting'));
    }

    public function db_data()
    {
        return view('db_data');
    }
    
    public function db_dataStore(Request $request)
    {
        
        $score=$request->score;
        $state=$request->state;
        $map=$request->rank;

        $user = new UserLevel;
        $user->lv_name =$request->lv_name;
        $user->save();

        foreach($score as $k=> $scores)
        {
            $ins= new SeriesSource;
            $ins->rssgs_s = $scores;
            $ins->save();
        }

        foreach($state as $j=> $states)
        {
            $ins= new SeriesState;
            $ins->rss_name = $states;
            $ins->save();
        }

        foreach($map as $s=> $maps)
        {
            $ins= new MapState;
            $ins->mrs_name = $maps;
            $ins->save();
        }


        //print($score);
        //dd($state)->array();
        return('finish');
    }

    public function index()
    {
        
        $user_level = DB::table('user_level')->get();
        //print(Auth::user()->lv_id);
        //$user_level=DB::user_level();
        //print($user_level);
        $user=DB::table('users')->get();
        
        
        if( Auth::user()->id==1)
        {
            return view ('auth.userlevel',compact('user_level','user'));
        }
        else
        {
            return view ('nocommit',['user_level' => $user_level]);
        }
        
    }
    
    public function create()
    {
        return view('auth.userlevel-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lv_name' => ['required', 'string', 'max:255', 'unique:user_level'],
            'comfirm'=>'required_without_all',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $user = new UserLevel;
        $user->lv_name =$request->lv_name;
        if(isset($request->image))
        {
            $name = $request->file('path')->getClientOriginalName();
            $path = $request->file('path')->store('image');
            $file = $request->file('path');
            $user->photo_name = $name;
            $user->path=$path;
        }
        $user->save();
        session()->flash('message');
        //$request->session()->flash('alret-success', 'Show Success alert');
        return redirect(RouteServiceProvider::LV);
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function usersupdate(Request $request)
    {
        DB::table('users')
        ->where('id', $request->num)
        ->update(['name'=>$request->name,
            'email'=>$request->mail,
            'lv_id'=>$request->lv_id,
            'updated_at'=>date('Y-m-d H:i:s'),]);

        session()->flash('message_update');
        return redirect(RouteServiceProvider::LV);
    }
    public function destory($user_id)
    {
        DB::table('users')->where('id',$user_id)->delete();
        session()->flash('message_delete');
        return redirect(RouteServiceProvider::LV);
    }
}
