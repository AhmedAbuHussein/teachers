<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = "category_". Str::random(). '.png';
        Storage::putFileAs("images/", public_path('/seeder/cat_001.png'), $name);

        Category::create([
            "title"=> "معامل",
            "text"=> "خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم.",
            "image"=> "images/$name"
        ]);

        $name = "category_". Str::random(). '.png';
        Storage::putFileAs("images/", public_path('/seeder/cat_002.png'), $name);
        Category::create([
            "title"=> "عبايات",
            "text"=> "هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة",
            "image"=> "images/$name"
        ]);

        $name = "category_". Str::random(). '.png';
        Storage::putFileAs("images/", public_path('/seeder/cat_003.png'), $name);
        return [
            "title"=> "سكارف",
            "text"=> "هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص.",
            "image"=> "images/$name"
        ];
    }
}
