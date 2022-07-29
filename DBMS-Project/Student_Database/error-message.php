<?php
function setErrorMessage($errorMessage){
    echo'
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong><br/>'.$errorMessage.'
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    ';
}