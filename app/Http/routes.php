<?php
use App\Events\UserWasBanned;
use App\User;
//use Auth;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    dd(app('Illuminate\Contracts\Hashing\Hasher')->make('password'));
    dd(app('Illuminate\Hashing\BcryptHasher')->make('password'));
    dd(app()['hash']->make('password'));
    dd(app('hash')->make('password'));
    dd(bcrypt('password'));
    dd(Hash::make('password'));
    
    dd(app()['config']['database']['default']);
    dd(app('config')['database']['default']);
    dd(app('Illuminate\Contracts\Config\Repository')['database']['default']);
    dd(app('Illuminate\Config\Repository')['database']['default']);
    dd(app('Illuminate\Config\Repository'));
    dd(Config::get('database.default'));
    dd(app('Illuminate\Contracts\Config\Repository'));
    $user = new App\User;
    // Event::listen('UserWasBanned', function(){});
    // Event::fire('UserWasBanned', [foo]);
    // event('UserWasBanned', [$user]);
    event(new UserWasBanned($user));
    return view('welcome');
});

Route::get('reports', 'ReportsController@index');

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('login', function () {
    User::truncate();
    
    $user = User::create([
        'name' => 'JohnDoe',
        'email' => 'john@example.com',
        'password' => bcrypt('password'),
        'plan' => 'yearly'
    ]);
    
    Auth::login($user);
    //dd(Auth::check());
    return redirect('/');
});

/*
Route::get('test', ['middleware' => 'subscribed', function () {
    return 'Subscription only page';
}]);
*/

//get('test', 'WelcomeController@test');

Route::get('test', ['middleware' => 'subscribed:yearly', function () { // passing "yearly" parameter to "subscribed" middleware
    return 'You can only see this page if you are logged in, and subscribed to the yearly plan.';
}]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
Route::group(['middleware' => ['web']], function () {
    //
});
*/