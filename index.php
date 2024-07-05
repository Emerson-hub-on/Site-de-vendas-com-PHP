<?php
include_once './connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Produtos</title>
</head>
<body>
    <?php 
    include_once './menu.php';
    ?>

    <div class="container">
        <h2 class="display-4 mt-5 mb-5">Produtos</h2>
        <?php
        $query_products = "SELECT id, nome , price, image FROM products ORDER BY id ASC";
        $result_products = $conn->prepare($query_products);
        $result_products->execute();
        ?>
        <div class="row row-cols-1 row-cols-md-3 mb-5">
            <?php

            while ($row_product = $result_products->fetch(PDO::FETCH_ASSOC)) {
                extract($row_product);
            ?>
                <div class="col">
                    <div class="card h-100 text-align-center">
                        <img src='<?php echo "./images/products/$id/$image";?>' class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $nome; ?></h5>
                            <p class="card-text"><?php echo number_format($price, 2, ",", "."); ?></p>
                            <a href="view-products.php?id=<?php echo $id; ?>" class="btn btn-primary">Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>