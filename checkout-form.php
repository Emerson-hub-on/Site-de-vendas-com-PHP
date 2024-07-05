<?php
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
include_once './connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulário de checkout</title>
</head>

<body>
    <?php include_once './menu.php'; ?>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./images/logo/carrinho.jpg" alt="" width="72" height="72">
            <h2>Formulário de pagamento</h2>
            <p class="lead">Abaixo estão alguns passos para efetuar o pagamento.</p>
        </div>

        <div class="row mb-5">
            <div class="col mb-8">
                <?php
                $query_products = "SELECT id, nome , price FROM products WHERE id =:id LIMIT 1";
                $result_products = $conn->prepare($query_products);
                $result_products->bindParam(':id', $id, PDO::PARAM_INT);
                $result_products->execute();
                $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
                extract($row_product);
                ?>
                <h3><?php echo $nome; ?></h3>
            </div>
            <div class="col mb-4">
                <div class="col mb-1 text-muted">
                    <?php echo number_format($price, 2, ",", "."); ?>
                </div>
            </div>
        </div>
        <hr>

        <div class="row mb-5">
            <div class="col-md-12">
                <h4 class="mb-3">Informações pessoais</h4>

                <form id="checkoutForm" action="processar_pagamento.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">Primeiro nome</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Primeiro nome" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Último nome</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Último nome" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Somente números" maxlength="14" oninput="maskCPF(this)" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone com o DDD" maxlength="14" oninput="maskPhone(this)" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Seu e-mail" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/dist/qrcode.min.js"></script>
    <script src="./js/custom.js"></script>
   
</body>

</html>
