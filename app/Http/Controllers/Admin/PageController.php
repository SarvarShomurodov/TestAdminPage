<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PagesFromRequest;
use App\Http\Requests\PagesUpdateRequest;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::latest()->paginate(5);

        return view('admin.pages.index',compact('pages'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagesFromRequest $request): RedirectResponse
    {
        Page::create($request->validated());
        return redirect()->route('pages.index')
                         ->with('success', 'Pages created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page): View
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagesUpdateRequest $request, Page $page): RedirectResponse
    {
        $page->update($request->validated());

        return redirect()->route('pages.index')
                        ->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('pages.index')
                         ->with('success', 'Pages deleted successfully');
    }
}
