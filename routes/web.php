<?php

use App\DataTables\PostDataTable;
use App\DataTables\PostDataTableEditor;
use App\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('categories', 'CategoryController');
Route::get('show-posts', function (PostDataTable $dataTable){
    return $dataTable->render('show-posts');
});
Route::post('datatable/posts', function (PostDataTableEditor $editor){
    return $editor->process(request());
});
Route::get('profile', 'AvatarController@index')->name('profile');
Route::get('users', 'HomeController@index');
Route::get('users/get-data', 'HomeController@getData')->name('datatables.data');
Route::get('avatars/download/{avatar}', 'AvatarController@download')->name('avatars.download');
Route::resource('avatars', 'AvatarController');

Route::get('/', function () {
//    $role = Role::first();
//    $role->givePermissionTo(Permission::first());
//    $per2 = Permission::find(2);
//    $per2->assignRole($role);
//    $per2->removeRole($role);
//    $role->revokePermissionTo(Permission::first());
//    return User::permission('create article')->get();
    if($user = auth()->user()){
//        $admin = Role::whereName('admin')->first();
//        $admin->givePermissionTo(Permission::create(['name' => 'test permission']));
//        $user->removeRole('writer');
//        $user->revokePermissionTo('edit articles');
//        Permission::latest()->first()->assignRole(Role::first());
//        return $user->getAllPermissions();
//        $user->givePermissionTo('edit articles');
//        $user->assignRole('writer');
    }
    return view('welcome');
});

Route::get('pdf', function(){
//    return PDF::loadView('welcome', ['name' => 'Huy'])->stream();
//    $pdf = App::make('snappy.pdf');
//    $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';
//    $pdf->generateFromHtml($html, public_path('app/pdf/test.pdf'));
//    $pdf->generate('https://www.google.com', public_path('app/pdf/gamek.pdf'));
return PDF::loadView('welcome', ['name' => 'Huy'])
    ->setOrientation('landscape')
    ->setOption('margin-bottom', '10mm')
    ->setOption('footer-html', view('footer'))
    ->stream();
});

Route::get('user', function () {
    $user = QueryBuilder::for(User::class)
        ->allowedFilters([AllowedFilter::exact('name'),
            AllowedFilter::exact('id'), 'email_verified_at',
            AllowedFilter::scope('get_admin'),
            AllowedFilter::scope('is_admin')])
        ->allowedSorts('name')
        ->allowedFields('name', 'id', 'email')
        ->allowedIncludes(['posts'])
        ->withCount('posts')
        ->paginate(2);
//        ->get();
    return $user;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::get('test-permission', 'PostController@testPermission')->name('test');
