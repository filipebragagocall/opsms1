<?php

namespace App\Http\Controllers;

use App\Models\listas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class listaController extends Controller
{

    // Criar uma lista
    public function lista(Request $request){
        $data=$request->validate([
            'name'   =>'required',
            'message'=>'required'
        ]);
        $t="";
        $message= $data["message"];
        $regex='/^[92][12356789]\d{6}[0-9]$/';
        $myArray = explode(',', $message);

        foreach ($myArray as $item){
            $teste = preg_match_all($regex,$item);
            if ($teste){
                if ($t==""){
                    $t = $item;
                }else
                    $t = $t ."," . $item;

            }
            else{
                $tat = explode(';', $item);
                foreach ($tat as $tes){
                    $teste = preg_match_all($regex,$tes);
                    if ($teste){
                        if ($t==""){
                            $t = $tes;
                        }else
                            $t = $t ."," . $tes;
                    }else{
                        dd($t);
                        return redirect('/lista')->with('err','Erro, Não corresponde ao formato correto');
                    }
                }
            }

        }
        $db["name"]=$data["name"];
        $db["numbers"]=$t;
        $db["user_id"] = Auth::user()->id;
        listas::create($db);
        return redirect('/lista')->with('suc','Done');
    }
    // Apagar uma lista, caso seja da pessoa própria pessoa ou no caso de ser admin de apagar de todos
    public function deletelist(listas $id){
        if (Auth::user()->Admin){
            listas::where('id',$id->id)->delete();
            return redirect('editlist')->with('suc','yes');
        }else if ($id->user_id === Auth::user()->id){
            listas::where('id',$id->id)->delete();
            return redirect('editlist')->with('suc','yes');
        }else
            return redirect('editlist');
    }

    // Editar lista pelo id
    public function listeditid(listas $id, Request $request){

        $data=$request->validate([
            'listas'   =>'integer|required',
            'numeros'=>'required'
        ]);
        $t="";
        $message= $data["numeros"];
        $regex='/^9[12356]\d{6}[0-9]$/';
        $myArray = explode(',', $message);

        foreach ($myArray as $item){
            $teste = preg_match_all($regex,$item);
            if ($teste){
                if ($t==""){
                    $t = $item;
                }else
                    $t = $t ."," . $item;

            }
            else{
                $tat = explode(';', $item);
                foreach ($tat as $tes){
                    $teste = preg_match_all($regex,$tes);
                    if ($teste){
                        if ($t==""){
                            $t = $tes;
                        }else
                            $t = $t ."," . $tes;
                    }else{
                        $redirect="editlist/".$id->id."";
                        return redirect($redirect)->with('err','Erro, Não corresponde ao formato correto');
                    }
                }
            }

        }
        listas::where('id',$id->id)
            ->update(['numbers'=>$t]);
        $redirect="editlist/".$id->id."";
        return redirect($redirect)->with('suc','Lista Atualizada com sucesso');
    }

    // Caso o utilizador altere algum dado.

    public function listedit(listas $id){
        if (Auth::user()->Admin)
            return view('editlistbyid')->with('lista',$id);
        else if ($id->user_id === Auth::user()->id){
            return view('editlistbyid')->with('lista',$id);
        }else
            return redirect('editlist');
    }

    // mostar ao utilizador os dados da lista.

    public function listshow(Request $request){
        if (!Auth::user()->Admin) {

            $list = listas::whereHas("user", function ($query) {
                return $query->where("id", auth()->user()->id);
            })->paginate(8);
        } else
        {
            $list = listas::paginate(8);
        }
        return view('editlist')->with('lista', $list);
    }


}
