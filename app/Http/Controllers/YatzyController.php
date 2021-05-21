<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mack\Game\PlayYatzy;
use App\Models\Highscore;
use App\Models\Result;

class YatzyController extends Controller
{
    /**
     * Display the home page.
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        // $_SESSION["playerWins"] = $_SESSION["playerWins"] ?? 0;
        // $_SESSION["dataWins"] = $_SESSION["dataWins"] ?? 0;
        // $_SESSION["playerWinner"] = false;
        // $_SESSION["dataWinner"] = false;
        // $_SESSION["result"] = null;

        return view('layout.homeYatzy', [
            'title' => 'Yatzy',
            'header' => 'Yatzy',
            'message' => "Select dices to keep, non selected dices will be rerolled. ",
            'instructions' => "Choose where to put score into scorebox after maximum three rolls."
            // 'request' => $request
        ]);
    }

    /**
     * Destroy the session to reset score.
     *
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $request->session()->flush();
        return redirect('yatzy/home');
    }

    /**
     * Play the game.
     *
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Routing\Redirector
     */
    public function play(Request $request)
    {
        $game = new PlayYatzy();
        if ($request->has('start')) {
            // session(['result' => null]);
            // session(['score' => null]);
            $game->startGame();
            // $this->resetSessionRounds($request);
        }

        $data = [
            "header" => "Yatzy",
            "title" => "Yatzy",
            "message" => "Play Yatzy.",
            "request" => $request,
            "numberOfDices" => $request->input("dices", 0),
            "rollDices" => $request->input("rolldices", null),
            "roll" => $request->input("roll", 0)
            // "rounds" => $request->session()->put('rounds', session('rounds') ?? $game->getRounds())
        ];

        // $request->session()->put('result', session('result') ?? null);
        // $request->session()->put('score', session('score') ?? null);

        $request->session()->put('rounds', session('rounds') ?? $game->getRounds());
        $data["rounds"] = session("rounds");
        $game->setRounds($data["rounds"]);


        // $_SESSION["result"] = $_SESSION["result"] ?? null;
        // $_SESSION["score"] = $_SESSION["score"] ?? null;



        $res = $game->playGame($data["rollDices"], $data["roll"], $request);

        $data["graphics2rolls"] = $res["graphics2rolls"] ?? null;

        if (isset($res["numberOfDices"])) {
            $data["numberOfDices"] = $res["numberOfDices"];
        }

        // if (isset($res["rounds"])) {
        //     $request->session()->put('rounds', session('rounds') ?? $game->getRounds());
        //     $data["rounds"] = $res["rounds"];
        // }

        if (isset($res["message"])) {
            $data["message"] = $res["message"];
        }

        if (isset($res["sum"])) {
            $data["sum"] = $res["sum"];
        }

        if (isset($res["roll"])) {
            $data["roll"] = $res["roll"];
        }

        if (isset($res["result"])) {
            return redirect('yatzy/result');
        }

        // if ($request->session()->has('result')) {
        //     $helper = new Helper();
        //     $request->session()->put("result", $helper->printHistogram(session("score")));

        //     return redirect('yatzy/result');
        // }

        return view('layout.yatzy', $data);
    }

    /**
     * Display the result page.
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function result()
    {
        $data = [
            "title" => "Yatzy",
            "header" => "Yatzy",
            "totalScore" => 0,
            "highscore" => 0,
            "newHighscore" => false,
            "rounds" => session("rounds") ?? null
        ];

        $result = new Result();
        if (isset($data["rounds"])) {
            $result->addResult($data["rounds"]);
            $data["totalScore"] = $data["rounds"]["TOTAL"];
        }

        $handler = new Highscore();
        $data["highscore"] = $handler->getHighscore();


        if ($data["totalScore"] >= $data["highscore"]) {
            $data["newHighscore"] = true;
        }

        return view('layout.resultYatzy', $data);
    }

    /**
     * Add new highscore.
     *
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function addHighscore(Request $request)
    {
        $name = $request->input('name');
        $score = $request->input('score');

        if ($name != null) {
            $handler = new Highscore();
            $handler->addHighscore($name, $score);
        }

        return redirect('yatzy/highscore');
    }

    /**
     * Display the highscore page.
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function highscore()
    {
        $data = [
            "title" => "Yatzy High Score",
            "header" => "Yatzy High Score",
            "message" => "Presenting the High Score for Yatzy Game",
        ];

        $handler = new Highscore();
        $data["result"] = $handler->presentHighscore();

        return view('layout.highscore', $data);
    }

    /**
     * Display the statistics page.
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function statistics()
    {
        $data = [
            "title" => "Yatzy Statistics",
            "header" => "Yatzy Statistics",
            "message" => "Presenting statistics for the last ten games of Yatzy.",
        ];

        $result = new Result();
        $data["result"] = $result->presentResult();

        return view('layout.statistic', $data);
    }
}
