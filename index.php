<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="./fontawesome/js/all.js"></script>
</head>

<body>
    <div class="navbar">
        <a id="navbar--shoppingcard" data-count="1"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <div class="container">
        <div class="contents">
            <?php
            $jsonData = file_get_contents('./products.json');
            $products = json_decode($jsonData, true);

            foreach ($products as $product) {
                ?>
                <article class="item">
                    <header class="article-header">
                        <h1 class="article-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                    </header>
                        <div class="article-image">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Article Image">
                        </div>
                        <div class="article-details">
                            <h2 class="article-price"><?php echo htmlspecialchars($product['price']); ?></h2>
                            <p class="article-description"><?php echo htmlspecialchars($product['description']); ?></p>
                        </div>
                    <div class="article-actions">
                        <button class="btn">Add to Cart</button>
                        <button class="btn">Buy Now</button>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>