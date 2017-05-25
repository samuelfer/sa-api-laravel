<?php

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'cors'], function(){
    Route::post('login', 'Api\AuthController@login');
    Route::post('refresh_token', 'Api\AuthController@refreshToken');

    Route::post('users', 'Api\UsersController@store');

    Route::group(['middleware' => ['jwt.auth', 'tenant']], function(){
        Route::post('logout', 'Api\AuthController@logout');
        Route::get('user_name', 'Api\UsersController@getName');
        Route::resource('categories', 'Api\CategoriesController', ['except' => ['create', 'edit']]);
        Route::get('bill_pays/total', 'Api\BillPaysController@calculateTotal');
        Route::resource('bill_pays', 'Api\BillPaysController', ['except' => ['create', 'edit']]);
        Route::resource('reservas', 'Api\ReservasController', ['except' => ['create', 'edit']]);
        Route::resource('inadimplentes', 'Api\InadimplentesController', ['except' => ['create', 'edit']]);
        Route::resource('areas_comuns', 'Api\AreaComumsController', ['except' => ['create', 'edit']]);

        Route::resource('area_pais', 'Api\AreaPaisController', ['except' => ['create', 'edit']]);
        Route::resource('imoveis', 'Api\ImovelsController', ['except' => ['create', 'edit']]);

        Route::group(['prefix' => 'imovel'], function () {
            Route::get('comunicado/{id}', 'Api\ImovelsController@comunicado');
            Route::get('faleconosco/{id}', 'Api\ImovelsController@faleconosco');
            Route::get('correspondencia/{id}', 'Api\ImovelsController@correspondencia');
            Route::get('ocorrencia_morador/{id}', 'Api\ImovelsController@ocorrenciaMorador');
            Route::get('visitas/{id}', 'Api\ImovelsController@visita');
            //Route::get('teste/{id}', 'Api\ImovelsController');
        });

        Route::resource('achados-perdidos', 'Api\AchadosPerdidosController', ['except' => ['create', 'edit']]);
        //Route::resource('animais', 'Api\AnimalsController', ['except' => ['create', 'edit']]);
        Route::resource('anuncios', 'Api\AnunciosController', ['except' => ['create', 'edit']]);
        Route::resource('apagar', 'Api\ApagarsController', ['except' => ['create', 'edit']]);
        Route::resource('aplicacoes', 'Api\SegAppsController', ['except' => ['create', 'edit']]);
        Route::resource('areceber', 'Api\ArecebersController', ['except' => ['create', 'edit']]);
        Route::resource('avaliacoes', 'Api\AvaliacaosController', ['except' => ['create', 'edit']]);
        Route::resource('avisos', 'Api\AvisosController', ['except' => ['create', 'edit']]);
        Route::resource('agendas', 'Api\AgendaCompromissosController', ['except' => ['create', 'edit']]);
        Route::resource('blocos', 'Api\BlocosController', ['except' => ['create', 'edit']]);
        Route::resource('bancos', 'Api\BancosController', ['except' => ['create', 'edit']]);
        Route::resource('condominio', 'Api\CondominiosController', ['except' => ['create', 'edit']]);
        Route::resource('pessoas', 'Api\PessoasController', ['except' => ['create', 'edit']]);
        Route::resource('chaves', 'Api\ChavesController', ['except' => ['create', 'edit']]);
        Route::resource('correspondencias', 'Api\CorrespondenciasController');
        Route::resource('fabricantes', 'Api\FabricantesController', ['except' => ['create', 'edit']]);


        Route::resource('comunicados', 'Api\ComunicacaosController', ['except' => ['create', 'edit']]);
        Route::resource('faleconosco', 'Api\FaleConoscosController', ['except' => ['create', 'edit']]);
        Route::resource('imoveis_bloqueados', 'Api\BloqueioPeriodosController', ['except' => ['create', 'edit']]);
        Route::resource('especies', 'Api\EspeciesController', ['except' => ['create', 'edit']]);

        Route::resource('usuarios', 'Api\UsersController', ['except' => ['create', 'edit']]);
        Route::resource('grupos', 'Api\SegGroupsController', ['except' => ['create', 'edit']]);
        Route::resource('grupos_usuarios', 'Api\SegUsersGroupsController', ['except' => ['create', 'edit']]);

        //Route::resource('grupos_de_usuarios', 'Api\SegGroupsAppsController', ['except' => ['create', 'edit']]);
        Route::resource('grupos_apps', 'Api\SegGroupsAppsController', ['except' => ['create', 'edit']]);
        Route::resource('apps', 'Api\SegAppsController', ['except' => ['create', 'edit']]);

        Route::resource('modelo_veiculos', 'Api\ModeloVeiculosController', ['except' => ['create', 'edit']]);
        Route::resource('pets', 'Api\AnimalsController', ['except' => ['create', 'edit']]);
        Route::resource('prestador-servico', 'Api\PrestadorServicosController', ['except' => ['create', 'edit']]);
        Route::resource('proprietarios', 'Api\ProprietariosController', ['except' => ['create', 'edit']]);
        Route::resource('perfis', 'Api\PerfilsController', ['except' => ['create', 'edit']]);
        Route::resource('racas', 'Api\RacasController', ['except' => ['create', 'edit']]);
        Route::resource('reservas', 'Api\ReservasController', ['except' => ['create', 'edit']]);

        Route::resource('tipo-conta', 'Api\TipoContasController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_situacao', 'Api\TipoSituacaosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_areas', 'Api\TipoAreasController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_chaves', 'Api\TipoChavesController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_documentos', 'Api\TipoDocumentosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_faleconosco', 'Api\TipoFaleConoscosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_funcionarios', 'Api\TipoFuncionariosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_movimentos', 'Api\TipoMovimentosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_multas', 'Api\TipoMultaNotificacaosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_ocorrencias', 'Api\TipoOcorrenciasController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_situacao', 'Api\TipoSituacaosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo-servico', 'Api\TipoPrestadorServicosController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_visitante', 'Api\TipoVisitantesController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_pessoas', 'Api\TipoPessoasController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_uploads', 'Api\TipoUploadsController', ['except' => ['create', 'edit']]);
        Route::resource('veiculos', 'Api\VeiculoMoradorsController', ['except' => ['create', 'edit']]);
        Route::resource('uploads', 'Api\UploadsController', ['except' => ['create', 'edit']]);
        Route::resource('visitas', 'Api\VisitasController', ['except' => ['create', 'edit']]);

    });

});

