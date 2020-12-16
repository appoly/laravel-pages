<?php

namespace Appoly\LaravelPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Appoly\LaravelPages\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('laravel-pages::pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laravel-pages::pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($files = $request->file('header_image')) {
            $disk = config('laravel_pages.disk');
            $location = 'laravel_pages/images';
            $data['file'] = $files->store($location, $disk);
            Storage::disk($disk)->setVisibility($data['file'], 'public');
            $request->merge(['header_image' => $data['file']]);
        }

        $page = Page::create($request->all());

        return redirect()->route('laravel-pages.show', $page->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (! $page) {
            abort(404, 'Page not found.');
        }
        $page->increment('views');

        if (config('laravel_pages.custom_view') !== '') {
            return view(config('laravel_pages.custom_view'), compact('page'));
        }

        return view('laravel-pages::pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('laravel-pages::pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->update($request->all());

        return redirect()->route('laravel-pages.show', $page->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page has been deleted.');
    }

    public function imageUpload(Request $request)
    {
        $disk = config('laravel_pages.disk');

        if ($files = $request->file('file')) {
            $location = 'laravel_pages/images';
            $data['file'] = $files->store($location, $disk);
            Storage::disk($disk)->setVisibility($data['file'], 'public');
        }

        return Storage::disk($disk)->url($data['file']);
    }
}
