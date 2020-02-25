<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\urunlers;
use Session;
use App;
class homepage extends Controller
{
    public function index($dil='tr'){
        App::setLocale($dil);
        $session=Session::get('urunler');
        $urunlers=urunlers::get();
        
          return view('index',compact('session','urunlers'));

    }
    public function indexpost()

    {
        return view('ajax');


    }
    public function ajaxpost(Request $request)

    {

 
 if($request->ajax()){
    $id = $request->dataid;
    $adet = $request->dataadet;
    $fiyat = $request->datafiyat;
    $dil = $request->datadil;
    App::setLocale($dil);

    $urunlerss = urunlers::where('id', $id)->get();
    $array= [
    'id'=>$id,
    'adet'=>$adet,
    'fiyat'=> $fiyat
    ];
    Session::push('urunler', $array);
   

     $session=Session::get('urunler');

    $data = view ('ajax', compact('urunlerss','session'))->render() ;
    return response()->json( $data );
    
  }

 


    }

    public function sil()

    {

        return redirect('/');         

    }

    public function ajaxsil(Request $request)

    {
        if($request->ajax()){
            $id=$request->dataid;
     
           $urunler= Session::get('urunler');

           foreach ($urunler as $key=>$value) {
               
    if($value['id']==$id){
        Session::pull('urunler.'.$key);
    }

    }

            return response()->json( "ok");


        }
    }
    public function ajaxall()

    {
        return view('index');           
    
    }
    public function ajaxallsil()

    {
        Session::flush();
    
    }
    
}
