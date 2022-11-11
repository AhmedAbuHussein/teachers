<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $index = $this->faker->numberBetween(0,3);
        $titles = ['اللغة العربية', 'اللغة الانجليزية', 'الرياضيات', 'العلوم'];
        $images = ['arabic.png', 'english.jpg', 'math.png', 'scince.png'];
        $id = Level::all()->random()->id;
        $title= $titles[$index];

        $image = "course_". Str::random(). '.png';
        $name = $images[$index];
        Storage::putFileAs("images/", public_path("/seeder/$name"), $image);

        return [
            "title"=> $title,
            "code"=> $this->faker->numberBetween(1000, 9999),
            "extra_url"=> $this->faker->url(),
            "text"=> "خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم. قام البروفيسور ريتشارد ماك لينتوك وهو بروفيسور اللغة اللاتينية في جامعة هامبدن-سيدني في فيرجينيا بالبحث عن أصول كلمة لاتينية غامضة في نص لوريم إيبسوم",
            "is_active"=> 1,
            "level_id"=> $id,
            "image"=> "images/$image",
            'user_id'=> collect(User::where('role', 'professor')->get())->random()->id,
        ];
    }
}
