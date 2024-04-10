function checkform () {
      if (document.stammbaum.mum-first-name.value == "") {
        alert("Please check your entry!");
        document.stammbaum.mum-first-name.focus();
        return false;
      }
	  if (document.stammbaum.dad-first-name.value == "") {
        alert("Please check your entry!");
        document.stammbaum.dad-first-name.focus();
        return false;
      }
	  if (document.stammbaum.child-first-name.value == "") {
        alert("Please check your entry!");
        document.stammbaum.child-first-name.focus();
        return false;
      }
	  if (document.stammbaum.mum-last-name.value == "") {
        alert("Please check your entry!");
        document.stammbaum.mum-last-name.focus();
        return false;
      }
	  if (document.stammbaum.dad-last-name.value == "") {
        alert("Please check your entry!");
        document.stammbaum.dad-last-name.focus();
        return false;
      }
      if (document.stammbaum.child-last-name.value.indexOf("@") == -1) {
        alert("Please check your entry!");
        document.stammbaum.child-last-name.focus();
        return false;
      }
	  if (document.stammbaum.mum-birth.value == "") {
        alert("Please check your entry!");
        document.stammbaum.mum-birth.focus();
        return false;
      }
	  if (document.stammbaum.dad-birth.value == "") {
        alert("Please check your entry!");
        document.stammbaum.dad-birth.focus();
        return false;
      }
	  if (document.stammbaum.child-birth.value == "") {
        alert("Please check your entry!");
        document.stammbaum.child-birth.focus();
        return false;
      }
}