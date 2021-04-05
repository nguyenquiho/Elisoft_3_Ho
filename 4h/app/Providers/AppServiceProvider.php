<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Department;
use App\Models\Category;
use App\Services\Languages\LanguageInterface;
use App\Services\Languages\Vietnamese;
use App\Services\Mailer\MailInterface;
use App\Services\Mailer\Registration;
use App\Services\Mailer\MailOrder;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(LanguageInterface::class, Vietnamese::class);
        $this->app->singleton(LanguageInterface::class, Vietnamese::class);
        $this->app->singleton(LanguageInterface::class, Chinese::class);
        $this->app->singleton(MailInterface::class, RegistrationMail::class);
        $this->app->singleton(MailInterface::class, MailOrder::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $categories = Category::all();
            $departments = Department::all();
            $view->with(['categories'=>$categories,'departments'=>$departments]);
        });
    }
}
