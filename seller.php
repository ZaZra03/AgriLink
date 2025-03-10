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
</head>
<body class="relative min-h-screen flex flex-col">
    <?php include "./components/navbar.php"; ?>

    <div class="relative max-w-5xl mx-auto my-20 px-5">

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

            <!-- Flowbite Button Group -->
            <div class="flex justify-center mt-6">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10">Products</button>
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10">Graph</button>
                </div>
            </div>

            <h2 class="mt-10 text-xl font-semibold text-center">Products by Seller</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-5">
                <?php if ($products) { 
                    foreach ($products as $product) { ?>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="w-full h-48 bg-gray-300">
                                <img src="/AgriLink/assets/products/<?php echo htmlspecialchars($product['image']); ?>" 
                                    class="w-full h-full object-cover" alt="Product Image">
                            </div>
                            <div class="p-3">
                                <h3 class="text-sm font-bold"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="text-primary">₱<?php echo number_format((int)$product['price'] - ((int)$product['price'] * ((int)$product['discount'] / 100))); ?>.00</p>
                                <p class="text-xs text-gray-500"><?php echo ((int)$product['current_stock'] - (int)$product['available']); ?> sold</p>
                                <a href="/AgriLink/product.php?id=<?php echo htmlspecialchars($product['id']); ?>" 
                                class="block text-center mt-2 bg-primary text-white py-1 rounded">Buy</a>
                            </div>
                        </div>
                <?php } 
                } else { ?>
                    <p class="text-gray-500 col-span-full text-center py-10">No products found.</p>
                <?php } ?>
            </div>
        </div>
    </div> 

    <?php include "./components/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
