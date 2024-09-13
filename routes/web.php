<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminCatsController;
use App\Http\Controllers\Admin\AdminDetailsController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminIntegrationController;
use App\Http\Controllers\Admin\AdminItemsController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminQAModelController;
use App\Http\Controllers\Admin\AdminSectionsController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\AdminTechController;
use App\Http\Controllers\Admin\AdminTestimonialsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Front\FrontHomeControl;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;


Route::get('change-language/{locale}', [FrontHomeControl::class, 'changeLanguage'])->name('Languaes.change');
Route::get('/', [FrontHomeControl::class, 'index'])->name('front-home');
Route::get('About-Us', [FrontHomeControl::class, 'About_Us'])->name('front.about_us');
Route::get('Contact-With-Us', [FrontHomeControl::class, 'contact'])->name('front.contact');
Route::get('Pricing', [FrontHomeControl::class, 'Pricing'])->name('front.Pricing');
Route::get('Blogs', [FrontHomeControl::class, 'Blogs'])->name('front.Blogs');
Route::get('BlogPost/{post_id}', [FrontHomeControl::class, 'BlogPost']);
Route::post('/user-content', [FrontHomeControl::class, 'user_content']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::middleware('admin_auth')->group(function () {
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');


        Route::get('/Admin-Users-home', [AdminUsersController::class, 'view'])->name('admin.users');
        Route::resource('/admin-users', AdminUsersController::class);

        Route::get('/Categories-home', [AdminCatsController::class, 'view'])->name('admin.cats');
        Route::resource('/admin-cats', AdminCatsController::class);

        Route::get('/technologies-home', [AdminTechController::class, 'view'])->name('admin.technologies');
        Route::resource('/admin-technologies', AdminTechController::class);

        Route::get('/Integrations-home', [AdminIntegrationController::class, 'view'])->name('admin.Integrations');
        Route::resource('/admin-Integrations', AdminIntegrationController::class);

        Route::get('/Q&A-home', [AdminQAModelController::class, 'view'])->name('admin.Q&A');
        Route::resource('/admin-QA', AdminQAModelController::class);

        Route::get('/Testimonials-home', [AdminTestimonialsController::class, 'view'])->name('admin.Testimonials');
        Route::resource('/admin-Testimonials', AdminTestimonialsController::class);


        Route::get('/Contact-home', [ContactController::class, 'view'])->name('admin.contact');
        Route::resource('/admin-contact', ContactController::class);

        Route::get('/Subscription-home', [AdminSubscriptionController::class, 'view'])->name('admin.Subscription');

        Route::get('/Product-home', [AdminSubscriptionController::class, 'Product_view'])->name('admin.Product');
        Route::post('/change-sort-Subscription', [AdminSubscriptionController::class, 'change_sort']);
        Route::post('/status-Subscription', [AdminSubscriptionController::class, 'change_Status']);

        Route::resource('/admin-Subscription', AdminSubscriptionController::class);
        Route::resource('/admin-about', AdminAboutController::class);

        // Posts
        Route::resource('/admin-Post', AdminPostController::class);
        Route::resource('/admin-sections', AdminSectionsController::class);


        Route::controller(AdminItemsController::class)->group(function () {
            Route::resource('/admin-items', AdminItemsController::class);
            Route::get('/Items-home/{id}', 'view')->name('admin.items');
            Route::get('/get-Items/{id}', 'index');
            Route::get('Item-getData-details/{id}', 'get_Item_details_data');
            Route::post('/item-Item-add-Images', 'item_Item_add_Images');
            Route::get('item-image-select/{id}', 'item_image_select');
            Route::get('images-getData-details/{id}', 'get_images_details_data');
            Route::get('images-delete/{id}', 'images_delete');
            Route::post('admin-items-technologies', 'items_technologies');

            Route::get('View-All-Items', 'view_all_items')->name('admin.all.items');
            Route::get('Get-All-Items', 'get_all_items');

            Route::post('/change-sort-items', 'change_sort');
            Route::post('/status-items', 'change_Status');
        });

        Route::get('/admin-web-details', [AdminDetailsController::class, 'view_home'])->name('admin.web');
        Route::get('/Home-Sctions', [AdminDetailsController::class, 'Home_Sctions'])->name('admin.home.sections');

        // Banners
        Route::get('/Banners', [AdminDetailsController::class, 'Banners'])->name('admin.Banners');
        Route::get('/get-banners', [AdminDetailsController::class, 'get_banners']);

        Route::get('/blog', [AdminDetailsController::class, 'blog'])->name('admin.Blog');
        Route::get('/get-blog', [AdminDetailsController::class, 'get_blog']);
        Route::get('/blog-posts', [AdminDetailsController::class, 'blogPosts'])->name('admin.BlogPosts');

        Route::get('/services', [AdminDetailsController::class, 'services'])->name('admin.services');
        Route::get('/Partners', [AdminDetailsController::class, 'Partners'])->name('admin.Partners');
        Route::resource('/admin-details', AdminDetailsController::class);
    });
});
