<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class WebsiteController extends Controller
{
    public function index(){
        $username = 'Tripr';
        $password = 'Tripr@1234';

        // Test authentication endpoint
        $authTest = Http::post('https://api.tbotechnology.in/authservice/api/Authenticate', [
            'UserName' => $username,
            'Password' => $password,
            'ClientId' => 'API_CONSOLE', // Often required
            'Version' => '1.0' // Often required
        ]);
        dd($authTest);


        $result['packages'] = DB::table('packages')
        ->join('package_images', 'packages.id', '=', 'package_images.package_id')
        ->select(
            'packages.id',
            'packages.slug',
            'packages.heading',
            'packages.badge',
            'packages.price',
            'packages.location',
            DB::raw('MIN(package_images.image_path) as image')
        )
        ->groupBy('packages.id', 'packages.heading', 'packages.price', 'packages.location','packages.badge','packages.slug')
        ->orderBy('packages.id', 'desc')
        ->get();

        return view('website.pages.landing',$result);
    }
    public function PackageView($slug){
        $result['package'] = DB::table('packages')->where(['slug'=>$slug])->first();
        $result['package_images'] = DB::table('package_images')->where(['package_id'=>$result['package']->id])->get();
        return view('website.pages.package.view',$result);
    }
    public function contact(){
        return view('website.pages.contact');
    }
    public function about(){
        return view('website.pages.about');
    }

}
