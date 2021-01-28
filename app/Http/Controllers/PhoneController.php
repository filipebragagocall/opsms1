<?php

namespace App\Http\Controllers;

use App\Models\ournumbers;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function add(Request $request){


        $data=$request->validate([
            'phone'   =>'required|numeric',
            'countryCode'=>'required|regex:/^(\d{1}\-)?(\d{1,3})$/'
        ]);
        $data["countryCode"] =  "+".$data["countryCode"];
        if ($data["countryCode"] === "+351"){
        $regex='/^9[12356]\d{6}[0-9]$/';
        $teste = preg_match_all($regex,$data['phone']);
        if ($teste){
            $portugal["phone_number"] = $data["countryCode"] . $data["phone"];
            ournumbers::firstOrCreate($portugal);
            return redirect('/addphone')->with('suc',1);
        }else{
            return redirect('addphone')->with('err','Número de telefone Inválido1');
        }
        }else{
            $estrangeiro["phone_number"] = $data["countryCode"] . $data["phone"];
            if (strlen($estrangeiro["phone_number"])>13){
                return redirect('addphone')->with('err','Número de telefone Excede o limite de 13 caractéres');
            }else
                ournumbers::firstOrCreate($estrangeiro);
                return redirect('/addphone')->with('suc',1);
        }
    }
    public function show(Request $request)
    {
        $all_phone= ournumbers::paginate(5);


        return view('seephone')->with('teste', $all_phone );
    }
    public function Delete(ournumbers $id)
    {
        ournumbers::where('id',$id->id)->delete();
        $all_phone= ournumbers::paginate(5);
        return redirect('phone')->with('teste', $all_phone );
    }
}
