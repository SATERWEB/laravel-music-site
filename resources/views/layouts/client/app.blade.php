<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
<div class="container-fluid">

    <livewire:client.header.index/>
    <div>
        <nav class="navbar navbar-light menu-ltr shadow bg-white lg-none md-none mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="/client/img/logo.png" class="toggle-logo" alt="">
            </div>
        </nav>
    </div>
    <livewire:client.cart.index/>

</div>

<livewire:client.music.index/>
<livewire:client.footer.index/>

<script src="/client/js/bootstrap.min.js"></script>
<script src="/client/js/all.js"></script>
</body>
</html>
