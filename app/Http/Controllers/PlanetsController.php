<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetsController extends Controller
{
    public static function jupiter()
    {
        return view('planets/jupiter');
    }

    public static function marte() {
        return view('planets/marte');
    }

    public static function mercur() {
        return view('planets/mercur');
    }

    public static function neptun() {
        return view('planets/neptun');
    }

    public static function pamant() {
        return view('planets/pamant');
    }

    public static function saturn() {
        return view('planets/saturn');
    }

    public static function uranus() {
        return view('planets/uranus');
    }

    public static function venus() {
        return view('planets/venus');
    }

    public static function sun() {
        return view('planets/sun');
    }

}
