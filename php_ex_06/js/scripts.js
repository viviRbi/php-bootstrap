
var multiDelete = document.querySelector('.multi-delete');
if(multiDelete !== null){
    multiDelete.addEventListener('click', function(){
        document.multiDeleteForm.submit();
    })
}


var cancelBtn= document.querySelector('.cancel-btn');
if(cancelBtn !== null){
    cancelBtn.addEventListener('click', function(e){
        e.preventDefault();
        location.href= "http://localhost/php_exe/php_ex_06/index.php";
    })
}
