<header class="site-header">

    <div class="navbar">
        <div>

            <a href="index.php" class="logo">
                <img src="img/logo.png" alt="Logo" />
            </a>

            <?php
            // build a URL that toggles dark on/off while preserving other params
            $qs = $_GET;
            if ($isDark) {
                unset($qs['dark']);
            } else {
                $qs['dark'] = 'true';
            }
            $toggleUrl = $_SERVER['PHP_SELF']
                . (count($qs)
                    ? '?' . http_build_query($qs)
                    : '');
            ?>
            <a href="<?= htmlspecialchars($toggleUrl) ?>" class="btn toggle-dark">
                <?= $isDark ? 'Light Mode' : 'Dark Mode' ?>
            </a>


        </div>
        <div>
            <ul class="nav-links">
                <li><a href="?page=home<?= $isDark ? '&dark=true"' : '' ?>">Home</a></li>
                <li><a href="?page=producten<?= $isDark ? '&dark=true"' : '' ?>">Producten</a></li>
                <li><a href="?page=contact<?= $isDark ? '&dark=true"' : '' ?>">Contact</a></li>
                <li><a id="navbar--shoppingcard<?= $isDark ? '&dark=true"' : '' ?>" data-count="1"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </div>
</header>


<style>
    .site-header {
        width: 100%;
        background: #1f2d3d;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        position: sticky;
        top: 0;
        z-index: 10;
        font-size: 3.6rem;
    }

    .logo img {
        background-color: white;
        height: 6rem;
        width: auto;
        vertical-align: middle;
        transform: scaleX(-1);
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2rem;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 2.5rem;
    }

    .nav-links li {
        display: inline-block;
    }


    .nav-links a {
        color: #fff;
        text-decoration: none;
        font-size: 1.8rem;
        font-weight: 500;
        transition: color 0.2s;
        padding: 0.5rem 1rem;
        border-radius: 0.4rem;
        position: relative;
        z-index: 1010;
    }

    .nav-links a:hover,
    .nav-links a:focus {
        background: #1f2d3d;
        color: #ff8c37;
    }




    #navbar--shoppingcard {
        position: relative;
        /* Enable absolute positioning for the badge */
        color: #fff;
    }

    /* When hovering over the shopping card icon */
    #navbar--shoppingcard:hover {
        cursor: pointer;
    }

    /* The badge styling */
    #navbar--shoppingcard::before {
        content: attr(data-count);
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -0.5rem;
        right: -0.5rem;
        width: 2rem;
        height: 2rem;
        background-color: #ff8c37;
        /* A refined accent color */
        color: #fff;
        border-radius: 50%;
        font-size: 1.2rem;
        font-weight: bold;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>