<?
session_start();
session_unregister("idLogin");
session_unregister("StatusLogin");
$url = "Login.php";
?>
<script>window.location.replace("<?=$url?>")
</script>
<?
}

?>