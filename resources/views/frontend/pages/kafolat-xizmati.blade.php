@extends('frontend.layouts.master')
@section('title', 'Kafolat xizmati | Baraka Development')
@section('main-content')
<section>
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kafolat xizmati</li>
                </ol>
            </nav><br>
            <div class="row g-3 mb-9">
                <div class="col-12">
                    <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                        <img src="{{ asset('back/img/bannerlar/kafolat-xizmati.png') }}" alt="reja">
                    </div>
                </div>
            </div>

            <div class="col-auto">
                <div class="card rounded-4 border-0 offer-card">
                    <div class="card-body d-md-flex align-items-center gap-4 py-5">
                        <div>
                            <h3 class="mb-3">Kafolatli xizmat koʻrsatishlari uchun qayerga murojaat qilish kerak?</h3>
                            <p style="text-align: justify">Bizning doʻkonlarimizdan mahsulot sotib olganingizda unda
                                zavoddan kamchiliklarsiz ishlab chiqarilgani haqida kafolat taloni beriladi. Bunday
                                kafolat taloni ishlab chiqaruvchining servis koʻrsatishiga qarab 10 kundan 3 yilgacha
                                muddatda amal qilishi mumkin. Kafolat muddati saytimizdagi har bir mahsulot tavsifida
                                yozib qoʻyilgan.
                                Iltimos, mahsulotni qabul qilib olayotgan paytingizda uning hamma jihozlari mavjudligini
                                va unda ishlab chiqarish kamchiliklari yoʻqligini tekshirib oling.
                                Kafolat xizmati, ishlab chiqaruvchilar tomonidan ruxsat etilgan servis markazlari
                                tomonidan amalga oshiriladi. Siz mahsulotni kafolatli ta`mirlashga yuborishingiz yoki
                                xizmat ko`rsatish markazi hisobidan usta chaqirishingiz mumkin. Mavjud variantlar
                                kafolat kartangizda ko`rsatilgan.
                                Servis markazlari manzillari va telefon raqamlarini kafolat talonidan yoki servis
                                markazlari roʻyxatidan topishingiz mumkin.
                                Agar sizning shahringizda mahsulotga xizmat koʻrsatuvchi servis markaz mavjud boʻlmasa,
                                Siz kompaniyamizning mijozlarga xizmat koʻrsatish boʻlimiga murojaat qilishingiz mumkin.
                            </p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="col-auto">
                <div class="card rounded-4 border-0 offer-card">
                    <div class="card-body d-md-flex align-items-center gap-4 py-5">
                        <div>
                            <h3 class="mb-3">Kafolat quyidagi hollarda qo'llanilmaydi:</h3>
                            <ol class="mb-1">
                                <li class="px-2">Tashish paytida uskunaning shikastlanishi.</li>
                                <li class="px-2 mt-3">O'rnatish, ishlatish va texnik xizmat ko'rsatish ko'rsatmalariga rioya qilmaslik.</li>
                                <li class="px-2 mt-3">Uskunani noto'g'ri ishlatish va noto'g'ri saqlash.</li>
                                <li class="px-2 mt-3">O'rnatish, texnik xizmat ko'rsatish, ta'mirlash yoki vakolatsiz diler tomonidan amalga oshiriladigan har qanday boshqa ishlar.</li>
                                <li class="px-2 mt-3">Ishlab chiqaruvchi tomonidan ta'minlanmagan jihoz dizayniga har qanday o'zgartirishlar kiritish.</li>
                                <li class="px-2 mt-3">Asl bo'lmagan ehtiyot qismlardan foydalanish.</li>
                                <li class="px-2 mt-3">Tabiiy ofatlar, yong'inlar, baxtsiz hodisalar yoki uskunadan foydalanish bilan bevosita bog'liq bo'lmagan kutilmagan hodisalar natijasida yetkazilgan zarar.</li>
                                <li class="px-2 mt-3">Uskunalarga nisbatan beparvolik va ataylab yetkazilgan zarar.</li>
                                <li class="px-2 mt-3">Texnologiyadan tijorat maqsadlarida foydalanish.</li>
                                <li class="px-2 mt-3">Kafolat drenaj tizimiga, sarf materiallari, filtrlar, tashqi dekorativ qoplamalar, batareyalar va akkumulyatorlarga, elektr simlariga, sovutgich va moylarga, uskunaning plastik va bo'yalgan qismlariga, avizolar, cho'tkalar, nozullar, filtrlar, sumkalarga taalluqli emas.</li>
                                <li class="px-2 mt-3">Agar kafolat kartasida quyidagi ma'lumotlar ko'rsatilmagan bo'lsa (to'liq va qonuniy): model nomi, model seriya raqami, sotilgan sana, aloqa ma'lumotlari va sotuvchining muhri, aloqa ma'lumotlari va o'rnatuvchining muhri. Kafolatdan foydalanish uchun mijoz kafolat kartasini va uskunani sotib olishni tasdiqlovchi hujjatlarni saqlashi kerak.</li>
                                <li class="px-2 mt-3">Sotuvchi - Ishlab chiqaruvchi noto'g'ri o'rnatish natijasida paydo bo'lgan uskunaning buzilishi uchun javobgar emas (ulash).</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection