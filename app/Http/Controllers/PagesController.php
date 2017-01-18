<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function accueil() {
      return view('pages/accueil');
    }

    public function contact() {
      return view('pages/contact');
    }

    public function connexion() {
      return view('auth/login');
    }

    public function inscription() {
      return view('auth/register');
    }

    public function rank() {
      if(Auth::check())
        return view('pages/scores');
      else
        return redirect()->route('accueil');
    }

    public function mentions() {
      return view('pages/mentions');
    }

    public function settings() {
      if(Auth::check())
        return view('pages/settings');
      else
        return redirect()->route('accueil');
    }

    public function error() {
      return view('pages/error');
    }

    public function level($level) {
      $level_available = array("cp","ce1","ce2","cm1","cm2");
      if(in_array(strtolower($level), $level_available))
        return view('pages/level', ['level'=>strtoupper($level)] );
      else
        return redirect()->route('error');
    }

    public function games($matieres) {
      $matieres_available = array("francais","sciences","mathematiques");
      if(in_array(strtolower($matieres), $matieres_available))
        return view('pages/games', ['matieres'=>strtoupper($matieres)] );
      else
        return redirect()->route('error');
    }

    public function jeu($level, $game) {
      $level_available = array("cp","ce1","ce2","cm1","cm2");
      if(!(in_array(strtolower($level), $level_available)))
        return redirect()->route('accueil');
      return view('pages/jeu', ['level'=>strtoupper($level), 'game'=>$game] );
    }

}
