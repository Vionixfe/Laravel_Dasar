<?php

namespace App\Http\Controllers;

// use function; // Removed invalid statement
use App\Models\Doctor;
use App\Http\Services\DoctorService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class DoctorController extends Controller
{


    public function __construct(private DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }
    /**
     *
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $data = $this->doctorService->getWithPaginate(5, $search);

        return view('doctor.index', [
            'doctors' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view ('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    return dd($request->all());
        $data = $request->only(['name', 'email', 'phone', 'gender']);

        try {
            $this->doctorService->create($data);
            return redirect('/doctor')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $error) {
            return redirect('/doctor/create')->with('error', $error->getMessage());
        }

        }

        // $model = new Doctor();
        // $model->uuid = Str::uuid();
        // $model->name = $request->name;
        // $model->email = $request->email;
        // $model->phone = $request->phone;
        // $model->gender = $request->gender;
        // $model->save();


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= $this->doctorService->getById($id); // Select * from doctors
        // dd($data);
        // return $data['uuid'];

        return view('doctor.show', [
            'doctor'=> $data
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('doctor.edit',[
            'doctor'=> $this->doctorService->getById($id),]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      try{

        //    Doctor:where('uuid', $id)->update($request->only(['name', 'email', 'phone', 'gender']));

           $dataByForm = $request->only(['name', 'email', 'phone', 'gender']);

           $this->doctorService->update($dataByForm, $id);

           return redirect('/doctor')->with('success', 'Data berhasil diubah');
        } catch (\Exception $error) {
            return redirect('/doctor/' . $id . '/edit')->with('error', $error->getMessage());
        }
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->doctorService->delete($id);

            return redirect('/doctor')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $error) {
            return redirect('/doctor')->with('error', $error->getMessage());
        }
    }
}




