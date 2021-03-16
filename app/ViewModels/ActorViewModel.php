<?php

namespace App\ViewModels;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $knowFor;
    public $socialLinks;
    public function __construct($actor, $knowFor, $socialLinks)
    {
        $this->actor = $actor;
        $this->knowFor =$knowFor;
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


        ])->only('id', 'name','profile_path', 'place_of_birth', 'birthday', 'biography','homepage', 'age');

    }
    public function knowFor()
    {
        //$cast = collect($this->credits)->get('cast');
        return collect($this->knowFor['cast'])->where('media_type','movie')->sortByDesc('popularity')->take(5)
        ->map(function($movie){
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']?'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']
                : 'https://via.placeholder/185x278',
                'title'=> isset($movie['title'])? $movie['title']:'untitled',
            ])->only('id','title', 'poster_path');
        });
    }
    public function socialLinks()
    {
        return collect($this->socialLinks)->merge([
            'facebook' => $this->socialLinks['facebook_id']? "https://www.facebook.com/".$this->socialLinks['facebook_id'] : null,
            'instagram' => $this->socialLinks['instagram_id']? "https://www.instagram.com/".$this->socialLinks['instagram_id'] : null,
            'twitter' => $this->socialLinks['twitter_id']? "https://www.facebook.com/".$this->socialLinks['twitter_id'] : null,
        ])->only('facebook', 'instagram', 'twitter');
    }
    public function credits()
    {
        return collect($this->knowFor['cast'])->map(function($movie){

            if(isset($movie['release_date']))
                $release_date = $movie['release_date'];
            elseif(isset($movie['first_air_date']))
                $release_date = $movie['first_air_date'];
            else
                $release_date = '';

            if(isset($movie['title']))
                $title = $movie['title'];
            elseif(isset($movie['name']))
                $title = $movie['name'];
            else
                $title = 'untitled';
            return collect($movie)->merge([
                'year' => $release_date? Carbon::parse($release_date)->year:'futuer',
                'title'=> $title,
                'character' =>$movie['character']? $movie['character']:'himself',

            ])->only('id', 'title', 'year', 'character');
            //->only('id','title', 'poster_path');
        })->sortByDesc('year');
    }
}
