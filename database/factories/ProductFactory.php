<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = [
            1=>['بلطو طويل', 'بلطو قصير', 'بلطو وسط'],
            2=> ['عباية خروج',  'عباية سوده', 'عباية بيتي'],
            3=> ['سكارف طويل',  'سكارف قصير', 'سكارف وسط'], 
        ];
        $id = Category::all()->random()->id;
        $title = $titles[$id][$this->faker->numberBetween(0, 2)];
        $price = $this->faker->numberBetween(100, 999);
        $image = 'product_'. Str::random() . '.jpg';
        if($id == 1){
            $fake = $this->faker->numberBetween(1,4);
            Storage::putFileAs("images/", public_path("/seeder/b00{$fake}.jpg"), $image);
        }else if($id == 2){
            $fake = $this->faker->numberBetween(1,4);
            Storage::putFileAs("images/", public_path("/seeder/Ab_00{$fake}.jpg"), $image);
        }else if($id == 3){
            $fake = $this->faker->numberBetween(1,4);
            Storage::putFileAs("images/", public_path("/seeder/s00{$fake}.jpg"), $image);
        }
        
        return [
            "title" => $title,
            "code"  => $this->faker->numberBetween(1000, 9999),
            "price"=> $price,
            "discount_price"=> round((90 * $price) / 100, 1),
            "short_text"=> "$title يعتبر من افضل المنتجات التي تقدم من خلال موقعنا ",
            "text"=> "$title يعتبر من افضل المنتجات التي تقدم من خلال موقعنا $title يعتبر من افضل المنتجات التي تقدم من خلال موقعنا  $title يعتبر من افضل المنتجات التي تقدم من خلال موقعنا ",
            "stock"=> $this->faker->numberBetween(200, 300),
            "is_active"=> 1,
            "is_feature"=> $this->faker->boolean(),
            'category_id'=> $id,
            "image1"=> "images/$image",
            "image2"=> "images/$image",
            "image3"=> "images/$image",
        ];
    }
}
