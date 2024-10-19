<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/recettes.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Backoffice</title>
</head>

<body>
    <?php require_once("../backoffice/template/header.php") ?>
    <section class="illust-addarticle"></section>
    <section class="formulaire">
        <div class="container">
            <h3>Ajouter un article</h3>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="left-section">
                    <div class="container-prenom">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="firstname" placeholder="Prénom">
                    </div>
                    <div class="container-title">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="title" placeholder="Titre">
                    </div>
                    <div class="container-categories">
                        <label for="categorie">Catégorie :</label>
                        <select id="categorie" name="category">
                            <option value="">--Catégorie--</option>
                            <option value="">Entrées / Apéro</option>
                            <option value="">Plats</option>
                            <option value="">Desserts</option>
                        </select>
                    </div>
                    <div class="container-tags-form">
                        <label for="tags">Tags :</label>
                        <select id="tags" name="tags">
                            <option value="">--Choisir des tags--</option>
                            <option value="">Entrées Froides</option>
                            <option value="">Entrées Chaudes</option>
                            <option value="">Apéros</option>
                            <option value="">Viandes</option>
                            <option value="">Marins</option>
                            <option value="">Féculents</option>
                            <option value="">Desserts Froids</option>
                            <option value="">Desserts Chauds</option>
                        </select>
                    </div>
                    <div class="container-coocking">
                        <label for="temps_cuisson">Temps cuisson (minutes) :</label>
                        <input type="text" id="temps_cuisson" name="coocking" placeholder="Temps de cuisson en minutes">
                    </div>
                    <div class="container-preparation">
                        <label for="temps_preparation">Temps préparation (minutes) :</label>
                        <input type="text" id="temps_preparation" name="preparation" placeholder="Temps de préparation en minutes">
                    </div>
                    <div class="container-personnes">
                        <label for="personnes">Personnes :</label>
                        <select id="personnes" name="number">
                            <option value="">--Nombre de personne--</option>
                            <option value="">2</option>
                            <option value="">4</option>
                            <option value="">6</option>
                            <option value="">8</option>
                        </select>
                    </div>
                </div>

                <div class="right-section">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" placeholder="Description"></textarea>

                    <label for="ingredients">Ingrédients :</label>
                    <textarea id="ingredients" name="ingredients" placeholder="Ingrédients"></textarea>

                    <label for="preparation">Préparation :</label>
                    <textarea id="preparation" name="preparation" placeholder="Instruction de la préparation"></textarea>

                    <label id="uploadLabel" for="image">Uploader une photo</label>
                    <input type="file" id="image" style="display: none;">
                    <img id="previewImage" src="#" alt="Aperçu de l'image">
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>

    <h3>Dashboard</h3>
    <div class="container-search">
        <img src="../img/logos/search.svg" alt="Recherche">
        <input type="search" name="search" id="search" placeholder="Nom de la recette">
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Title</th>
                <th>Pages</th>
            </tr>
        </thead>
        <tbody>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>1</td>
                <td>The Bible</td>
                <td>952</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>2</td>
                <td>Harry Potter</td>
                <td>312</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>3</td>
                <td>The Lord of the Rings</td>
                <td>1178</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>4</td>
                <td>To Kill a Mockingbird</td>
                <td>281</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>5</td>
                <td>1984</td>
                <td>328</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>6</td>
                <td>Moby Dick</td>
                <td>635</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>7</td>
                <td>War and Peace</td>
                <td>1225</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>8</td>
                <td>The Great Gatsby</td>
                <td>180</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>9</td>
                <td>Pride and Prejudice</td>
                <td>432</td>
            </tr>
            <tr data-page="1">
                <td><label><input type="checkbox"></label></td>
                <td>10</td>
                <td>The Catcher in the Rye</td>
                <td>277</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>11</td>
                <td>Crime and Punishment</td>
                <td>671</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>12</td>
                <td>Anna Karenina</td>
                <td>864</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>13</td>
                <td>Ulysses</td>
                <td>730</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>14</td>
                <td>The Odyssey</td>
                <td>374</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>15</td>
                <td>Brave New World</td>
                <td>311</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>16</td>
                <td>Don Quixote</td>
                <td>992</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>17</td>
                <td>The Iliad</td>
                <td>683</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>18</td>
                <td>Les Misérables</td>
                <td>1463</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>19</td>
                <td>Jane Eyre</td>
                <td>500</td>
            </tr>
            <tr data-page="2">
                <td><label><input type="checkbox"></label></td>
                <td>20</td>
                <td>The Divine Comedy</td>
                <td>798</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>21</td>
                <td>The Brothers Karamazov</td>
                <td>796</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>22</td>
                <td>The Hobbit</td>
                <td>310</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>23</td>
                <td>The Grapes of Wrath</td>
                <td>464</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>24</td>
                <td>Wuthering Heights</td>
                <td>416</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>25</td>
                <td>A Tale of Two Cities</td>
                <td>489</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>26</td>
                <td>The Picture of Dorian Gray</td>
                <td>254</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>27</td>
                <td>Dracula</td>
                <td>418</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>28</td>
                <td>Fahrenheit 451</td>
                <td>194</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>29</td>
                <td>The Sound and the Fury</td>
                <td>326</td>
            </tr>
            <tr data-page="3">
                <td><label><input type="checkbox"></label></td>
                <td>30</td>
                <td>Frankenstein</td>
                <td>280</td>
            </tr>
            <tr data-page="4">
                <td><label><input type="checkbox"></label></td>
                <td>31</td>
                <td>One Hundred Years of Solitude</td>
                <td>417</td>
            </tr>
            <tr data-page="4">
                <td><label><input type="checkbox"></label></td>
                <td>32</td>
                <td>Heart of Darkness</td>
                <td>96</td>
            </tr>
            <tr data-page="4">
                <td><label><input type="checkbox"></label></td>
                <td>33</td>
                <td>The Old Man and the Sea</td>
                <td>127</td>
            </tr>
            <tr data-page="4">
                <td><label><input type="checkbox"></label></td>
                <td>34</td>
                <td>The Count of Monte Cristo</td>
                <td>1276</td>
            </tr>
            <tr data-page="4">
                <td><label><input type="checkbox"></label></td>
                <td>35</td>
                <td>Gulliver's Travels</td>
                <td>306</td>
            </tr>

        </tbody>
    </table>
    <button type="submit" class="delete-articles">Supprimer les articles sélectionnés</button>

</body>

</html>