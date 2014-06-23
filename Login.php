<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<title>eCom:: Extranet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script language="Javascript">
var themepath = "themes/admin_default/";
var swiftpath = "";
var BLANK_IMAGE="themes/admin_default/space.gif";
var swiftsessionid = "";
</script>

<!-- default stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />

<!-- default javascript file -->
<script type="text/javascript" src="themes/admin_default/main.js"></script>



</head><body onLoad="focusUsername()">
<script language="Javascript">
var screenHeight = window.screen.availHeight;
var screenWidth = window.screen.availWidth;

function focusUsername()
{
	document.loginform.username.focus();
}


function launchMonitor() {
	if (document.loginform.username.value == "" || document.loginform.password.value == "") {
		alert("One of the required field(s) is empty");
	}

	docWidth = (screenWidth/2)-250;
	docHeight = (screenHeight/2)-250;
	chatwindow = window.open("monitor/index.php?_ca=login&username="+escape(document.loginform.username.value)+"&password="+escape(document.loginform.password.value) +"&randno="+doRand(),"monitor"+doRand(), "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=0,resizable=1,width=850,height=700,left="+docWidth+",top="+docHeight);

	return false;
}
</script>
<form name="loginform" action="Autentica.php" method="POST">
<table width="100%" height="100%">
<tr>
<td align="center" valign="middle">


		<table width="300" border="0" cellspacing="0" cellpadding="3">
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="center" valign="top"><img src="themes/admin_default/logo.jpg" width="280" height="70" /></td>
  </tr>
  <tr>
    <td width="144" align="left" valign="top" bgcolor="#FFFFFF"><span class="smalltext"><font color="#333333">2.3.9</font></span></td>
    <td width="144" align="right" valign="top" bgcolor="#FFFFFF"><span class="smalltext"><font color="#333333"><?=date("d/m/Y")?></font></span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr bgcolor="#E2E1E1">
        <td height="2"><img src="themes/admin_default/space.gif" width="1" height="2"></td>
      </tr>
      <tr bgcolor="#A9A9A9">
        <td height="3"><img src="themes/admin_default/space.gif" width="1" height="3"></td>
      </tr>
      <tr>
        <td><table width="100%"  border="0" cellpadding="1" cellspacing="0" bgcolor="#939393">
          <tr>
            <td><table width="100%"  border="0" cellspacing="0" cellpadding="3">
              <tr bgcolor="#F8F8F8">
                <td width="37%" align="left" valign="top"><span class="mediumtext">Usuário:</span></td>
                <td width="63%" align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="text" name="username" id="username" class="logintext" value="" size="25" />
                </font></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td align="left" valign="top"><span class="mediumtext">Senha:</span></td>
                <td align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="password" name="password" id="password" class="loginpassword" value="" size="25" />
                </font></td>
              </tr>
              <tr align="center" bgcolor="#FFFFFF">
                <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="submit" class="bluebuttonbig" value="Login" /> <input type="hidden" name="querystring" value="">
                </font></td>
                </tr>
				<? if($Status=='Erro'){?>
				<tr class="rowerror" title="" onmouseover="" onmouseout="" onclick="">
				<td align="center" valign="" colspan="2" width="37%">Usuário ou Senha Inválido				</td>
				</tr>
				<? } ?>
							</table></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#A9A9A9">
        <td height="3"><img src="themes/admin_default/space.gif" width="1" height="3"></td>
      </tr>
      <tr bgcolor="#E2E1E1">
        <td height="2"><img src="themes/admin_default/space.gif" width="1" height="2"></td>
      </tr>
    </table></td>
  </tr>


</table>
		
</td>
</tr>
</table>
</form>
<center>
<span class="smalltext"><font color="#333333">Powered by WebPlaza<br/>
Copyright &copy; 2009 - <?=date('Y');?> Escad.</font></span><br />
</center>
</body>
</html>