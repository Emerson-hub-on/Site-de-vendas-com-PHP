<?php
$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);
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
    
    $query_products = "SELECT id, nome , description,  price, image FROM products WHERE id =:id LIMIT 1";
    $result_products = $conn->prepare($query_products);
    $result_products->bindParam(':id', $id, PDO::PARAM_INT);
    $result_products->execute();
    $row_product = $result_products->fetch(PDO::FETCH_ASSOC );
    extract($row_product);
    
    $price_rise = ($price * 0.10) + $price;
    ?>

    <div class="container">
        <h1 class="display-4 mt-5 mb-5"><?php echo $nome; ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src='<?php echo "./images/products/$id/$image";?>' class="card-img-top">
            </div>
            <div class="col-md-6">
                <p>de R$ <?php echo number_format($price_rise, 2, ",", ".");?></p>
                <p>por R$ <?php echo number_format($price, 2, ",", "."); ?></p>
                <p>
                    <a href="checkout-form.php?id=<?php echo $id; ?>" class="btn btn-primary">Comprar</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <?php echo $description; ?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>