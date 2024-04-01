<?php

namespace App\Http\Controllers;

use App\Models\pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::paginate(10);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $validated = $request->validate([
            'name'    => ['required', 'string'],
            'photo'   => ['required', 'image'],
            'kind'    => ['required', 'string'],
            'weight'  => ['required', 'numeric'],
            'age'     => ['required', 'numeric'],
            'breed'=> ['required', 'string'],
            'location'=> ['required', 'string'],
        ]);

        if ($validated) {
            // Upload File
            if ($request->hasFile('photo')) {
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
    
            $pet = Pet::create([
                'name'    => $request->name,
                'photo'   => $photo,
                'kind'    => $request->kind,
                'weight'  => $request->weight,
                'age'     => $request->age,
                'breed'   => $request->breed,
                'location'=> $request->location,
            ]);

            if ($pet) {
                return redirect('pets')->with('message', 'The Pet: '.$request->name.' was successfully added!');
            }

        }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pet $pet)
    {
         //dd($request->all());
         $validated = $request->validate([
            'name'    => ['required', 'string'],
            'kind'    => ['required', 'string'],
            'weight'  => ['required', 'numeric'],
            'age'     => ['required', 'numeric'],
            'breed'   => ['required', 'string'],
            'location'=> ['required', 'string'],
        ]);

        if ($validated) {
            // Upload File
            if ($request->hasFile('photo')) {

                //Delete photo
                $image_path = public_path("/images/".$pet->photo);
                if(file_exists($image_path)){
                    unlink($image_path);
                }

                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            } else{
                $photo = $request->photoactual;
            }
            
            $pet->name    = $request->name;
            $pet->photo   = $photo;
            $pet->kind    = $request->kind;
            $pet->weight  = $request->weight;
            $pet->age     = $request->age;
            $pet->breed   = $request->breed;
            $pet->location= $request->location;

            if ($pet->save()) {
                return redirect('pets')->with('message', 'The Pet: '.$request->name.' was successfully adited!');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(pet $pet)
    {
        //Delete photo
        $image_path = public_path("/images/".$pet->photo);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        if($pet->delete()){
            return redirect('pets')->with('message', 'The Pet: '.$pet->name.' was successfully deleted!');
        }
    }
}
