<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(VIEWPATH . 'desktop/css/easy.css') ?>
        <?= link_tag(VIEWPATH . 'desktop/css/style.css') ?>
        <script type="text/javascript" src="<?= VIEWPATH . 'desktop/js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?= VIEWPATH . 'desktop/js/easy.js' ?>"></script>
        <script type="text/javascript" src="<?= VIEWPATH . 'desktop/js/main.js' ?>"></script>
        <title><?= APPTITLE ?></title>
    </head>
    <body style="background-color: <?= $this->random->randomColours() ?>">
        <?php for ($i = 1; $i <= 1000; $i++): ?>
            <?php
            $dimentions = $this->random->randomSizes();
            ?>
            <div style="overflow: hidden; width:<?= $dimentions['width'] ?>px; height: <?= $dimentions['height'] ?>px; background-color: <?= $this->random->randomColours() ?>;float: left;"></div>
        <?php endfor; ?>
    </body>
</html>
