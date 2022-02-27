<?php declare(strict_types=1);

namespace Lact\Infrastructure\Article\Provider;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Lact\Article\UI\Http\Controller';

    public function map(): void
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../routes/api.php');
    }
}
