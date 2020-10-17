<?php
//inclu getBdd()
require_once './config.php';
require_once './City.php';
?>
<h1>World</h1>
<ul>
    <li><a href="country.php">Country</a></li>
    <li><a href="crudCity/read.php">City</a></li>
    <li><a href="languages.php">Languages</a></li>
</ul>
<h2>Add user</h2>
<?php
if (isset($_POST['firstname'])) {
    $user = City::find($_POST['id']);
    $user->populate($_POST);
    //$user = new User($_POST);
    $user->save();
    echo 'utilisateur ' . $user->firstname . ' ' . $user->lastname . ' enregistré sous l\'id ' . $user->id;
}

$cities = City::findAll();
?>
<form method="post">
    <select name="id">
        <?php foreach ($cities as $city) { ?>
            <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
        <?php } ?>
    </select>
    <label>Firstname :</label><input type="text" name="firstname"><br>
    <label>Lastname :</label><input type="text" name="lastname"><br>
    <input type="submit">
</form>
<?php