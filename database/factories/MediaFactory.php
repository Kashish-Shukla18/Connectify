<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $url = $this->getUrl('post');
        $mime = $this->getMime($url);
        dd($url);

        return [

            'url' => $url,
            'mime' => $mime,
            'mediable_id' => Post::factory(),
            'mediable_type' => function (array $attributes) {

                return Post::find($attributes['mediable_id'])->getMorphClass();
            }

        ];
    }


    function getUrl($type = 'post'): string
    {

        switch ($type) {
            case 'post':

                $urls = [

                ];

                return $this->faker->randomElement($urls);
                break;

            case 'community':

                $urls = [


                ];

                return $this->faker->randomElement($urls);
                break;

            default:
                # code...
                break;
        }
    }



    function getMime($url):string
    {

        #using current data only 

        if (str()->contains($url, 'gtv-videos-bucket')) {

            return 'video';
        } else if (str()->contains($url, 'images.unsplash.com')) {

            return 'image';
        }
    }

     #chainable methods
    function community() : Factory {
        $url = $this->getUrl('community');
        $mime = $this->getMime($url);

        return $this->state(function(array $attributes) use($url,$mime) {

            return [
                'mime'=>$mime,
                'url'=>$url,

            ];

        });

        
    }


     #chainable methods
     function post() : Factory {
        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return $this->state(function(array $attributes) use($url,$mime) {

            return [
                'mime'=>$mime,
                'url'=>$url,

            ];

        });

        
    }



}
