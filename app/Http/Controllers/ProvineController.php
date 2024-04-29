<?php

namespace App\Http\Controllers;

use App\Models\provine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tblprovine=DB::table('tblprovine')->get();
        return view('provine.frmprovine',compact('tblprovine'));

    //     $tbldistrict = DB::table('tbldistrict')
    //     ->join('tblprovine', 'tblprovine.provine_id', '=', 'tbldistrict.id_provine')->get();
    // $tblprovine = DB::table('tblprovine')->get();
    // return view('provine.frmdistric', ['tbldistrict' => $tbldistrict, 'tblprovine' => $tblprovine]);
    }
 /**
     * Display the specified resource.
     */

    //  public function show(provine $provine)
    //  {
    //      $tbldistrict = DB::table('tbldistrict')
    //          ->join('tblprovine', 'tblprovine.provine_id', '=', 'tbldistrict.id_provine')
    //          ->where('tblprovine.provine_id', $provine->id)
    //          ->get();
    //          $tblprovine = DB::table('tblprovine')->get();
     
    //      if($tbldistrict) {
    //          return view('provine.frmdistric', ['tbldistrict' => $tbldistrict, 'tblprovine' => $tblprovine]);
    //      } else {
    //          return redirect()->back()->with('message', "No District");
    //      }
    // }
     




    public function show11(provine $provine)
    {
        $tbldistrict=DB::table('tblprovine')->where('provine_id',$provine);
        if($tbldistrict){
             return view('provine.frmdistric',compact('tbldistrict'));
        }
        else{

            return redirect()->back()->with('message',"No District");
        }
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(provine $provine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, provine $provine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(provine $provine)
    {
        //
    }
}
