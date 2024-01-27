<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImagesStore
{
    public static function addImages($person, $images)
    {
        foreach ($images as $image)
        {
            $image_path = $image->store('images', 'public');
            $image_name = pathinfo($image_path)['basename'];
            $person->images()->create([
                'name' => $image_name,
            ]);
        }
    }

    public static function delImages($person, $del_images)
    {
        foreach ($del_images as $image)
        {
            Storage::disk('public')->delete("images/$image");
            $person->images()->where('name', $image)->delete();
        }
    }
}
