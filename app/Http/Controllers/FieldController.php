<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::paginate(10);
        return view('dashboard.field.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.field.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $field_img = $request->file('field_image');
            $request->merge(['is_promo' => $request->is_promo ? true : false,
                'slug' => Str::slug($request->title)]);
            if ($field_img) {
                $path = Storage::disk('public')->put('field_images', $field_img);
                $request->merge(['field_img' => $path]);
            }
            Field::create($request->all());
            return redirect()->route('admin.field.index')->with('success', 'Berhasil Menambah Data');
        } catch (\Throwable $th) {
            return redirect()->route('admin.field.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        return view('dashboard.field.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('dashboard.field.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        try {
            $field_img = $request->file('field_image');
            $request->merge(['is_promo' => $request->is_promo ? true : false]);
            if ($field_img) {
                if (!is_null($field->field_img) && Storage::exists($field->field_img)) {
                    Storage::delete($field->field_img);
                }
                $path = Storage::disk('public')->put('field_images', $field_img);
                $request->merge(['field_img' => $path]);
            }
            $field->update($request->all());
            return redirect()->back()->with('success', 'Berhasil Edit Data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
