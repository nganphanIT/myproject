<?php


namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
class CartController extends Controller {
    public function addItem($id) {
        $product = Blog::find($id);
        $product->discounted_price = $product->price - $product->discount;
        if (!$product) {
            return response()->json(['message' => $id], 404);
        }
        $user = Auth::user();
        $cartItem = CartItem::where('user_id', $user->id)
                            ->where('product_id', $id)
                            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng của người dùng, chỉ cập nhật số lượng
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo mới CartItem và liên kết nó với người dùng
            $cartItem = new CartItem();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $id;
            $cartItem->quantity = 1;
            $cartItem->save();

        }
        session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
        return redirect()->back();
    }
    public function index()
    {
        $user = Auth::user();

        $cartItems = CartItem::where('user_id', $user->id)->get();
        if($cartItems->isEmpty()){
            session()->flash('success', 'Hãy thêm món hàng mà bạn yêu thích vào giỏ hàng, giỏ hàng của bạn đang đói!');
            return redirect()->back();
        }
        else{
            return view('blog.client.cart', compact('cartItems'));
        }

    }
    public function updateQuantity($userId, $productId)
    {
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity = request('quantity');
            $cartItem->save();
        }

        // You can return a response if needed
        return response()->json(['success' => true]);
    }

    function removeCartItem($user_id, $id){
        $cartItem = new CartItem();
        $cartItem = CartItem::where('user_id', $user_id)->where('id', $id)->first();
       if ($cartItem) {
            $cartItem->delete();
            session()->flash('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
            return redirect()->back();
        } else {
            session()->flash('success', 'Không tìm thấy sản phẩm cần xóa.');
            return redirect()->back();
        }
    }
}
