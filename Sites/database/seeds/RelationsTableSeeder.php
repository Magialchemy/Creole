<?php

use Illuminate\Database\Seeder;
use App\Relation;

class RelationsTableSeeder extends Seeder
{
	public function insert($id,$num,$word,$form){
    	for($i = 0;$i < $num;$i++){
	        $relation = new Relation;
	        $param = [
               'word_id' => $id,
	       	   'word' => $word,
	           'form' => $form,
            ];
	        $relation->fill($param)->save();
    	}
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->insert(1,167,'朝顔','名詞');
    	$this->insert(1,156,'星空','名詞');
    	$this->insert(1,141,'かき氷','名詞');
    	$this->insert(1,137,'すいか','名詞');
    	$this->insert(1,126,'金魚','名詞');
    	$this->insert(1,112,'花火','名詞');
    	$this->insert(1,100,'風鈴','名詞');
    	$this->insert(1,81,'山','名詞');
    	$this->insert(1,64,'入道雲','名詞');
    	$this->insert(1,51,'ひまわり','名詞');
    	$this->insert(1,45,'涼む','動詞');
    	$this->insert(1,37,'暑い','形容詞');
        $this->insert(1,25,'旅行','名詞');
        $this->insert(1,17,'山','名詞');
        $this->insert(1,15,'お盆','名詞');
    }
}
