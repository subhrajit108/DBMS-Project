<?php
    function setSuccessMessage($successMessage){
        echo'
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong><br/> '.$successMessage.'
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        ';
    }
?>