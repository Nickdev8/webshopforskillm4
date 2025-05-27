
<?php $isDark = (isset($_GET['dark']) && $_GET['dark'] === 'true'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./fontawesome/js/all.js"></script>

    <link rel="stylesheet" href="css/reset.css?v=2.0.1">
    <link rel="stylesheet" href="css/style.css?v=2.0.1">
    <?php if ($isDark): ?>
        <link rel="stylesheet" href="css/theme-dark.css?v=2.0.1">
    <?php endif; ?>
</head>


<body <?= $isDark ? ' class="dark"' : '' ?>>
    <?php
    include_once 'sections/header.php';
    ?>

    <div style="display:flex; width:100%">
        <div class="sidebar"></div>
        <div style="width:auto">
            <?php
            include_once 'sections/cta.php';
            include_once 'sections/grids.php';
            ?>
            <h2><strong> Disclaimer: </strong></h2>
            <p>
                De crappy style was kompleet intensioneel. <br>
                ik had zin om iets anders te maken wat "iets" anders was dan normaal. <br>
                Ik kan een betere styling geven des nodig. <br>
                maar je kan ook even kijken op <a href="https://nickesselman.nl">nickesselman.nl</a> voor hoe ik het ook
                kan.
            </p>
        </div>

        <div class="sidebar"></div>
    </div>

</body>

</html>