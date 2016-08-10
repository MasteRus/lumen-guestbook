<?php

use Illuminate\Database\Seeder;
class GuestbookSeeder extends Seeder {
 
       public function run()
       {
         //We will burn everything, Mu-ha-ha...
         DB::table('guestbooks')->delete();
         //And will create it again...
         DB::table('guestbooks')->insert(array(
             array('name'=>'john','title'=>'Sell garage','message'=>'Subj'),
             array('name'=>'Gamlet','title'=>'2 beer or not 2 beer','message'=>'All Alkoparties starts with that question!'),
             array('name'=>'Ngbongo Mukamba','title'=>'Nigerian cosmonaut in a open space','message'=>'I was forgotten in russian space station \'Mir\'... '),
          ));
       }
 
}