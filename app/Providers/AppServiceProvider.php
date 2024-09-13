<?php

namespace App\Providers;

use App\Models\Cat;
use App\Models\Detail;
use App\Models\Integration;
use App\Models\Item;
use App\Models\Post;
use App\Models\QAModel;
use App\Models\Subscription;
use App\Models\Tech;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            // Attempt to retrieve the database connection
            DB::connection()->getPdo();
            if (Schema::hasTable('cats')) {
                View::share('web', Detail::where('type', 'web')->first());
                View::share('banner1', Detail::where('type', 'banner1')->first());
                View::share('banner2', Detail::where('type', 'banner2')->first());
                View::share('banner3', Detail::where('type', 'banner3')->first());
                View::share('about_header', Detail::where('type', 'about_header')->first());
                View::share('mission', Detail::where('type', 'mission')->first());
                View::share('who_we_serve', Detail::where('type', 'who_we_serve')->first());
                View::share('pricing_header', Detail::where('type', 'pricing_header')->first());
                View::share('support_plan', Detail::where('type', 'support_plan')->first());
                View::share('product_plan', Detail::where('type', 'product_plan')->first());
                View::share('contact_header', Detail::where('type', 'contact_header')->first());

                View::share('blog_header', Detail::where('type', 'blog_header')->first());
                View::share('blog_recent', Detail::where('type', 'blog_recent')->first());

                View::share('services', Detail::where('type', 'services')->get());
                View::share('partners', Detail::where('type', 'partners')->get());
                View::share('home_sections', Detail::where('type', 'home_sections')->get());
                View::share('subscriptions', Subscription::where('type', 'subscriptions')->with('details')->orderBy('sort', 'desc')->get());
                View::share('cats', Cat::all());
                View::share('items', Item::all());
                View::share('products', Item::with('details')->orderBy('sort', 'desc')->get());
                View::share('posts', Post::with('sections')->get());
                View::share('technologies', Tech::orderBy('id', 'desc')->get());
                View::share('Testimonials', Testimonial::orderBy('id', 'desc')->get());
                View::share('Integrations', Integration::orderBy('id', 'desc')->get());
                View::share('q_and_a', QAModel::orderBy('id', 'desc')->get());
                Paginator::useBootstrap();
            }
        } catch (\Exception $e) {
            // The connection does not exist or failed
            // You can handle the exception or perform any necessary actions here
        }
    }
}
