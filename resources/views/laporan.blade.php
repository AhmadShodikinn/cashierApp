@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Laporan Penjualan</h1>
    <div class="flex">
        <p class="mt-2 text-xl italic font-bold">Halo, </p>
        <p class="mt-2 text-xl">{{ session('user.level') }}!</p>
    </div>
    
    <div class="mt-14">
        <div id="reportCard" class="px-6 py-[25px] bg-white rounded-[10px] shadow-md border-2 border-[#389012] flex flex-col justify-between">
            <div class="flex justify-between  px-6">
                <div class="h-11 flex-col justify-center items-start gap-2.5 inline-flex overflow-hidden">
                    <div class="text-black text-xl font-semibold font-['Poppins'] leading-normal">Laporan Penjualan</div>
                </div>
                                
                <form action="{{ route('report.report') }}" method="GET">
                    <div class="flex border border-[#389012] rounded-lg bg-[#389012]">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker id="month-datepicker" name="month" type="text" class="bg-[#389012] rounded-lg text-white text-sm  focus:ring-[#389012] focus:border-[#389012] block w-full ps-10 p-2.5" placeholder="">
                        </div>
                        <button type="submit" class="px-2 bg-[#255112] text-white rounded-e-lg">Submit</button>
                    </div>
                </form>

            </div>

            <div class="flex gap-3 h-[400px]">
                <div class="grow bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <div id="line-chart">
                        <canvas id="salesChart" class="w-[500px] h-[400px]"></canvas>
                    </div>
                </div>

                <div class="grow w-full flex flex-col gap-10 rounded-lg shadow-sm p-4 md:p-6">
                <div class="grow h-[150px] flex flex-col justify-center items-center relative bg-[#79FE76] rounded-[10px] border-2 border-[#389012] overflow-hidden">
                    <div class="text-black text-[40px] font-semibold font-['Poppins'] leading-[47.60px]">
                        {{ $totalOrders[0] }}
                    </div>
                    <div class="text-black text-xl font-semibold font-['Poppins'] leading-normal mt-[5px]">
                        Penjualan
                    </div>
                </div>



                    <div class="w-full grow h-28 flex-col justify-start items-start gap-5 inline-flex">
                        <div class="self-stretch justify-between items-center inline-flex">
                            <div class="text-black text-xl font-regular font-['Poppins'] leading-normal">Total Cash bulan ini</div>
                            <div class="text-black text-lg font-light font-['Poppins'] leading-snug">Rp {{ number_format($salesByCash[0]['total_sales'], 0, '.', '.') }}</div>
                        </div>
                        <div class="self-stretch justify-between items-center inline-flex">
                            <div class="text-black text-xl font-regular font-['Poppins'] leading-normal">Total Cashless bulan ini</div>
                            <div class="text-black text-lg font-light font-['Poppins'] leading-snug">Rp {{ number_format($salesByCashless[0]['total_sales'], 0, '.', '.') }}</div>
                        </div>
                        <div class="self-stretch justify-between items-center inline-flex">
                            <div class="text-black text-xl font-semibold font-['Poppins'] leading-normal">Pendapatan</div>
                            <div class="text-black text-lg font-light font-['Poppins'] leading-snug">Rp {{ number_format($totalSales[0], 0, '.', '.') }}</div>
                        </div>
                    </div>

                    <div>
                        <button onclick="window.print()" class="w-full px-5 py-2.5 bg-[#389012] rounded-[10px] border border-[#389012] text-white font-semibold text-sm flex items-center justify-between">
                            Cetak Laporan
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                            </svg>
                        </button>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');

        const periods = <?php echo json_encode($periods); ?>;
        const totalSales = <?php echo json_encode($totalSales); ?>;
        const totalOrders = <?php echo json_encode($totalOrders); ?>;

        const salesChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: periods,  
                datasets: [
                    {
                        label: 'Total Penjualan',
                        data: totalSales,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Pesanan',
                        data: totalOrders,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)', 
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
