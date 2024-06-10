<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Laravel', 'PHP', 'Vue', 'JavaScript', 'Tailwind', 'Bootstrap', 'Nuxt', 'Laravel', 'PHP', 'Vue', 'JavaScript', 'Tailwind', 'Bootstrap', 'Nuxt'];
        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Tag::generateSlug($newTag->name);
            $newTag->save();
        }
    }
}
