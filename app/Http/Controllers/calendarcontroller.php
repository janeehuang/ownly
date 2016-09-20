<?php

namespace App\Http\Controllers;

use App\light_notes;
use App\users;
use App\workoff;
use App\workon;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class calendarcontroller extends Controller
{

    public function index(){

        //$query = light_notes::all();
        //return view('light_notes/index',compact('query'));


        $input = \Request::all();
        //dd($input);

        if($input["insert"] == "insert"){


            DB::table('light_notes')
                ->insert(array('u_id'=>1,'title' => $input["title"], 'content' => $input["content"], 'hap_time' => $input["hap_time"], 'created_at' => Carbon::now()));
        }

        //dd($input);

        $query=DB::table('light_notes')
            ->get();




        return view('light_notes/index')->with('query',$query);




    }
    
    public function content(){
        $query=DB::table('light_notes')
            ->get();
        return View::make('light_notes/index')->with('query',$query);
    }

    public function add(){

        return View::make('light_notes/create');
    }





    public function welcome(Request $request)

    {
        $input = \Request::all();
        //dd($input);

        $query_name=DB::table('members')
            ->where('m_email', '=', $input['email'])
            ->where('m_pwd','=',$input['pwd'])
            ->select('m_name')
            ->get();
        //dd($query_name);



        $rs = array(
            'name' => $query_name,

        );


        return view('welcome')->with("rs",$rs);
        //, compact('query'))





    }
    public function create()
    {
        return view('SignUp');
    }

    public function store(Request $request)
    {
        //dd($request);

        //return view ('login');

        $input = \Request::all();

        //dd($input);



        if($input["join"] == "Join Now"){


            DB::table('members')
                ->insert(array('m_name' => $input["name"], 'm_email' => $input["email"], 'm_pwd' => $input["pwd"], 'created_at' => Carbon::now()));
        }





        return View::make('login');
        //return view('clock/show');

        //return $request->all();
    }


    public function goSearch()
    {

        
        $rs = array(
            'list' => null,
            'bgn' => null,
            'end' => null
        );

        
        return View::make('/clock/selfservice')->with('rs', $rs);
    }
    public function getSearch()
    {

        $input= \Request::all();
        $uid = $input['uid'];
        //dd($input['q']);
        //get keywords input for search
        $f_time = $input['q'];
        $s_time = $input['e'];
        $list_wn = DB::table('workon')
            ->whereBetween('created_at', [$f_time, $s_time])
            ->Where(function($query_wn) use ($uid)
            {

                if( $uid !="")
                    $query_wn->where('u_id', '=',$uid );


            })
            ->get();


        //$uid =DB::table('workon')
          //  -> where('u_id', '=', $_POST['uid'])->get();
        //$list_wf = DB::table('workoff')
           // ->whereBetween('created_at',[$input['q'],$input['e']]);
        //search that student in Database
        //$date= workon::find($keyword);
        $rs = array(
            'list' => $list_wn,
            //'list_wf'=>$list_wf,
            //'uid' =>$list_uid,

            'bgn' => $input['q'],
            'end' => $input['e']
        );
        //dd($rs);
        //return display search result to user by using a view
        return View::make('/clock/selfservice')->with('rs', $rs);
    }
    public function f_id(Request $request){
        $input = \Request::all();

            $id=$input['id'];
        //dd($id);

        //抓名字
        $user = DB::table('user')->where('u_id', $id)
            ->select('u_name')
            ->get();
        //$uid = DB::table('user')
            //->leftjoin('workon', 'workon.u_id', '=', 'user.u_id')
          //  ->where('u_name','=',$id)
            //->get();
        //dd($user);
        $u_id_wn=DB::table('workon')
            ->where('u_id',$id)
            ->select('created_at as workon')
            ->get();
        //    $u_id_wn = DB::table('user')
                //->where('user.u_id', '=', $id)
          //      ->join('workon', 'workon.u_id', '=', 'user.u_id')
                //->join('workoff', 'workoff.u_id', '=', 'user.u_id')
            //    ->select('user.u_name','workon.created_at AS workon')
              //  ->get();
        //dd($u_id_wn);

        $u_id_wf=DB::table('workoff')
            ->where('u_id',$id)
            ->select('created_at as workoff')
            ->get();

        //$u_id_wf = DB::table('user')
            //->where('user.u_id', '=', $id)
            //->leftjoin('workon', 'workon.u_id', '=', 'user.u_id')
          //  ->join('workoff', 'workoff.u_id', '=', 'user.u_id')
            //->select('user.u_name','workoff.created_at AS workoff')
            //->get();
        //dd($u_id_wf);
        $query_wn = DB::table('workon')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();

        //dd($query);
        //$query_end = DB::table('workoff') ->get();
        //$query = DB::table('workon') ->get();

        $query_wf = DB::table('workoff')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();

        //dd($query_wn);
        $u_rs=array(
            'u_nm' => $user,
            'u_wn' => $u_id_wn,
            'u_wf' => $u_id_wf,
            'wn' => $query_wn,
            'wf' => $query_wf
        );
        // DB::table('workon')
        //   ->where('u_id', 1)
        // ->update(['created_at' => Carbon::now()]);



        //$query_us =DB::table('workon') ->get('u_id');
        //->whereBetween('created_at', ['2016-07-01', '2016-07-15 '])->get();
        //$on_time=workon::find(1);
        //echo $on_time->users->u_id;





       // $rs = array(
         //   'workon' => $query_wn,
          //  'workoff' => $query_end,
           // 'search' => $query_wn,
        //);


       // return view('clock/view')->with("rs",$rs);
        //, compact('query'))



        //dd($u_rs);

        return View::make('clock/view')->with('u_rs', $u_rs);



    }




}
