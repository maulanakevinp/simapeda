<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapAnalisisRoutes();
        $this->mapAnggaranRealisasiRoutes();
        $this->mapArtikelRoutes();
        $this->mapBantuanRoutes();
        $this->mapDatabaseRoutes();
        $this->mapGalleryRoutes();
        $this->mapGrupRoutes();
        $this->mapInventarisRoutes();
        $this->mapPeranRoutes();
        $this->mapPemerintahanDesaRoutes();
        $this->mapPendudukRoutes();
        $this->mapProdukHukumRoutes();
        $this->mapSuratRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAnalisisRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/analisis.php'));
    }

    protected function mapAnggaranRealisasiRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/anggaran-realisasi.php'));
    }

    protected function mapArtikelRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/artikel.php'));
    }

    protected function mapGalleryRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/gallery.php'));
    }

    protected function mapInventarisRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/inventaris.php'));
    }

    protected function mapPemerintahanDesaRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/pemerintahan-desa.php'));
    }

    protected function mapPendudukRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/penduduk.php'));
    }

    protected function mapProdukHukumRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/produk-hukum.php'));
    }

    protected function mapSuratRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/surat.php'));
    }

    protected function mapBantuanRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/bantuan.php'));
    }

    protected function mapGrupRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/grup.php'));
    }

    protected function mapDatabaseRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/database.php'));
    }

    protected function mapPeranRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/group/peran.php'));
    }
}
