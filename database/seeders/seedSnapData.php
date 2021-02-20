<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Snap;
use Carbon\Carbon;

class seedSnapData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('snaps')->update(['ppl_snap_sept_2019' => 0, 'ppl_snap_sept_2020' => 0]);
        // $snap = Storage::get('data/29SNAPcurrPP-1.csv', 'Contents');
        $snap = file(storage_path('app/data/29SNAPcurrPP-1.csv'));
        foreach($snap as $s){
            $line = explode(",", $s);
            $state = $line[0];
            $num = (int)str_replace(['"', ','], '', $line[1]);
            $num2 = (int)str_replace(['"', ','], '', $line[5]);

            //get state name
            $stateObj = State::where('name', '=', $state)->first();
            if(!empty($stateObj)){
                DB::table('snaps')
              ->where('state_id', $stateObj->id)
              ->update(['ppl_snap_sept_2019' => $num, 'ppl_snap_sept_2020' => $num2 ]);
                print "{$stateObj->abbrev} :::\r\n";
            }
           // print_r($line)."\r\n";         
        }
   //$line[0] = '1004000018' in first iteration
   
        // dd($snap);
    }
}
