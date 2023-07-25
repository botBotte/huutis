<?php
require_once ('config.php');
require_once ('db.php');
include 'templates/header.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$products = fetchAll($db);

?>
<html>
    <head>
        <title>Select all</title>
    </head>
<body>

<div class="row">
    <?php foreach($products as $product){?>

    <div class="col s12 m2">
        <div class="card">
            <div class="card-image">
                <img src="<?php echo $product['imgurl']; ?>">
                <span class="card-title"><?php echo $product['title']; ?></span>
            </div>
            <div class="card-content">
                <p> <?php echo $product['description']; ?></p>
            </div>
            <div class="card-action">
            <a class="brand-text" href="product-view.php?id=<?= $product['id']; ?>">More</a></td>
            </div>
        </div>
    </div>

    <?php }?>
</div>

</body>   
</html>

<?php
include 'templates/footer.php';
?>