<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $images = ['/images/kafeno/admin-dashboard.png','/images/kafeno/admin-operations.png','/images/kafeno/admin-overview.png','/images/kafeno/menu-page.png','/images/kafeno/events-page.png','/images/kafeno/about-contact-pages.png'];
        $generated = [
            'food' => ['غذاهای اختصاصی کافه نو', ['چلوکباب کوبیده','زرشک پلو با مرغ','قورمه سبزی','ته‌دیگ زعفرانی','فسنجان','پاستا آلفردو','برگر کلاسیک','استیک ریب‌آی','فیله سالمون','سالاد سزار']],
            'drink' => ['آبمیوه و بستنی', ['آب پرتقال تازه','اسموتی توت‌فرنگی','آب انبه','خنکای هندوانه','موهیتو نعنا','میلک‌شیک زعفران','بستنی وانیل','بستنی شکلات','ساندای بری','آفوگاتو پسته']],
            'event' => ['تولد و مراسم', ['تولد خانوادگی','تولد کودک','تولد بزرگسال','جشن سالگرد','دورهمی دوستانه','جشن ایرانی','برش کیک','میز دسر','مراسم خصوصی','دورهمی خانوادگی']],
        ];
        $categories = ['غذاهای ایرانی','غذاهای بین‌المللی','صبحانه','پیش‌غذا و سالاد','نوشیدنی گرم','نوشیدنی سرد','دسر و کیک','پکیج‌های مراسم'];
        foreach ($categories as $i => $name) DB::table('categories')->insert(['name'=>$name,'slug'=>Str::slug($name.'-'.$i),'image_url'=>$images[$i % count($images)],'sort_order'=>$i,'created_at'=>now(),'updated_at'=>now()]);
        $cat = DB::table('categories')->pluck('id','name');
        $items = [['چلو کباب کوبیده','غذاهای ایرانی',385000],['زرشک پلو با مرغ','غذاهای ایرانی',295000],['قورمه سبزی','غذاهای ایرانی',280000],['پاستا آلفردو','غذاهای بین‌المللی',320000],['برگر کلاسیک','غذاهای بین‌المللی',360000],['صبحانه نو','صبحانه',265000],['سالاد فصل','پیش‌غذا و سالاد',180000],['لاته پسته','نوشیدنی گرم',185000],['موهیتو نعنا','نوشیدنی سرد',165000],['چیزکیک زعفران','دسر و کیک',195000]];
        foreach ($items as $i => [$name,$category,$price]) DB::table('menu_items')->insert(['category_id'=>$cat[$category],'name'=>$name,'slug'=>Str::slug('kafeno-'.$i.'-'.$name),'description'=>'تهیه‌شده با مواد اولیه تازه و دستور اختصاصی کافه نو','price'=>$price,'image_url'=>$images[$i % count($images)],'tags'=>json_encode(['پیشنهاد ویژه','تازه']), 'is_featured'=>$i<4, 'created_at'=>now(),'updated_at'=>now()]);
        foreach (['میز ۱','میز ۲','میز خانوادگی','میز VIP','میز تراس','میز ۶'] as $i => $name) DB::table('tables')->insert(['name'=>$name,'capacity'=>($i===2?6:4),'hall'=>$i===4?'تراس':'سالن اصلی','qr_token'=>Str::random(24),'created_at'=>now(),'updated_at'=>now()]);
        foreach ([['مرکز تهران',35000,500000,35],['محدوده شرق',55000,700000,50],['محدوده غرب',65000,800000,55]] as [$name,$fee,$free,$eta]) DB::table('delivery_zones')->insert(['name'=>$name,'fee'=>$fee,'free_over'=>$free,'eta_minutes'=>$eta,'created_at'=>now(),'updated_at'=>now()]);
        $gallery = [['داشبورد فروش','admin','/images/kafeno/admin-dashboard.png','نمای مدیریتی فروش و سفارش‌ها',true],['عملیات کافه','admin','/images/kafeno/admin-operations.png','مدیریت منو، آشپزخانه و رزروها',true],['نمای کلی پنل','admin','/images/kafeno/admin-overview.png','داشبورد responsive کافه نو',true],['منوی آنلاین','menu','/images/kafeno/menu-page.png','منوی غذاهای ایرانی و بین‌المللی',true],['جشن و تولد','event','/images/kafeno/events-page.png','رزرو مراسم و پکیج‌های تولد',true],['داستان و تماس','story','/images/kafeno/about-contact-pages.png','صفحات درباره ما و تماس با ما',true]];
        foreach ($gallery as $i => [$title,$type,$url,$caption,$featured]) DB::table('gallery_items')->insert(['title'=>$title,'type'=>$type,'image_url'=>$url,'caption'=>$caption,'is_featured'=>$featured,'sort_order'=>$i,'created_at'=>now(),'updated_at'=>now()]);
        $collectionSort = 20;
        foreach ($generated as $type => [$collectionTitle, $titles]) {
            foreach ($titles as $index => $title) {
                DB::table('gallery_items')->insert([
                    'title' => $title,
                    'type' => $type,
                    'image_url' => "/images/kafeno/generated/{$type}-" . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.jpg',
                    'caption' => $collectionTitle . ' — تصویر ' . ($index + 1),
                    'is_featured' => true,
                    'sort_order' => $collectionSort++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        $packages = [['پکیج صمیمی','برای تولدهای کوچک و دورهمی دوستانه',4500000,6,12,$images[4],['چیدمان ساده','کیک کوچک','پذیرایی نوشیدنی','پشتیبانی تیم کافه']],['پکیج استاندارد','برای جشن‌های خانوادگی و خاطره‌ساز',8900000,12,24,$images[4],['دکور اختصاصی','کیک دو طبقه','منوی انتخابی','هماهنگی کامل مراسم']],['پکیج لوکس','برای مراسم خاص و مهمان‌های ویژه',16500000,24,40,$images[5],['دکور کامل','کیک اختصاصی','منوی ویژه','پذیرایی اختصاصی','عکاسی مراسم']]];
        foreach ($packages as [$name,$description,$price,$min,$max,$image,$features]) DB::table('event_packages')->insert(['name'=>$name,'description'=>$description,'price_from'=>$price,'min_guests'=>$min,'max_guests'=>$max,'image_url'=>$image,'features'=>json_encode($features, JSON_UNESCAPED_UNICODE),'created_at'=>now(),'updated_at'=>now()]);
    }
}
