<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function show($param = 'red')
    {
        if (isset($_POST['submit'])) {
            $param = $_POST['color'];
        }
        return view('page.test', ['color1' => $param]);
    }

    public function all()
    {
        return new Response('all выходи '.PageController::class);
    }

    public function sum($x1 = 0, $x2 = 0)
    {
        return $x1+$x2;
    }
}
