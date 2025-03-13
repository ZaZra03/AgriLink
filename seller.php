<?php
    session_start();
    require_once("./helpers/crud.php");

    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
        header("Location: /AgriLink/admin/admin.php");
        exit();
    }

    if (!isset($_GET['id'])) {
        header("Location: /AgriLink/404.php");
        exit();
    }
    
    $seller_id = $_GET['id'];
    $seller = $crud->read("user", $seller_id);
    $products = $crud->search("product", $seller_id, ["seller_id"]);
?>

<!DOCTYPE html>
<html lang="en" data-theme="agrilink">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile - AgriLink</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="./javascript/tailwind.js"></script>
    <link rel="stylesheet" href="./assets/css/daisyui.css">
    <link rel="stylesheet" href="./assets/css/config.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@3"></script>
</head>
<body class="relative min-h-screen flex flex-col">
    <?php include "./components/navbar.php"; ?>

    <div class="relative my-20 px-5">
        <div class="rounded-lg shadow-lg p-6 bg-white">
            <div class="bg-gray-200 w-full h-52 rounded-lg overflow-hidden">
                <img src="./assets/images/cover_default.jpg" class="w-full h-full object-cover" alt="Cover Photo">
            </div>
            <div class="relative flex items-center gap-4 -mt-12 px-5">
                <img class="w-24 h-24 rounded-full border-4 border-white shadow-lg" 
                    src="<?php echo isset($seller['image']) && !empty($seller['image']) ? '/AgriLink/assets/users/' . $seller['image'] : './assets/images/default_avatar.png'; ?>" 
                    alt="Seller Profile Picture">
                <div>
                    <h1 class="text-2xl font-bold"><?php echo htmlspecialchars($seller['name'] ?? 'Unknown Seller'); ?></h1>
                    <p class="text-gray-600"><?php echo htmlspecialchars($seller['email'] ?? 'No email available'); ?></p>
                </div>
            </div>

            <!-- Button Group -->
            <div class="flex justify-center mt-6">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button id="productsBtn" type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10">
                        Products
                    </button>
                    <button id="graphBtn" type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10">
                        Graph
                    </button>
                </div>
            </div>

            <!-- Products Section -->
            <div id="productsSection" class="mt-10">
                <h2 class="text-xl font-semibold text-center">Products by Seller</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                    <?php if ($products) { 
                        foreach ($products as $product) { ?>
                            <div class="bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                                <div class="w-full h-36 bg-gray-100">
                                    <img src="/AgriLink/assets/products/<?php echo htmlspecialchars($product['image']); ?>" 
                                        class="w-full h-full object-cover" alt="Product Image">
                                </div>
                                <div class="p-3">
                                    <h3 class="text-sm font-semibold text-gray-800"><?php echo htmlspecialchars($product['name']); ?></h3>
                                    <p class="text-primary text-base font-bold">₱<?php echo number_format((int)$product['price'] - ((int)$product['price'] * ((int)$product['discount'] / 100))); ?>.00</p>
                                    <p class="text-xs text-gray-600">Current Stock: <?php echo htmlspecialchars($product['current_stock']); ?></p>
                                    <p class="text-xs text-green-600 font-medium">Next Month Stock: <?php echo htmlspecialchars($product['next_month_stock']); ?></p>
                                    <a href="/AgriLink/product.php?id=<?php echo htmlspecialchars($product['id']); ?>" 
                                    class="block text-center mt-2 bg-primary text-white py-1.5 rounded text-sm font-medium">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                    <?php } 
                    } else { ?>
                        <p class="text-gray-500 col-span-full text-center py-10">No products found.</p>
                    <?php } ?>
                </div>
            </div>


            <!-- Chart Section (Hidden by Default) -->
            <!-- UPDATE -->
            <div id="chartSection" class="mt-10 hidden w-full">
                <h2 class="text-xl font-semibold text-center mb-4">Stock Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="w-full h-[400px]"><canvas id="riceChart"></canvas></div>
                    <div class="w-full h-[400px]"><canvas id="porkChart"></canvas></div>
                    <div class="w-full h-[400px]"><canvas id="tilapiaChart"></canvas></div>
                    <div class="w-full h-[400px]"><canvas id="tomatoesChart"></canvas></div>
                    <div class="w-full h-[400px]"><canvas id="onionsChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let riceChart, porkChart, tilapiaChart, tomatoesChart, onionsChart; // Store chart instances

            const productsBtn = document.getElementById("productsBtn");
            const graphBtn = document.getElementById("graphBtn");
            const productsSection = document.getElementById("productsSection");
            const chartSection = document.getElementById("chartSection");

            const datasets = {
                rice: [500, 550, 470, 530, 600, 520, 580, 490, 620, 560, 640, 510],
                pork: [120, 90, 150, 130, 80, 170, 140, 190, 160, 200, 180, 220],
                tilapia: [80, 110, 70, 95, 130, 85, 120, 90, 140, 100, 125, 75],
                tomatoes: [200, 170, 250, 190, 300, 220, 270, 210, 330, 240, 290, 180],
                onions: [50, 80, 40, 65, 100, 55, 90, 45, 110, 60, 95, 50]
            };



            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            function createChart(canvasId, label, data, color) {
                const ctx = document.getElementById(canvasId).getContext("2d");
                return new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: months,
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor: color,
                            borderColor: color.replace("0.6", "1"),
                            borderWidth: 1
                        }]
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
            }

            function renderCharts() {
                if (!riceChart) riceChart = createChart("riceChart", "Rice", datasets.rice, "rgba(255, 159, 64, 0.6)");
                if (!porkChart) porkChart = createChart("porkChart", "Pork", datasets.pork, "rgba(255, 99, 132, 0.6)");
                if (!tilapiaChart) tilapiaChart = createChart("tilapiaChart", "Tilapia", datasets.tilapia, "rgba(54, 162, 235, 0.6)");
                if (!tomatoesChart) tomatoesChart = createChart("tomatoesChart", "Tomatoes", datasets.tomatoes, "rgba(255, 206, 86, 0.6)");
                if (!onionsChart) onionsChart = createChart("onionsChart", "Onions", datasets.onions, "rgba(75, 192, 192, 0.6)");
            }

            productsBtn.addEventListener("click", function () {
                productsSection.classList.remove("hidden");
                chartSection.classList.add("hidden");
            });

            graphBtn.addEventListener("click", function () {
                productsSection.classList.add("hidden");
                chartSection.classList.remove("hidden");
                renderCharts();
            });
        });
    </script>
</body>
</html>
