<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php $title ?></title>
        <?php require_once(__DIR__ . '/partials/nav.php');?>

        <?php echo $view ?>

        <?php require_once(__DIR__ . '/partials/footer.php');?>
    </body>
</html>