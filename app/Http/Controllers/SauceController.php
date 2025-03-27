<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class SauceController extends Controller
{
    // Affiche toutes les sauces
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    // Affiche le formulaire de création d'une sauce
    public function create()
    {
        return view('sauces.create');
    }

    // Stock une nouvelle sauce en base
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'manufacturer' => 'required|max:100',
            'description' => 'required',
            'mainPepper' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data = $request->all();
            $data['imageUrl'] = $imagePath;
            Sauce::create($data);
        }

        return redirect()->route('sauces.index')->with('success', 'Sauce ajoutée !');
    }

    // Affichage d'une sauce spécifique
    public function show(Sauce $sauce)
    {
        return view('sauces.show', compact('sauce'));
    }

    // Affichage du formulaire d'édition d'une sauce
    public function edit(Sauce $sauce)
    {
        return view('sauces.edit', compact('sauce'));
    }

    // Mise à jour d'une sauce
    public function update(Request $request, Sauce $sauce)
    {
        $request->validate([
            'name' => 'required|max:100',
            'manufacturer' => 'required|max:100',
            'description' => 'required',
            'mainPepper' => 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['imageUrl'] = $imagePath;
        }

        $sauce->update($data);

        return redirect()->route('sauces.index')->with('success', 'Sauce mise à jour !');
    }

    // Suppression d'une sauce
    public function destroy(Sauce $sauce)
    {
        $sauce->delete();

        return redirect()->route('sauces.index')->with('success', 'Sauce supprimée !');
    }
}
