/**
* Declaration variables
*/
var screenHeight = window.screen.availHeight;
var screenWidth = window.screen.availWidth;
var colorDepth = window.screen.colorDepth;
var timeNow = new Date();
var referrer = escape(document.referrer);
var windows, mac, linux;
var ie, op, moz, misc, browsercode, browsername, browserversion, operatingsys;
var dom, ienew, ie4, ie5, ie6, moz_rv, moz_rv_sub, ie5mac, ie5xwin, opnu, op4, op5, op6, op7, saf, konq;
var appName, appVersion, userAgent;
var appname = navigator.appName;
var appVersion = navigator.appVersion;
var userAgent = navigator.userAgent.toLowerCase();
var title = document.title;
var checktoggle = 1;
var DOM = "default";
windows = (appVersion.indexOf('Win') != -1);
mac = (appVersion.indexOf('Mac') != -1);
linux = (appVersion.indexOf('Linux') != -1);

/**
* DOM Compatible?
*/
if (!document.layers)
{
	dom = (document.getElementById ) ? document.getElementById : false;
} else {
	dom = false;
}

if (document.getElementById)
{
	DOM = "default";
} else if (document.layers) {
	DOM = "NS4";
} else if (document.all) {
	DOM = "IE4";
}

misc=(appVersion.substring(0,1) < 4);
op=(userAgent.indexOf('opera') != -1);
moz=(userAgent.indexOf('gecko') != -1);
ie=(document.all && !op);
saf=((userAgent.indexOf('safari') != -1) || (navigator.vendor == "Apple Computer, Inc."));
konq=(userAgent.indexOf('konqueror') != -1);

if (op) {
	op_pos = userAgent.indexOf('opera');
	opnu = userAgent.substr((op_pos+6),4);
	op5 = (opnu.substring(0,1) == 5);
	op6 = (opnu.substring(0,1) == 6);
	op7 = (opnu.substring(0,1) == 7);
} else if (moz){
	rv_pos = userAgent.indexOf('rv');
	moz_rv = userAgent.substr((rv_pos+3),3);
	moz_rv_sub = userAgent.substr((rv_pos+7),1);
	if (moz_rv_sub == ' ' || isNaN(moz_rv_sub)) {
		moz_rv_sub='';
	}
	moz_rv = moz_rv + moz_rv_sub;
} else if (ie){
	ie_pos = userAgent.indexOf('msie');
	ienu = userAgent.substr((ie_pos+5),3);
	ie4 = (!dom);
	ie5 = (ienu.substring(0,1) == 5);
	ie6 = (ienu.substring(0,1) == 6);
}

if (konq) {
	browsercode = "KO";
	browserversion = appVersion;
	browsername = "Knoqueror";
} else if (saf) {
	browsercode = "SF";
	browserversion = appVersion;
	browsername = "Safari";
} else if (op) {
	browsercode = "OP";
	if (op5) {
		browserversion = "5";
	} else if (op6) {
		browserversion = "6";
	} else if (op7) {
		browserversion = "7";
	} else {
		browserversion = appVersion;
	}
	browsername = "Opera";
} else if (moz) {
	browsercode = "MO";
	browserversion = appVersion;
	browsername = "Mozilla";
} else if (ie) {
	browsercode = "IE";
	if (ie4) {
		browserversion = "4";
	} else if (ie5) {
		browserversion = "5";
	} else if (ie6) {
		browserversion = "6";
	} else {
		browserversion = appVersion;
	}
	browsername = "Internet Explorer";
}

if (windows) {
	operatingsys = "Windows";
} else if (linux) {
	operatingsys = "Linux";
} else if (mac) {
	operatingsys = "Mac";
} else {
	operatingsys = "Unkown";
}

function doRand()
{
	var num;
	now=new Date();
	num=(now.getSeconds());
	num=num+1;
	return num;
}

function getCookie(name) {
	var crumb = document.cookie;
	var index = crumb.indexOf(name + "=");
	if (index == -1) return null;
	index = crumb.indexOf("=", index) + 1;
	var endstr = crumb.indexOf(";", index);
	if (endstr == -1) endstr = crumb.length;
	return unescape(crumb.substring(index, endstr));
}

function deleteCookie(name) {
	var expiry = new Date();
	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT" +  "; path=/";
}

function browserObject(objid)
{
	if (DOM == "default")
	{
		return document.getElementById(objid);
	} else if (DOM == "NS4") {
		return document.layers[objid];		
	} else if (DOM == "IE4") {
		return document.all[objid];
	}
}

function switchDisplay(objid)
{
	result = browserObject(objid);
	if (!result)
	{
		alert("Invalid Display Object: "+objid+"\nPlease make sure that all correct display objects are on the page");
		return;
	}

	if (result.style.display == "none")
	{
		result.style.display = "";
	} else {
		result.style.display = "none";
	}
}

function displayObject(objid)
{
	result = browserObject(objid);
	if (!result)
	{
		alert("Invalid Display Object: "+objid+"\nPlease make sure that all correct display objects are on the page");
		return;
	}

	result.style.display = "";
}

function hideObject(objid)
{
	result = browserObject(objid);
	if (!result)
	{
		alert("Invalid Display Object: "+objid+"\nPlease make sure that all correct display objects are on the page");
		return;
	}

	result.style.display = "none";
}

function htmlize(str){
        str = str.replace(/\&/g,"&amp;");
        str = str.replace(/\</g,"&lt;");
        str = str.replace(/\>/g,"&gt;");
        str = str.replace(/\"/g,"&quot;");
        str = str.replace(/\n/g,"<br/>\n");
        return str;
}

function writeMessage(towrite) {
	if (browsercode == "OP") {
		window.parent.contentframe.writeToDiv(towrite);
	} else if (browsercode == "SF") {
		writeToDivSaf(towrite);
	} else {
		writeToDoc(towrite);
	}
}

function writeToDoc(data) {
	window.parent.contentframe.window.document.write(data);

	if (typeof(scrollBy) != "undefined")
	{
		window.parent.contentframe.window.scrollBy(0, 6000);
	} else if (typeof(scroll) != "undefined") {
		window.parent.contentframe.window.scrollBy(0, 6000);
	}
}

function clearDoc() {
	if (browsercode == "OP") {
		window.parent.contentframe.clearDiv();
	} else {
		window.parent.contentframe.window.document.close();
		window.parent.contentframe.window.document.open();
		window.parent.contentframe.window.document.clear();
		window.parent.contentframe.window.document.write("");
	}
}

function writeToDiv(data) {
	divobj = browserObject("buffer");
	divobj.innerHTML = divobj.innerHTML+data;

	if (typeof(scrollBy) != "undefined")
	{
		window.scrollBy(0, 6000);
	} else if (typeof(scroll) != "undefined") {
		window.scrollBy(0, 6000);
	}
}

function writeToDivSaf(data) {
	divobj = parent.contentframe.document.getElementById("buffer");
	divobj.innerHTML = divobj.innerHTML+data;

	if (typeof(scrollBy) != "undefined")
	{
		window.scrollBy(0, 6000);
	} else if (typeof(scroll) != "undefined") {
		window.scrollBy(0, 6000);
	}
}

function clearDiv() {
	divobj = browserObject("buffer");
	divobj.innerHTML = "";
}

function addBookmark(title,url) {
if (window.sidebar) { 
window.sidebar.addPanel(title, url,""); 
} else if( document.all ) {
window.external.AddFavorite( url, title);
} else if( window.opera && window.print ) {
return true;
}
}

function popupInfoWindow(url) {
	screen_width = screen.width;
	screen_height = screen.height;
	widthm = (screen_width-400)/2;
	heightm = (screen_height-500)/2;
	window.open(url,"infowindow"+doRand(), "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=400,height=500,left="+widthm+",top="+heightm);
}

function jumpLanguage(selObj)
{
	languageid = selObj.options[[selObj.selectedIndex]].value;
	window.location.href = 'index.php?languageid='+languageid;
}

/**
* ###############################################
* AJAX
* ###############################################
*/

var xmlhttp;
var xmlaction = "";

function loadXMLHTTPRequest(url) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = processStatusChange;
		xmlhttp.open("GET", url, true);
		xmlhttp.send(null);
	} else if (window.ActiveXObject) {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		if (xmlhttp) {
			xmlhttp.onreadystatechange = processStatusChange;
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		}
	}
}

function processStatusChange() {
	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {

			// ======= IRS Fetch? =======
			if (xmlaction == "irsfetch")
			{
				irsObject = browserObject("irsui");
				if (irsObject)
				{
					irsObject.innerHTML = xmlhttp.responseText;
				}
			}
		}
	}
}

var irsContents = "";
function startIRSTimer()
{
	if (document.submitticket.message.value != irsContents && document.submitticket.message.value != "")
	{
		displayObject("irsui");

		xmlaction = "irsfetch";
		loadXMLHTTPRequest(swiftpath+"index.php?_m=knowledgebase&_a=irsfetch&randno="+doRand()+"&query="+escape(document.submitticket.message.value));

		irsContents = document.submitticket.message.value;
	}

	setTimeout('startIRSTimer();', 2000);
}