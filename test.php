<?php
# simple test with current keys and cipher

require_once("class.unicrypt.php");
$letsgo = new unicrypt();

# Random text string for testing
$text = "Singapore Airlines";

# Encrypting the text
$encrypted = $letsgo->encrypt($text); 

# Decrypting the encrypted text 
$decrypted = $letsgo->decrypt($encrypted); 

# Display encryption and decryption
echo "<h2>Encrypt & Decrypt with Unicrypt Class</h2>";
echo "<p>After encrypting <b>".$text."</b> becomes <b>" . $encrypted . "</b></p>";
echo "<p>After decrypting it becomes <b>" . $decrypted . "</b></p>";

?>