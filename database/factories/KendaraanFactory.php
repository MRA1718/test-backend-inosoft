<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vehicles= array(
            'mobil',
            'motor'
        );
        
        $vtype = array_rand($vehicles);
        
        if($vehicles[$vtype] == 'mobil') {
            return [
                'tahun_keluaran' => $this->faker->year($max = 'now'),
                'warna' => $this->faker->colorName(),
                'harga' => $this->faker->numberBetween($min = 100000000, $max = 1000000000),
                'stok' => $this->faker->numberBetween($min = 500, $max = 10000),
                'terjual' => $this->faker->numberBetween($min = 10, $max = 500),
                'tipe_kendaraan' => $vehicles[$vtype],
                'mesin' => $this->faker->domainWord(),
                'kapasitas_penumpang' => $this->faker->numberBetween($min = 4, $max = 8),
                'tipe' => $this->faker->citySuffix(),
            ];
        } else {
            return [
                'tahun_keluaran'=>$this->faker->year($max = 'now'),
                'warna' => $this->faker->colorName(),
                'harga' => $this->faker->numberBetween($min = 1000000, $max = 50000000),
                'stok' => $this->faker->numberBetween($min = 100, $max = 10000),
                'terjual' => $this->faker->numberBetween($min = 10, $max = 500),
                'tipe_kendaraan' => $vehicles[$vtype],
                'mesin' => $this->faker->domainWord(),
                'tipe_suspensi' => $this->faker->company(),
                'tipe_transmisi' => $this->faker->citySuffix(),
            ];
        }
    }
}
