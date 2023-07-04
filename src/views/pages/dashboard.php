<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/projetminifigs/assets/css/style.css">
    <title>Tableau de bord</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #AAAA;">
            <a class="navbar-brand" href="#">Star Wars Minfigs Collector</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter une minifig</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Recherche">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Chercher</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ma nouvelle acquisition</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="add" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="ref" class="form-label">Référence</label>
                                    <input type="text" class="form-control" name="ref">
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Année</label>
                                    <input type="text" class="form-control" name="year">
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantité</label>
                                    <input type="text" class="form-control" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image" onchange="preview(event)">
                                </div>
                                <div class="preview d-flex justify-content-center">
                                    <img src="" alt="">
                                </div>
                                <div class="modal-footer d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="reset" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Display -->
        <div class="row gap-4 my-5 d-flex justify-content-center">
            <?php
            // Afficher les minifigs sur la page

            foreach ($minifigs as $minifig) {
                // var_dump($minifig['image']);
                // die;
                // Afficher les détails de chaque minifig
                echo
                "<div class='card mb-3 d-flex' style='max-width: 540px;'>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                            <img src='" . $minifig['image'] . "' class='img-fluid rounded-start p-2' alt='" . $minifig['name'] . "-minifig'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $minifig['name'] . "</h5>
                                <p class='card-text'> Référence: " . $minifig['ref'] . " </p>
                                <p class='card-text'> Année: " . $minifig['year'] . " </p>
                                <p class='card-text'> Quantité: " . $minifig['quantity'] . " </p>
                            </div>
                        </div>
                    </div>
            </div>";
            }
            // <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            // <!-- display -->
            ?>
        </div>
    </main>
    <footer>

    </footer>
    <script src="http://localhost/projetminifigs/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>