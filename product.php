<?php
$slug = $_GET['product'] ?? '';
$json = file_get_contents('./products.json');
$beats = json_decode($json, true);
$selected = null;
foreach ($beats as $p) {
    $s = preg_replace('/[^a-z0-9]+/', '', strtolower($p['name']));
    if ($s === $slug) {
        $selected = $p;
        break;
    }
}
if (!$selected) {
    http_response_code(404);
    echo "<h1>Product not found</h1>";
    exit;
}

// 2) Dark-mode detection
$isDark = (isset($_GET['dark']) && $_GET['dark'] === 'true');

// 3) Build toggle URL
$params = $_GET;
if ($isDark) {
    unset($params['dark']);
} else {
    $params['dark'] = 'true';
}
$toggleUrl = $_SERVER['PHP_SELF']
    . (count($params) ? '?' . http_build_query($params) : '');

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($selected['name']) ?></title>
    <script src="./fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="css/reset.css?v=2.0.1">
    <link rel="stylesheet" href="css/style.css?v=2.0.1">
    <link rel="stylesheet" href="css/product.css?v=2.0.1">
    <?php if ($isDark): ?>
        <link rel="stylesheet" href="css/theme-dark.css?v=2.0.1">
    <?php endif; ?>
</head>
<body<?= $isDark ? ' class="dark"' : '' ?>>

    <?php include_once 'sections/header.php'; ?>

    <div class="product-container">
        <div class="product-image">
            <img src="<?= htmlspecialchars($selected['image']) ?>" alt="<?= htmlspecialchars($selected['name']) ?>">
        </div>
        <aside class="product-sidebar">
            <h1><?= htmlspecialchars($selected['name']) ?></h1>
            <p><strong>Price:</strong> <?= htmlspecialchars($selected['price']) ?></p>
            <p><strong>Category:</strong> <?= htmlspecialchars($selected['catagory']) ?></p>
            <p><?= nl2br(htmlspecialchars($selected['description'])) ?></p>
            <a class="btn" href="#">Proceed to Checkout</a>
        </aside>
    </div>

    </body>
</html>