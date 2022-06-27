<?php

namespace Database\Factories;

use App\Models\Equipamento;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipamento>
 */
class EquipamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipamento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        [
            'placa_cavalo' => $this->faker->name(),
            'prefixo_cavalo' => Str::random(10),
            'placa_semi_reboque' => Str::random(10),
            'tipo_conjunto' => Str::random(10),
            'contrato' => Str::random(10),
            'regime' => Str::random(10),
            'cod_sap' => Str::random(10),
        ];
    }
}
