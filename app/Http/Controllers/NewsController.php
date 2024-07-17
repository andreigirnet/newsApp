<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->with('category')->paginate(10);
        return view('back.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.news.create', compact('categories'));
    }

    public function formatSlug($title){

        $title = strtolower($title);

        $slug = str_replace(' ', '-', $title);

        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);

        $slug = preg_replace('/-+/', '-', $slug);

        return trim($slug, '-');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data

        // Handle the file upload if there is an image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $title = $request['title'];
        $slug = $this->formatSlug($title);

        // Create the news
        $news = new News();
        $news->category_id = $request['category'];
        $news->title = $request['title'];
        $news->slug = $slug;
        $news->content = $request['content'];
        $news->photo = $imagePath;
        $news->video = $request['video'];
        $news->hot_news = (int) $request['hotNews'];
        $news->save();

        $newsUrl = url("/{$news->slug}");
        $newsUrl = str_replace("http://", "https://", $newsUrl);
        $sitemapPath = public_path('sitemap.xml');

        if (File::exists($sitemapPath)) {
            $sitemapContent = File::get($sitemapPath);

            // Add the new URL to the sitemap
            $newUrl = "<url><loc>{$newsUrl}</loc></url>";
            $sitemapContent = str_replace('</urlset>', $newUrl.'</urlset>', $sitemapContent);

            // Save the updated sitemap
            File::put($sitemapPath, $sitemapContent);
        }

        // Redirect back with a success message
        return redirect('/news')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('back.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        // Handle the file upload if there is an image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Find the news item by its ID
        $news = News::find($id);

        // Update the news item with new values
        $news->category_id = $request['category'];
        $news->title = $request['title'];
        $news->content = $request['content'];
        $news->photo = $imagePath ?: $news->photo; // Preserve existing photo if no new one is uploaded
        $news->video = $request['video'];
        $news->hot_news = (int) $request['hotNews'];
        $news->save();

        // Redirect back with a success message
        return redirect('/news')->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $newsUrl = url("/blog/{$news->slug}");

        $news->delete();

        $sitemapPath = public_path('sitemap.xml');

        if (File::exists($sitemapPath)) {
            $sitemapContent = File::get($sitemapPath);

            // Find and remove the URL from the sitemap content
            $pattern = "<url><loc>{$newsUrl}</loc>";
            $pos = strpos($sitemapContent, $pattern);

            if ($pos !== false) {
                // Find the end of the <url> entry
                $endPos = strpos($sitemapContent, '</url>', $pos);
                if ($endPos !== false) {
                    // Remove the entire <url> entry from $sitemapContent
                    $sitemapContent = substr_replace($sitemapContent, '', $pos, $endPos - $pos + strlen('</url>'));
                }
            }

            // Save the updated sitemap
            File::put($sitemapPath, $sitemapContent);
        }

        return redirect()->back()->with('success', "News Deleted");
    }
}
