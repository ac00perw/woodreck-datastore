<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\State;

class studentLoan2019 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file(storage_path('app/data/student_loan_debt_and_borrowers.csv'));

        $count = 0;
        DB::table('student_loans_2019')->truncate();
        foreach($data as $s){
            $field = explode(",", $s);
            $state = $field[0];
            if($count > 0){  //skip headers
                $stateObj = State::where('name', '=', $state)->first();
                if(!empty($stateObj)){
                    DB::table('student_loans_2019')
                        ->insert([
                            'state_id' => $stateObj->id, 
                            'borrowers' => $field[1],
                            'debt' => $field[2]
                        ]);
                    print "{$field[2]} {$stateObj->name} :::\r\n";

                            
                }
            }
            $count ++;
        }
    }
}
