<?php

namespace App\Http\Controllers;
use App\Reserva;
use App\User;
use App\Butaca;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::orderBy('id','ASC')->paginate(10);
        return view('admin.reserva.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{
            $user = User::findOrFail($id);
            $butacas  = Butaca::where('estado','libre')->get();
            return view('admin.reserva.create',compact('user','butacas'));
        }catch(ModelNotFoundException $exception){
            Log::error('No se encontro el modelo ' . $exception->getMessage());
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $reserva = new Reserva();
            $reserva->fecha = $request->fecha;
    
            $reserva->n_personas = count($request->butacas);
            $reserva->user_id = $request->user_id;
            $reserva->save();
            DB::commit();
            Log::info('Se guardo el usuario ' . $request->user_id);
            for($i=0; $i < count($request->butacas); $i++){
                $reserva->butacas()->sync([$request->butacas[$i]]);
                $butaca = Butaca::findOrFail($request->butacas[$i]);
                $butaca->estado = "ocupado";
                $butaca->save();
            }
            return redirect()->route('user.show', [$request->user_id]);
        }catch(\PDOException $e){
            DB::rollBack();
            Log::error('Error al almacenar el usuario:' . $request->user_id . $e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $reserva = Reserva::findOrFail($id);
            return view('admin.reserva.edit',compact('reserva'));
        }catch(ModelNotFoundException $exception){
            Log::error('No se encontro la reserva: '.$exception->getMessage());
            return back()->withError($exception->getMessage())->withInput();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $reserva = Reserva::findOrFail($id);
            $reserva->delete();
            Log::emergency('Se elimino la reserva: ' . $id);
            return redirect()->back();
        }catch(ModelNotFoundException $exception){
            Log::error('No se encontro la reserva '.$exception->getMessage());
            return back()->withError($exception->getMessage())->withInput(); 
        }
    }
}
