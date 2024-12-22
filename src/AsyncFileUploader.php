<?php namespace AsyncFileUploader;

class AsyncFileUploader
{
  private FileUploadHandler $uploadHandler;

  public function __construct(
    string $uploadDir,
    array $allowedTypes = ["image/jpeg", "image/png", "application/pdf"],
    int $maxFileSize = 10 * 1024 * 1024
  ) {
    $this->uploadHandler = new FileUploadHandler(
      $uploadDir,
      $allowedTypes,
      $maxFileSize
    );
  }

  public function upload(): array
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
      return $this->uploadHandler->handleUpload($_FILES["file"]);
    }

    return ["error" => "No file uploaded"];
  }
}
