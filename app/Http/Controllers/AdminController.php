<?php
namespace App\Http\Controllers;
use App\Models\{Category,MenuItem,Order,Reservation,RestaurantTable};
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function dashboard()
    {
        $ready = Schema::hasTable('orders');
        return view('admin', ['title'=>'داشبورد مدیریت | کافه نو','stats'=>$ready ? ['sales'=>Order::whereDate('created_at',today())->sum('total'),'orders'=>Order::whereIn('status',['new','accepted','preparing'])->count(),'reservations'=>Reservation::whereDate('date',today())->count(),'tables'=>RestaurantTable::where('status','occupied')->count()] : ['sales'=>48750000,'orders'=>84,'reservations'=>12,'tables'=>27], 'recentOrders'=>$ready ? Order::latest()->limit(5)->get() : collect()]);
    }
    public function menu(){ return view('admin.menu', ['categories'=>Category::withCount('items')->orderBy('sort_order')->get(),'items'=>MenuItem::with('category')->latest()->paginate(12)]); }
    public function reservations(){ return view('admin.reservations', ['reservations'=>Reservation::with(['customer','table'])->latest('date')->paginate(15)]); }
}
