<?php
class FileUploader {
    private $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    private $maxFileSize = 10485760; // 10MB

    public function handleFileUpload($fieldName) {
        if (isset($_FILES[$fieldName])) {
            $file = $_FILES[$fieldName];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileSize = $file['size'];
            $fileTmpPath = $file['tmp_name'];

            // Perform file type validation
            if (!$this->isFileTypeAllowed($fileType)) {
              header("Location: ../register.php?error=filetypeerror");
              exit();
            }

            // Perform file size validation
            if (!$this->isFileSizeValid($fileSize)) {
              header("Location: ../register.php?error=filesizeerror");
              exit();
            }

            // Generate a unique file name to avoid conflicts
            $uniqueFileName = $this->generateUniqueFileName($fileName);

            // Move the uploaded file to the desired location
            $destinationPath = '../uploads/' . $uniqueFileName;
            if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
                //echo 'File uploaded successfully.';
                header("Location: ../register.php?error=unabletomovefile");
                exit();
            }
        }
    }

    private function isFileTypeAllowed($fileType) {
        return in_array($fileType, $this->allowedTypes);
    }

    private function isFileSizeValid($fileSize) {
        return $fileSize <= $this->maxFileSize;
    }

    private function generateUniqueFileName($fileName) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return uniqid() . '.' . $fileExtension;
    }
}






?>
