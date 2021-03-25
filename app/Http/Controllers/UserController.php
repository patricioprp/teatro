<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();
            Log::info('Se guardo el usuario ' . $request->apellido);
            return redirect(route('user.index'));
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::error('Error al almacenar el usuario:' . $request->apellido . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);
            return view('admin.user.reserva',compact('user'));
        }catch(ModelNotFoundException $exception){
            Log::error('No se encontro el modelo ' . $exception->getMessage());
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            Log::info('Se encontro' . $id);
        } catch (ModelNotFoundException $exception) {
            Log::error('No se encontro el modelo ' . $exception->getMessage());
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.user.edit', compact('user'));
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
        try{
        DB::beginTransaction();
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        DB::commit();
        Log::info('Se edito el usuario ' . $request->apellido);
        }  catch (\PDOException $e) {
        DB::rollBack();
        Log::error('Error al editar el usuario ' .$e->getMessage());
        }
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Log::emergency('Se ilimino el usuario: ' . $id);
        } catch (ModelNotFoundException $exception) {
            Log::error('No se encontro el usuario: '.$exception->getMessage());
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect(route('user.index'));
    }
}
