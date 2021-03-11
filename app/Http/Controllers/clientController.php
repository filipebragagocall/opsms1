<?php

namespace App\Http\Controllers;



use App\Models\client;
use App\Models\sendedsms;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class clientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request){
        $data=$request->validate([
           'username' => 'required',
           'password' => 'required'
        ]);
        try {
            $user = User::where('username',$data["username"])->firstorfail();

        } catch (ModelNotFoundException $exception) {
            return back()->withError('O utilizador não foi encontrado')->withInput();
        }
        if (Hash::check($data["password"], $user->password)){

            $email = $user->email;


            $user=Auth::attempt([ "email" => $email , "password" => $request->input("password") ], true);

            $sms= sendedsms::where('user_id',Auth::user()->id)->get()->last();
            return redirect('/')->with('userinfo', $sms);
        }
        else{
            return back()->withError('Password errada')->withInput();
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'password' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone_number' => 'min:9|max:9|required'
        ]);


        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        Auth::login($user, true);
        //Artisan::call('migrate:fresh --seed');
        //dd($user);
        return redirect('Welcome')->with('suc','Done');
//        return \response()->json(client::create($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function change (Request $request){
        $data=$request->validate([
            'Email' => 'required',
            'phone' => 'required'
        ]);
        $email = Auth::user()->email;
        $phone = Auth::user()->phone_number;
        if ($request->password === null){
            if ($email !== $data["Email"] && $phone !== $data["phone"] ){
                User::where('id',Auth::user()->id)
                    ->update([
                        'email' => $data["Email"],
                        'phone_number' => $data["phone"]
                    ]);
                return redirect('/settings')->with('phem','Phone number and email changed'); //
            }elseif ($email !== $data["Email"]){
                User::where('id',Auth::user()->id)
                    ->update([
                        'email' => $data["Email"]
                    ]);
                return redirect('/settings')->with('em','Email changed'); //
            }elseif ($phone !== $data["phone"]){
                User::where('id',Auth::user()->id)
                    ->update([
                        'password' => $data["password"],
                        'phone_number' => $data["phone"]
                    ]);
                return redirect('/settings')->with('ph','Phone changed');
            }
        }else{
            $data["password"] = $request->password;

        if (Hash::check($request->oldpassword, Auth::user()->password)){
            if ($email !== $data["Email"] && $phone !== $data["phone"] ){
                User::where('id',Auth::user()->id)
                    ->update([
                        'password' => $data["password"],
                        'email' => $data["Email"],
                        'phone_number' => $data["phone"]
                        ]);
                return redirect('/settings')->with('Sucesso','All changed');
            }elseif ($email !== $data["Email"]){
                User::where('id',Auth::user()->id)
                    ->update([
                        'password' => $data["password"],
                        'email' => $data["Email"]
                    ]);
                return redirect('/settings')->with('pwem','Password and Email changed');
            }elseif ($phone !== $data["phone"]){
                User::where('id',Auth::user()->id)
                    ->update([
                        'password' => $data["password"],
                        'phone_number' => $data["phone"]
                    ]);
                return redirect('/settings')->with('pwph','Password and phone Number changed');
            }else{
                $data["password"] = Hash::make($data["password"]);
                User::where('id',Auth::user()->id)
                    ->update(['password' => $data["password"]]);
                return redirect('/settings')->with('pw','Password changed');
            }
        }else{
            return redirect('/settings')->with('Error','Password dindt match changed');
        }
        return redirect('/settings')->with('Erro','something went wrong');
        }
    }
}
