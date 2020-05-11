<?php


namespace App\Http\Controllers;

use App\Country;
use App\Http\Controllers\Controller;

class mainController extends Controller
{
public function main()
{
    echo Country::find(1)->title;
    return '!';
}
}