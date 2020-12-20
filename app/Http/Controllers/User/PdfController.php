<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shipping;

use PDF;


class PdfController extends Controller
{    
    # user order pdf genarator
    public function pdf($id)
    {
        # Join Orders And shippings table
        $orders = Order::select(['orders.*','shippings.*'])->join('shippings','orders.id','=','shippings.order_id')->where('orders.id',$id)->get();

        # set own pdf option or settings
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        # create view for pdf
        $pdfs = PDF::loadView('Frontend.pages.pdf', ['orders'=>$orders]);

        # pdf action
        return $pdfs->setPaper('a4', 'landscape')->save('invoice.pdf')->stream('invoice.pdf');
    }
}
