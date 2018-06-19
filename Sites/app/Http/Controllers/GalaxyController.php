<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Relation;
use App\Word;

class GalaxyController extends Controller
{
    public function homePage()
    {
    	return view('galaxy.home');
    }

    public function showSolarSystem(Request $request){
        //既存のデータがあればそのデータをつかう
        if(!$request->topic){
            return view('galaxy.home');
        }
        $solarSystem = 0;
        $x = rand(0,200);
        $y = rand(0,200);
        $number = ['one','two','three','four','five','six','seven','eight','nine','ten'];
        $ext = 10;
        $int = 5;
        $
        $wordinfo = Word::where('word', $request->topic)->first();
        if (!$wordinfo) {
            //失敗したら新しくデータを取得するようにする
            //とりあえずparam

            $param = [
                'solarSystem' => $solarSystem,
                'topic' => '',
                'planets' => '',
                'sum' => '',
                'positionX' => $x,
                'positionY' => $y,
                'number' => $number,
                'ext' => $ext,
                'int' => $int,
            ];
            return view('galaxy.galaxy',$param);
        }
        $wordinfos[] = $wordinfo;
        //IDからリレーションを取る
        //group by 単語で単語ごとの出現回数を出したい
        foreach($wordinfos as $winfo){
            $relationinfo[$solarSystem] = Relation::idEqual($winfo->id)->groupBy('word')->select(DB::raw('count(*) as counts,word,max(form) as forms'))->orderBy('counts','desc')->get();
            $sum[$solarSystem] = 0;
            foreach($relationinfo[$solarSystem] as $rinfo){
                $forms[$solarSystem][] = Relation::where('word',$rinfo->word)->first()->form;
                $sum[$solarSystem] += $rinfo->counts;
            }
            $solarSystem++;
        }
        $param = [
            'solarSystem' => $solarSystem,
            'topic' => $wordinfos,
            'planets' => $relationinfo,
            'sum' => $sum,
            'positionX' => $x,
            'positionY' => $y,
            'number' => $number,
            'ext' => $ext,
            'int' => $int,
        ];
        return view('galaxy.galaxy',$param);
    }
}
