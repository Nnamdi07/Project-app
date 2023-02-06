<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
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

        $candidate = Candidate::where('political_party_id', $request->political_party_id)->where('position_id', $request->position_id)->where('name', $request->name)->first();

        if(!$candidate){
            $candidate = new Candidate();
            $candidate->name = $request['name'];
            $candidate->political_party_id = $request['political_party_id'];
            $candidate->position_id = $request['position_id'];

            $candidate->save();

            return response()->json(["data" => $candidate],201);
        }
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
            $candidate->name = $request['name'];
            $candidate->political_party_id = $request['political_party_id'];
            $candidate->position_id = $request['position_id'];

            $candidate->save(); 

            return response()->json(["data" => $candidate],200);
        }
        else{
            return response()->json(["Error" => "A Candidate with the following information does not exist"],401);
        }
    }

    public function add_ballot(Request $request){
        $request->validate([
            'voter_id' => 'required|string',
            'political_party_id' => 'required',
            'candidate_id' => 'required',
        ]);

        $ballot = Ballot::where('voter_id', $request->voter_id)->where('political_party_id', $request)->first();

        if(!$ballot){
            $ballot = new Ballot();
            $ballot->name = $request['name'];
            $ballot->political_party_id = $request['political_party_id'];
            $ballot->position_id = $request['position_id'];

            $ballot->save();

            return response()->json(["data" => $ballot],200);
        }

        
    }
}
