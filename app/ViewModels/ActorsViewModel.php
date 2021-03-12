<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
    public $populerActors;

    public function __construct($populerActors)
    {
        $this->populerActors = $populerActors;
    }

    public function populerActors()
    {

        return collect($this->populerActors)->map(function ($actor) {
            return collect($actor)->merge([
                'profile_path' =>
                $actor['profile_path']?"https://image.tmdb.org/t/p/w235_and_h235_face/" . $actor['profile_path']
                :'https://ui-avatars.com/api/?size=235&name='.$actor['name'],
                'works'=> collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                    collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(", "),
            ])->only(
                'id', 'name', 'profile_path', 'works'
            );
        });

    }
}
