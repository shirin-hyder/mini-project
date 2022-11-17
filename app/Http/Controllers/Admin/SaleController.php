<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Events\PurchaseOutStock;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'sales';
        if ($request->ajax()) {
            $sales = Sale::latest();
            return DataTables::of($sales)
                ->addIndexColumn()
                ->addColumn('name', function ($sale) {
                    return $sale->name;
                })
                ->addColumn('phone', function ($sale) {
                    return $sale->phone;
                })
                ->addColumn('total_price', function ($sale) {
                    return settings('app_currency', '$') . ' ' . $sale->total_price;
                })
                ->addColumn('date', function ($row) {
                    return date_format(date_create($row->created_at), 'd M, Y');
                })
                ->addColumn('action', function ($row) {
                    // $editbtn = '<a href="' . route("sales.edit", $row->id) . '" class="editbtn"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>';
                    $editbtn = '<a href="' . route("sales.print", $row->id) . '" class="editbtn"><button class="btn btn-primary"><i class="fas fa-print"></i></button></a>';
                    $deletebtn = '<a data-id="' . $row->id . '" data-route="' . route('sales.destroy', $row->id) . '" href="javascript:void(0)" id="deletebtn"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>';
                    if (!auth()->user()->hasPermissionTo('edit-sale')) {
                        $editbtn = '';
                    }
                    if (!auth()->user()->hasPermissionTo('destroy-sale')) {
                        $deletebtn = '';
                    }
                    $btn = $editbtn . ' ' . $deletebtn;
                    return $btn;
                })
                ->rawColumns(['product', 'action'])
                ->make(true);
        }
        $products = Product::get();
        return view('admin.sales.index', compact(
            'title',
            'products',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create sales';
        $products = Product::get();
        return view('admin.sales.create', compact(
            'title',
            'products'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);
        $sold_product = Product::find($request->product_id);
        $sold_product2 = Product::find($request->product_id_2);
        $sold_product3 = Product::find($request->product_id_3);
        $sold_product4 = Product::find($request->product_id_4);
        $sold_product5 = Product::find($request->product_id_5);
        $sold_product6 = Product::find($request->product_id_6);
        $sold_product7 = Product::find($request->product_id_7);
        $sold_product8 = Product::find($request->product_id_8);
        $sold_product9 = Product::find($request->product_id_9);
        $sold_product10 = Product::find($request->product_id_10);

        $notification = '';
        $total_price = 0;

        $purchased_item = Purchase::find($sold_product->purchase->id);
        $new_quantity = ($purchased_item->quantity) - ($request->quantity);
        if (!($new_quantity < 0)) {
            $purchased_item->update([
                'quantity' => $new_quantity,
            ]);
            $total_price += ($request->quantity) * ($sold_product->price);
        }
        if ($new_quantity <= 1 && $new_quantity != 0) {
            // send notification
            // $product = Purchase::where('quantity', '<=', 1)->first();
            // event(new PurchaseOutStock($product));
            // end of notification
            $notification = notify("Product 1 is running out of stock!!!");
        }

        if ($sold_product2) {
            $purchased_item2 = Purchase::find($sold_product2->purchase->id);
            $new_quantity2 = ($purchased_item2->quantity) - ($request->quantity_2);
            if (!($new_quantity2 < 0)) {
                $purchased_item2->update([
                    'quantity' => $new_quantity2,
                ]);
                $total_price += ($request->quantity_2) * ($sold_product2->price);
            }
            if ($new_quantity2 <= 1 && $new_quantity2 != 0) {
                $notification = notify("Product 2 is running out of stock!!!");
            }
        }
        if ($sold_product3) {
            $purchased_item3 = Purchase::find($sold_product3->purchase->id);
            $new_quantity3 = ($purchased_item3->quantity) - ($request->quantity_3);
            if (!($new_quantity3 < 0)) {
                $purchased_item3->update([
                    'quantity' => $new_quantity3,
                ]);
                $total_price += ($request->quantity_3) * ($sold_product3->price);
            }
            if ($new_quantity3 <= 1 && $new_quantity3 != 0) {
                $notification = notify("Product 3 is running out of stock!!!");
            }
        }
        if ($sold_product4) {
            $purchased_item4 = Purchase::find($sold_product4->purchase->id);
            $new_quantity4 = ($purchased_item4->quantity) - ($request->quantity_4);
            if (!($new_quantity4 < 0)) {
                $purchased_item4->update([
                    'quantity' => $new_quantity4,
                ]);
                $total_price += ($request->quantity_4) * ($sold_product4->price);
            }
            if ($new_quantity4 <= 1 && $new_quantity4 != 0) {
                $notification = notify("Product 4 is running out of stock!!!");
            }
        }
        if ($sold_product5) {
            $purchased_item5 = Purchase::find($sold_product5->purchase->id);
            $new_quantity5 = ($purchased_item->quantity) - ($request->quantity_5);
            if (!($new_quantity5 < 0)) {
                $purchased_item5->update([
                    'quantity' => $new_quantity5,
                ]);
                $total_price += ($request->quantity_5) * ($sold_product5->price);
            }
            if ($new_quantity5 <= 1 && $new_quantity5 != 0) {
                $notification = notify("Product 5 is running out of stock!!!");
            }
        }
        if ($sold_product6) {
            $purchased_item6 = Purchase::find($sold_product6->purchase->id);
            $new_quantity6 = ($purchased_item6->quantity) - ($request->quantity_6);
            if (!($new_quantity6 < 0)) {
                $purchased_item6->update([
                    'quantity' => $new_quantity6,
                ]);
                $total_price += ($request->quantity_6) * ($sold_product6->price);
            }
            if ($new_quantity6 <= 1 && $new_quantity6 != 0) {
                $notification = notify("Product 6 is running out of stock!!!");
            }
        }
        if ($sold_product7) {
            $purchased_item7 = Purchase::find($sold_product7->purchase->id);
            $new_quantity7 = ($purchased_item7->quantity) - ($request->quantity_7);
            if (!($new_quantity7 < 0)) {
                $purchased_item7->update([
                    'quantity' => $new_quantity7,
                ]);
                $total_price += ($request->quantity_7) * ($sold_product7->price);
            }
            if ($new_quantity7 <= 1 && $new_quantity7 != 0) {
                $notification = notify("Product 7 is running out of stock!!!");
            }
        }
        if ($sold_product8) {
            $purchased_item8 = Purchase::find($sold_product8->purchase->id);
            $new_quantity8 = ($purchased_item8->quantity) - ($request->quantity_8);
            if (!($new_quantity8 < 0)) {
                $purchased_item8->update([
                    'quantity' => $new_quantity8,
                ]);
                $total_price += ($request->quantity_8) * ($sold_product8->price);
            }
            if ($new_quantity8 <= 1 && $new_quantity8 != 0) {
                $notification = notify("Product 8 is running out of stock!!!");
            }
        }
        if ($sold_product9) {
            $purchased_item9 = Purchase::find($sold_product9->purchase->id);
            $new_quantity9 = ($purchased_item9->quantity) - ($request->quantity_9);
            if (!($new_quantity9 < 0)) {
                $purchased_item9->update([
                    'quantity' => $new_quantity9,
                ]);
                $total_price += ($request->quantity_9) * ($sold_product9->price);
            }
            if ($new_quantity9 <= 1 && $new_quantity9 != 0) {
                $notification = notify("Product 9 is running out of stock!!!");
            }
        }
        if ($sold_product10) {
            $purchased_item10 = Purchase::find($sold_product10->purchase->id);
            $new_quantity10 = ($purchased_item10->quantity) - ($request->quantity_10);
            if (!($new_quantity10 < 0)) {
                $purchased_item10->update([
                    'quantity' => $new_quantity10,
                ]);
                $total_price += ($request->quantity_10) * ($sold_product10->price);
            }
            if ($new_quantity10 <= 1 && $new_quantity10 != 0) {
                $notification = notify("Product 10 is running out of stock!!!");
            }
        }

        $sale = new Sale();
        $sale->name = $request->name;
        $sale->phone = $request->phone;
        $sale->product_id = $request->product_id;
        $sale->quantity = $request->quantity;
        $sale->product_id_2 = $request->product_id_2;
        $sale->quantity_2 = $request->quantity_2;
        $sale->product_id_3 = $request->product_id_3;
        $sale->quantity_3 = $request->quantity_3;
        $sale->product_id_4 = $request->product_id_4;
        $sale->quantity_4 = $request->quantity_4;
        $sale->product_id_5 = $request->product_id_5;
        $sale->quantity_5 = $request->quantity_5;
        $sale->product_id_6 = $request->product_id_6;
        $sale->quantity_6 = $request->quantity_6;
        $sale->product_id_7 = $request->product_id_7;
        $sale->quantity_7 = $request->quantity_7;
        $sale->product_id_8 = $request->product_id_8;
        $sale->quantity_8 = $request->quantity_8;
        $sale->product_id_9 = $request->product_id_9;
        $sale->quantity_9 = $request->quantity_9;
        $sale->product_id_10 = $request->product_id_10;
        $sale->quantity_10 = $request->quantity_10;
        $sale->total_price = $total_price;
        $sale->save();

        if ($notification == '') {
            $notification = notify("Product has been sold");
        }

        return redirect()->route('sales.index')->with($notification);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $title = 'edit sale';
        $products = Product::get();
        return view('admin.sales.edit', compact(
            'title',
            'sale',
            'products'
        ));
    }

    public function print($id)
    {
        $sale = Sale::find($id);
        if ($sale) {
            $pdf = \PDF::loadView('invoice', [
                'sale' => $sale
            ]);
            return $pdf->download('invoice.pdf');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);
        $sold_product = Product::find($request->product);
        /**
         * update quantity of sold item from purchases
         **/
        $purchased_item = Purchase::find($sold_product->purchase->id);
        if (!empty($request->quantity)) {
            $new_quantity = ($purchased_item->quantity) - ($request->quantity);
        }
        $new_quantity = $sale->quantity;
        $notification = '';
        if (!($new_quantity < 0)) {
            $purchased_item->update([
                'quantity' => $new_quantity,
            ]);

            /**
             * calcualting item's total price
             **/
            if (!empty($request->quantity)) {
                $total_price = ($request->quantity) * ($sold_product->price);
            }
            $total_price = $sale->total_price;
            $sale->update([
                'product_id' => $request->product,
                'quantity' => $request->quantity,
                'total_price' => $total_price,
            ]);

            $notification = notify("Product has been updated");
        }
        if ($new_quantity <= 1 && $new_quantity != 0) {
            // send notification
            $product = Purchase::where('quantity', '<=', 1)->first();
            event(new PurchaseOutStock($product));
            // end of notification
            $notification = notify("Product is running out of stock!!!");
        }
        return redirect()->route('sales.index')->with($notification);
    }

    /**
     * Generate sales reports index
     *
     * @return \Illuminate\Http\Response
     */
    public function reports(Request $request)
    {
        $title = 'sales reports';
        return view('admin.sales.reports', compact(
            'title'
        ));
    }

    /**
     * Generate sales report form post
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateReport(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $title = 'sales reports';
        $sales = Sale::whereBetween(DB::raw('DATE(created_at)'), array($request->from_date, $request->to_date))->get();
        return view('admin.sales.reports', compact(
            'sales',
            'title'
        ));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Sale::findOrFail($request->id)->delete();
    }
}
