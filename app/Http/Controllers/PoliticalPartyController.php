<?php

namespace App\Http\Controllers;

use App\Models\PoliticalParty;
use Illuminate\Http\Request;

class PoliticalPartyController extends Controller
{
    public function add_party(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);
        $party = new PoliticalParty();
        $party->name = $request->name;

        $party->save();


        return response()->json(["data" => $party],201);
    }

    public function update_party_info(Request $request){
        $request->validate([
            'id'=>'required',
            'name' => 'required|string',
        ]);
        $party = PoliticalParty::where('id', $request->id)->first();
        
        if($party){
            $party->name = $request->name;

            $party->save(); 

            return response()->json(["data" => $party],200);
        }
        else{
            return response()->json(["Error" => "A Candidate with the following information does not exist"],401);
        }
    }
}
