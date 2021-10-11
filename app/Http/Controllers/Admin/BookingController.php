<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Booking::orderBy('updated_at', 'DESC')->get();

        return view('admin.booking.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::all();

        return view('admin.booking.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'status' => 'required|numeric',
            'order_date' => 'required',
        ]);

        $dataRecord = $request->all();

        $dataRecord['order_date'] = date("Y/m/d H:i:s", strtotime($dataRecord['order_date']));

        $start = $dataRecord['order_date'];
        $end = strtotime($dataRecord['order_date']) + 60 * array_sum($dataRecord['duration']);
        $end = date("Y/m/d H:i:s", $end);

        $dataRecord['start'] = $start;
        $dataRecord['end'] = $end;

        // dd($dataRecord);
        $dataBook = Booking::where('start', '>=', $start)
            ->where('start', '<=', $end)
            ->get();

        $dataBook = Booking::where('end', '>=', $start)
            ->where('end', '<=', $end)
            ->get();
        // $dataBook = Booking::all()->filter(function ($item) {
        //     if (Carbon::now()->between($item->start, $item->end)) {
        //         return $item;
        //     }
        // });


        dd($dataBook);

        if (count($dataBook) <= 0) {
            $book = Booking::create($dataRecord);
            foreach ($dataRecord['product'] as $product_id) {
                $product = Product::find($product_id);
                $BookingProduct = new BookingProduct;
                $BookingProduct->product_id = $product->id;
                $BookingProduct->booking_id = $book->id;
                $BookingProduct->product_name = $product->name;
                $BookingProduct->price = $product->price;
                $BookingProduct->duration = $product->duration;
                $BookingProduct->save();
            }
        }

        return redirect(route('booking.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
