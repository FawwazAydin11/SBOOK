<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::where('user_id', auth()->id())->get();
        return view('pemilik.fields.index', compact('fields'));
    }

    public function create()
    {
        return view('pemilik.fields.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'price' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'available_from' => 'required|date'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('fields', 'public');
        }

        $data['user_id'] = auth()->id();
        Field::create($data);

        return redirect()->route('fields.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }
}
