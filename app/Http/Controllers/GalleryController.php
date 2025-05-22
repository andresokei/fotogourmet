<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class GalleryController extends Controller
{
    /**
     * Mostrar la galería del usuario
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Obtener las imágenes procesadas del usuario con paginación
        $gallery = Image::where('user_id', $user->id)
            ->whereNotNull('processed_path') // Solo imágenes que han sido procesadas
            ->orderBy('created_at', 'desc')
            ->paginate(12); // 12 imágenes por página
        
        return view('gallery', compact('gallery', 'user'));
    }
    
    /**
     * Filtrar galería por estilo (AJAX)
     */
    public function filter(Request $request)
    {
        $user = Auth::user();
        $filter = $request->get('filter');
        
        $query = Image::where('user_id', $user->id)
            ->whereNotNull('processed_path');
        
        if ($filter && $filter !== 'all') {
            if ($filter === 'recent') {
                // Últimos 7 días
                $query->where('created_at', '>=', now()->subDays(7));
            } elseif ($filter === 'this-month') {
                // Este mes
                $query->whereMonth('created_at', now()->month)
                      ->whereYear('created_at', now()->year);
            } elseif ($filter === 'last-month') {
                // Mes anterior
                $lastMonth = now()->subMonth();
                $query->whereMonth('created_at', $lastMonth->month)
                      ->whereYear('created_at', $lastMonth->year);
            }
        }
        
        $gallery = $query->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return response()->json([
            'html' => view('partials.gallery-grid', compact('gallery'))->render(),
            'pagination' => $gallery->links()->render()
        ]);
    }
    
    /**
     * Eliminar una imagen de la galería
     */
    public function destroy($id)
    {
        $user = Auth::user();
        
        $image = Image::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
        
        // Eliminar archivo físico original
        if ($image->original_path) {
            $originalFullPath = storage_path('app/public/' . $image->original_path);
            if (file_exists($originalFullPath)) {
                unlink($originalFullPath);
            }
        }
        
        // Eliminar archivo procesado
        if ($image->processed_path) {
            $processedFullPath = storage_path('app/public/' . $image->processed_path);
            if (file_exists($processedFullPath)) {
                unlink($processedFullPath);
            }
        }
        
        // Eliminar registro de la base de datos
        $image->delete();
        
        return redirect()->route('gallery.index')
            ->with('success', 'Imagen eliminada correctamente');
    }
}