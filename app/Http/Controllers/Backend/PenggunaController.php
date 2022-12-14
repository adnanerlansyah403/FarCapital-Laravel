<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * CRUD
     * list - index
     * detail - show
     * edit - update
     * create - store
     * delete - destroy
    */

    public function index()
    {
        $pengguna = Pengguna::query()->get();

        return response()->json([
            "status" => true,
            "message" => "Successfully get data from api",
            "data" => $pengguna
        ]);
    }

    public function show($id)
    {
        $pengguna = Pengguna::query()
                    ->where('id', $id)
                    ->first();

        if($pengguna == null) {
            return response()->json([
                "status" => false,
                "message" => "User not found",
                "data" => null,
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully get data from api",
            "data" => $pengguna
        ]);   
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        // $validator = Validator::make($request->all(), [
        //     $payload['nama'] => 'required',
        //     $payload['email'] => 'required',
        //     $payload['password'] => 'required|max:255'
        // ]);

        // if($validator->fails()) {
        //     return response()->json([
        //         "status" => false,
        //         "message" => $validator->errors(),
        //         "data" => null
        //     ], 422);
        // }
        if(!isset($payload['nama'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada nama",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['email'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada email",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['password'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada password",
                "data" => null
            ]);   
        }

        $pengguna = Pengguna::query()->create($payload);
        
        return response()->json([
            "status" => true,
            "message" => "Berhasil Pengguna",
            "data" => $pengguna->makeHidden([
                'password',
                'id',
                'created_at',
                'updated_at'
             ])
        ]);   
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        $pengguna = Pengguna::query()->findOrFail($id);
        // dd($pengguna);

        if($pengguna == null) {
            return response()->json([
                'status' => false,
                'message' => 'Pengguna not found',
                'data' => null
            ]);
        }

        $pengguna->update([
            'nama' => isset($payload['nama']) ? $payload['nama'] : $pengguna->nama,
            'email' => isset($payload['email']) ? $payload['email'] : $pengguna->email,
            'password' => isset($payload['password']) ? $payload['password'] : $pengguna->password
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully updated pengguna',
            'data' => $pengguna->makeHidden([
               'password',
               'id',
               'created_at',
               'updated_at'
            ])
        ]);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::query()->where('id', $id)->first();
        if($pengguna == null) {
            return response()->json([
                "status" => false,
                "message" => "Pengguna not found",
                "data" => null
            ]);
        }

        $pengguna->delete();

        return response()->json([
            "status" => true,
            "message" => "Pengguna berhasil dihapus",
            "data" => null
        ]);
    }


}
