<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Mack\Game\PlayYatzy;
use Tests\TestCase;
use Illuminate\Http\Request;

/**
 * Test cases for the controller GameYatzy.
 */
class ControllerYatzyTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("\App\Http\Controllers\YatzyController", $controller);
    }

    public function testYatzyHome()
    {
        $controller = new YatzyController();
        $res = $controller->home();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }

    public function testYatzyRules()
    {
        $controller = new YatzyController();
        $res = $controller->rules();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }

    // public function testYatzyResult()
    // {
    //     $controller = new YatzyController();

    //     $res = $controller->result();

    //     $this->assertInstanceOf("Illuminate\View\View", $res);
    // }

    public function testYatzyAddHighscore()
    {
        $controller = new YatzyController();
        $request = new Request();

        $res = $controller->addHighscore($request);

        $this->assertInstanceOf("Illuminate\Http\RedirectResponse", $res);
    }

    public function testYatzyHighscore()
    {
        $controller = new YatzyController();

        $res = $controller->highscore();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }

    public function testYatzyStatistics()
    {
        $controller = new YatzyController();

        $res = $controller->statistics();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }

    // /**
    //  * Check that the controller returns a response for home-page.
    //  */
    // public function testControllerReturnsResponseHome()
    // {
    //     $controller = new GameYatzy();

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->home();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // /**
    //  * Destroy the session.
    //  * @runInSeparateProcess
    //  */
    // public function testDestroySession()
    // {
    //     session_start();
    //     $controller = new GameYatzy();

    //     $_SESSION = [
    //         "key" => "value"
    //     ];

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->destroy();
    //     $this->assertInstanceOf($exp, $res);
    //     $this->assertEmpty($_SESSION);
    // }

    // /**
    //  * Check that the controller returns a response for play-page.
    //  */
    // public function testControllerReturnsResponsePlay()
    // {
    //     $controller = new GameYatzy();
    //     $_POST["dices"] = 5;
    //     $_POST["rolldices"] = "rolldices";
    //     $_SESSION["result"] = null;

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->play();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // /**
    //  * Check that the controller returns a response for play-page.
    //  */
    // public function testControllerReturnsResponsePlay2Result()
    // {
    //     $controller = new GameYatzy();
    //     $_POST["dices"] = 5;
    //     $_POST["rolldices"] = "rolldices";
    //     $_SESSION["result"] = "";
    //     $_SESSION["score"] = [1, 2, 3];
    //     $res["round"] = 1;

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->play();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // /**
    //  * Check that the controller returns a response for result-page.
    //  */
    // public function testControllerReturnsResponseResult()
    // {
    //     $controller = new GameYatzy();
    //     // $_POST["dices"] = 5;
    //     // $_SESSION["playerSum"] = 0;
    //     $_SESSION["round-1"] = 3;
    //     $_SESSION["round-2"] = 3;
    //     $_SESSION["round-3"] = 3;
    //     $_SESSION["round-4"] = 3;
    //     $_SESSION["round-5"] = 3;
    //     $_SESSION["round-6"] = 3;

    //     $exp = "\Psr\Http\Message\ResponseInterface";
    //     $res = $controller->result();
    //     $this->assertInstanceOf($exp, $res);
    // }
}
