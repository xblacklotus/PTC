<?php include("../includes/inheader.php");?>
<?php 
if (isset($_POST['ver_notas']))
{
    include("../includes/llenar_notas.php");
}
else
{
    //no button pressed
}

?>
<script type="text/javascript">
function ingresar()
{    
    var r = confirm("¿Esta seguro que de desea ingresar?");
    if (r ) {
        
        if(validar_notas())
        {
            return true;        
        }
        else
            return false;  
    } 
    else{
        return false;
    }
}

function validar_notas()
{
    var validas=false;
    var k=document.getElementById('cantidad').value;
    var i =0;
    for (i= 0 ;i <k ; i++) 
    {
        if(!isNaN(document.getElementById('nota'+i).value))
        {
            if(document.getElementById('nota'+i).value>=1 && document.getElementById('nota'+i).value<=10)
            {                
                validas=true;
            }
            else{
                validas=false;                
                return validas;
            }
            if(i==k-1){                
                return validas;
            }        
        }
        else
        {
            alert(document.getElementById('nota'+i).value+ " no es un numero");
            alert("solo numeros");
            return false;
        }
    };    
}
</script>
<?php        
        include("../includes/llenar_notas.php");
?>
<?php include("../includes/footer.php");?>