<?php

namespace App\Http\Livewire\Posts;

use App\Models\Rating;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RatingTestNotificationMailable;

class RatingTest extends Component
{
    public $rating, $max_rating, $post_id, $user_id, $eval_id;

    public function mount($postId, $userId, $evalId)
    {
        $this->post_id = $postId;
        $this->user_id = $userId;
        $this->eval_id = $evalId;
    }

    public function ratingStudent()
    {
        $this->validate([
            'max_rating' => ['required'],
            'rating' => ['required'],
        ]);

        Rating::create([
            'max_rating' => $this->max_rating,
            'rating' => $this->rating,
            'creator' => Auth::user()->id,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'evaluation_id' => $this->eval_id,
        ]);

        # Send mail for notificate to the student
        $student = DB::table('users')->find($this->user_id);

        $this->reset('rating', 'max_rating', 'post_id', 'user_id');
        $this->emit('render');

        $mail = new RatingTestNotificationMailable();
        Mail::to($student->email)->send($mail);

    }

    public function render()
    {
        return view('livewire.posts.rating-test');
    }
}
