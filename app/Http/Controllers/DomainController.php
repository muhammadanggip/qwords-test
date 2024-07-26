<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Auth;
use PDF;

class DomainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function check(Request $request)
    {
        $domain = $request->input('domain');
        $response = Http::get("https://portal.qwords.com/apitest/whois.php?domain={$domain}");
        $status = $response->json();

        return $status;
    }

    public function showConfiguration(Request $request)
    {
        $domain = $request->query('domain');
        $username = Auth::user()->name;
        $email = Auth::user()->email;
        return view('configuration', compact('domain', 'username', 'email'));
    }

    public function config(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('register');
        }

        $domainResult = $request->input('domainResult');
        return redirect()->route('configuration.view', ['domain' => $domainResult]);
    }

    public function checkout(Request $request)
    {

        $order = new Order;
        $order->domain = $request->input('domain');
        $order->harga = $request->input('harga');
        $order->is_available = 1;
        $order->user_id = Auth::id();
        $order->save();

        return redirect()->route('order', $order->user_id);
    }

    public function order($id)
    {
        $order = Order::where('user_id', $id)->get();
        return view('order', ['order' => $order]);
    }

    public function downloadInvoice($id)
    {
        $order = Order::with('userRelation')->findOrFail($id);
        $pdf = PDF::loadView('invoice-pdf', ['order' => $order]);
        return $pdf->download('invoice.pdf');
    }
}
