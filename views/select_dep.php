<label for="address">Département :</label>
    <select class="form-control" id="dep" name="dep" required  onchange="ajax_address();">
        <option selected disabled value="">Sélectionnez un  département</option>
        <?php
            include_once("../helpers/database.php");
            $pdo = Database::getInstance();
            if(isset($_GET["id_region"]))
            {
                $query = $pdo->prepare("SELECT * FROM departement WHERE id_region = :id_region");
                $query->execute(array(":id_region"=>$_GET["id_region"]));
                $query = $query->fetchall(PDO::FETCH_ASSOC);
                foreach( $query as $dep )
                {
                    echo "<option value=\"{$dep["id_dep"]}\">{$dep["name"]}</option>\n";
                }
            }
        ?>
    </select>
    <small><?= $errors['address']  ?? '' ?></small>