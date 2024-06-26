<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //index
    public function index()
    {
    }

    //show
    public function show($id)
    {
    }

    //store
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'transaction_time' => 'required',
            'kasir_id' => 'required|exists:users,id',
            'total_price' => 'required|integer',
            'total_item' => 'required|integer',
            'payment_method' => 'required',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|numeric',
            'order_items.*.total_price' => 'required|numeric'
        ]);

        DB::beginTransaction();

        try {
            //create order
            $order = Order::create([
                'transaction_time' => $request->transaction_time,
                'kasir_id' => $request->kasir_id,
                'total_price' => $request->total_price,
                'total_item' => $request->total_item,
                'payment_method' => $request->payment_method
            ]);

            //create order items
            foreach ($request->order_items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['total_price']
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $order
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Order could not be saved',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //edit
    public function edit($id)
    {
    }

    //update
    public function update(Request $request, $id)
    {
    }

    //destroy
    public function destroy($id)
    {
    }
}
