<?php
$columns = 5;


$jsonData = file_get_contents('./products.json');
$products = json_decode($jsonData, true);

$cats = array_unique(array_column($products, 'catagory'));
sort($cats);
?>
<div class="controls">
    <input id="search" type="text" placeholder="Search by name…">
    <select id="category-filter">
        <option value="">All Categories</option>
        <?php foreach ($cats as $cat): ?>
            <option value="<?= htmlspecialchars($cat) ?>">
                <?= ucfirst(htmlspecialchars($cat)) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select id="sort">
        <option value="">Sort by…</option>
        <option value="year-desc">Year: Newest First</option>
        <option value="year-asc">Year: Oldest First</option>
        <option value="price-asc">Price: Low => High</option>
        <option value="price-desc">Price: High => Low</option>
        <option value="name-asc">Name: A => Z</option>
        <option value="name-desc">Name: Z => A</option>
    </select>
</div>

<div class="container" id="autos">
    <?php foreach ($products as $product):
        $slug = preg_replace('/[^a-z0-9]+/', '', strtolower($product['name']));
        $year = intval($product['year']);
        $price = floatval(str_replace([',', '$'], '', $product['price']));
        ?>

        <article class="item" data-name="<?= htmlspecialchars(strtolower($product['name'])) ?>"
            data-category="<?= htmlspecialchars($product['catagory']) ?>" data-year="<?= $year ?>"
            data-price="<?= $price ?>">
            <header class="article-header">
                <h1 class="article-title"><?= htmlspecialchars($product['name']) ?></h1>
            </header>
            <div class="article-image">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="">
            </div>
            <div class="article-details">
                <h2 class="article-price"><?= htmlspecialchars($product['price']) ?></h2>
                <p class="article-description"><?= htmlspecialchars($product['year']) ?></p>
                <p class="article-description"><?= htmlspecialchars($product['description']) ?></p>
            </div>
            <div class="article-actions">
                <a class="btn" href="product.php?product=<?= htmlspecialchars($slug) ?><?= $isDark ? '&dark=true"' : '' ?>">
                    Buy Now
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<script>
    (function () {
        const searchInput = document.getElementById('search');
        const categorySelect = document.getElementById('category-filter');
        const sortSelect = document.getElementById('sort');
        const container = document.getElementById('autos');
        const itemsArray = Array.from(container.querySelectorAll('.item'));

        function updateList() {
            const q = searchInput.value.trim().toLowerCase();
            const cat = categorySelect.value;
            const [field, dir] = (sortSelect.value || '').split('-');

            let filtered = itemsArray.filter(item => {
                const name = item.dataset.name;
                const category = item.dataset.category;
                return name.includes(q) && (!cat || category === cat);
            });

            if (field && dir) {
                filtered.sort((a, b) => {
                    let av = a.dataset[field], bv = b.dataset[field];
                    if (field === 'price' || field === 'year') {
                        av = parseFloat(av);
                        bv = parseFloat(bv);
                        return dir === 'asc' ? av - bv : bv - av;
                    } else {
                        return dir === 'asc'
                            ? av.localeCompare(bv)
                            : bv.localeCompare(av);
                    }
                });
            }

            itemsArray.forEach(item => item.style.display = 'none');
            filtered.forEach(item => {
                item.style.display = 'flex';
                container.appendChild(item);
            });
        }

        [searchInput, categorySelect, sortSelect]
            .forEach(el => el.addEventListener('input', updateList));
    })();
</script>



<!-- i placed the css here so i can inslude_once it in one command in index.php -->
<style>
    .cta-image {
        color: transparent;
    }
    :root {
        --cols:
            <?= intval($columns) ?>
        ;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(var(--cols), 1fr);
        gap: 1rem;
    }


    .item {
        background-color: #fff;
        width: 100%;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 40rem;

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