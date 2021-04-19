<?php
    
    echo standardizePostcode('1111aa');

    function standardizePostcode($postcode)

    {
    
    $postcode = wordwrap($postcode, strlen($postcode)-2,' ', true);

    return strtoupper($postcode);

    }
?>