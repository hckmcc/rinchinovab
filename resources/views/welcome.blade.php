<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ИП Ринчинов А. Б. — Туризм, Курумкан</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=literata:400,500,600&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    @php
        $bgImage = file_exists(public_path('images/barguzin.jpg')) ? asset('images/barguzin.jpg') : 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1920';
    @endphp
    <style>
        .page-wrap {
            background-image: url('{{ $bgImage }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .page-wrap::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(15,23,42,0.75) 0%, rgba(15,23,42,0.5) 100%);
            pointer-events: none;
        }
    </style>
</head>
<body class="min-h-screen antialiased">
    <div class="page-wrap relative min-h-screen flex items-center justify-center px-4 py-12">
        <main class="relative z-10 w-full max-w-xl">
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-10 text-slate-800">
                <h1 class="font-semibold text-2xl md:text-3xl text-slate-900 mb-1" style="font-family: 'Literata', serif;">
                    Ринчинов Алдар Баирович
                </h1>
                <p class="text-slate-600 text-sm mb-6">Индивидуальный предприниматель</p>

                <p class="text-slate-700 leading-relaxed mb-6">
                    Работаю в сфере туризма. Организован <strong>пункт проката туристского оборудования и инвентаря</strong>.
                </p>

                <div class="border-t border-slate-200 pt-6 mb-6">
                    <h2 class="font-medium text-slate-900 mb-2" style="font-family: 'Literata', serif;">Проект «Северное сияние»</h2>
                    <p class="text-slate-700 leading-relaxed">
                        Мотель в Курумканском районе, село Курумкан.
                    </p>
                </div>

                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                    По вопросам работы пункта проката и подробной информации обращайтесь по телефону:
                </p>

                <a href="tel:89021619381" class="inline-flex items-center gap-2 text-lg font-medium text-slate-900 hover:text-slate-700 underline underline-offset-2 transition-colors">
                    <span>8 902 161-93-81</span>
                </a>
            </div>
            <p class="text-center text-white/80 text-sm mt-6 drop-shadow">Баргузинский хребет</p>
        </main>
    </div>
</body>
</html>
