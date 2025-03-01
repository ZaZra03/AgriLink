<?php
// Array with names
$items = [
    "Upo (Bottle Gourd)", "Ampalaya (Bitter Gourd)", "Sitaw (String Beans)", "Okra", 
    "Talong (Eggplant)", "Lanzones", "Rambutan", "Mango", "Papaya", "Pineapple", 
    "Rice", "Free-range Chicken", "Pork", "Beef", "Duck Eggs", "Chicken Eggs", 
    "Tilapia", "Freshwater Prawns", "Bangus", "Kalabasa (Squash)", 
    "Malunggay (Moringa Leaves)", "Kangkong (Water Spinach)", 
    "Kamote Tops (Sweet Potato Leaves)", "Gabi (Taro)", "Sayote (Chayote)", 
    "Singkamas (Jicama)", "Red Onion", "White Onion", "Garlic", "Tomatoes", 
    "Potatoes", "Carrots", "Bell Peppers", "Pechay (Bok Choy)", "Cabbage", 
    "Radish (Labanos)", "Guava (Bayabas)", "Pomelo (Suha)", "Banana (Saging)", 
    "Jackfruit (Langka)", "Avocado", "Calamansi", "Coconut (Buko)", "Melon", 
    "Watermelon", "Dragon Fruit", "Chicken Breast", "Chicken Thigh", 
    "Pork Belly (Liempo)", "Ground Pork", "Beef Ribs", "Beef Shank", 
    "Duck Meat", "Goat Meat (Chevon)", "Salted Duck Eggs", "Crabs", "Shrimps", 
    "Squid (Pusit)", "Shellfish (Tahong)", "Clams (Halaan)"
];

// Get the 'q' parameter from URL
$q = $_REQUEST["q"] ?? "";
$hint = [];

// Check for matches
if ($q !== "") {
    $q = strtolower($q);
    foreach ($items as $item) {
        // Check if the item starts with the input string (case-insensitive)
        if (stripos(strtolower($item), $q) === 0) {
            $hint[] = $item;
        }
    }
}

// Output suggestions in an HTML list
if (empty($hint)) {
    echo "<div class='p-2 text-gray-500'>No suggestion</div>";
} else {
    echo "<ul class='p-2'>";
    foreach ($hint as $item) {
        echo "<li class='p-1 border-b cursor-pointer hover:bg-gray-100'>$item</li>";
    }
    echo "</ul>";
}
?>