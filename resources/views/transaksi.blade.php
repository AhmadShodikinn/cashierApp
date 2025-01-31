<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <title>Transaksi</title>
</head>
<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-full flex flex-col bg-[#F0FEDF] text-white flex-grow gap-24 p-5">
            <div class="header">
                <div class="logo">
                    <div class="w-52 relative">
                    <div class="left-[63px] top-0 absolute text-[#379012] text-[50px] font-bold font-['Kirome'] leading-[60px]">Cafe</div>
                    <div class="left-[63px] top-[44px] absolute text-[#379012] text-[50px] font-bold font-['Kirome'] leading-[60px]">Kasir</div>
                    <div class="w-[60px] h-[83px] left-0 top-[9px] absolute">
                        <div class="w-[33px] h-[83px] left-[27px] top-0 absolute bg-[#389012]"></div>
                        <div class="w-3 h-[83px] left-[12px] top-0 absolute bg-[#389012]"></div>
                        <div class="w-[5px] h-[83px] left-0 top-0 absolute bg-[#389012]"></div>
                    </div>
                    </div>
                </div>
                <div class="card nama"></div>
            </div>

            <div class="content flex h-full gap-6 px-4 flex-grow py-4">
            <!-- Menu -->
                <div class="menu flex flex-col h-full">
                    <div class="flex-1 bg-[#F0FEDF]">
                        <div class="flex flex-col justify-between">
                            <div class="pl-8 mb-3 h-12 w-full bg-white rounded-[50px] border-2 border-[#389012]  inline-flex">
                                <input type="text" id="searchInput" placeholder="Cari" class="flex-1 outline-none bg-transparent text-black/50 text-sm font-semibold font-['Poppins'] leading-[14px]" />
                            </div>

                            <div class="content overflow-y-auto no-scrollbar">
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5" id="menuContainer">
                                    @foreach ($menu as $menuItem)
                                        <div class="menu-item w-[195px] h-[200px] bg-white border border-[#DADADA] rounded-lg shadow-sm">
                                            <button data-modal-target="detail-menu-{{ $menuItem->id_menu }}" data-modal-toggle="detail-menu-{{ $menuItem->id_menu }}">
                                                <img class="object-cover w-[195px] h-[135px] rounded-t-lg" src="{{ asset('storage/images/' . $menuItem->image_name) }}" alt="" />
                                            </button>
                                            <div class="px-2 flex flex-col h-full">
                                                <p class="mb-1 font-semibold text-black text-sm">{{ $menuItem->nama_menu }}</p>
                                                <p class="font-bold text-right text-[#965A50] text-lg">Rp {{ number_format($menuItem->harga, 0, '.', '.') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="cashier flex flex-col flex-grow px-5 py-[30px] bg-white rounded-[15px] border-2 border-[#389012] gap-5">
                <div class="w-full flex flex-col justify-center items-center">
                    <div class="text-black text-xl font-semibold font-['Poppins'] leading-normal mb-4">Pesanan</div>
                    <div class="w-full max-w-md px-5">
                        <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px] mb-2">Nama pelanggan</div>
                        <div class="self-stretch h-11 px-5 py-[15px] bg-white rounded-[50px] border-2 mb-4 border-black flex items-center gap-8">
                            <input type="text" placeholder="Aldy Rehat" class="w-full text-[#040404] text-sm font-semibold font-['Poppins'] leading-[14px] bg-transparent outline-none" />
                        </div>
                        <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px] mb-2">Daftar Pesanan</div>
                        <div class="flex flex-col gap-5">
                            @foreach ($menu as $menuItem)
                            <div class="self-stretch p-5 bg-white rounded-[20px] border-2 border-black justify-start items-start gap-5 inline-flex overflow-hidden">
                                <div class="grow shrink basis-0 h-[85px] justify-start items-start gap-5 flex">
                                    <img class="w-[92px] h-[85px] rounded-[15px]" src="{{ asset('storage/images/' . $menuItem->image_name) }}" alt="#" />
                                    <div class="w-[148px] self-stretch flex-col justify-center items-end gap-2.5 inline-flex">
                                        <div class="self-stretch justify-center items-center gap-2.5 inline-flex">
                                            <div class="grow shrink basis-0 flex-col justify-center items-start gap-[5px] inline-flex">
                                                <div class="text-[#222222] text-sm font-semibold font-['Poppins'] leading-[14px]">{{ $menuItem->nama_menu }}</div>
                                                <div class="text-[#222222] text-sm font-normal font-['Poppins'] leading-[14px]">Rp {{ number_format($menuItem->harga, 0, '.', '.') }}</div>
                                            </div>
                                            <div class="text-black text-sm font-bold font-['Poppins'] leading-[14px]">2X</div>
                                        </div>
                                        <div class="self-stretch justify-between items-center inline-flex">
                                            <div class="text-black text-xs font-semibold font-['Poppins'] leading-3">jumlah</div>
                                            <div class="px-[3px] py-0.5 bg-[#f1f1f1] rounded-[50px] justify-end items-center gap-2.5 flex overflow-hidden">
                                                <div class="w-5 h-5 relative">
                                                    <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                                    <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]">-</div>
                                                </div>
                                                <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">2</div>
                                                <div class="w-5 h-5 relative">
                                                    <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                                    <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]">+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>


                            <!-- <div class="self-stretch h-[149px] flex-col justify-start items-start gap-2.5 flex">
                                <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Daftar pesanan</div>
                                <div class="self-stretch p-5 bg-white rounded-[20px] border-2 border-black justify-start items-start gap-5 inline-flex overflow-hidden">
                                <div class="grow shrink basis-0 h-[85px] justify-start items-start gap-5 flex">
                                    <img class="w-[92px] h-[85px] rounded-[15px]" src="https://via.placeholder.com/92x85" />
                                    <div class="w-[148px] self-stretch flex-col justify-center items-end gap-2.5 inline-flex">
                                    <div class="self-stretch justify-center items-center gap-2.5 inline-flex">
                                        <div class="grow shrink basis-0 flex-col justify-center items-start gap-[5px] inline-flex">
                                        <div class="text-[#222222] text-sm font-semibold font-['Poppins'] leading-[14px]">Pumkin Spice .....</div>
                                        <div class="text-[#222222] text-sm font-normal font-['Poppins'] leading-[14px]">Rp 10.000</div>
                                        </div>
                                        <div class="text-black text-sm font-bold font-['Poppins'] leading-[14px]">2x</div>
                                    </div>
                                    <div class="self-stretch justify-between items-center inline-flex">
                                        <div class="text-black text-xs font-semibold font-['Poppins'] leading-3">jumlah</div>
                                        <div class="px-[3px] py-0.5 bg-[#f1f1f1] rounded-[50px] justify-end items-center gap-2.5 flex overflow-hidden">
                                        <div class="w-5 h-5 relative">
                                            <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                            <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]">-</div>
                                        </div>
                                        <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">2</div>
                                        <div class="w-5 h-5 relative">
                                            <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                            <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]">+</div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="pr-[50px] bg-white rounded-[50px] border-2 border-black justify-start items-center gap-8 inline-flex overflow-hidden">
                                <div class="w-[154px] h-11 py-[15px] bg-[#389012] rounded-[50px] justify-center items-center inline-flex overflow-hidden">
                                <div class="text-white text-sm font-semibold font-['Poppins'] leading-[14px]">Cash</div>
                                </div>
                                <div class="text-[#389012] text-sm font-semibold font-['Poppins'] leading-[14px]">Cashless</div>
                            </div>
                            <div class="self-stretch h-[137px] flex-col justify-start items-start gap-2.5 flex">
                                <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Detail pembayaran</div>
                                <div class="self-stretch h-[113px] py-5 rounded-[20px] flex-col justify-start items-start gap-2.5 flex overflow-hidden">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Subtotal</div>
                                    <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Rp 20.000</div>
                                </div>
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Pajak</div>
                                    <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">12%</div>
                                </div>
                                <div class="w-[299px] h-px bg-[#d9d9d9]"></div>
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Total</div>
                                    <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Rp 28.000</div>
                                </div>
                                </div>
                            </div> -->
                        <!-- <div class="self-stretch px-5 bg-[#389012] rounded-[10px] border border-[#389012] justify-between items-center inline-flex overflow-hidden">
                            <div class="text-white text-lg font-semibold font-['Poppins'] leading-snug">Bayar</div>
                        </div> -->
                    <!-- </div> -->
 
                    
                <!-- </div> -->

            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const menuContainer = document.getElementById('menuContainer');
        const menuItems = menuContainer.getElementsByClassName('menu-item');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            Array.from(menuItems).forEach(function(item) {
                const menuName = item.querySelector('.font-semibold').textContent.toLowerCase();

                if (menuName.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none'; 
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
</body>
</html>