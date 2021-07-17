<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {

        $quizzes = Quiz::where("status", "publish")->withCount("questions")->paginate(5);
        return view("dashboard", compact("quizzes"));
    }
    public function quiz_detail($slug)
    {
        $quiz = Quiz::where("slug", $slug)->with("result","topTen.user")->withCount("questions")->first() ?? abort(404, "Quiz bulunamadı");
       // return $quiz;
        return view("quiz_detail", compact("quiz"));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with("questions.my_answer")->first() ?? abort(404, "Quiz bulunamadı");
        if($quiz->result){
            //return $quiz;
            return view("quiz_result",compact("quiz"));
        }
        return view("quiz", compact("quiz"));
    }

    public function result($slug, Request $request)
    {
        $correct=0;
        $quiz = Quiz::with("questions")->where("slug", $slug)->first() ?? abort(404, "Quiz bulunamadı");
        $count_question=count($quiz->questions);

        if($quiz->result)
        {
            abort(404, "buQuize daha önce katıldınız");
        }
        foreach ($quiz->questions as $question) {
           // echo $question->correct_answer . "  -  " . $request->post($question->id);
            Answer::create([
                "user_id" => auth()->user()->id,
                "question_id" => $question->id,
                "answer" => $request->post($question->id),
            ]);
            if($question->correct_answer === $request->post($question->id)){
                $correct+=1;
            }
        }
        $point = round((100 / $count_question) * $correct);
        Result::create([
            "user_id" => auth()->user()->id,
            "quiz_id" => $quiz->id,
            "point"=> $point,
            "correct"=> $correct,
            "wrong" => $count_question-$correct,
        ]);
        return redirect()->route("quiz_detail",$quiz->slug)->withSuccess("Basarıyla bitirdin notun:". $point );
    }
}
