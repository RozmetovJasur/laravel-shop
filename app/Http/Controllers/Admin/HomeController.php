<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Prefix;

//#[Prefix('admin')]
class HomeController extends Controller
{
//    #[Get('/', name: 'admin')]
    public function index()
    {
        return view('admin.home.index');
    }
}
