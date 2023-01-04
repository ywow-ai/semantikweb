<?php
require 'vendor/autoload.php';

// konfigurasi disini
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('data', 'http://www.semanticweb.org/pondokgrafis/ontologies/2022/11/semweb#');
$sparql = new EasyRdf\Sparql\Client('http://localhost:3030/anime/query');
// end of konfigurasi

if (isset($_GET['opsi']) and isset($_GET['keyword'])) {
    $opsi = $_GET['opsi'];
    $keyword = $_GET['keyword'];
    if ($_GET['opsi'] == 'genre') {
        $data = $sparql->query(
            "SELECT ?judul ?genres ?pengarang ?penerbit ?studio ?sinopsis ?gambar
                WHERE { 
                    ?genre data:namagenre ?genres.
                    FILTER REGEX(?genres, '$keyword').
                    ?genre data:dimiliki ?anime.
                    ?anime data:judulanime ?judul.
                    optional{?anime data:sinopsis ?sinopsis.}
                    optional{?anime data:gambar ?gambar.}
                    ?anime data:dikarang ?namapengarang. ?namapengarang data:namapengarang ?pengarang.
                    ?anime data:diterbitkan ?namapenerbit. ?namapenerbit data:namapenerbit ?penerbit.
                    ?anime data:dibuat ?namastudio. ?namastudio data:namastudio ?studio.
                }"
        );
    } else {
        $data = $sparql->query(
            "SELECT ?judul ?pengarang ?penerbit ?studio ?sinopsis ?gambar
                WHERE { 
                    ?anime data:judulanime ?judul.
                    ?anime data:dikarang ?namapengarang.
                    ?namapengarang data:namapengarang ?pengarang.
                    ?anime data:diterbitkan ?namapenerbit.
                    ?namapenerbit data:namapenerbit ?penerbit.
                    ?anime data:dibuat ?namastudio.
                    ?namastudio data:namastudio ?studio.
                    optional{?anime data:sinopsis ?sinopsis.}
                    optional{?anime data:gambar ?gambar.}
                    FILTER REGEX(?$opsi, '$keyword').
                }"
        );
    }
} else {
    $data = $sparql->query(
        "SELECT ?judul ?pengarang ?penerbit ?studio ?sinopsis ?gambar
            WHERE { 
                ?anime data:judulanime ?judul.
                ?anime data:dikarang ?namapengarang.
                ?namapengarang data:namapengarang ?pengarang.
                ?anime data:diterbitkan ?namapenerbit.
                ?namapenerbit data:namapenerbit ?penerbit.
                ?anime data:dibuat ?namastudio.
                ?namastudio data:namastudio ?studio.
                optional{?anime data:sinopsis ?sinopsis.}
                optional{?anime data:gambar ?gambar.}
            }"
    );
}
?>

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

    <div class="row m-konten">
        <div class="col-3">&nbsp;</div>
        <div class="col-6 bg-light p-0">
            <?php foreach ($data as $d) :; ?>
                <div class="row g-0 bg-light position-relative border-bottom border-dark">
                    <div class="col-md-3 mb-md-0 p-md-4">
                        <img src="img/<?= $d->gambar; ?>" class="w-100" alt="...">
                    </div>
                    <div class="col-md-9 p-4 ps-md-0">
                        <a href="#" class="text-decoration-none text-dark fs-4 fw-bolder"><?= $d->judul; ?></a>
                        <p class="mb-0">Synopsis</p>
                        <p class="sinopsis"><?= $d->sinopsis; ?></p>
                        <?php $q_genre = $sparql->query(
                            "SELECT ?judul ?genre
                            WHERE { 
                                ?anime data:judulanime ?judul.
                                ?anime data:memiliki ?g.
                                ?g data:namagenre ?genre.
                                FILTER REGEX (?judul, '$d->judul').
                            }"
                        );
                        ?>
                        <h6>Genre :
                            <?php foreach ($q_genre as $n => $g) { ?>
                                <a class="link-y" href="?opsi=genre&keyword=<?= $g->genre; ?>"><?= $g->genre; ?></a> |
                            <?php }; ?>
                        </h6>
                        <h6><a class="link-y" href="?opsi=pengarang&keyword=<?= $d->pengarang; ?>"><?= $d->pengarang; ?></a> | <a class="link-y" href="?opsi=penerbit&keyword=<?= $d->penerbit; ?>"><?= $d->penerbit; ?></a> | <a class="link-y" href="?opsi=studio&keyword=<?= $d->studio; ?>"><?= $d->studio; ?></a></h6>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-3">&nbsp;</div>
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