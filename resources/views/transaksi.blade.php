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
        <div class="w-full flex flex-col bg-[#F0FEDF] text-white flex-grow gap-5 p-5">
            <div class="header flex justify-between">
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
                <div class="card nama">
                    <div class="flex gap-3 pt-8 pr-5">
                        <div class="h-14 px-5 bg-white rounded-[10px] border border-black/30 justify-start items-center gap-2.5 inline-flex">
                            <a href="/logout" class="flex items-center space-x-2">
                                <div class="text-black text-sm font-semibold font-['Poppins'] leading-none">Keluar</div>
                                
                                <div class="w-5 h-5 relative overflow-hidden">
                                    <svg class="w-[18px] h-[18px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <div class="h-14 px-[30px] bg-white rounded-[10px] border border-black/30 flex-col justify-center items-start inline-flex">
                            <div class="text-black text-base font-semibold font-['Poppins'] leading-[19.04px]">{{ session('user.name') }}</div>
                            <div class="text-black text-sm font-light font-['Poppins'] leading-none">{{ session('user.username') }}</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="content flex h-full gap-6 px-4 flex-grow py-4">
            <!-- Menu -->
            <div class="menu flex flex-col h-full">
                <div class="flex-1 bg-[#F0FEDF]">
                    <div class="flex flex-col justify-between">
                        <div class="pl-8 mb-3 h-12 w-full bg-white rounded-[50px] border-2 border-[#389012] inline-flex">
                            <input type="text" id="searchInput" placeholder="Cari" class="flex-1 outline-none bg-transparent text-black/50 text-sm font-semibold font-['Poppins'] leading-[14px]" />
                        </div>

                        <div class="content overflow-y-auto no-scrollbar">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5" id="menuContainer">
                                @foreach ($menu as $menuItem)
                                    <div class="menu-item w-[195px] h-[200px] bg-white border border-[#DADADA] rounded-lg shadow-sm">
                                        <button class="menu-select-btn" data-menu-id="{{ $menuItem->id_menu }}" data-modal-target="detail-menu-{{ $menuItem->id_menu }}" data-modal-toggle="detail-menu-{{ $menuItem->id_menu }}">
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
                            <form action="{{ route('order.add') }}" method="post" id="orderForm">
                                @csrf
                                <div class="flex flex-col pb-4 h-[125px] gap-2 overflow-y-auto no-scrollbar" id="selectedMenuContainer">
   
                                </div>

                                <div class="h-11 relative bg-white rounded-[50px] border-2 border-black overflow-hidden">
                                    <label for="Toggle3" class="inline-flex items-center p-0 w-full rounded-md cursor-pointer dark:text-gray-100">
                                        <input id="Toggle3" type="checkbox" class="hidden peer">
                                        <span class="w-1/2 px-4 py-2 rounded-[50px] dark:bg-[#389012] peer-checked:dark:bg-white peer-checked:text-[#389012] text-center font-['poppins'] font-semibold">Cash</span>
                                        <span class="w-1/2 px-4 py-2 rounded-[50px] dark:bg-white text-[#389012] peer-checked:dark:bg-[#389012] peer-checked:text-white text-center font-['poppins'] font-semibold">Cashless</span>
                                    </label>
                                </div>

                                <div class="h-[137px] pt-4 flex-col justify-start items-start gap-2.5 flex">
                                    <div class="text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Detail pembayaran</div>
                                    <div class="h-[113px] py-5 rounded-[20px] flex-col justify-start items-start gap-2.5 flex">
                                        <div class="self-stretch justify-between items-center inline-flex">
                                            <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Subtotal</div>
                                            <div class="rincian-subtotal text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Rp 0</div>
                                        </div>
                                        <div class="self-stretch justify-between items-center inline-flex">
                                            <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Pajak</div>
                                            <div class="rincian-pajak text-black text-sm font-semibold font-['Poppins'] leading-[14px]">12%</div>
                                        </div>
                                        <div class="w-[299px] h-px bg-[#000000]"></div>
                                        <div class="self-stretch justify-between items-center inline-flex">
                                            <div class="grow shrink basis-0 text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Total</div>
                                            <div class="rincian-total text-black text-sm font-semibold font-['Poppins'] leading-[14px]">Rp 0</div>
                                        </div>
                                    </div>
                                </div>



                                <div class="pt-4">
                                    <button type="submit" class="w-full px-4 py-2.5 bg-[#389012] rounded-[10px] border border-[#389012] text-white font-semibold text-sm flex items-center justify-between">
                                        BAYAR
                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            </div>
                </div>
            </div>


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

        document.addEventListener('DOMContentLoaded', function () {
    const menuButtons = document.querySelectorAll('.menu-select-btn');
    const selectedMenuContainer = document.getElementById('selectedMenuContainer');
    
    menuButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuId = this.getAttribute('data-menu-id');
            const menuName = this.closest('.menu-item').querySelector('p').innerText;
            const menuPriceText = this.closest('.menu-item').querySelector('p + p').innerText;
            const menuImage = this.closest('.menu-item').querySelector('img').src;

            // Mengambil harga dalam format angka
            const menuPrice = parseInt(menuPriceText.replace(/[^\d]/g, ''), 10);

            let quantity = 1;

            // Cek jika menu dengan ID yang sama sudah ada
            const existingOrderItem = selectedMenuContainer.querySelector(`#order-item-${menuId}`);
            if (existingOrderItem) {
                // Jika sudah ada, hanya update quantity-nya saja
                const quantityDisplay = existingOrderItem.querySelector('.quantity-display');
                const inputQuantity = existingOrderItem.querySelector(`#input-quantity-${menuId}`);
                quantity++;
                quantityDisplay.textContent = quantity;
                inputQuantity.value = quantity;

                // Update rincian pembayaran
                updateOrderDetails(menuPrice, quantity);
                return; // Keluar agar tidak menambah menu yang sama lagi
            }

            // Buat elemen baru untuk item yang dipilih
            // Menambahkan input hidden untuk menu yang dipilih
                const orderItem = document.createElement('div');
                orderItem.classList.add('self-stretch', 'p-2', 'bg-white', 'rounded-[20px]', 'border-2', 'border-black', 'justify-start', 'items-start', 'gap-2', 'inline-flex');
                orderItem.id = `order-item-${menuId}`;
                orderItem.innerHTML = `
                    <div class="grow shrink basis-0 h-[85px] justify-start items-start gap-4 flex">
                        <img class="w-[92px] h-[85px] rounded-[15px]" src="${menuImage}" alt="${menuName}" />
                        <div class="w-[160px] self-stretch flex-col justify-center items-end gap-2.5 inline-flex">
                            <div class="self-stretch justify-center items-center gap-2.5 inline-flex">
                                <div class="grow shrink basis-0 flex-col justify-center items-start gap-[5px] inline-flex">
                                    <div class="text-[#222222] text-sm font-semibold font-['Poppins'] leading-[14px]">${menuName}</div>
                                    <div class="text-[#222222] text-sm font-normal font-['Poppins'] leading-[14px]">${menuPriceText}</div>
                                </div>
                                <div class="text-black text-sm font-bold font-['Poppins'] leading-[14px]" id="quantity-${menuId}">${quantity}X</div>
                            </div>
                            <div class="self-stretch justify-between items-center inline-flex">
                                <div class="text-black text-xs font-semibold font-['Poppins'] leading-3">jumlah</div>
                                <div class="h-6 px-[3px] py-0.5 bg-[#f1f1f1] rounded-[50px] justify-end items-center gap-2.5 inline-flex overflow-hidden">
                                    <div class="w-5 h-5 relative">
                                        <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                        <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]" data-action="decrease">-</div>
                                    </div>
                                    <div id="quantity-display-${menuId}" class="text-black text-sm font-semibold font-['Poppins'] leading-[14px] quantity-display">${quantity}</div>
                                    <div class="w-5 h-5 relative">
                                        <div class="w-5 h-5 left-0 top-0 absolute bg-[#bdbdbd] rounded-[10px]"></div>
                                        <div class="left-[6px] top-[3px] absolute text-black text-sm font-semibold font-['Poppins'] leading-[14px]" data-action="increase">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="menu[${menuId}][id_menu]" value="${menuId}" />
                    <input type="hidden" name="menu[${menuId}][quantity]" value="${quantity}" id="input-quantity-${menuId}" />
                `;


            selectedMenuContainer.appendChild(orderItem);

            // Menangani pengubahan jumlah
            const quantityDisplay = document.getElementById(`quantity-display-${menuId}`);
            const decreaseButton = orderItem.querySelector('[data-action="decrease"]');
            const increaseButton = orderItem.querySelector('[data-action="increase"]');
            const inputQuantity = document.getElementById(`input-quantity-${menuId}`);

            decreaseButton.addEventListener('click', function() {
                if (quantity > 1) {
                    quantity--;
                    quantityDisplay.textContent = quantity;
                    inputQuantity.value = quantity;
                    document.getElementById(`quantity-${menuId}`).textContent = `${quantity}X`;

                    // Update rincian pembayaran
                    updateOrderDetails(menuPrice, quantity);
                }
            });

            increaseButton.addEventListener('click', function() {
                quantity++;
                quantityDisplay.textContent = quantity;
                inputQuantity.value = quantity;
                document.getElementById(`quantity-${menuId}`).textContent = `${quantity}X`;

                // Update rincian pembayaran
                updateOrderDetails(menuPrice, quantity);
            });

            // Fungsi untuk memperbarui rincian pembayaran
            function updateOrderDetails(menuPrice, quantity) {
                const subtotal = menuPrice * quantity;
                const tax = subtotal * 0.12; // Pajak 12%
                const total = subtotal + tax;

                // Memperbarui rincian pembayaran
                document.querySelector('.rincian-subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
                document.querySelector('.rincian-pajak').textContent = `12%`;
                document.querySelector('.rincian-total').textContent = `Rp ${total.toLocaleString()}`;
            }

            // Panggil untuk pertama kali untuk menampilkan nilai awal
            updateOrderDetails(menuPrice, quantity);
        });
    });
});





    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
</body>
</html>