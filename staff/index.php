<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<title>Dashboard - Powered by SupportSuite</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" media="all" href="index.css" />
<script language="Javascript">
var themepath = "themes/admin_default/";
var swiftpath = "";
var BLANK_IMAGE="themes/admin_default/space.gif";
var swiftsessionid = "3a5068bd95cf011baafecdebb534b50d";
var swiftiswinapp = "0";
var cparea = "staff";
</script>
<script type="text/javascript" src="themes/admin_default/main.js"></script>
<script type="text/javascript" src="locale/en-us/staffmenu.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="themes/admin_default/calendar-blue.css" title="winter" />
<script type="text/javascript" src="themes/admin_default/calendar.js"></script>
<script type="text/javascript" src="themes/admin_default/lang/calendar-en-us.js"></script>
<script type="text/javascript" src="themes/admin_default/calendar-setup.js"></script>
<script type="text/javascript" src="files/d69153b02bc41aa7398eb9fb71dc0da5.js"></script>
<script type="text/javascript">
</script>
<script type="text/javascript" src="cache/staffcpmenuclick.js"></script><script language="Javascript">
//HTMLArea.loadPlugin("TableOperations");
function loadAllData() { preloadMenuImages(); 			var irsField = browserObject("staffirs");
		if (irsField)
		{
			window.$IRS = globalirs = new IRSAutoComplete(document.getElementById('staffirs'));
		}
	}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="themes/admin_default/bgblocks.gif" onLoad="javascript:loadAllData();">
<script language="Javascript">
var swticketdepartments = swmenulist = new Array();
swticketdepartments = [['General', '1', '1'], ];
swmenulist = [['dpreferences', 'MENU_PREFERENCES'],['ticketsearch', 'MENU_TICKETSEARCH'],['newticket', 'MENU_TICKETNEW'],['ticketpred', 'MENU_TICKETPRED'],['ticketalerts', 'MENU_TICKETALERTS'],['reportt', 'MENU_T_REPORTS'],['ticketfilters', 'MENU_TICKETFILTERS'],['lsmsgs', 'MENU_LSMESSAGES'],['lsadtracking', 'MENU_LSADTRACKING'],['lscanned', 'MENU_LSCANNED'],['lstags', 'MENU_LSTAGS'],['reportkb', 'MENU_KB_REPORTS'],['reportdl', 'MENU_DL_REPORTS'],['reporttr', 'MENU_TR_REPORTS'],];
buildMainMenus();

var MENU_CREATEUSERTICKET =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[21,0], "leveloff":[10,59], "delay":1000, "style":VSTYLE, "imgsize":[20,17], dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"Send Emailaa", "format":{"style":VSTYLEBORDER,"itemoff":[0,0], "leveloff":[5,179], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "image":themepath+"menu_ticketnormal.gif", "oimage":themepath+"menu_ticketnormal.gif", "imgsize":[20,22]}, url:"javascript:void(0);",
					sub: [
						{"itemoff":[21,0]},
																		{code:"General", "format":{"image":themepath+"menu_folderblue.gif", "oimage":themepath+"menu_folderblue.gif", "style":SUBPOPUPTOP, "imgsize":[20,22]}, url:"index.php?_m=tickets&_a=newticket&type=generic&departmentid=1&userid="},																													]
		},
	{code:"Phone Ticket", url:"javascript:void(0);", "format":{"itemoff":[21,0], "leveloff":[5,179], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "image":themepath+"menu_ticketphone.gif", "oimage":themepath+"menu_ticketphone.gif", "imgsize":[20,22]},
					sub: [
						{"itemoff":[21,0]},
																		{code:"General", "format":{"image":themepath+"menu_folderblue.gif", "oimage":themepath+"menu_folderblue.gif", "style":SUBPOPUPTOP, "imgsize":[20,22]}, url:"index.php?_m=tickets&_a=newticket&type=phone&departmentid=1&userid="},																													]
		}
];
var MENU_USEARCHTICKET =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[20,0], "leveloff":[2,179], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_users.gif", "oimage":themepath+"menu_users.gif", "imgsize":[20,22], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10]}, url:"index.php?_m=tickets&_a=search&userid=",
					sub: [
						{"itemoff":[21,0]},
											]
	},	{code:"", "format":{"image":themepath+"menu_usergroup.gif", "oimage":themepath+"menu_usergroup.gif", "imgsize":[20,22], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10]}, url:"index.php?_m=tickets&_a=search&usergroupid=",
					sub: [
						{"itemoff":[21,0]},
											]
	},
];
var MENU_UMARKAS =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[20,0], "leveloff":[10,59], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_user.gif", "oimage":themepath+"menu_user.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&markas=validated"},
	{code:"", "format":{"image":themepath+"menu_validationpending.gif", "oimage":themepath+"menu_validationpending.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&markas=validationpending"},
];
var MENU_UOPTIONS =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,200], "itemoff":[20,0], "leveloff":[10,59], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_repliedmessages.gif", "oimage":themepath+"menu_repliedmessages.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&do=sendveriemail"}
];
var tuserticket = new COOLjsMenuPRO("tuserticket", MENU_CREATEUSERTICKET);
tuserticket.initTop();
tuserticket.init();
var tusearchticket = new COOLjsMenuPRO("tusearchticket", MENU_USEARCHTICKET);
tusearchticket.initTop();
tusearchticket.init();
var tumarkas = new COOLjsMenuPRO("tumarkas", MENU_UMARKAS);
tumarkas.initTop();
tumarkas.init();
var tuoptions = new COOLjsMenuPRO("tuoptions", MENU_UOPTIONS);
tuoptions.initTop();
tuoptions.init();

</script>
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2" width="30%" align="left" valign="middle"><a href="index.php?_m=core&_a=dashboard"><img src="themes/admin_default/supportsuite.gif" border="0"></a></td>
    <td align="right" valign="top"><span class="smalltext"><input type="textbox" name="staffirs" id="staffirs" class="staffcpirs" autocomplete="off" /></span>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="bottom"><span class="smalltext"><font color="#333333">Logged In: Daniel Barbeta | <a href="index.php" title="Support Center" target="_blank">Support Center</a> | <a href="admin/index.php" title="Admin CP" target="_blank">Admin CP</a></font> | <a href="staff/index.php?_ca=logout" id="blue" title="Logout"><strong>Logout</strong></a>&nbsp; </span></td>
  </tr>
</table></td>
  </tr>
  <tr height="4">
    <td><img src="themes/admin_default/space.gif" width="1" height="4"></td>
  </tr>
  <tr height="1">
    <td bgcolor="#C6C3C6"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
  </tr>
  <tr height="4">
    <td bgcolor="#F0F0F0"><img src="themes/admin_default/space.gif" width="1" height="4"></td>
  </tr>
    <tr>
    <td>
<script language="Javascript">
var swmenubg1 = "menudefbg";
var swmenubg2 = "menusectiondefault";
var swtabmenutype = "onClick";
var swtabmenu = new Array(); var swtabmenucolspan = '11'; var swtabselmenu = '1'; var swtabselmenuclass = '1';
swtabmenu = [['1', '80', '1', 'Home'],['2', '100', '2', 'Tickets'],['3', '120', '3', 'Live Support'],['8', '120', '4', 'Teamwork'],['4', '140', '5', 'Knowledgebase'],['5', '110', '6', 'Biblioteca'],['6', '140', '1', 'Troubleshooter'],['7', '90', '2', 'News'],['9', '90', '3', 'Users'],];
buildTopTabMenu();
</script>
	</td>
  </tr>
 
  <tr height="1">
    <td bgcolor="#C6C3C6" colspan="6" id="popupRef"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
  </tr>
  <script language="Javascript">
switchTab(1, 1);
</script>  <tr height="400">
    <td valign="top" align="left">
		<table border="0" cellspacing="0" cellpadding="0" width="100%" height="400"><tr>
			<td width="145" valign="top" align="left" bgcolor="#F0EADE" class="staffnavbar">

				<table width="100%"  border="0" cellspacing="0" cellpadding="2">
				  <tr height="1">
					<td><img src="themes/admin_default/space.gif" border="0" width="145" height="1"></td>
				  </tr>

								  <tr>
					<td>
					<div class="navsection" id="itemoptionsnav"><div class="navsub">
					<div class="navtitle"><img src="themes/admin_default/doublearrowsnav.gif" align="absmiddle" border="0" />&nbsp;Quick Insert</div>
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
										  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption0" onClick="javascript:CustomPopupRefRight('tuserticket', 'itemoptionsnav', 'itemoption0');">
						<td width="1"><img src="themes/admin_default/icon_ticket.gif"></td>
						<td>Ticket</td>
						<td width="1" align="right"><img src="themes/admin_default/menudropright.gif"></td>					  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption1" onClick="javascript:window.location.href='index.php?_m=teamwork&_a=insertcontact';">
						<td width="1"><img src="themes/admin_default/icon_contacts.gif"></td>
						<td>Contact</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption2" onClick="javascript:window.location.href='index.php?_m=teamwork&_a=insertevent';">
						<td width="1"><img src="themes/admin_default/icon_event.gif"></td>
						<td>Event</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption3" onClick="javascript:window.location.href='index.php?_m=teamwork&_a=inserttask';">
						<td width="1"><img src="themes/admin_default/icon_task.gif"></td>
						<td>Task</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption4" onClick="javascript:window.location.href='index.php?_m=knowledgebase&_a=insertquestion';">
						<td width="1"><img src="themes/admin_default/icon_knowledgebase.gif"></td>
						<td>Article</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption5" onClick="javascript:window.location.href='index.php?_m=downloads&_a=insertfile';">
						<td width="1"><img src="themes/admin_default/mimeico_blank.gif"></td>
						<td>File</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption6" onClick="javascript:window.location.href='index.php?_m=news&_a=insertnews';">
						<td width="1"><img src="themes/admin_default/icon_newsitem.gif"></td>
						<td>News</td>
											  </tr>
					  					  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" id="itemoption7" onClick="javascript:window.location.href='index.php?_m=core&_a=insertuser';">
						<td width="1"><img src="themes/admin_default/icon_user.gif"></td>
						<td>User</td>
											  </tr>
					  					</table></div>
					</div>
					</td>
				  </tr>
				  				  							  												  <tr>
					<td>
					<div class="navsection"><div class="navsub">
					<div class="navtitle"><table width="100%"border="0" cellspacing="0" cellpadding="0"><tr><td align="left" valign="top"><img src="themes/admin_default/doublearrowsnav.gif" align="absmiddle" border="0" />&nbsp;Filter Tickets</td><td align="right" valign="top"><a href="javascript:void(0);" onClick="javascript:oT_1.expandAllNodes();"><img src="themes/admin_default/icon_expand.gif" align="absmiddle" border="0" /></a></td></tr></table></div>
					
<script language="javascript" type="text/javascript">
	oT_1 = new TreeMenu("themes/admin_default", "oT_1", "_self", "treeMenuDefault", true, false);
	 n = oT_1.addItem(new TreeNode('&nbsp;View All', 'icon_folderblue2.gif', 'index.php?_m=tickets&_a=manage', false, true, '', '', 'icon_folderblue2.gif'));
	 n = oT_1.addItem(new TreeNode('&nbsp;Filters', 'icon_funnel.gif', 'index.php?_m=tickets&_a=manage', false, true, '', '', 'icon_funnel.gif'));
	 n = oT_1.addItem(new TreeNode('&nbsp;Labels', 'icon_labels.gif', 'index.php?_m=tickets&_a=manage', false, true, '', '', 'icon_labels.gif'));
	 n = oT_1.addItem(new TreeNode('&nbsp;General&nbsp;', 'icon_folderblue2.gif', 'index.php?_m=tickets&_a=manage&departmentid=1&ticketstatusid=0', false, true, '', '', 'icon_folderblue2.gif'));
	 n_1 = n.addItem(new TreeNode('&nbsp;Open&nbsp;<font color=\'darkgreen\'></font>', 'icon_yellowbigdot.gif', 'index.php?_m=tickets&_a=manage&departmentid=1&ticketstatusid=1', false, true, '', '', 'icon_yellowbigdot.gif'));
	 n_2 = n.addItem(new TreeNode('&nbsp;On Hold&nbsp;<font color=\'darkgreen\'></font>', 'icon_yellowbigdot.gif', 'index.php?_m=tickets&_a=manage&departmentid=1&ticketstatusid=2', false, true, '', '', 'icon_yellowbigdot.gif'));
	 n_3 = n.addItem(new TreeNode('&nbsp;Closed&nbsp;<font color=\'darkgreen\'></font>', 'icon_yellowbigdot.gif', 'index.php?_m=tickets&_a=manage&departmentid=1&ticketstatusid=3', false, true, '', '', 'icon_yellowbigdot.gif'));

	oT_1.drawMenu();
	oT_1.writeOutput('');
	oT_1.resetBranches();
</script>
					</div></div>
					</td>
				  </tr>
				  								  				  <tr>
					<td>
					<div class="navsection"><div class="navsub">
					<div class="navtitle"><img src="themes/admin_default/doublearrowsnav.gif" align="absmiddle" border="0" />&nbsp;Online Staff</div>
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
										  <tr class="smalltext" onMouseOver="this.className='hlrow';" onMouseOut="this.className='smalltext';" style="CURSOR: pointer;" onClick="javascript:window.location.href='index.php?_m=core&_a=composeprvmsg&staffid=1';" title="Admin CP">
						<td width="1"><img src="themes/admin_default/icon_onlinemoov.gif"></td>
						<td>Daniel Barbeta</td>
					  </tr>
					  					</table></div>
					</div>
					</td>
				  </tr>
				  
				</table>

			</td>
			<td width="1" valign="top" align="left" bgcolor="#CDCDCD"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
			<td width="8" valign="top" align="left"><img src="themes/admin_default/space.gif" width="8" height="1"></td>
			<td valign="top" align="left" width="100%">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
						<td colspan="2">
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top">

<div class="dashboardtitle">hoje</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em;"><td align="left"><div id="tab_main" style="DISPLAY: block;" class="tabcontent">
<table cellspacing="0" cellpadding="4" border="0" width="100%" class="dashborder">
<tr style="height: 1em">
<td align="left" valign="top">

<table cellspacing="0" cellpadding="2" height="300" border="0" width="100%" class="dashcontent">
<tr><td align="left" valign="top">

			<table width="100%"  border="0" cellspacing="1" cellpadding="2"><tr>
		<td width="60" class="smalltext" nowrap>Statistics</td>
		<td valign="middle"><div class="linediv"><img src="themes/admin_default/space.gif" height="1" width="1" /></div></td></tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="2">
					<tr class="smalltext">
			<td width="1" nowrap><img src="themes/admin_default/icon_ticketblue.gif" border="0" align="absmiddle"></td>
			<td width="100" nowrap>New Tickets:</td>
			<td><a href="index.php?_m=tickets&_a=search&type=newtickets" id="moduletitle">0</a></td>
			</tr>
					<tr class="smalltext">
			<td width="1" nowrap><img src="themes/admin_default/icon_chat.gif" border="0" align="absmiddle"></td>
			<td width="100" nowrap>New Chats:</td>
			<td>0</td>
			</tr>
				</table>



</td></tr>
</table>
</td>
</tr>
</table>
</div>
</td></tr>
<tr style="height: 1em"><td align="left"><div><ul id="btab">
	<li><a class="currenttab" href="index.php?_m=core&_a=dashboard" onClick="javascript:void(0);" id="dashtoday" title="Today">Today</a></li><li><a href="index.php?_m=core&_a=dashboard&type=news" id="dashnews" title="News (%s)">News (0)</a></li></ul></div></td></tr>
</table>
</td>
<td align="right" valign="top" width="5"><img src="themes/admin_default/space.gif" border="0" width="5" height="5" /></td>
<td align="right" valign="top" width="40%"><div class="dashboardtitle">&nbsp;</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em"><td align="left">
<div id="tab_twday" style="DISPLAY: block;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborderround"><tr><td class="row1"><span class="smalltext">
	<table border="0" cellpadding="2" cellspacing="0" width="100%"><tr><td width="1" align="left"><a href="index.php?_m=teamwork&_a=calendar&calendartype=day&customday=06-07-2006"><img src="themes/admin_default/icon_back.gif" border="0" align="absmiddle" /></a></td>
	<td width="100%" align="center"><span class="ttexttitle">Friday, 07 July 2006</span></td>
	<td width="1" align="right"><a href="index.php?_m=teamwork&_a=calendar&calendartype=day&customday=08-07-2006"><img src="themes/admin_default/icon_forward.gif" border="0" align="absmiddle" /></a></td></tr></table><BR /><table border="0" cellpadding="0" cellspacing="0" width="100%" class="calborder"><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152259200">08:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152262800">09:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152266400">10:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152270000">11:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152273600">12:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152277200">13:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152280800">14:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152284400">15:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152288000">16:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152291600">17:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152295200">18:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr><tr class="calactivehour"><td width="60" style="PADDING: 3px;" class="calhrbg"><span class="tabletitle"><a href="index.php?_m=teamwork&_a=insertevent&startdateline=1152298800">19:00</a></span></td><td width="1" class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td><td width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr></tr></table></td></tr><tr height="1" class="calendarsplitter"><td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td></tr></table></span></td></tr></table></div></td></tr><tr style="height: 1em"><td align="left"><div><ul id="btab">
	<li><a class="currenttab" href="#" onClick="javascript:void(0);" id="twday" title="Day">Day</a></li>
	<li><a href="index.php?_m=teamwork&_a=calendar&calendartype=workweek" id="twworkweek" title="Work Week">Work Week</a></li>
	<li><a href="index.php?_m=teamwork&_a=calendar&calendartype=week" id="twweek" title="Week">Week</a></li>
	<li><a href="index.php?_m=teamwork&_a=calendar&calendartype=month" id="twmonth" title="Month">Month</a></li>
	</ul></div></td></tr>
</table></td>
</tr>
</table>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
			</td>
			<td width="8" valign="top" align="left"><img src="themes/admin_default/space.gif" width="8" height="1"></td>
		</tr></table>
	</td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" bgcolor="#E1E1E1"><img src="themes/admin_default/space.gif" width="1" height="5"></td>
      </tr>
      <tr>
        <td height="8" bgcolor="#707070"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td align="left" valign="middle"><span class="smalltext">&nbsp;<a href="index.php?_m=core&_a=dashboard" id="lightgray">Home</a></span>
						</td>
            <td align="right"><span class="smalltext"><font color="#EFEFEF">Copyright &copy; 2001-2006 Kayako Infotech Ltd.</font></span></td>
            <td width="1" align="right"><img src="themes/admin_default/space.gif" width="1" height="15"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#4E4E4E"><img src="themes/admin_default/space.gif" width="1" height="2"></td>
      </tr>
    </table></td>
  </tr>
</table>
</center>
</body>
</html>