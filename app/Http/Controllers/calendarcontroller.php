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



        $input = \Request::all();



        if($input["insert"] == "insert"){


            DB::table('light_notes')
                ->insert(array('uid'=>1,
                    'title' => $input["title"],
                    'level' =>$input["level"],
                    'content' => $input["content"],
                    'hap_time' => $input["hap_time"],
                    'created_at' => Carbon::now()));
        }

        //dd($input);

        $query_red=DB::table('light_notes')
            ->where('level','=','red')
            ->get();
        $query_yellow=DB::table('light_notes')
            ->where('level','=','yellow')
            ->get();
        $query_green=DB::table('light_notes')
            ->where('level','=','green')
            ->get();

        $rs_level=array(
            'red' => $query_red,
            'yellow' => $query_yellow,
            'green' => $query_green

        );




        return view('light_notes/index')->with('rs_level',$rs_level);




    }
    
    public function content(){




        $query_red=DB::table('light_notes')
            ->where('level','=','red')
            ->get();
        $query_yellow=DB::table('light_notes')
            ->where('level','=','yellow')
            ->get();
        $query_green=DB::table('light_notes')
            ->where('level','=','green')
            ->get();

        $rs_level=array(
            'red' => $query_red,
            'yellow' => $query_yellow,
            'green' => $query_green

        );

        //dd($rs_level);
        return View::make('light_notes/index')->with('rs_level',$rs_level);
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
    public function delete(){
        return View::make('light_notes/edit');
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


        $u_id_wf=DB::table('workoff')
            ->where('u_id',$id)
            ->select('created_at as workoff')
            ->get();


        $query_wn = DB::table('workon')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();


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

        return View::make('clock/view')->with('u_rs', $u_rs);



    }


    public function update(){


        return View::make('light_notes/index');

    }
    public function destroy($id){
        light_notes::where('id',$id)->delete();
        return redirect('light_notes/index');
    }



}
