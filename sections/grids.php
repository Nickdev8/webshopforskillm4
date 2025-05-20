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
                    <!-- <button class="btn">Add to Cart</button> -->
                    <button class="btn">Buy Now</button>
                </div>
            </article>
            <?php
        }
        ?>
    </div>
</div>

<style>
    .item {
        background-color: #fff;
        max-width: 20rem;
        max-height: 40rem;
        padding: 1rem;
        flex: 1 1 20rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        /* New styles for layout */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 40rem;
        /* Ensures a consistent height for all items */
    }

    .article-header {
        margin-bottom: 1rem;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        text-align: center;
    }

    .article-image,
    .article-image>img {
        display: block;
        margin: 0 auto;
        width: 100%;
        max-width: 30rem;
        height: auto;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }


    .article-details {
        margin-bottom: 1rem;
    }

    .article-price {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .article-description {
        font-size: 1.5rem;
        color: #555;
    }

    .article-actions {
        display: flex;
        gap: 0.5rem;
    }

    .article-actions>.btn {
        padding: 0.8rem 1.2rem;
        font-size: 1.4rem;
        font-weight: bold;
        color: white;
        background-color: #3498db;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .article-actions>.btn:hover {
        background-color: #2980b9;
    }
</style>