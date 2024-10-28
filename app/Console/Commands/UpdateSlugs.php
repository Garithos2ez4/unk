<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\Producto; // Asegúrate de importar el modelo correcto

class UpdateSlugs extends Command
{
    // Nombre del comando
    protected $signature = 'update:slugs';

    // Descripción del comando
    protected $description = 'Limpia los slugs en la base de datos y los hace únicos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener todos los productos
        $productos = Producto::all();

        foreach ($productos as $producto) {
            // Limpia el slug usando Str::slug()
            $nuevoSlug = Str::slug($producto->nombreProducto); // Ajusta esto según el campo correcto

            // Asegurar que sea único
            $slugUnico = $this->generarSlugUnico($nuevoSlug, $producto->idProducto);

            // Actualizar el slug en la base de datos
            $producto->slugProducto = $slugUnico;
            $producto->save();

            $this->info('Slug actualizado para producto ID: ' . $producto->idProducto . ' - Nuevo slug: ' . $slugUnico);
        }
    }

    // Función para generar un slug único
    protected function generarSlugUnico($slugBase, $productoId)
    {
        $slug = $slugBase;
        $contador = 1;

        // Verificar si el slug ya existe
        while (Producto::where('slugProducto', $slug)->where('idProducto', '!=', $productoId)->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
        }

        return $slug;
    }
}
