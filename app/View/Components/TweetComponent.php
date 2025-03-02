<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Tweet;

class TweetComponent extends Component
{
    // Asegúrate de declarar la propiedad pública
    public $tweet;

    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function render()
    {
        return view('components.tweet');
    }
}