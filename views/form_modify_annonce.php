<html>
<?php  include_once("../modele/modify_annonce.php");?>
    <head><title> modifier un formulaire </title></head>
    <body>
    <form action="../modele/modify_annonce.php" method="post">
        <label>
            <select name = "select">
                <?php echo DoOption(); ?>
            </select>
        </label>
        <input type="submit">
    </form>
    </body>
</html>
