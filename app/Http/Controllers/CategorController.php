<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorController extends Controller
{

    public function index()
    {
        //Retrieve all posts from the database
        $categories = Categor::select('id', 'name','slug','description')->orderBy('created_at', 'desc')->get();
        return view('categor.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('categor.create');
    }

    public function store(Request $request)
    {
        //Validate the request data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //Create a new post using the request data
        $categor = new Categor;
        $categor->user_id = auth()->id();
        $categor->title = $request->input('title');
        $categor->slug = Str::slug($request->input('title'));
        $categor->type = 1;
        $categor->body = $request->input('body');
        $categor->save();
        //Redirect to the post create page
        return redirect()->route('categor.index')->with('success', 'Categor created successfully');
    }

    public function show($slug)
    {
        $categor = Categor::where('slug', $slug)->firstOrFail();
        //Return the view with the post data
        return view('categor.show', compact('categor'));
    }



    public function edit($id)
    {
        $categor = Categor::find($id);
        //Redirect to the post create page
        return view('categor.edit', compact('categor'));
    }


    public function update(Request $request, $id)
    {

        //Validate the request data
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        //Create a new post using the request data
        $categor = Categor::find($id);
        $categor->name = $request->input('name');
        $categor->slug = Str::slug($request->input('name'));
        $categor->description = $request->input('description');
        $categor->save();
        //Redirect to the post create page
        return redirect()->route('category.index')->with('success', 'Categor updated successfully');
    }

    public function destroy($id)
    {
        //Delete the category
        Categor::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Categor deleted successfully');
    }


}
