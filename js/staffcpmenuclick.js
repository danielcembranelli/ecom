var menulinks = new Array();

menulinks[1] = "";
menulinks[2] = " &nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=form&_a=managerProposta' title='Manager Proposta'>Manager Proposta</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=form&_a=insertProposta' title='Inserir Proposta'>Inserir Proposta</a>&nbsp;&nbsp;&nbsp;&nbsp;";

menulinks[3] = "&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=livesupport&_a=managerCliente' title='Manager Cliente'>Manager Cliente</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=livesupport&_a=insertCliente' title='Inserir Cliente'>Inserir Cliente</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='Relat�rios de Cliente'id='linkdpreferences' onClick=\"javascript:CustomPopup('dpreferences', event, \'linkdpreferences\', \'dpreferences\');this.blur();\" onMouseUp=\"this.blur();\">Relat�rio&nbsp;<img src='themes/admin_default/menudrop.gif' border='0' /></a>  ";

menulinks[8] = "<a href='index.php?_m=teamwork&_a=managerFamilia' title='Manager Fam�lia'>Manager Fam�lia</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=teamwork&_a=insertFamilia' title='Inserir Familia'>Nova Fam�lia</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=teamwork&_a=insertFamiliaPreco' title='Inserir Pre�o'>Novo Pre�o</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='RelatorioMaquinas.php' target='_black' title='Relatorio de Maquinas'>Relat�rio Maquinas</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='RelatorioPrecos.php' target='_black' title='Relatorio'>Relat�rio Pre�o</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=teamwork&_a=managerTtl'>Campos</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=teamwork&_a=managerTtm'>Modelos</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=teamwork&_a=managerTtd'>Dados</a>&nbsp;&nbsp;&nbsp;&nbsp; |";

menulinks[4] = "<a href='index.php?_m=ate&_a=relProposta' title='Propostas Emitidas'>Estat�stica</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relUltimaProposta' title='Relat�rio de Ultima Proposta Emitida para Cliente'>Ultima Proposta Emitida</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relCadCliente' title='Relat�rio de Cadastro Novo'>Cliente Novo</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relLocMaqProposta' title='Relat�rio de Equipamento Locado'>Equipamento Locado</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relPropostaPerdida' title='Relat�rio de Proposta N�o Confirmada'>Motivo de Cancelamento</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relNaoEmissaoProposta' title='Relat�rio de Clientes Inativos'>Clientes Inativos</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relClienteRegiao' title='Relat�rio de Clientes/Cidade'>Clientes/Cidade</a> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='RelatorioPropostaComissao.php' target='_blank' title='Calculo de Comiss�o'>Comiss�o</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=ate&_a=relFechamentoForm' title='Fechamento'>Fechamento</a>";

menulinks[5] = "<a href='index.php?_m=downloads&_a=managerClausula' title='Manager Cl�sulas'>Cl�usulas</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=insertClausula' title='Inserir Cl�usula'>Nova Cl�usula</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerOperador' title='Manager Tipo Operador'>Operador</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerParametro' title='Manager Par�metro'>Par�metro</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerMotivoProposta' title='Manager Motivo de Cancelamento'>Motivo</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerTipoComissao' title='Manager Tipo de Comiss�o'>Comiss�o</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerGrupoContato' title='Manager Grupo de Contatos'>Grupo</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerOrigem' title='Manager Origem de Cliente'>Origem</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=insertUsuario' title='Inserir Usu�rio'>Novo Usu�rio</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=downloads&_a=managerUsuario' title='Manager Usu�rio'>Manager Usu�rio</a>&nbsp;&nbsp;&nbsp;&nbsp;";

menulinks[6] = "<a href='index.php?_m=oper&_a=managerMensagem' title='Manager de Mensagem'>Manager Mensagem</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=insertMensagem' title='Cadastro de Mensagem'>Nova Mensagem</a>&nbsp;&nbsp;&nbsp;&nbsp;"

//menulinks[6] = "<a href='index.php?_m=oper&_a=managecolaborador' title='Manager Colaborador'>Manager Colaborador</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=insertcolaborador' title='Inserir Colaborador'>Inserir Colaborador</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=managerunidade' title='Manager Unidade'>Manager Unidade</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=insertunidade' title='Inserir Unidade'>Inserir Unidade</a>&nbsp;&nbsp;&nbsp;&nbsp;  |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=managercargo' title='Manager Cargo'>Manager Cargo</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=oper&_a=insertcargo' title='Inserir Cargo'>Inserir Cargo</a>&nbsp;&nbsp;&nbsp;&nbsp;  ";

menulinks[7] = "<a href='index.php?_m=news&_a=managenews' title='Manage News'>Manage News</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=news&_a=managesubscribers' title='Manage Subscribers'>Manage Subscribers</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=news&_a=insertnews' title='Insert News'>Insert News</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=news&_a=comments' title='Comments (40)'>Comments (40)</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=news&_a=importexport' title='Import/Export'>Import/Export</a>";

menulinks[9] = "<a href='index.php?_m=core&_a=managerMedicao' title='Manager Medi��o'>Manager Medi��o</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=core&_a=insertMedicao' title='Nova Medi��o'>Nova Medi��o</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=core&_a=insertMedicaoHoras' title='Cadastro de Horas'>Cadastro de Horas</a>&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;<a href='RelatorioPropostaMedicao.php' target='_black' title='Relatorio de Medi��es'>Relat�rio de Medi��es</a>&nbsp;&nbsp;&nbsp;&nbsp; ";

function preloadMenuImages() {
	preloadImages('themes/admin_default/loadingcircle.gif', 'themes/admin_default/menusection1.gif', 'themes/admin_default/menusection2.gif', 'themes/admin_default/menusection3.gif', 'themes/admin_default/menusection4.gif', 'themes/admin_default/menusection5.gif', 'themes/admin_default/menusection6.gif', 'themes/admin_default/menusection7.gif', 'themes/admin_default/menusection8.gif', 'themes/admin_default/menusection9.gif', 'themes/admin_default/menusection10.gif', 'themes/admin_default/tablebg.gif', 'themes/admin_default/tabledescbg.gif', 'themes/admin_default/menudrop.gif');
}