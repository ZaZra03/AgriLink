<div class="p-4 pt-20 sm:ml-64">
    <div class="mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <div class="rounded-lg bg-neutral w-full h-full p-6 flex justify-between gap-2 items-center border border-gray-200">
            <div>
                <h1 class="text-gray-400 font-semibold text-lg mb-2">Products</h1>
                <div class="text-gray-600 font-semibold text-5xl sm:text-6xl"><?php echo count($crud->search("product", $user['id'], ['seller_id']) ? $crud->search("product", $user['id'], ['seller_id']) : []) ?></div>
            </div>
            <svg class="w-20 h-20 text-orange-400" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1"> <g id="导航图标" transform="translate(-325.000000, -80.000000)"> <g id="编组" transform="translate(325.000000, 80.000000)"> <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"></polygon> <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"></polygon> <line id="路径" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"></line> <line id="路径" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"></line> </g> </g> </g> </g></svg>
        </div>
        <div class="rounded-lg bg-neutral w-full h-full p-6 flex justify-between gap-2 items-center border border-gray-200">
            <div>
                <h1 class="text-gray-400 font-semibold text-lg mb-2">Checkouts</h1>
                <div class="text-gray-600 font-semibold text-5xl sm:text-6xl"><?php 
                    echo count(array_filter($crud->read_all("checkout") ? $crud->read_all("checkout") : [], function($var) use($crud){
                        $product = $crud->read("product", $var['product_id']);
                        return $product['seller_id'] == $_SESSION['user_id'];
                    })) 
                ?></div>
            </div>
            <svg class="w-20 h-20 text-blue-400" viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="24.576"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M300 462.4h424.8v48H300v-48zM300 673.6H560v48H300v-48z" fill=""></path><path d="M818.4 981.6H205.6c-12.8 0-24.8-2.4-36.8-7.2-11.2-4.8-21.6-11.2-29.6-20-8.8-8.8-15.2-18.4-20-29.6-4.8-12-7.2-24-7.2-36.8V250.4c0-12.8 2.4-24.8 7.2-36.8 4.8-11.2 11.2-21.6 20-29.6 8.8-8.8 18.4-15.2 29.6-20 12-4.8 24-7.2 36.8-7.2h92.8v47.2H205.6c-25.6 0-47.2 20.8-47.2 47.2v637.6c0 25.6 20.8 47.2 47.2 47.2h612c25.6 0 47.2-20.8 47.2-47.2V250.4c0-25.6-20.8-47.2-47.2-47.2H725.6v-47.2h92.8c12.8 0 24.8 2.4 36.8 7.2 11.2 4.8 21.6 11.2 29.6 20 8.8 8.8 15.2 18.4 20 29.6 4.8 12 7.2 24 7.2 36.8v637.6c0 12.8-2.4 24.8-7.2 36.8-4.8 11.2-11.2 21.6-20 29.6-8.8 8.8-18.4 15.2-29.6 20-12 5.6-24 8-36.8 8z" fill=""></path><path d="M747.2 297.6H276.8V144c0-32.8 26.4-59.2 59.2-59.2h60.8c21.6-43.2 66.4-71.2 116-71.2 49.6 0 94.4 28 116 71.2h60.8c32.8 0 59.2 26.4 59.2 59.2l-1.6 153.6z m-423.2-47.2h376.8V144c0-6.4-5.6-12-12-12H595.2l-5.6-16c-11.2-32.8-42.4-55.2-77.6-55.2-35.2 0-66.4 22.4-77.6 55.2l-5.6 16H335.2c-6.4 0-12 5.6-12 12v106.4z" fill=""></path></g></svg>
        </div>
        <div class="rounded-lg bg-neutral w-full h-full p-6 flex justify-between gap-2 items-center border border-gray-200">
            <div>
                <h1 class="text-gray-400 font-semibold text-lg mb-2">Completed Orders</h1>
                <div class="text-gray-600 font-semibold text-5xl sm:text-6xl"><?php 
                    echo count(array_filter($crud->search("checkout", "complete", ["status"]) ? $crud->search("checkout", "complete", ["status"]) : [], function($var) use($crud){
                        $product = $crud->read("product", $var['product_id']);
                        return $product['seller_id'] == $_SESSION['user_id'];
                    })) 
                ?></div>
            </div>
            <svg class="w-20 h-20 text-green-400" viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="10.24"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M824.8 1003.2H203.2c-12.8 0-25.6-2.4-37.6-7.2-11.2-4.8-21.6-12-30.4-20.8-8.8-8.8-16-19.2-20.8-30.4-4.8-12-7.2-24-7.2-37.6V260c0-12.8 2.4-25.6 7.2-37.6 4.8-11.2 12-21.6 20.8-30.4 8.8-8.8 19.2-16 30.4-20.8 12-4.8 24-7.2 37.6-7.2h94.4v48H203.2c-26.4 0-48 21.6-48 48v647.2c0 26.4 21.6 48 48 48h621.6c26.4 0 48-21.6 48-48V260c0-26.4-21.6-48-48-48H730.4v-48H824c12.8 0 25.6 2.4 37.6 7.2 11.2 4.8 21.6 12 30.4 20.8 8.8 8.8 16 19.2 20.8 30.4 4.8 12 7.2 24 7.2 37.6v647.2c0 12.8-2.4 25.6-7.2 37.6-4.8 11.2-12 21.6-20.8 30.4-8.8 8.8-19.2 16-30.4 20.8-11.2 4.8-24 7.2-36.8 7.2z" fill=""></path><path d="M752.8 308H274.4V152.8c0-32.8 26.4-60 60-60h61.6c22.4-44 67.2-72.8 117.6-72.8 50.4 0 95.2 28.8 117.6 72.8h61.6c32.8 0 60 26.4 60 60v155.2m-430.4-48h382.4V152.8c0-6.4-5.6-12-12-12H598.4l-5.6-16c-12-33.6-43.2-56-79.2-56s-67.2 22.4-79.2 56l-5.6 16H334.4c-6.4 0-12 5.6-12 12v107.2zM432.8 792c-6.4 0-12-2.4-16.8-7.2L252.8 621.6c-4.8-4.8-7.2-10.4-7.2-16.8s2.4-12 7.2-16.8c4.8-4.8 10.4-7.2 16.8-7.2s12 2.4 16.8 7.2L418.4 720c4 4 8.8 5.6 13.6 5.6s10.4-1.6 13.6-5.6l295.2-295.2c4.8-4.8 10.4-7.2 16.8-7.2s12 2.4 16.8 7.2c9.6 9.6 9.6 24 0 33.6L449.6 784.8c-4.8 4-11.2 7.2-16.8 7.2z" fill=""></path></g></svg>
        </div>
    </div>
    <!-- CHART -->
    <div class="p-4 mb-6 col-span-3 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <?php
                        // Call the getWeeklySales function and retrieve the data
                        $salesData = $crud->getSalesData($_SESSION['user_id']);
                        $totalWeeklySales = array_sum($salesData['sales_this_week']) ?? 0;
                        $lastWeekTotalSales = array_sum($salesData['sales_last_week']) ?? 0;

                        // Prevent DivisionByZeroError by checking if last week's sales are greater than 0
                        if ($lastWeekTotalSales > 0) {
                            $percentageChange = (($totalWeeklySales - $lastWeekTotalSales) / $lastWeekTotalSales) * 100;
                        } else {
                            $percentageChange = 0; // Set percentage change to 0 if last week's sales are 0
                        }
                    ?>

                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl ">
                        ₱<?php echo number_format($totalWeeklySales, 2); ?>
                    </span>
                    <h3 class="text-base font-light text-gray-500">Sales this week</h3>
                </div>
                <div class="flex items-center justify-end flex-1 text-base font-medium 
                    <?php echo $percentageChange >= 0 ? 'text-green-500' : 'text-red-500'; ?>">
                    <?php echo round($percentageChange, 2); ?>%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <div class="flex justify-end mb-2">
                <select id="timePeriod" class="select select-bordered w-full max-w-xs">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <canvas id="auditLogChart"></canvas>
        </div>
    <!-- END OF CHART -->

    <?php
        $audit_log = $crud->read_all("audit_log") ? $crud->read_all("audit_log") : [];
        usort($audit_log, function($a, $b) {
            return strtotime($a['datetime']) - strtotime($b['datetime']);
        });
        // Prepare data for the graph
        $dataPoints = [];
        foreach ($audit_log as $log) {
            $dataPoints[] = [
                'datetime' => $log['datetime'],
                'sales' => $log['price']
            ];
        }
    ?>
    <script>
        const auditLogData = <?php echo json_encode($dataPoints); ?>;
        function groupDataByPeriod(data, period) {
            const groupedData = {};
            data.forEach(entry => {
                const date = new Date(Date.parse(entry.datetime.replace(' ', 'T')));
                let key;
                switch (period) {
                    case 'daily':
                        key = date.toISOString().split('T')[0]; // YYYY-MM-DD
                        break;
                    case 'weekly':
                        const startOfWeek = new Date(date);
                        startOfWeek.setDate(date.getDate() - date.getDay());
                        key = startOfWeek.toISOString().split('T')[0];
                        break;
                    case 'monthly':
                        key = `${date.getFullYear()}-${('0' + (date.getMonth() + 1)).slice(-2)}`; // YYYY-MM
                        break;
                    case 'yearly':
                        key = date.getFullYear().toString(); // YYYY
                        break;
                }
                if (!groupedData[key]) {
                    groupedData[key] = { sales: 0 };
                }
                groupedData[key].sales += parseInt(entry.sales);
            });
            return groupedData;
        }


        function updateChart(period) {
            const groupedData = groupDataByPeriod(auditLogData, period);
            const labels = Object.keys(groupedData);
            const quantities = labels.map(label => groupedData[label].quantity);
            const sales = labels.map(label => groupedData[label].sales);

            chart.data.labels = labels;
            chart.data.datasets[0].data = sales;
            chart.update();
        }

        const ctx = document.getElementById('auditLogChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Sales',
                        data: [],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });

        document.getElementById('timePeriod').addEventListener('change', function() {
            updateChart(this.value);
        });

        // Initial load with 'daily' period
        updateChart('daily');
    </script>

</div>