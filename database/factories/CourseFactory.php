<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = ['اللغة العربية', 'اللغة الانجليزية', 'الرياضيات', 'العلوم'];
        $id = Level::all()->random()->id;
        $title= $titles[$this->faker->numberBetween(0,3)];

        return [
            "title"=> $title,
            "code"=> $this->faker->numberBetween(1000, 9999),
            "extra_url"=> $this->faker->url(),
            "text"=> "خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم. قام البروفيسور ريتشارد ماك لينتوك وهو بروفيسور اللغة اللاتينية في جامعة هامبدن-سيدني في فيرجينيا بالبحث عن أصول كلمة لاتينية غامضة في نص لوريم إيبسوم",
            "is_active"=> 1,
            "level_id"=> $id,
        ];
    }
}
