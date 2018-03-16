function call()
{
	var lat1=document.getElementById("lat1").value;
	var lng1=document.getElementById("lng1").value;
	var lat2=document.getElementById("lat2").value;
	var lng2=document.getElementById("lng2").value;
if (lat1=="" || lng1=="" || lat2==""||lng2=="")
  {
  document.getElementById("kq").innerHTML="Nhập đầy đủ thông tin";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
 if(xmlhttp.readyState<4)
    {             
  document.getElementById('kq').innerHTML = "Loading...";
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("kq").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ws.php?lat1="+lat1+"&lng1="+lng1+"&lat2="+lat2+"&lng2="+lng2,true);
xmlhttp.send();
}