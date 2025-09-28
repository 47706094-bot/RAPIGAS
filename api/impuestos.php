<?php
function calcularIgv($monto) {
    return round($monto * 0.18, 2);
}