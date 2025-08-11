<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Bootcamp;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    /**
     * Display a listing of the katalog items
     */
    public function index()
    {
        $scholarships = Scholarship::all();
        $bootcamps = Bootcamp::all();
        $articles = Article::all();
        
        return view('laman_admin.katalog', compact('scholarships', 'bootcamps', 'articles'));
    }

    /**
     * Show the form for creating a new katalog item
     */
    public function create()
    {
        return view('laman_admin.add_katalog');
    }

    /**
     * Store a newly created katalog item in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'required|url|max:255',
            'kategori' => 'required|in:scholarship,bootcamp,article',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image_url = null;
        if ($request->hasFile('foto')) {
            $image_url = $request->file('foto')->store('katalog', 'public');
        }

        if ($validated['kategori'] === 'scholarship') {
            Scholarship::create([
                'title' => $validated['judul'],
                'description' => $validated['deskripsi'],
                'image_url' => $image_url,
                'link' => $validated['link'],
                'created_at' => now(),
            ]);
        } elseif ($validated['kategori'] === 'bootcamp') {
            Bootcamp::create([
                'title' => $validated['judul'],
                'description' => $validated['deskripsi'],
                'image_url' => $image_url,
                'link' => $validated['link'],
            ]);
        } else {
            Article::create([
                'title' => $validated['judul'],
                'content' => $validated['deskripsi'],
                'thumbnail' => $image_url,
                'created_at' => now(),
            ]);
        }

        return redirect()->route('admin.katalog')
            ->with('success', 'Data katalog berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified katalog item
     */
    public function edit($kategori, $id)
    {
        if ($kategori === 'scholarship') {
            $item = Scholarship::findOrFail($id);
            $item->kategori = 'scholarship';
        } elseif ($kategori === 'bootcamp') {
            $item = Bootcamp::findOrFail($id);
            $item->kategori = 'bootcamp';
        } else {
            $item = Article::findOrFail($id);
            $item->kategori = 'article';
        }
        
        return view('laman_admin.add_katalog', compact('item'));
    }

    /**
     * Update the specified katalog item in storage
     */
    public function update(Request $request, $kategori, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'required|url|max:255',
            'kategori' => 'required|in:scholarship,bootcamp,article',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($kategori === 'scholarship') {
            $item = Scholarship::findOrFail($id);
        } elseif ($kategori === 'bootcamp') {
            $item = Bootcamp::findOrFail($id);
        } else {
            $item = Article::findOrFail($id);
        }

        if ($request->hasFile('foto')) {
            // Delete old image if exists
            if ($item->image_url || $item->thumbnail) {
                $oldImage = $item->image_url ?? $item->thumbnail;
                Storage::disk('public')->delete($oldImage);
            }
            
            $newImage = $request->file('foto')->store('katalog', 'public');
            
            if ($kategori === 'article') {
                $item->thumbnail = $newImage;
            } else {
                $item->image_url = $newImage;
            }
        }

        if ($validated['kategori'] === 'scholarship') {
            $item->update([
                'title' => $validated['judul'],
                'description' => $validated['deskripsi'],
                'link' => $validated['link'],
                'image_url' => $item->image_url,
            ]);
        } elseif ($validated['kategori'] === 'bootcamp') {
            $item->update([
                'title' => $validated['judul'],
                'description' => $validated['deskripsi'],
                'link' => $validated['link'],
                'image_url' => $item->image_url,
            ]);
        } else {
            $item->update([
                'title' => $validated['judul'],
                'content' => $validated['deskripsi'],
                'thumbnail' => $item->thumbnail,
            ]);
        }

        return redirect()->route('admin.katalog')
            ->with('success', 'Data katalog berhasil diupdate!');
    }

    /**
     * Remove the specified katalog item from storage
     */
    public function destroy($kategori, $id)
    {
        if ($kategori === 'scholarship') {
            $item = Scholarship::findOrFail($id);
        } elseif ($kategori === 'bootcamp') {
            $item = Bootcamp::findOrFail($id);
        } else {
            $item = Article::findOrFail($id);
        }

        // Delete image if exists
        if ($item->image_url || $item->thumbnail) {
            $imagePath = $item->image_url ?? $item->thumbnail;
            Storage::disk('public')->delete($imagePath);
        }
        
        $item->delete();
        
        return redirect()->route('admin.katalog')
            ->with('success', 'Data katalog berhasil dihapus!');
    }
} 