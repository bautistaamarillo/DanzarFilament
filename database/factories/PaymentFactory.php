<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentId = Student::pluck('id')->toArray();
        return [
            'student_id' => fake()->unique()->randomElement($studentId),
            'date' => fake()->date('Y_m_d'),
            'invoice_number' => fake()->randomNumber(7, true),
            // 'active' => fake()->numberBetween(0, 1)
            
        ];
    }
}
