
# 🎉 AsyncFileUploader  🚀

Welcome to the **AsyncFileUploader** project! This amazing PHP library makes it easy to handle file uploads asynchronously with a focus on simplicity and reliability. 🎊

## 📦 Features

- ⚡ **Asynchronous File Handling:** Processes file uploads without blocking the server.
- ✅ **File Type Validation:** Only allow specific file types (JPEG, PNG, PDF).
- 🗂️ **Custom Upload Directory:** Specify your own directory for file uploads.
- 🔒 **Error Handling:** Receive meaningful feedback on upload issues.
- 📏 **Max File Size Restriction:** Set a maximum file size limit for uploads.

## 📄 Installation

You can include `AsyncFileUploader` in your project using Composer:

```bash
composer require your-vendor/async-file-uploader
```

Ensure your upload directory is writable! 🛠️

## 🚀 Usage

Here's a quick example of how to utilize the `AsyncFileUploader`:

### 1. Create an Upload Form

Create an HTML form to select a file:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Async File Uploader</title>
</head>
<body>
    <h2>Upload a File 📤</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
```

### 2. Handle the Upload

In your `upload.php`, use the **AsyncFileUploader** class:

```php
<?php
require 'vendor/autoload.php';

use AsyncFileUploader\AsyncFileUploader;

$uploadDir = 'uploads'; // Specify your upload directory
$allowedTypes = ["image/jpeg", "image/png", "application/pdf"]; // Allowed file types
$maxFileSize = 2 * 1024 * 1024; // Set max file size to 2MB

$uploader = new AsyncFileUploader($uploadDir, $allowedTypes, $maxFileSize);
$response = $uploader->upload();

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    echo "File uploaded successfully! 🎉 Path: " . $response['path'];
}
```

## 🔧 Configuration

- **Upload Directory**: Specify the directory where files will be stored during initialization.

```php
$uploadDir = 'your/custom/directory'; // Set your custom upload directory
```

- **Allowed File Types**: Customize the allowed file types in the constructor.

```php
$allowedTypes = ["image/jpeg", "image/png", "application/pdf"];
```

- **Max File Size**: Set a maximum file size (in bytes) for uploads.

```php
$maxFileSize = 2 * 1024 * 1024; // Set max file size to 2MB
```

## 🛡️ File Type Validation

By default, the allowed file types are:

- Images: JPEG, PNG
- Documents: PDF

You can modify the allowed file types by passing them during initialization.

## 🛠️ Error Handling

The library provides meaningful error messages. Here are some common errors:

- No file uploaded: Check that your form has a file selected.
- Invalid file type: Ensure you have the correct file type.
- Exceeded file size: Ensure your file does not exceed the specified maximum file size.

## 🏗️ Example Response

Here’s what you can expect when a file is uploaded:

### Successful Upload

```json
{
  "success": true,
  "path": "uploads/your_uploaded_file.jpg"
}
```

### Failed Upload

```json
{
  "error": "Invalid file type"
}
```

## 📅 Contributing

Contributions are welcome! If you'd like to improve **AsyncFileUploader**, please fork the repository and submit a pull request! 👐

## 📝 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## 🌟 Support

If you have any questions or need assistance, feel free to open an issue or reach out! We are here to help! 😊