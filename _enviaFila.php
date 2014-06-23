<?
include("Verifica.php");
include("libEmarketing.php");
for($i=0;$i<count($_POST[cliente]);$i++){
addEmailEnvio($_POST[cliente][$i],$_POST[idMensagem]);
}
?>
<script>
alert('Envio Cadastrado com Sucesso!!');
window.location.replace("index.php?_m=livesupport&_a=managerCliente");
</script>
