<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\Reporte;

class FaqController extends Controller
{
    public function index()
    {
        $faqPath = resource_path('faq.json');

        if (!File::exists($faqPath)) {
            Log::error("Archivo JSON no encontrado en $faqPath");
            $faq = [];
        } else {
            $faqContent = File::get($faqPath);
            $faq = json_decode($faqContent, true);

            if (!is_array($faq)) {
                Log::error("El JSON de FAQ no es válido.");
                $faq = [];
            }
        }

        return view('faq', ['faq' => $faq]);
        
    }
}
