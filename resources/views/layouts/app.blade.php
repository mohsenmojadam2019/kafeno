<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'کافه نو | تجربه‌ای تازه در قلب تهران' }}</title>
    <meta name="description" content="کافه نو؛ قهوه تخصصی، صبحانه و غذاهای خلاقانه در میدان امام حسین تهران.">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='16' fill='%23c97843'/%3E%3Cpath d='M18 20h26v20a13 13 0 0 1-26 0V20Zm26 6h4a6 6 0 0 1 0 12h-4' fill='none' stroke='%23151817' stroke-width='5'/%3E%3C/svg%3E">
    <link rel="stylesheet" href="/css/app.css"><link rel="stylesheet" href="/css/pages.css">
</head>
<body>
<header class="site-header"><div class="container nav-wrap">
    <a class="brand" href="{{ route('home') }}"><span class="brand-mark">نو</span><span><b>کافه نو</b><small>طعم تازه‌ی هر روز</small></span></a>
    <nav class="nav-links"><a href="{{ route('home') }}">خانه</a><a href="{{ route('menu') }}">منوی ما</a><a href="{{ route('events') }}">جشن‌ها و مراسم</a><a href="{{ route('gallery') }}">گالری</a><a href="{{ route('about') }}">داستان ما</a><a href="{{ route('contact') }}">تماس با ما</a></nav>
    <a class="btn btn-small" href="{{ route('contact') }}">رزرو میز <span>←</span></a>
</div></header>
<main>@yield('content')</main>
<footer class="site-footer"><div class="container footer-grid"><div class="footer-brand"><a class="brand" href="{{ route('home') }}"><span class="brand-mark">نو</span><span><b>کافه نو</b><small>طعم تازه‌ی هر روز</small></span></a><p>جایی برای مکث، گفت‌وگو و مزه کردن لحظه‌های خوب. هر روز از ۸ صبح تا ۱۱ شب میزبان شما هستیم.</p><div class="socials"><span>اینستاگرام</span><span>تلگرام</span><span>واتساپ</span></div></div><div><h4>دسترسی سریع</h4><a href="{{ route('menu') }}">منوی کافه</a><a href="{{ route('about') }}">درباره کافه نو</a><a href="{{ route('contact') }}">رزرو و تماس</a><a href="{{ route('tax') }}">قوانین و مالیات</a></div><div><h4>ساعت کاری</h4><p>شنبه تا چهارشنبه<br><strong>۸:۰۰ تا ۲۳:۰۰</strong></p><p>پنج‌شنبه و جمعه<br><strong>۸:۰۰ تا ۲۴:۰۰</strong></p></div><div><h4>ما را پیدا کنید</h4><p>تهران، میدان امام حسین<br>ساختمان محسن، طبقه همکف</p><a class="footer-map" href="{{ route('contact') }}">مشاهده روی نقشه ←</a></div></div><div class="container footer-bottom"><span>© ۱۴۰۴ کافه نو. همه حقوق محفوظ است.</span><span>ساخته شده توسط <a href="https://redcoweb.ir">redcoweb.ir</a></span></div></footer>
</body></html>
