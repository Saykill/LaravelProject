<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::all();
       return view('admin.categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Doğrulama (Hata varsa buradan otomatik geri döner)
        $validated = $request->validate([
            'parent_id' => 'nullable|integer', // 'exists' kuralı 0 için hata verebilir, şimdilik böyle daha güvenli
            'title' => 'required|string|max:255', // Title genelde boş bırakılmamalıdır
            'keywords' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1', // Boolean yerine in:0,1 daha garantidir
        ]);

        // 2. Yeni Nesne Oluşturma
        $category = new Category();

        // parent_id 0 geliyorsa veya boşsa null ya da 0 olarak kaydet
        $category->parent_id = $request->parent_id ?? 0;
        $category->title = $request->title;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $category->status = $request->status;

        // 3. Resim Yükleme
        if ($request->hasFile('image')) {
            // storage/app/public/categories altına kaydeder
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
        }

        // 4. Veritabanına Kaydet
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('parent', 'children');
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $categories = Category::with('parent')->get();
        return view('admin.categories.edit', compact('categories' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'keywords' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        if($request->hasFile('image')) {
            if($category->image && Storage::disk('public')->exists($category->image)){
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->with('success' , 'Category deleted successfully');
    }
}
