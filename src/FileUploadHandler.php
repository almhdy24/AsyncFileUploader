<?php namespace AsyncFileUploader;

class FileUploadHandler
{
  private string $uploadDir;
  private array $allowedTypes;
  private int $maxFileSize;

  public function __construct(
    string $uploadDir,
    array $allowedTypes = ["image/jpeg", "image/png", "application/pdf"],
    int $maxFileSize = 2 * 1024 * 1024
  ) {
    // Default 2MB size limit
    $this->uploadDir = rtrim($uploadDir, "/");
    $this->allowedTypes = $allowedTypes;
    $this->maxFileSize = $maxFileSize;
  }

  public function handleUpload(array $file): array
  {
    // Validate file
    if ($file["error"] !== UPLOAD_ERR_OK) {
      return ["error" => $this->getUploadError($file["error"])];
    }

    if (!$this->isValidFileType($file["type"])) {
      return ["error" => "Invalid file type"];
    }

    if ($file["size"] > $this->maxFileSize) {
      return [
        "error" =>
          "File exceeds maximum size of " .
          $this->maxFileSize / 1024 / 1024 .
          " MB",
      ];
    }

    // Sanitize file name
    $filename = $this->sanitizeFileName($file["name"]);
    $destination = $this->uploadDir . "/" . $filename;

    // Move to upload directory
    if (move_uploaded_file($file["tmp_name"], $destination)) {
      $this->logUpload($filename);
      return ["success" => true, "path" => $destination];
    }

    return ["error" => "Failed to move uploaded file"];
  }

  private function isValidFileType(string $type): bool
  {
    return in_array($type, $this->allowedTypes);
  }

  private function sanitizeFileName(string $fileName): string
  {
    return preg_replace("/[^a-zA-Z0-9\._-]/", "", $fileName);
  }

  private function getUploadError(int $errorCode): string
  {
    switch ($errorCode) {
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        return "File is too large";
      case UPLOAD_ERR_PARTIAL:
        return "File was only partially uploaded";
      case UPLOAD_ERR_NO_FILE:
        return "No file was uploaded";
      case UPLOAD_ERR_NO_TMP_DIR:
        return "Missing a temporary folder";
      case UPLOAD_ERR_CANT_WRITE:
        return "Failed to write file to disk";
      case UPLOAD_ERR_EXTENSION:
        return "File upload stopped by extension";
      default:
        return "Unknown upload error";
    }
  }

  private function logUpload(string $filename): void
  {
    $logMessage =
      "[" . date("Y-m-d H:i:s") . "] File uploaded: $filename" . PHP_EOL;
    file_put_contents(
      $this->uploadDir . "/upload.log",
      $logMessage,
      FILE_APPEND
    );
  }
}
