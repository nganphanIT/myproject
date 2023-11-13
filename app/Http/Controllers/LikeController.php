<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function likeProduct($productId)
        {
            $user = auth()->user();
            $existingLike = Like::where(['user_id' => $user->id, 'product_id' => $productId])->first();
            if ($existingLike) {
                $existingLike->delete();
                // $isLiked = false; // User unliked the post
            } else {
                Like::create(['user_id' => $user->id, 'product_id' => $productId, 'created_at' => now()]);
                // $isLiked = true;
            }
            return redirect::to('/blog/client/');
        }

    public function getLikesCount($productId)
    {
        $user = auth()->user();
        $likesCount = Like::where('product_id', $productId)->count();
        return redirect::to('/blog/client/');
    }

    public function isLiked($productId)
    {
        $user = auth()->user();
        $isLiked = Like::where(['user_id' => $user->id, 'product_id' => $productId])->exists();
        return redirect::to('/blog/client/');
    }

}

