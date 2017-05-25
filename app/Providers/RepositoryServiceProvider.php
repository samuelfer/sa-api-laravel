<?php

namespace SA\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SA\Repositories\CategoryRepository::class, \SA\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\BillPayRepository::class, \SA\Repositories\BillPayRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\UserRepository::class, \SA\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ReservaRepository::class, \SA\Repositories\ReservaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\InadimplenteRepository::class, \SA\Repositories\InadimplenteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AreaComumRepository::class, \SA\Repositories\AreaComumRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AreaPaiRepository::class, \SA\Repositories\AreaPaiRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoAreaRepository::class, \SA\Repositories\TipoAreaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegUsersRepository::class, \SA\Repositories\SegUsersRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegUsersGroupsRepository::class, \SA\Repositories\SegUsersGroupsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegGroupsRepository::class, \SA\Repositories\SegGroupsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegLogRepository::class, \SA\Repositories\SegLogRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegAppsRepository::class, \SA\Repositories\SegAppsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegGroupsAppsRepository::class, \SA\Repositories\SegGroupsAppsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ImovelRepository::class, \SA\Repositories\ImovelRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\BlocoRepository::class, \SA\Repositories\BlocoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\CondominioRepository::class, \SA\Repositories\CondominioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AchadosPerdidosRepository::class, \SA\Repositories\AchadosPerdidosRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AgendaCompromissoRepository::class, \SA\Repositories\AgendaCompromissoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AnimalRepository::class, \SA\Repositories\AnimalRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AnuncioRepository::class, \SA\Repositories\AnuncioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ApagarRepository::class, \SA\Repositories\ApagarRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AreceberRepository::class, \SA\Repositories\AreceberRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AvisoRepository::class, \SA\Repositories\AvisoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\BancoRepository::class, \SA\Repositories\BancoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\BloqueioPeriodoRepository::class, \SA\Repositories\BloqueioPeriodoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\VisitanteRepository::class, \SA\Repositories\VisitanteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AvaliacaoRepository::class, \SA\Repositories\AvaliacaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoDocumentoRepository::class, \SA\Repositories\TipoDocumentoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\CboRepository::class, \SA\Repositories\CboRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ChavesRepository::class, \SA\Repositories\ChavesRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ComunicacaoRepository::class, \SA\Repositories\ComunicacaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ContaCorrenteRepository::class, \SA\Repositories\ContaCorrenteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ConfiguracaoRepository::class, \SA\Repositories\ConfiguracaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ConsumoGasRepository::class, \SA\Repositories\ConsumoGasRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\CorrespondenciaRepository::class, \SA\Repositories\CorrespondenciaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\DependentesRepository::class, \SA\Repositories\DependentesRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\DocumentoFuncionarioRepository::class, \SA\Repositories\DocumentoFuncionarioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\DocumentoMoradorRepository::class, \SA\Repositories\DocumentoMoradorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\EspecieRepository::class, \SA\Repositories\EspecieRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\FabricanteRepository::class, \SA\Repositories\FabricanteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\FaleConoscoRepository::class, \SA\Repositories\FaleConoscoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\FeedbackFaleConoscoRepository::class, \SA\Repositories\FeedbackFaleConoscoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\FornecedorRepository::class, \SA\Repositories\FornecedorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\FuncionarioRepository::class, \SA\Repositories\FuncionarioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\GaragemRepository::class, \SA\Repositories\GaragemRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\HistoricoRepository::class, \SA\Repositories\HistoricoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\HistoricoVisitanteRepository::class, \SA\Repositories\HistoricoVisitanteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\LeituraGasRepository::class, \SA\Repositories\LeituraGasRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\LocatarioRepository::class, \SA\Repositories\LocatarioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ModeloVeiculoRepository::class, \SA\Repositories\ModeloVeiculoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\MoradorRepository::class, \SA\Repositories\MoradorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\MovimentoRepository::class, \SA\Repositories\MovimentoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\MultaRepository::class, \SA\Repositories\MultaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\MultaVeiculoRepository::class, \SA\Repositories\MultaVeiculoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\MultaNotificacaoRepository::class, \SA\Repositories\MultaNotificacaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\OcorrenciaMoradorRepository::class, \SA\Repositories\OcorrenciaMoradorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\OcorrenciaPorteiroRepository::class, \SA\Repositories\OcorrenciaPorteiroRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\OrgaoExpedidorRepository::class, \SA\Repositories\OrgaoExpedidorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\PerfilRepository::class, \SA\Repositories\PerfilRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\PessoaRepository::class, \SA\Repositories\PessoaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\PrestadorServicoRepository::class, \SA\Repositories\PrestadorServicoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\RacaRepository::class, \SA\Repositories\RacaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\RestricaoRepository::class, \SA\Repositories\RestricaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\RetornoRepository::class, \SA\Repositories\RetornoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TelefoneRepository::class, \SA\Repositories\TelefoneRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TermoRepository::class, \SA\Repositories\TermoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoAgendaRepository::class, \SA\Repositories\TipoAgendaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoChavesRepository::class, \SA\Repositories\TipoChavesRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoContaRepository::class, \SA\Repositories\TipoContaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoDependenteRepository::class, \SA\Repositories\TipoDependenteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoFaleConoscoRepository::class, \SA\Repositories\TipoFaleConoscoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoFuncionarioRepository::class, \SA\Repositories\TipoFuncionarioRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoGrupoPerfilRepository::class, \SA\Repositories\TipoGrupoPerfilRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoMovimentoRepository::class, \SA\Repositories\TipoMovimentoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoMultaNotificacaoRepository::class, \SA\Repositories\TipoMultaNotificacaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoOcorrenciaRepository::class, \SA\Repositories\TipoOcorrenciaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoPerfilRepository::class, \SA\Repositories\TipoPerfilRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoPessoaRepository::class, \SA\Repositories\TipoPessoaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoPrestadorServicoRepository::class, \SA\Repositories\TipoPrestadorServicoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoReceitaRepository::class, \SA\Repositories\TipoReceitaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoSituacaoRepository::class, \SA\Repositories\TipoSituacaoRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoUploadRepository::class, \SA\Repositories\TipoUploadRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoVisitanteRepository::class, \SA\Repositories\TipoVisitanteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\UploadRepository::class, \SA\Repositories\UploadRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\VeiculoMoradorRepository::class, \SA\Repositories\VeiculoMoradorRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\VisitaRepository::class, \SA\Repositories\VisitaRepositoryEloquent::class);
        //:end-bindings:
    }
}
