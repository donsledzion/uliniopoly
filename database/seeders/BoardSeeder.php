<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
            'name' => 'uliniopoly.boards.names.default',
            'description' => 'uliniopoly.boards.descriptions.default',
        ]);

        for($i = 1 ; $i < 41 ; $i++) {
            if($i === 1){ // start field
                $field = 2 ;
            } else if($i ===11){ // jail field
                $field = 3 ;
            } else if($i ===21){ // free parking field
                $field = 5 ;
            } else if($i ===31){ // go to jail field
                $field = 4 ;
            } else if(($i === 6)||($i === 26)){ // carriers - Boguś Bus
                $field = 6 ;
            } else if(($i === 16)||($i === 36)){ // carrier - PKS
                $field = 7 ;
            } else if($i ===13){ // services - septic
                $field = 8 ;
            } else if($i ===29){ // services - garbage
                $field = 9 ;
            } else if(($i === 3)||($i === 18)||($i === 34)){ // chance
                $field = 10 ;
            }else if(($i === 8)||($i === 23)||($i === 37)){ // risk
                $field = 11 ;
            } else if($i === 5){ // tax - income
                $field = 12 ;
            } else if($i === 39){ // go to jail field
                $field = 13 ;
            } else if($i === 2 ){ // property 1-1
                $field = 14 ;
            } else if($i === 4 ){ // property 1-2
                $field = 15 ;
            }else if($i === 7 ){ // property 2-1
                $field = 16 ;
            }else if($i === 9 ){ // property 2-2
                $field = 17 ;
            }else if($i === 10 ){ // property 2-3
                $field = 18 ;
            }else if($i === 12 ){ // property 3-1
                $field = 19 ;
            }else if($i === 14 ){ // property 3-2
                $field = 20 ;
            }else if($i === 15 ){ // property 3-3
                $field = 21 ;
            }else if($i === 17 ){ // property 4-1
                $field = 22 ;
            }else if($i === 19 ){ // property 4-2
                $field = 23 ;
            }else if($i === 20 ){ // property 4-3
                $field = 24 ;
            }else if($i === 22 ){ // property 5-1
                $field = 25 ;
            }else if($i === 24 ){ // property 5-2
                $field = 26 ;
            }else if($i === 25 ){ // property 5-3
                $field = 27 ;
            }else if($i === 27 ){ // property 6-1
                $field = 28 ;
            }else if($i === 28 ){ // property 6-2
                $field = 29 ;
            }else if($i === 30 ){ // property 6-3
                $field = 30 ;
            }else if($i === 32 ){ // property 7-1
                $field = 31 ;
            }else if($i === 33 ){ // property 7-2
                $field = 32 ;
            }else if($i === 35 ){ // property 7-3
                $field = 33 ;
            }else if($i === 38 ){ // property 8-1
                $field = 34 ;
            }else if($i === 40 ){ // property 8-2
                $field = 35 ;
            } else {
                $field = 1 ;
            }
            DB::table('board_slot_field')->insert([
                'board_id' => 1,
                'board_slot_id' => $i,
                'field_id' => $field,
            ]);
        }
    }
}
