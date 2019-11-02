<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Contact::paginate(10);
        return view('crud.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255|min:8|string',
            'address' => 'required|string',
            'phone' => 'required|max:15|min:6|string|unique:contacts,phone',
        ]);
        try{
            $data = [
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ];
            Contact::create($data);
            $this->setSuccessMsg('Contact Created Successful!');
            return redirect()->back();
        }catch (Exception $e){
            $this->setErrorMsg($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $data = Contact::find($id);
        return view('crud.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'      => 'required|max:255|min:8|string',
            'address'   => 'required|string',
            'phone'     => 'required|max:15|min:6|string|unique:contacts,phone,'.$id,
        ]);
        try{
            $data = [
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ];
            $update  = Contact::find($id);
            $update->update($data);
            $this->setSuccessMsg('Contact Update Successful!');
            return redirect()->route('crud.index');
        }catch (Exception $e){
            $this->setErrorMsg($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        $this->setSuccessMsg('Contact Deleted!');
        return redirect()->back();
    }
}
