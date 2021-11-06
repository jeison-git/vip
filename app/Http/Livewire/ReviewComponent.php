<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    //Review y calificacion del proceso compra
    
    public $order;
    public $rating;
    public $comment;
    public $currentId;
    public $hideForm;

    public function mount()
    {
        if (auth()->user()) {
            $rating = Review::where('user_id', auth()->user()->id)->where('order_id', $this->order->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.review-component');
    }

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = Review::where('order_id', $this->order->id)->where('status', 1)->with('user')->get();
        return view('livewire.review-component', compact('comments'));
    }
   

    public function rate()
    {
        $rating = Review::where('user_id', auth()->user()->id)->where('order_id', $this->order->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->order_id = $this->order->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Review;
            $rating->user_id = auth()->user()->id;
            $rating->order_id = $this->order->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }

    public function delete($id)
    {
        $rating = Review::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }
}
