<?php

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

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/', function () { return view('dashboard.homepage'); });
    // Route::redirect('/', '/login');

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {
            return view('dashboard.colors');
        });
        Route::get('/typography', function () {
            return view('dashboard.typography');
        });
        Route::get('/charts', function () {
            return view('dashboard.charts');
        });
        Route::get('/widgets', function () {
            return view('dashboard.widgets');
        });
        Route::get('/404', function () {
            return view('dashboard.404');
        });
        Route::get('/500', function () {
            return view('dashboard.500');
        });
        Route::prefix('base')->group(function () {
            Route::get('/breadcrumb', function () {
                return view('dashboard.base.breadcrumb');
            });
            Route::get('/cards', function () {
                return view('dashboard.base.cards');
            });
            Route::get('/carousel', function () {
                return view('dashboard.base.carousel');
            });
            Route::get('/collapse', function () {
                return view('dashboard.base.collapse');
            });

            Route::get('/forms', function () {
                return view('dashboard.base.forms');
            });
            Route::get('/jumbotron', function () {
                return view('dashboard.base.jumbotron');
            });
            Route::get('/list-group', function () {
                return view('dashboard.base.list-group');
            });
            Route::get('/navs', function () {
                return view('dashboard.base.navs');
            });

            Route::get('/pagination', function () {
                return view('dashboard.base.pagination');
            });
            Route::get('/popovers', function () {
                return view('dashboard.base.popovers');
            });
            Route::get('/progress', function () {
                return view('dashboard.base.progress');
            });
            Route::get('/scrollspy', function () {
                return view('dashboard.base.scrollspy');
            });

            Route::get('/switches', function () {
                return view('dashboard.base.switches');
            });
            Route::get('/tables', function () {
                return view('dashboard.base.tables');
            });
            Route::get('/tabs', function () {
                return view('dashboard.base.tabs');
            });
            Route::get('/tooltips', function () {
                return view('dashboard.base.tooltips');
            });
        });
        Route::prefix('buttons')->group(function () {
            Route::get('/buttons', function () {
                return view('dashboard.buttons.buttons');
            });
            Route::get('/button-group', function () {
                return view('dashboard.buttons.button-group');
            });
            Route::get('/dropdowns', function () {
                return view('dashboard.buttons.dropdowns');
            });
            Route::get('/brand-buttons', function () {
                return view('dashboard.buttons.brand-buttons');
            });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function () {
                return view('dashboard.icons.coreui-icons');
            });
            Route::get('/flags', function () {
                return view('dashboard.icons.flags');
            });
            Route::get('/brands', function () {
                return view('dashboard.icons.brands');
            });
        });
        Route::prefix('notifications')->group(function () {
            Route::get('/alerts', function () {
                return view('dashboard.notifications.alerts');
            });
            Route::get('/badge', function () {
                return view('dashboard.notifications.badge');
            });
            Route::get('/modals', function () {
                return view('dashboard.notifications.modals');
            });
        });
        Route::resource('notes', 'NotesController');
    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::resource('users',        'UsersController')->except(['create', 'store']);
        Route::resource('roles',        'RolesController');
        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });
    });
});

// route kategori
Route::get('kategori','KategoriController@index')->name('kategori.index');
Route::get('kategori/create','KategoriController@create')->name('kategori.create');
Route::post('kategori/store','KategoriController@store')->name('kategori.store');
Route::get('kategori/{id}/edit','KategoriController@edit')->name('kategori.edit');
Route::post('kategori/{id}/update','KategoriController@update')->name('kategori.update');
Route::delete('kategori/{id}/destroy','KategoriController@destroy')->name('kategori.destroy');
// route pinjaman
Route::get('pinjaman','PinjamanController@index')->name('pinjaman.index');
Route::get('pinjaman/create','PinjamanController@create')->name('pinjaman.create');
Route::post('pinjaman/store','PinjamanController@store')->name('pinjaman.store');
Route::get('pinjaman/{id}/edit','PinjamanController@edit')->name('pinjaman.edit');
Route::post('pinjaman/{id}/update','PinjamanController@update')->name('pinjaman.update');
Route::delete('pinjaman/{id}/destroy','PinjamanController@destroy')->name('pinjaman.destroy');
//route angsuran
Route::get('angsuran','AngsuranController@index')->name('angsuran.index');
Route::get('angsuran/create','AngsuranController@create')->name('angsuran.create');
Route::post('angsuran/store','AngsuranController@store')->name('angsuran.store');
Route::get('angsuran/{id}/edit','AngsuranController@edit')->name('angsuran.edit');
Route::post('angsuran/{id}/update','AngsuranController@update')->name('angsuran.update');
Route::delete('angsuran/{id}/destroy','AngsuranController@destroy')->name('angsuran.destroy');
//route tempo
Route::get('tempo','TempoController@index')->name('tempo.index');
Route::get('tempo/create','TempoController@create')->name('tempo.create');
Route::post('tempo/store','TempoController@store')->name('tempo.store');
Route::get('tempo/{id}/edit','TempoController@edit')->name('tempo.edit');
Route::post('tempo/{id}/update','TempoController@update')->name('tempo.update');
Route::delete('tempo/{id}/destroy','TempoController@destroy')->name('tempo.destroy');
//route denda
Route::get('denda','DendaController@index')->name('denda.index');
Route::get('denda/create','DendaController@create')->name('denda.create');
Route::post('denda/store','DendaController@store')->name('denda.store');
Route::get('denda/{id}/edit','DendaController@edit')->name('denda.edit');
Route::post('denda/{id}/update','DendaController@update')->name('denda.update');
Route::delete('denda/{id}/destroy','DendaController@destroy')->name('denda.destroy');
//bunga
Route::get('bunga','BungaController@index')->name('bunga.index');
Route::get('bunga/create','BungaController@create')->name('bunga.create');
Route::post('bunga/store','BungaController@store')->name('bunga.store');
Route::get('bunga/{id}/edit','BungaController@edit')->name('bunga.edit');
Route::post('bunga/{id}/update','BungaController@update')->name('bunga.update');
Route::delete('bunga/{id}/destroy','BungaController@destroy')->name('bunga.destroy');
//biayaAdministrasi
Route::get('biayaAdministrasi','BiayaAdministrasiController@index')->name('biayaAdministrasi.index');
Route::get('biayaAdministrasi/create','BiayaAdministrasiController@create')->name('biayaAdministrasi.create');
Route::post('biayaAdministrasi/store','BiayaAdministrasiController@store')->name('biayaAdministrasi.store');
Route::get('biayaAdministrasi/{id}/edit','BiayaAdministrasiController@edit')->name('biayaAdministrasi.edit');
Route::post('biayaAdministrasi/{id}/update','BiayaAdministrasiController@update')->name('biayaAdministrasi.update');
Route::delete('biayaAdministrasi/{id}/destroy','BiayaAdministrasiController@destroy')->name('biayaAdministrasi.destroy');