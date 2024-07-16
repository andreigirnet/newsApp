<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\News;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/', function () {
    SEOMeta::setTitle('Home');
    SEOMeta::setDescription('Latest news all over the world');
    $firstBannerNews = News::latest()->take(2)->get();
    $rightBanners = News::latest()->take(4)->get();
    $footerNews = News::where('created_at', '>=', Carbon::now()->subWeek())
        ->orderBy('created_at', 'desc')
        ->take(9)
        ->get();
    $sports = News::where('category_id', 4)->latest()->take(4)->get();
    $politics =  News::where('category_id', 5)->latest()->take(4)->get();
    $socials = News::where('category_id', 8)->latest()->take(4)->get();
    $militars = News::where('category_id', 3)->latest()->take(4)->get();
    return view('front.home', compact('firstBannerNews', 'rightBanners', 'sports', 'politics', 'socials', 'militars', 'footerNews'));
});

Route::get('/singleCategory/{id}', function ($id) {
   $newsByCategory = News::where('category_id', $id)->latest()->paginate(10);
   $category = Category::find($id);
    SEOMeta::setTitle($category->title);
    SEOMeta::setDescription($category->title);
   return view('front.category', compact('newsByCategory','category'));
})->name('byCategory');

Route::get('/singleNews/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->first();
    SEOMeta::setTitle($news->title);
    SEOMeta::setDescription($news->title);
    OpenGraph::addImage(config('app.url') . 'storage/'  . $news->photo);
    $inThisCategory = News::where('category_id', $news->category_id)->latest()->take(4)->get();
    $hotNews = News::where('hot_news', 1)->latest()->take(4)->get();
    $categories = Category::latest()->take(6)->get();
    return view('front.single', compact('news', 'inThisCategory', 'hotNews', 'categories'));
})->name('singleNews');

Route::get('/about', function (){
    return view('front.about');
})->name('about');

Route::get('/privacy', function (){
    return view('front.privacy');
})->name('privacy');

Route::get('/terms', function (){
    return view('front.terms');
})->name('terms');
Route::get('/contact', function (){
    return view('front.contact');
})->name('contact');

Route::get('/cookies', function (){
    return view('front.cookies');
})->name('cookies');
Route::get('/adv', function (){
    return view('front.advertise');
})->name('adv');

Route::get('/generate-sitemap', function () {
    // Define the path where the sitemap will be saved
    $path = public_path('sitemap.xml');

    SitemapGenerator::create(config('app.url'))->writeToFile($path);

    return 'Sitemap generated successfully!';
});



Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('category', CategoryController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
