<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-[310px] bg-[#F0FEDF] text-white h-screen p-5">
        <div class="logo">
            <div class="w-52 h-[109px] relative mb-[38px]">
            <div class="left-[63px] top-0 absolute text-[#379012] text-[50px] font-bold font-['Kirome'] leading-[60px]">Cafe</div>
            <div class="left-[63px] top-[44px] absolute text-[#379012] text-[50px] font-bold font-['Kirome'] leading-[60px]">Kasir</div>
            <div class="w-[60px] h-[83px] left-0 top-[9px] absolute">
                <div class="w-[33px] h-[83px] left-[27px] top-0 absolute bg-[#389012]"></div>
                <div class="w-3 h-[83px] left-[12px] top-0 absolute bg-[#389012]"></div>
                <div class="w-[5px] h-[83px] left-0 top-0 absolute bg-[#389012]"></div>
            </div>
            </div>
        </div>

        <div class="h-[320px] px-[18px] py-[25px] bg-white rounded-[15px] shadow-md border-2 border-[#389012] flex flex-col justify-between">
        <!-- Group Pengguna dan Laporan -->
        <div class="flex flex-col gap-4 mb-auto">
            <a href="{{ route('pegawai.index') }}" class="px-5 py-2.5 bg-[#389012] rounded-[10px] border border-[#389012] text-white font-semibold text-sm flex items-center justify-between">
                Pengguna
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="{{ route('menu.index') }}" class="px-5 py-2.5 bg-[#389012] rounded-[10px] border border-[#389012] text-white font-semibold text-sm flex items-center justify-between">
                Menu
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="/laporan" class="px-5 py-2.5 bg-[#979696]/20 rounded-[10px] border border-[#979696]/20 text-[#389012] font-semibold text-sm flex items-center justify-between">
                Laporan
                <svg class="w-5 h-5 text-[#389012]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>

        <!-- Group Logout -->
        <a href="/logout" class="px-5 py-2.5 bg-[#f16451] rounded-[10px] border border-[#e74934] text-white font-semibold text-sm flex items-center justify-between">
            Logout
        </a>
    </div>
    </div>

        <!-- Content -->
        <div class="flex-1 pr-4 py-8 bg-[#F0FEDF]">
            @yield('content') 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
</body>
</html>