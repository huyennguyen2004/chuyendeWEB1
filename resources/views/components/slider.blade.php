<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <style>
        .carousel-inner img {
            height: 500px;
            object-fit: cover;
        }

        .banner-small img {
            height: 245px;
            object-fit: cover;
        }

        .banner-small {
            padding-top: 8px;
        }
    </style>
</head>

<body>
    <div class="container mt-4 ">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/banner/banner1.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/banner/banner2.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/banner/banner3.webp" class="d-block w-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-small mb-3">
                    <img src="./img/banner/banner4.png" class="img-fluid w-100" alt="Banner 4">
                </div>
                <div class="banner-small">
                    <img src="./img/banner/banner5.png" class="img-fluid w-100" alt="Banner 5">
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#carouselExample').carousel({
                interval: 4000
            });
        });
    </script>
</body>

</html>
