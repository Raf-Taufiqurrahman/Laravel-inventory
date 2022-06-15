<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use HasImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function($query) use($search){
            $query = $query->where('name', 'like', '%'.$search.'%');
        })->paginate(10)->withQueryString();

        return view('admin.category.index', compact('categories', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $image = $this->uploadImage($request, $path = 'public/categories/', $name = 'image');

        Category::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);

        return back()->with('toast_success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $image = $this->uploadImage($request, $path = 'public/categories/', $name = 'image');

        $category->update([
            'name' => $request->name,
        ]);

        if($request->file($name)){
            $this->updateImage(
                $path = 'public/categories/', $name = 'image', $data = $category, $url = $image->hashName()
            );
        }

        return back()->with('toast_success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Storage::disk('local')->delete('public/categories/'. basename($category->image));

        return back()->with('toast_success', 'Kategori Berhasil Dihapus');
    }
}
