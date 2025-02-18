<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\msa;
use Schema;

class MsaController extends Controller
{
    //

    public function msa(){
        $msadata = msa::all();
        
        return view('msa', compact('msadata'));
    }

    public function addmsa(Request $request){

        DB::table('msa')->insert([
            'applicant_name' => $request->input('applicantname'),
            'applicant_number' => $request->input('applicantnumber'),
            'patented_subsisting' => $request->input('status'),
            'location' => $request->input('location'),
            'survey_no' => $request->input('surveynumber'),
            'remarks' => $request->input('remarks')
        ]);
    

        return back()->with('success', 'Applicant added successfully');
    }

    public function delete($id_msa){
        // $msa = msa::where($id_msa, 'id_msa')->first();

        // if ($msa) {
        //     $msa->delete();
        //     return back()->with('success', 'Record deleted successfully.');
        // }
    
        // return back()->with('error', 'Record not found.');
        
        $deleted = DB::table('msa')->where('id_msa', $id_msa)->delete();
   
   if($deleted){
    return back()->with('success', 'Record successfully deleted.');
   }
   else{
    return back()->with('error', 'Record not found.');
   }
    }
}
