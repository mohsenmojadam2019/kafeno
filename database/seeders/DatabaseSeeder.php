<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $images = ['https://images.unsplash.com/photo-1547592180-85f173990554?w=900','https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=900','https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=900','https://images.unsplash.com/photo-1550547660-d9450f859349?w=900','https://images.unsplash.com/photo-1559339352-11d035aa65de?w=900','https://images.unsplash.com/photo-1551024506-0bccd828d307?w=900','https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=900','https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=900'];
        $categories = ['غذاهای ایرانی','غذاهای بین‌المللی','صبحانه','پیش‌غذا و سالاد','نوشیدنی گرم','نوشیدنی سرد','دسر و کیک','پکیج‌های مراسم'];
        foreach ($categories as $i => $name) DB::table('categories')->insert(['name'=>$name,'slug'=>Str::slug($name.'-'.$i),'image_url'=>$images[$i % count($images)],'sort_order'=>$i,'created_at'=>now(),'updated_at'=>now()]);
        $cat = DB::table('categories')->pluck('id','name');
        $items = [['چلو کباب کوبیده','غذاهای ایرانی',385000],['زرشک پلو با مرغ','غذاهای ایرانی',295000],['قورمه سبزی','غذاهای ایرانی',280000],['پاستا آلفردو','غذاهای بین‌المللی',320000],['برگر کلاسیک','غذاهای بین‌المللی',360000],['صبحانه نو','صبحانه',265000],['سالاد فصل','پیش‌غذا و سالاد',180000],['لاته پسته','نوشیدنی گرم',185000],['موهیتو نعنا','نوشیدنی سرد',165000],['چیزکیک زعفران','دسر و کیک',195000]];
        foreach ($items as $i => [$name,$category,$price]) DB::table('menu_items')->insert(['category_id'=>$cat[$category],'name'=>$name,'slug'=>Str::slug('kafeno-'.$i.'-'.$name),'description'=>'تهیه‌شده با مواد اولیه تازه و دستور اختصاصی کافه نو','price'=>$price,'image_url'=>$images[$i % count($images)],'tags'=>json_encode(['پیشنهاد ویژه','تازه']), 'is_featured'=>$i<4, 'created_at'=>now(),'updated_at'=>now()]);
        foreach (['میز ۱','میز ۲','میز خانوادگی','میز VIP','میز تراس','میز ۶'] as $i => $name) DB::table('tables')->insert(['name'=>$name,'capacity'=>($i===2?6:4),'hall'=>$i===4?'تراس':'سالن اصلی','qr_token'=>Str::random(24),'created_at'=>now(),'updated_at'=>now()]);
        foreach ([['مرکز تهران',35000,500000,35],['محدوده شرق',55000,700000,50],['محدوده غرب',65000,800000,55]] as [$name,$fee,$free,$eta]) DB::table('delivery_zones')->insert(['name'=>$name,'fee'=>$fee,'free_over'=>$free,'eta_minutes'=>$eta,'created_at'=>now(),'updated_at'=>now()]);
        $gallery = [['صبح آرام در کافه نو','space','https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200','فضایی روشن برای شروع یک روز خوب',true],['میزهای خانوادگی','family','https://images.unsplash.com/photo-1559339352-11d035aa65de?w=1200','جایی برای دورهمی‌های صمیمی',true],['جشن‌های به‌یادماندنی','event','https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=1200','جشن تولد و مراسم خصوصی',true],['قهوه و لحظه‌های آرام','coffee','https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=1200','قهوه تخصصی و حال خوب',false],['طعم ایرانی','food','https://images.unsplash.com/photo-1571997478779-2adcbbe9ab2f?w=1200','غذاهای ایرانی با مواد اولیه تازه',true],['میز دسر','dessert','https://images.unsplash.com/photo-1551024506-0bccd828d307?w=1200','کیک و دسر دست‌ساز',false],['فضای تراس','space','https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?w=1200','یک گوشه دنج در قلب تهران',false],['لحظه تحویل سفارش','delivery','https://images.unsplash.com/photo-1526367790999-0150786686a2?w=1200','بسته‌بندی تمیز و ارسال سریع',false]];
        foreach ($gallery as $i => [$title,$type,$url,$caption,$featured]) DB::table('gallery_items')->insert(['title'=>$title,'type'=>$type,'image_url'=>$url,'caption'=>$caption,'is_featured'=>$featured,'sort_order'=>$i,'created_at'=>now(),'updated_at'=>now()]);
        $packages = [['پکیج صمیمی','برای تولدهای کوچک و دورهمی دوستانه',4500000,6,12,$images[5],['چیدمان ساده','کیک کوچک','پذیرایی نوشیدنی','پشتیبانی تیم کافه']],['پکیج استاندارد','برای جشن‌های خانوادگی و خاطره‌ساز',8900000,12,24,$images[6],['دکور اختصاصی','کیک دو طبقه','منوی انتخابی','هماهنگی کامل مراسم']],['پکیج لوکس','برای مراسم خاص و مهمان‌های ویژه',16500000,24,40,$images[7],['دکور کامل','کیک اختصاصی','منوی ویژه','پذیرایی اختصاصی','عکاسی مراسم']]];
        foreach ($packages as [$name,$description,$price,$min,$max,$image,$features]) DB::table('event_packages')->insert(['name'=>$name,'description'=>$description,'price_from'=>$price,'min_guests'=>$min,'max_guests'=>$max,'image_url'=>$image,'features'=>json_encode($features, JSON_UNESCAPED_UNICODE),'created_at'=>now(),'updated_at'=>now()]);
    }
}
