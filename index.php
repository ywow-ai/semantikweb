<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AniGLODAKKK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar fixed-top bg-danger">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand mx-3 text-light" href="index.php">Home</a>
            <a class="navbar-brand mx-3 text-light" href="hasil.php">List Anime</a>
            <a class="navbar-brand mx-3 text-light" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">About</a>
        </div>
    </nav>

    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="d-flex justify-content-center judul text-danger">AniGLODAKKK</h1>
        <!-- <div class="row"> -->
        <form class="row" action="hasil.php" method="get">
            <div class="col-9">
                <div class="row bg-white">
                    <div class="col-3 p-0">
                        <select name="opsi" type="text" class="form-select fs-1 border-0 rounded-0 uneditable-input text-capitalize" required>
                            <option value="">pilih</option>
                            <option value="judul">anime</option>
                            <option value="studio">studio</option>
                            <option value="pengarang">pengarang</option>
                            <option value="genre">genre</option>
                            <option value="penerbit">penerbit</option>
                        </select>
                    </div>
                    <div class="col-9 p-0">
                        <input name="keyword" type="text" class="form-control fs-1 border-0 rounded-0 uneditable-input" placeholder="Cari di sini..." required>
                    </div>
                </div>
            </div>
            <div class="col-3 p-0">
                <div class="col p-0">
                    <button type="submit" class="btn btn-danger fs-1 border-0 rounded-0 uneditable-input px-5">Cari</button>
                </div>
            </div>
        </form>
        <!-- </div> -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Nama Kelompok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    <p>Muhammad Alamul Yaqin (201951011)</p>
                    <p>Muhammad Agus Riyanto (201951026)</p>
                    <p>Nur Rohmat Riyadi (201951027)</p>
                    <p>Muhammad Syahrul Amiruddin (201951030)</p>
                    <p>Bagas Wahyu Andrianto (201951032)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>