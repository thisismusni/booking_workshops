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
        // dd($data);
        return view('admin.booking.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::where('status', 1)->get();

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
        $order_date = date_create($dataRecord['order_date']);
        $dataRecord['order_date'] = $order_date;
        $dataBook = Booking::where('status', '!=', '3')->where('schedule_id', $dataRecord['schedule_id'])->whereDate('order_date', $order_date)->first();

        // dd($dataBook);
        if (is_null($dataBook)) {
            $book = Booking::create($dataRecord);
            if (isset($dataRecord['product'])) {
                foreach ($dataRecord['product'] as $product_id) {
                    $product = Product::find($product_id);
                    $BookingProduct = new BookingProduct;
                    $BookingProduct->product_id = $product->id;
                    $BookingProduct->booking_id = $book->id;
                    $BookingProduct->product_name = $product->name;
                    $BookingProduct->price = $product->price;
                    $BookingProduct->save();
                }
            }
        } else {
            return back();
        }

        // return "ok";

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
        $data = Bookings::where('id', $id)->first();

        return view('admin.booking.update')->with('data', $data);
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
        $booking = Booking::findOrFail($id);

        $request->validate([
            'user_id' => "required|numeric",
            'schedule_id' => 'required|numeric',
            'status' => 'required|numeric',
            'order_date' => 'required',
        ]);

        $booking->update($request->all());

        return redirect(route('booking.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();

        return redirect(route('booking.index'));
    }
}
