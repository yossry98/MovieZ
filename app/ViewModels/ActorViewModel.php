<?php

namespace App\ViewModels;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $credits;
    public $socialLinks;
    public function __construct($actor, $credits, $socialLinks)
    {
        $this->actor = $actor;
        $this->credits =$credits;
        $this->socialLinks = $socialLinks;
    }

    public function actor()
    {
        $actor = $this->actor;
        return collect($actor)->merge([
            'profile_path' =>
            $actor['profile_path']?"https://image.tmdb.org/t/p/w300_and_h450_face/" .$actor['profile_path']
            :'https://ui-avatars.com/api/?size=350&name='.$actor['name'],
            'bitrhday' => Carbon::parse($actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($actor['birthday'])->age,


        ])
        //->only('id', 'name','profile_path', 'place_of_birth', 'birthday', 'biography','homepage')
        ->dump();
    }
    public function credits()
    {
        return collect($this->credits['cast'])->where('media_type','movie')->sortBy(['popularity','desc'])->take(5)
        ->map(function($movie){
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w235/'.$movie['poster_path'],
            ]);
        })->only('title', 'poster_path')->dump();
    }
    public function socialLinks()
    {
        return collect($this->socialLinks)->dump();
    }
}
