<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Config\Repository;// constructor injection

class WelcomeController extends Controller
{
    public function index()
    {
        return 'hello world';
    }
    
    public function contact()
    {
        return view('pages/contact');
    }
    
    protected $config;// constructor injection

    public function __construct(Repository $config) // constructor injection
    {
        $this->config = $config;
    }
    
    public function test(Repository $config)// method injection
    {
        // constructor injection
        //return $this->config->get('database.default'); 
        
        // method injection
        //return $config->get('database.default'); 
        
        // facade
        return \Config::get('database.default');
                
        // config helper function (RECOMMENDED to use in controllers)
        return config('database.default');
    }
}
