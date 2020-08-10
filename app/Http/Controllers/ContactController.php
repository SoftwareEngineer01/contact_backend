<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = null;

        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'city' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'status' => false,
                'message' => $validator->errors(),
                'code' => 422
            ];
        }

        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->state = $request->get('department');
        $contact->city = $request->get('city');
        $contact->save();

        $data = [
            'status' => true,
            'message' => 'Datos registrados',
            'code' => 200
        ];

        return response()->json($data);

    }
}
