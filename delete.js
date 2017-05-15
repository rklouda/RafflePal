
 $(document).ready(function() {
   var myNodelist = document.getElementsByClassName("list-group-item");		
		var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
  
} 


// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var x;
  $this = $(this.parentElement);
  var _id = $this.text().substring(0,2);
    if (confirm("Not Working...Delete Record:" +'  '+ _id) == true) {
   //     x = "You pressed OK!";
   
    var div = this.parentElement;
    div.style.display = "none";
    //delete record
  //  deleteRecord();
//  DELETE FROM client WHERE clientName = $clientName;
//NEED TO ADD DELETE COMMAND
// sql to delete a record

 
 
   location.reload();
    
    } else {
        x = "You pressed Cancel!";
    document.getElementById("demo").innerHTML = x;
    
}
    var div = this.parentElement;
    div.style.display = "none";
  }
}
});

$('#sel4').on('click',function() {
  alert($(this).val());
  console.log($(this).val());
});