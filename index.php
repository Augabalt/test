<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Scandiweb Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container" style="margin-top:40px;">
        <div class="row row-cols-2">
            <div class="col">
                <h1>Product list</h1>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <button onclick="window.location.href='addproduct.php'" class="btn btn-primary">ADD</button>
                    </div>
                    <div class="col">
                        <button onclick="deleteProduct()" class="btn btn-primary" id="delete-product-btn">MASS DELETE</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container" id="product_list"></div>
    </div>
    <footer class="mt-auto">
        <div class="container" style="margin-bottom:40px; text-align: center">
            <hr>
            <p>Scandiweb Test assignment</p>
        </div>
    </footer>

    <script src="js/index.js"></script>


</body>

</html>
