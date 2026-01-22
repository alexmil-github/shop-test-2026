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

        $paymentResponse = Http::post('http://example.local/payments.php', [
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

    public function handleWebhook(Request $request)
    {

        // 1. Получаем данные от платежной системы
        $externalOrderId = $request->input('order_id');
        $status = $request->input('status');

        // 2. Находим заказ в нашей БД по external_order_id
        $order = Order::where('external_order_id', $externalOrderId)->first();

        if ($order) {
            // 3. Обновляем статус заказа
            $order->update([
                'status' => $status // 'success' или 'failed'
            ]);

            // 4. Можно отправить уведомление пользователю и т.д.
            if ($status === 'success') {
                // Товар оплачен, можно его выдать
            } else {
                // Оплата не прошла
            }
        }

        // 5. Возвращаем 204 (No Content) как требуется
        return response()->noContent();
    }
}
