<?php
require('Connexion.php');
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['pass'])){
    header('location:index.php');
  }
if (strcmp($_SESSION['type'], "ADMIN") == 0 or strcmp($_SESSION['type'], "admin") == 0) {
    //  header('location:list.php');
} else {
    header('location:index.php');
}

?>
<html>

<head>

    <style>
        table {
            width: 50%;
            height: 50%;
            font-size: 30px;
        }

        table th {
            border: solid 1px;
            color: #678;
        }

        table tr {
            border: solid 1px;
            color: #678;
        }

        table td {
            border: solid 1px;
            color: #678;
        }

        button {
            font-size: 25px;
        }

        label {
            font-family: sans-serif;
            font-size: 1rem;
            padding-right: 10px;
        }

        select {
            font-size: 0.9rem;
            padding: 2px 5px;
        }
    </style>
</head>

<body>

    <center>
        <form action="" method="post">
            <input type="submit" name='Ajout' value='Ajouter' />
            <input type="submit" name='Quit' value='Quit' />

        </form>
    </center>
    <center>
        <form action="" method='POST'>
            <table>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>Type</th>
                    <th>Mot de pass</th>
                    <th>login</th>
                </tr>
                <?php
                // if($_SERVER['REQUEST_METHOD']=='POST'){
                // if(strcmp($_SESSION['Ntype_user'],'ETUDIANT')==0) 
                // {
                //     echo 'etudiant P'.$_SESSION['Ntype_user'];
                // }
                //}
                if (isset($_POST['Quit'])) {
                    header('location:inde.php');
                }
                ?>
                <?php
                $query = "SELECT * from UTILISATEUR ORDER BY id";

                $Lign = $con->prepare($query);
                $Lign->execute();
                //--------------------------------------------------------------------
                // ---------------------------parter V--------------------------------

                while ($ligne = $Lign->fetch()) {
                    echo '<tr>';
                    echo '<td>' . $ligne['id'] . '</td>';
                    echo '<td>' . $ligne['nom'] . '</td>';
                    echo '<td>' . $ligne['typ'] . '</td>';
                    echo '<td>' . $ligne['pass'] . '</td>';
                    echo '<td>' . $ligne['login'] . '</td>';
                    echo '<td><a href="index3.php?id=' . $ligne['id'] . '& name=' . $ligne['nom'] . '& type=' . $ligne['typ'] . '& pass=' . $ligne['pass'] . '& login=' . $ligne['login'] . '">M</a></td>';
                    echo '<td><a href="SupprimerEnr.php?id=' . $ligne['id'] . '">S</a></td>';
                    echo '</tr>';
                } ?>
            </table>
        </form>
    </center>
</body>

</html>
<?php
if (isset($_POST['Ajout'])) {
    $_SESSION['Ajout'] = $_POST['Ajout'];
    header('location:index3.php');
}
?>