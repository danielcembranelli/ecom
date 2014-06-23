var menulinks = new Array();

menulinks[1] = "<a href='index.php?_m=core&_a=dashboard' title='Dashboard'>Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=core&_a=settings' title='Settings'>Settings</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=core&_a=help' title='Help'>Help</a>";
menulinks[2] = "<a href='?pag=Boletos&Status=0' title='Em Abertos'>Em Aberto</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='?pag=Boletos&Status=1' title='Vencidos'>Vencidos</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='?pag=Boletos&Status=2' title='Pagos'>Pagos</a>";
menulinks[3] = "<a href='index.php?_m=core&_a=managedepartments' title='Manage Departments'>Manage Departments</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?_m=core&_a=insertdepartment' title='Insert New'>Insert New</a>";

function preloadMenuImages() {
	preloadImages('themes/admin_default/loadingcircle.gif', 'themes/admin_default/menusection1.gif', 'themes/admin_default/menusection2.gif', 'themes/admin_default/menusection3.gif', 'themes/admin_default/menusection4.gif', 'themes/admin_default/menusection5.gif', 'themes/admin_default/menusection6.gif', 'themes/admin_default/menusection7.gif', 'themes/admin_default/menusection8.gif', 'themes/admin_default/menusection9.gif', 'themes/admin_default/menusection10.gif', 'themes/admin_default/tablebg.gif', 'themes/admin_default/tabledescbg.gif', 'themes/admin_default/menudrop.gif');
}