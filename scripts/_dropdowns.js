// Dropdown menue script taken from http://www.htmldog.com/articles/suckerfish/dropdowns/
// To modify the behaviour and look of the dropdown menues goto /styles/nav.css

<!--//--><![CDATA[//><!--
sfHover = function() {
	var sfEls = document.getElementById("wp_nav_menu1").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]>