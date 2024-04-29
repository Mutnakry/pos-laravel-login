<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexq($parcatname,$parcatid){
        $tbldistrict = DB::table('tbldistrict')->where('id_provine',$parcatid)->get();
        return view('provine.frmdistric',compact('tbldistrict'))->with('catname',$parcatname)->with('catid',$parcatid);
    }
     
    public function index($parcatname,$parcatid)
    {
        $tbldistrict = DB::table('tbldistrict')
            ->join('tblprovine', 'tblprovine.provine_id', '=', 'tbldistrict.id_provine')->where('id_provine',$parcatid)->get();
        $tblprovine = DB::table('tblprovine')->get();
        return view('provine.frmdistric', ['tbldistrict' => $tbldistrict, 'tblprovine' => $tblprovine])->with('catname',$parcatname)->with('catid',$parcatid);
        // $tbldistrict=DB::table('tbldistrict')->get();
        // return view('provine.frmdistric',compact('tbldistrict'));
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

    // public function show($id)
    // {
    //     // Retrieve the district by its ID
    //     $tbldistrict = DB::table('tbldistrict')
    //         ->where('id', $id)
    //         ->join('tblprovine', 'tblprovine.provine_id', '=', 'tbldistrict.id_provine')
    //         ->first(); // Use first() to get a single record
    
    //     // Retrieve provinces (if needed)
    //     $tblprovine = DB::table('tblprovine')->get();
    
    //     // Return the view with district and province data
    //     return view('provine.frmdistric', ['tbldistrict' => $tbldistrict, 'tblprovine' => $tblprovine]);
    // }
    
 


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(district $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, district $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(district $district)
    {
        //
    }
}
