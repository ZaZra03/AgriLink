<div class="p-4 pt-20 sm:ml-64">
    <?php include "./components/admin/breadcrumb.php"; ?>

    <div class="grid grid-cols-2 gap-4">
        <div class="w-full h-full text-center font-semibold bg-neutral rounded-lg flex flex-col gap-2 pt-2">
            <label for="added-to-cart">ADDED TO CART</label>
            <canvas id="add-to-cart-chart"></canvas>
        </div>
        <div class="w-full h-full text-center font-semibold bg-neutral rounded-lg flex flex-col gap-2 pt-2">
            <label for="checkouts-chart">CHECKOUTS</label>
            <canvas id="checkout-chart"></canvas>
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
    </div>
</div>

<!-- Include ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php
    $audit_log = $crud->read_all("audit_log") ?? [];

    $audit_log = array_filter($audit_log ? $audit_log : [], function($var) use($user){
        return $var['seller_id'] == $user['id'];
    });

    $dataPoints = [];
    foreach ($audit_log as $log) {
        $dataPoints[] = [
            'datetime' => $log['datetime'],
            'sales' => $log['price']
        ];
    }

    $addToCartData = $crud->read_all("cart") ?? [];
    $addToCartData = array_filter($addToCartData ? $addToCartData : [], function($var) use($crud){
        $product = $crud->read("product", $var['product_id']);
        return $product['seller_id'] == $_SESSION['user_id'];
    });

    $checkoutData = $crud->read_all("checkout") ?? [];
    $checkoutData = array_filter($checkoutData ? $checkoutData : [], function($var) use($crud){
        $product = $crud->read("product", $var['product_id']);
        return $product['seller_id'] == $_SESSION['user_id'];
    });

    $addToCartDataPoints = [];
    if ($addToCartData) {
        foreach ($addToCartData as $entry) {
            $addToCartDataPoints[] = [
                'datetime' => $entry['datetime'],
                'count' => 1
            ];
        }
    }

    $checkoutDataPoints = [];
    if ($checkoutData) {
        foreach ($checkoutData as $entry) {
            $checkoutDataPoints[] = [
                'datetime' => $entry['datetime'],
                'count' => 1
            ];
        }
    }

    usort($addToCartDataPoints, function($a, $b) {
        return strtotime($a['datetime']) - strtotime($b['datetime']);
    });

    usort($checkoutDataPoints, function($a, $b) {
        return strtotime($a['datetime']) - strtotime($b['datetime']);
    });

    usort($dataPoints, function($a, $b) {
        return strtotime($a['datetime']) - strtotime($b['datetime']);
    });
?>
<script>
    const auditLogData = <?php echo json_encode($dataPoints); ?>;
    const addToCartData = <?php echo json_encode($addToCartDataPoints); ?>;
    const checkoutData = <?php echo json_encode($checkoutDataPoints); ?>;

    function groupDataByDate(data) {
        const groupedData = {};
        data.forEach(entry => {
            const date = new Date(Date.parse(entry.datetime.replace(' ', 'T'))).toISOString().split('T')[0];
            if (!groupedData[date]) {
                groupedData[date] = { count: 0 };
            }
            groupedData[date].count += entry.count;
        });
        return groupedData;
    }

    function createChart(chartId, data, label) {
        const groupedData = groupDataByDate(data);
        const labels = Object.keys(groupedData);
        const counts = labels.map(label => groupedData[label].count);

        new Chart(document.getElementById(chartId).getContext('2d'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Count'
                        }
                    }
                }
            }
        });
    }

    createChart('add-to-cart-chart', addToCartData, 'Added to Cart');
    createChart('checkout-chart', checkoutData, 'Checkouts');
    
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
