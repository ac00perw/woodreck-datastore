<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Snap;
use Carbon\Carbon;

class seedHomelessData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file(storage_path('app/data/homeless.csv'));
        $count = 0;
        DB::table('homeless_2019')->truncate();
        foreach($data as $s){
            $line = explode(",", $s);
            $state = $line[1];
            if($count > 0){ 
                // $num = (int)str_replace(['"', ','], '', $line[3]);

                $stateObj = State::where('abbrev', '=', $state)->first();
                if(!empty($stateObj)){
                            // $num2 = (int)str_replace(['"', ','], '', $line[5]);
                    DB::table('homeless_2019')
                        ->insert(['state_id' => $stateObj->id, 'homeless_pop' => $line[3]]);
                    print "{$line[3]} {$stateObj->abbrev} :::\r\n";

                            
                }
            }
            $count ++;
        }

    }
}
