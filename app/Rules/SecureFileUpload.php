// app/Rules/SecureFileUpload.php
class SecureFileUpload implements Rule
{
public function passes($attribute, $value)
{
if (!$value instanceof UploadedFile) {
return false;
}

// Vérifier la taille (max 2MB)
if ($value->getSize() > 2 * 1024 * 1024) {
return false;
}

// Vérifier l'extension
$allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
if (!in_array(strtolower($value->getClientOriginalExtension()), $allowedExtensions)) {
return false;
}

// Vérifier le type MIME
$allowedMimes = ['image/jpeg', 'image/png', 'application/pdf'];
if (!in_array($value->getMimeType(), $allowedMimes)) {
return false;
}

return true;
}

public function message()
{
return 'Le fichier doit être une image (JPG, PNG) ou un PDF de moins de 2MB.';
}
}