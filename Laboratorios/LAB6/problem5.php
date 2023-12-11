<?php
if (isset($_POST['pais'])) {
    $paises = array(
        'españa' => 'madrid',
        'francia' => 'parís',
        'italia' => 'roma',
        'alemania' => 'berlín',
        'portugal' => 'lisboa',
        'argentina' => 'buenos aires',
        'brasil' => 'brasilia'
    );
    $pais = strtolower($_POST['pais']); 
    if (array_key_exists($pais, $paises)) {
        $capital = $paises[$pais];
        echo "<p>La capital de $pais es $capital.</p>";
    } else {
        echo "<p>El país no está en la lista.</p>";
    }
}
?>
