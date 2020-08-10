<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;


class DepartmentController extends Controller
{
    public function getDepartments(){

        $departments = DB::table('departments')
                      ->select('departments.id','departments.name')
                      ->get();

        $data = collect($departments);

        return response()->json([
            'code' => 200,
            'data' => $data,
            'message' => 'Datos recuperados correctamente'
        ]);
    }

    public function getCitiesByDepartment($idDepartment){
        $cities = DB::table('cities')
        ->select('cities.name')
        ->where('department_id', $idDepartment)
        ->get();

        $data = collect($cities);

        return response()->json([
            'code' => 200,
            'data' => $data,
            'message' => 'Datos recuperados correctamente'
        ]);
    }
}
