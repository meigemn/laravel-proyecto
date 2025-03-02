<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Feed extends Component
{
    public $tweets;

    public function __construct()
{

$this->tweets = Tweet::with(['user', 'likes'])
->withCount('likes')
->latest()
->paginate(10);

    
}



    public function render(): View|Closure|string
    {
        return view('components.feed', [
            'tweets' => $this->tweets
        ]);
    }
}
