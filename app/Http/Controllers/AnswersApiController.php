<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\statistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnswersApiController extends Controller
{
    public function index()
    {
        $answers= Answer::all();




        $st =DB::table('answers')
        ->join('answerlookups', 'answers.content', '=', 'answerlookups.id')
        ->select('answerlookups.content as content', DB::raw("count(answers.id) as count"))
        ->groupBy('answerlookups.content')
        ->get();
      $stList=[];
      $countAll=  count($answers);
foreach ($st as $s){
    $statistic=new statistic;
    $count=$s->count;
    $co=$count/$countAll;
    $perc=$co*100;
    $statistic->perc=$perc;
    $statistic->content=$s->content;
    $statistic->count= $count;
    $stList[]=$statistic;

}
return $stList;
    }

    public function store(Request $request)
    {
        $newanswer=new Answer;
        $newanswer->username=$request->answer["username"];
        $newanswer->content=$request->answer["content"];
$newanswer->save();
return $newanswer;

    }

    public function update(Request $request,$id)
    {
        $answer=Answer::find($id);

        if($answer){
         $success=   $answer->update($request->all());


        }

        return [
            'success' => $success
        ];




    }

    public function destroy(Request $request,$id)
    {
        return Answer::destroy($id);
    }
}
