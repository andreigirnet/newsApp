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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/', function () {
    SEOMeta::setTitle('🟠 ' . 'Hype-News - Latest News All Over The World');
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    OpenGraph::setTitle('🟠 ' . 'Hype-News - Latest News All Over The World');
    OpenGraph::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::setUrl('/');
    OpenGraph::addProperty('type', 'website');

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

Route::get('/tools', function () {
    SEOMeta::setTitle('🟠 ' . 'Hype-Tools - Latest Online Tools');
    SEOMeta::setDescription('🟠 Hype-Tools - Latest Online Tools');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    OpenGraph::setTitle('🟠 ' . 'Hype-Tools - Latest Online Tools');
    OpenGraph::setDescription('🟠 Hype-Tools - Latest Online Tools');
    OpenGraph::setUrl('/tools');

    return view('front.tools');
});

Route::get('/youtube-shorts-revenue-calculator', function () {
    SEOMeta::setTitle('🟠 ' . 'Hype-Tools - Youtube Shorts & Youtube Long Revenue Calculator');
    SEOMeta::setDescription('🟠 Hype-Tools - Youtube Shorts & Youtube Long Revenue Calculator');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    OpenGraph::setTitle('🟠 ' . 'Hype-Tools - Youtube Shorts & Youtube Long Revenue Calculator');
    OpenGraph::setDescription('🟠 Hype-Tools - Youtube Shorts & Youtube Long Revenue Calculator');
    OpenGraph::setUrl('/tools');

    return view('front.youtubeCalculator');
})->name('ytCalc');

Route::get('/fitness-calories-calculator', function () {
    SEOMeta::setTitle('🟠 ' . 'Hype-Tools - Fitness Calories Calculator');
    SEOMeta::setDescription('🟠 Hype-Tools - Fitness Calories Calculator');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    OpenGraph::setTitle('🟠 ' . 'Hype-Tools - Fitness Calories Calculator');
    OpenGraph::setDescription('🟠 Hype-Tools - Fitness Calories Calculator');
    OpenGraph::setUrl('/tools');

    return view('front.calorieCalc');
})->name('calorie');

Route::get('/singleCategory/{id}', function ($id) {
   $newsByCategory = News::where('category_id', $id)->latest()->paginate(10);
   $category = Category::find($id);
    SEOMeta::setTitle($category->title);
    SEOMeta::setDescription($category->title);
   return view('front.category', compact('newsByCategory','category'));
})->name('byCategory');

Route::get('singleNews/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->first();
    SEOMeta::setTitle( '🟠 Hype-News -' . $news->title);
    SEOMeta::setDescription('🟠 Hype-News -' . $news->title);

    OpenGraph::setTitle( '🟠 Hype-News -' . $news->title);
    OpenGraph::setDescription('🟠 Hype-News - ' . $news->title);
    OpenGraph::setUrl(route('singleNews', $slug));
    OpenGraph::addProperty('type', 'article');
    OpenGraph::addProperty('article:published_time', $news->created_at->toW3CString());
    OpenGraph::addProperty('article:modified_time', $news->updated_at->toW3CString());
    OpenGraph::addProperty('article:author', "Hype-News");
    OpenGraph::addImage(config('app.url') . 'storage/' . $news->photo);

    $inThisCategory = News::where('category_id', $news->category_id)->latest()->take(4)->get();
    $hotNews = News::where('hot_news', 1)->latest()->take(4)->get();
    $categories = Category::latest()->take(6)->get();
    return view('front.single', compact('news', 'inThisCategory', 'hotNews', 'categories'));
})->name('singleNews');

Route::get('/about', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.about');
})->name('about');

Route::get('/privacy', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.privacy');
})->name('privacy');

Route::get('/terms', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.terms');
})->name('terms');
Route::get('/contact', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.contact');
})->name('contact');

Route::get('/cookies', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.cookies');
})->name('cookies');
Route::get('/adv', function (){
    SEOMeta::setDescription('🟠 Hype-News - Latest news all over the world');
    OpenGraph::addImage(config('app.url') . 'assets/img/icon.png');
    return view('front.advertise');
})->name('adv');

Route::post('/uploadImageTextarea', function (Request $request){
    if ($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('images'), $fileName);

        $url = asset('images/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
    return response()->json(['message' => 'error']);
})->name('uploadImageTextarea');

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
