<?php

use Illuminate\Database\Seeder;

class ButacasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $columnas = 10;
    public $filas = 5;

    public function run()
    {
        for($i=1; $i <= $this->filas; $i++ ){
            $fila = new App\Fila();
            $fila->n_fila = $i;
            $fila->save();
            for($n=1; $n <= $this->columnas; $n++) {
                $columna = new App\Columna();
                $columna->n_columna = $n;
                $columna->save();

                $butaca = new App\Butaca();
                $butaca->columna_id = $n;
                $butaca->fila_id = $i;
                $butaca->save();
            }
        }
    }
}
