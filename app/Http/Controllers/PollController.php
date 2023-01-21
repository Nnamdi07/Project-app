<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function add_candidate(Request $request){  //function to create/register a new candidate that decides to run 
        $request->validate([
            'name' => 'required|string',
            'political_party_id' => 'required',
            'position_id' => 'required',
        ]);
        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->political_party_id = $request->political_party_id;
        $candidate->position_id = $request->position_id;

        $candidate->save();


        return response()->json(["data" => $candidate],201);
    }
    public function update_candidate_info(Request $request){    //function to edit or update the information of anuy candidate that decides to run.
        $request->validate([
            'id'=>'required',
            'name' => 'required|string',
            'political_party_id' => 'required',
            'position_id' => 'required',
        ]);

        $candidate = Candidate::where('id', $request->id)->first();

        if($candidate){
            $candidate->name = $request->name;
            $candidate->political_party_id = $request->political_party_id;
            $candidate->position_id = $request->position_id;

            $candidate->save(); 

            return response()->json(["data" => $candidate],200);
        }
        else{
            return response()->json(["Error" => "A Candidate with the following information does not exist"],401);
        }
    }
}
