<html>
<body>


<button style="margin-top:5px" class="btn btn-success" onclick="popWin()" type="butt"> full </button>

</body>
<script>
function funcname(){
	window.location="a.php";
}
function popWin(){
window.open('keycalen.php' , 'mypopup' , 'nenuber=no,toorlbar=no,location=no,scrollbars=no, status=no,resizable=no,width=180,height=180,top=220,left=650 ' )";
mypopup.focus();
}
</script>
</html>