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

Route::get('/addregistros', function () {

  $zero  = App\Categoria::create(['titulo'=>'Zero KM']);
  $semi  = App\Categoria::create(['titulo'=>'Seminovos']);
  $usado = App\Categoria::create(['titulo'=>'Usados']);

  $Honda = App\Marca::create(['titulo'=>'Honda','descricao'=>'Carros Honda']);
  $Chevrolet = App\Marca::create(['titulo'=>'Chevrolet','descricao'=>'Carros Chevrolet']);

  $Camaro = $Chevrolet->carros()->create(['titulo'=>'Camaro','descricao'=>'Automático e completo','ano'=>2017,'valor'=>150000.90]);
  $Civic = App\Carro::create(['marca_id'=>1,'titulo'=>'Civic','descricao'=>'Automático e completo','ano'=>2017,'valor'=>80000.00]);

  $Camaro->categorias()->attach($usado);
  $Camaro->categorias()->attach($semi);

  $categorias = [
      new App\Categoria(['titulo'=>'Nacional']),
      new App\Categoria(['titulo'=>'Destaque']),
      new App\Categoria(['titulo'=>'Luxo'])
  ];

  $Civic->categorias()->saveMany($categorias);
  $Civic->categorias()->attach($semi);

  $usuario = App\User::find(1);

  $usuario->carros()->attach($Civic);
  $usuario->carros()->attach($Camaro);

  return "Registros criados";

});

Route::get('/testesregistros', function () {

  $carro = App\Carro::find(1);
  //dd($carro->marca);

  $marca = App\Marca::find(1);

  //dd($marca->carros);

  //dd($carro->categorias);

  $categoria = App\Categoria::find(2);

  //dd($categoria->carros);

  //dd($carro->usuarios);

  $usuario = App\User::find(1);
  //dd($usuario->carros);

  dd($carro->imagens);


});

Route::get('/addgalerias', function () {

  for($i=1; $i<4;$i++){
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 1,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 2,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
  }

  return "Registros criados";


});



Route::get('/', function () {
    $slides = [
      (object)[
        'titulo'=>'Título Imagem',
        'descricao'=>'Descrição Imagem',
        'url'=>'#link',
        'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'

      ]
    ];

    $carros = [
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ]
  ];

    return view('site.home',compact('slides','carros'));
});

Auth::routes();

Route::get('/contato',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.contato',compact('galeria'));
});
Route::get('/detalhe',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.detalhe',compact('galeria'));
});
Route::get('/empresa',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.empresa',compact('galeria'));
});

//Rotas das paginas iniciais
/*
  Route::get('/home', 'HomeController@index');
  Route::get('/home/{id}','HomeController@detalhe'); 
*/


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::get('/', 'Admin\AdminController@index');
    Route::resource('usuarios', 'Admin\UsuarioController');

    Route::get('usuarios/papel/{id}', ['as' => 'usuarios.papel', 'uses' => 'Admin\UsuarioController@papel']);
    Route::post('usuarios/papel/{papel}', ['as' => 'usuarios.papel.store', 'uses' => 'Admin\UsuarioController@papelStore']);
    Route::delete('usuarios/papel/{usuario}/{papel}', ['as' => 'usuarios.papel.destroy', 'uses' => 'Admin\UsuarioController@papelDestroy']);

    Route::resource('papeis', 'Admin\PapelController');

    Route::get('papeis/permissao/{id}', ['as' => 'papeis.permissao', 'uses' => 'Admin\PapelController@permissao']);
    Route::post('papeis/permissao/{permissao}', ['as' => 'papeis.permissao.store', 'uses' => 'Admin\PapelController@permissaoStore']);
    Route::delete('papeis/permissao/{papel}/{permissao}', ['as' => 'papeis.permissao.destroy', 'uses' => 'Admin\PapelController@permissaoDestroy']);

});


