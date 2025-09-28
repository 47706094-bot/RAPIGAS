<?php
function validarDni($dni) {
    return (bool)preg_match('/^[0-9]{8}$/', $dni);
}