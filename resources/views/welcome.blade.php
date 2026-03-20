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

            <div class="mt-8 bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-10 text-slate-800">
                <h2 class="font-semibold text-xl text-slate-900 mb-6" style="font-family: 'Literata', serif;">Каталог услуг</h2>
                <ul class="space-y-4">
                    @foreach([
                        'Бронирование гостиничного номера',
                        'Бронирование оборудования для туризма',
                        'Бронирование оборудования для клининга',
                        'Бронирование оборудования для строительства',
                    ] as $service)
                        <li class="flex flex-wrap items-center justify-between gap-3 py-3 border-b border-slate-200 last:border-0">
                            <span class="text-slate-700">{{ $service }}</span>
                            <button type="button" class="booking-btn px-4 py-2 rounded-lg bg-slate-800 text-white text-sm font-medium hover:bg-slate-700 transition-colors" data-service="{{ $service }}">
                                Забронировать
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <p class="text-center text-white/80 text-sm mt-6 drop-shadow">Баргузинский хребет</p>
        </main>
    </div>

    {{-- Модальное окно --}}
    <div id="booking-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" data-modal-close></div>
        <div class="fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md max-h-[90vh] overflow-y-auto z-10 p-4">
            <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-slate-900" style="font-family: 'Literata', serif;">Заявка на бронирование</h3>
                    <button type="button" class="modal-close p-2 -m-2 text-slate-400 hover:text-slate-600 rounded-lg transition-colors" aria-label="Закрыть">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <p id="modal-service-name" class="text-slate-600 text-sm mb-6"></p>

                <div id="booking-form-wrap">
                    <form id="booking-form" class="space-y-4">
                        @csrf
                        <input type="hidden" name="service" id="booking-service" value="">
                        <div>
                            <label for="booking-name" class="block text-sm font-medium text-slate-700 mb-1">Имя <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="booking-name" required class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-800 focus:border-slate-500 focus:ring-1 focus:ring-slate-500" placeholder="Ваше имя">
                            <p class="form-error text-red-500 text-sm mt-1 hidden" data-for="name"></p>
                        </div>
                        <div>
                            <label for="booking-phone" class="block text-sm font-medium text-slate-700 mb-1">Телефон <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="booking-phone" required class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-800 focus:border-slate-500 focus:ring-1 focus:ring-slate-500" placeholder="+7 (999) 123-45-67">
                            <p class="form-error text-red-500 text-sm mt-1 hidden" data-for="phone"></p>
                        </div>
                        <div>
                            <label for="booking-email" class="block text-sm font-medium text-slate-700 mb-1">Почта <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="booking-email" required class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-800 focus:border-slate-500 focus:ring-1 focus:ring-slate-500" placeholder="example@mail.ru">
                            <p class="form-error text-red-500 text-sm mt-1 hidden" data-for="email"></p>
                        </div>
                        <button type="submit" id="booking-submit" class="w-full mt-4 px-4 py-3 rounded-lg bg-slate-800 text-white font-medium hover:bg-slate-700 transition-colors">
                            Отправить заявку
                        </button>
                    </form>
                </div>

                <div id="booking-success" class="hidden text-center py-4">
                    <p class="text-slate-700 text-lg">Ваша заявка успешно отправлена! Администратор свяжется с Вами в ближайшее время.</p>
                    <button type="button" class="modal-close mt-4 px-4 py-2 rounded-lg bg-slate-800 text-white font-medium hover:bg-slate-700 transition-colors">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            var modal = document.getElementById('booking-modal');
            var form = document.getElementById('booking-form');
            var formWrap = document.getElementById('booking-form-wrap');
            var successBlock = document.getElementById('booking-success');
            var serviceNameEl = document.getElementById('modal-service-name');
            var serviceInput = document.getElementById('booking-service');
            var submitBtn = document.getElementById('booking-submit');
            var bookingUrl = '{{ route("booking.store") }}';

            function openModal(service) {
                serviceInput.value = service;
                serviceNameEl.textContent = service;
                formWrap.classList.remove('hidden');
                successBlock.classList.add('hidden');
                form.reset();
                document.querySelectorAll('.form-error').forEach(function(el) { el.classList.add('hidden'); el.textContent = ''; });
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                document.getElementById('booking-name').focus();
            }

            function closeModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('.booking-btn').forEach(function(btn) {
                btn.addEventListener('click', function() { openModal(this.getAttribute('data-service')); });
            });
            document.querySelectorAll('.modal-close').forEach(function(btn) {
                btn.addEventListener('click', closeModal);
            });
            modal.querySelector('[data-modal-close]').addEventListener('click', closeModal);
            modal.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeModal();
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                submitBtn.disabled = true;
                document.querySelectorAll('.form-error').forEach(function(el) { el.classList.add('hidden'); el.textContent = ''; });

                var fd = new FormData(form);
                fetch(bookingUrl, {
                    method: 'POST',
                    body: fd,
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                })
                .then(function(r) { return r.json().then(function(data) { return { ok: r.ok, data: data }; }); })
                .then(function(result) {
                    if (result.ok) {
                        formWrap.classList.add('hidden');
                        successBlock.classList.remove('hidden');
                    } else {
                        var d = result.data.errors || {};
                        Object.keys(d).forEach(function(k) {
                            var el = document.querySelector('.form-error[data-for="' + k + '"]');
                            if (el) { el.textContent = d[k][0]; el.classList.remove('hidden'); }
                        });
                    }
                })
                .catch(function() {
                    alert('Произошла ошибка. Попробуйте позже.');
                })
                .finally(function() {
                    submitBtn.disabled = false;
                });
            });
        })();
    </script>
</body>
</html>
