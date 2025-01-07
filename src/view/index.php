<?php require_once __DIR__."/../includes/functions.php";
if(!isLogedIn()){
    returnToLogin();
}
else if (isAdmin()){
    header("Location: /");
}
echo $_SESSION["admin"];
?> 
<?php include __DIR__. '/../includes/header.php'; ?>

<div id="content"></div>

<?php include __DIR__.'/../includes/footer.php'; ?>
<script src="/assets/js/main.js"></script>
