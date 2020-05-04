<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Services\ImageResize;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_size = env('ADMIN_PAGE_SIZE', 15);
        $doctors = Doctor::latest()
                          ->paginate();

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|min:3|max:100',
            'special' => 'required|min:2|max:100',
            'start_date' => 'required|date',
            'picture' => 'required|file|mimes:jpg,jpeg,png'
        ]);
        
        $img_name = $request->file('picture')->store('doctors', ['disk' => 'public']);
        ImageResize::crop($img_name, 300, 300);
        $thumb = 'thumbs/'.$img_name;
        Storage::disk('public')->delete($img_name);

        Doctor::create([
            'full_name' => $data['full_name'],
            'special' => $data['special'],
            'start_date' => $data['start_date'],
            'picture' => $thumb,
        ]);

        return redirect()->route('admin.doctors.index')->with('Success', 'Doktor yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $thumb = $doctor->picture;

        $data = $request->validate([
            'full_name' => 'required|min:3|max:100',
            'special' => 'required|min:2|max:100',
            'start_date' => 'required|date',
            'picture' => 'file|mimes:jpg,jpeg,png'
        ]);
        
        if ($request->file('picture')) {
            $img_name = $request->file('picture')->store('doctors', ['disk' => 'public']);
            ImageResize::crop($img_name, 300, 300);
            $thumb = 'thumbs/'.$img_name;
            Storage::disk('public')->delete([
                $img_name,
                $doctor->picture
            ]);
        }
        $doctor->update([
            'full_name' => $data['full_name'],
            'special' => $data['special'],
            'start_date' => $data['start_date'],
            'picture' => $thumb,
        ]);

        return redirect()->route('admin.doctors.index')->with('Success', 'Doktor o`gartirildi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        //Delete image
        Storage::disk('public')->delete($doctor->picture);
        //Delete model
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('delete', 'Doktor o`chirildi!');
    }
}
