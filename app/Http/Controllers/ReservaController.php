<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cancha;
use Carbon\Carbon;


use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('reservas.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getEvents(Request $request){

        $reservas = Reserva::where('cancha_id', $request->id)
            ->whereBetween('fecha', [now()->toDateString(), now()->addDays(8)->toDateString()])
            ->get();
        
        $ocupados = [];
        foreach ($reservas as $reserva) {
            $horaRedonda = Carbon::parse($reserva->hora)->format('H:00:00');
            $key = $reserva->fecha . ' ' . $horaRedonda;
            $ocupados[$key] = $reserva;
        }

        $events = [];
        
        $horaInicio = 8; 
        $horaFin = 23; 

        for ($i = 0; $i < 8; $i++) {
            $fecha = now()->addDays($i)->toDateString();
            
            for ($h = $horaInicio; $h <= $horaFin; $h++) {
                              
                $horaStr = str_pad($h, 2, '0', STR_PAD_LEFT) . ':00:00'; 
                $horaSiguienteStr = str_pad($h + 1, 2, '0', STR_PAD_LEFT) . ':00:00';
                
                $startDateTime = $fecha . ' ' . $horaStr;
                $endDateTime   = $fecha . ' ' . $horaSiguienteStr;

                $mostrarHoraInicio = substr($horaStr, 0, 5);
                $mostrarHoraFin = substr($horaSiguienteStr, 0, 5);
                
                $key = $startDateTime;


                
                if (isset($ocupados[$key])) {
                    
                    $reserva = $ocupados[$key];
                    $events[] = [
                        'title' => $reserva->estado . ' ' . $mostrarHoraInicio . ' a ' . $mostrarHoraFin,
                        'start' => $startDateTime,
                        'end'   => $endDateTime,
                        'className' => $reserva->estado == 'reservada' ? 'reservada' : 'confirmada',                
                    ];
                } else {
                    $events[] = [
                        'title' => 'Libre' . ' ' . $mostrarHoraInicio . ' a ' . $mostrarHoraFin,
                        'start' => $startDateTime,
                        'end'   => $endDateTime,
                        'className' => 'libre',
                       
                    ];
                }
            }
        }
        return response()->json($events);

       
    }

    public function listIndex(Request $request){

        $reservas = Reserva::where('cancha_id', $request->id)
                    ->whereBetween('fecha', [now()->toDateString(), now()->addDays(8)->toDateString()])
                    ->get();
             
        return view('reservas.index', compact('reservas'));

    }

    private function getEventsLibres(){

       
           
        $reservas = Reserva::where('cancha_id', $request->id)
                    ->whereBetween('fecha', [now()->toDateString(), now()->addDays(8)->toDateString()])
                    ->get();
        
        $events = [];
        $events = $this->getEventsLibres();
        foreach ($reservas as $reserva) {
            $events[] = [
                'title' => $reserva->estado,
                'start' => $reserva->fecha . ' ' . $reserva->hora->format('H:i:s'),
                'end' => $reserva->fecha . ' ' . $reserva->hora->copy()->addHour()->format('H:i:s'),
                'backgroundColor' => $reserva->estado == 'reservada' ? '#800000ff' : '#ffae00ff',
            ];
        }

        return response()->json($events);
    }
    
}
