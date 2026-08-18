## This now forms part of [github.com/byuwur/spa.php](https://github.com/byuwur/spa.php). This repo will no longer be maintained to keep this in order in the base repo it is used. [This repo can also be used standalone]

# Easy Dropzone PHP

`byuwur/easy-dropzone-php` is a simple project that demonstrates how to use Dropzone.js to implement image uploads in PHP. Uploaded images are resized and stored in a specified directory.

> Although this example is configured for JPEG and PNG images, Dropzone and the PHP upload handler can be configured to accept other file types by adjusting the client- and server-side allowlists.

## Features

- **File validation:** Accepts JPEG and PNG files with a maximum size of 4 MB.
- **Image resizing:** Resizes uploaded images to fit within 256x256 pixels while preserving their aspect ratio.
- **Dynamic extensions:** Saves validated JPEG files as `.jpg` and PNG files as `.png`.
- **Server-side validation:** Validates the upload size and detected MIME type before saving the file.
- **Simple integration:** Uses Dropzone.js for the frontend and PHP for handling the upload on the backend.

## Project Structure

- `dropzone/` - Contains Dropzone.js v5.9.3 and its stylesheet.
  - `dropzone.min.css` - The Dropzone stylesheet.
  - `dropzone.min.js` - The Dropzone JavaScript library.
- `index.php` - The main page where the Dropzone form is implemented.
- `upload.php` - The server-side script that handles the file upload.

## Requirements

- PHP with the `fileinfo` extension enabled (required for MIME type detection in `upload.php`).

## Usage

1. Open `index.php` in a web browser and pass an ID as a GET parameter. For example:

   http://localhost/easy-dropzone-php/index.php?id=999

2. Drag and drop a JPEG or PNG image into the Dropzone area on the page.

3. The image will be automatically uploaded and saved in the `uploads/` directory using the specified ID and the extension determined from its validated MIME type.

## Implementation Details

The `index.php` file checks if an ID is passed through a GET request, validates it for safe use as a filename, and then initializes the Dropzone instance. The file includes:

- A link to the Dropzone stylesheet and script.
- A form element with the Dropzone class where an image can be dropped.
- A JavaScript block to customize Dropzone behavior, including the accepted image types, file size limit, single-file limit, and image resizing.

The `upload.php` script handles the uploaded file by:

- Validating the requested filename.
- Checking the PHP upload status and file size.
- Detecting and validating the actual MIME type of the uploaded image.
- Mapping the validated MIME type to the corresponding `.jpg` or `.png` extension.
- Creating an `uploads/` directory if it doesn't exist.
- Moving the uploaded file to the `uploads/` directory with the specified ID and validated extension as its filename.

## License

MIT (c) Andrés Trujillo [Mateus] byUwUr
