<?php

namespace App\Services\Film;

use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function update($data, $film)
    {
        if (isset($data['url_poster'])) {
            $this->_deletePhoto($film->url_poster);
        }

        if (!empty($data['url_poster'])) {
            $data['url_poster'] = Storage::disk('public')->put('/images', $data['url_poster']);
        }

        $gendres = $data['genre_id'];
        unset($data['genre_id']);

        $film->update($data);
        $film->genres()->sync($gendres);

    }

    public function create($data)
    {
        if (isset($data['url_poster'])) {
            $data['url_poster'] = Storage::disk('public')->put('/images', $data['url_poster']);;
        }

        $gendres = $data['genre_id'];
        unset($data['genre_id']);

        $film = Film::create($data);
        $film->genres()->attach($gendres);
    }

    private function _deletePhoto($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
