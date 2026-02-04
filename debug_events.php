<?php

use Illuminate\Contracts\Console\Kernel;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Http\Controllers\ReservaController;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Kernel::class)->bootstrap();

// Helper to simulate request
function getEventsForCancha($canchaId) {
    echo "\n--- Testing Cancha ID: $canchaId ---\n";
    $controller = new ReservaController();
    $request = new Request();
    $request->merge(['id' => $canchaId]);

    try {
        $response = $controller->getEvents($request);
        $content = $response->getContent();
        echo "JSON Output:\n$content\n";
        
        $data = json_decode($content, true);
        if (empty($data)) {
            echo "Result: EMPTY ARRAY\n";
        } else {
            echo "Result: " . count($data) . " events found.\n";
            echo "First Event Sample:\n";
            print_r($data[0]);
        }
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

try {
    // Find a cancha with reservations
    $reserva = Reserva::latest()->first();
    
    if (!$reserva) {
        echo "No reservations found in DB.\n";
    } else {
        getEventsForCancha($reserva->cancha_id);
    }

} catch (\Throwable $e) {
    echo "CRITICAL ERROR: " . $e->getMessage() . "\n";
}
