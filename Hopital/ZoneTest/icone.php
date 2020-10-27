

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">



<td width='10%'>

    <input type="password" id="pwd" class="form-control" name="mdp"   >

    <a href='#' class='btn btn-success'  style='cursor: pointer;' onclick='showHidePassword()'>

        <img src="https://img.icons8.com/material/24/000000/visible--v1.png" id="icon"/>


    </a>
</td>


<script>

function showHidePassword() {
  
    var x = document.getElementById('pwd');
    if (x.type == "password") {
    x.type = "text";

    document.getElementById("icon").src = "https://img.icons8.com/material-sharp/24/000000/closed-eye.png";
    
    } else {
    x.type = "password";
    document.getElementById("icon").src = "https://img.icons8.com/material/24/000000/visible--v1.png";
    
    }

   
}
</script>    


<style>


.fa-plus{
  content: 'fa fa-lg fa-plus';
}
.fa-minus {
  content: 'fa fa-lg fa-minus';
}


</style>