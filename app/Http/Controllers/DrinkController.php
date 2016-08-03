<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Drink;

class DrinkController extends Controller{
  public function index() {
    $drinks = Drink::orderBy('id', 'asc')->get();
    $cRateSql = Drink::orderBy('rate', 'desc')->get();
    $cRateJson = json_encode($cRateSql, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    $datas = [
      'drinks' => $drinks,
      'cRateJson' => $cRateJson
    ];
    return view('index')->with($datas);
  }
}
