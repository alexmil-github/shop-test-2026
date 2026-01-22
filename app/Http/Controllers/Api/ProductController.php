<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->get(['id', 'name', 'price', 'description', 'image_path as image_url']);

        return response()->json($products);
    }

    public function show($productId)
    {
        $product = Product::find($productId);
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'image_url' => $product->image_path,
        ]);
    }

    public function buy($productId)
    {
        //Проверяем авторизацию
        $user_id = Auth::id();

        //Находим продукт
        $product = Product::find($productId);


        //Создаем заказ в БД

        $order = Order::create([
            'user_id' => $user_id,
            'product_id' => $productId,
            'price' => $product->price
        ]);

        //Отправляем запрос к платежной системе

        $paymentResponse = Http::post('http://vippo.ru/payments.php', [
            'price' => $product->price,
            'webhook_url' => config('app.url') . '/api/payment-webhook',
        ])->json();


        //Сохраняем external_order_id из ответа платежки

        $order->update([
            'external_order_id' => $paymentResponse['order_id'],
        ]);

        return response()->json([
           'pay_url' => $paymentResponse['pay_url'],
        ]);



    }
}
