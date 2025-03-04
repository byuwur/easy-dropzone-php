## This now forms part of [github.com/byuwur/spa.php](https://github.com/byuwur/spa.php). This repo will no longer be maintained to keep this in order in the base repo it is used. [This repo can also be used standalone]

# Easy Dropzone PHP

`byuwur/easy-dropzone-php` is a simple project that demonstrates how to use Dropzone.js to implement a single file upload functionality in PHP. The uploaded file will be resized and stored in a specified directory.

## Features

-   **Single file upload:** Allows the user to upload a single image file.
-   **File validation:** Accepts only JPEG files with a maximum size of 1 MB.
-   **Image resizing:** Resizes the uploaded image to 256x256 pixels.
-   **Simple integration:** Uses Dropzone.js for the frontend and PHP for handling the upload on the backend.

## Project Structure

-   `dropzone/` - Contains Dropzone.js and its stylesheet.
    -   `dropzone.min.css` - The Dropzone stylesheet.
    -   `dropzone.min.js` - The Dropzone JavaScript library.
-   `index.php` - The main page where the Dropzone form is implemented.
-   `upload.php` - The server-side script that handles the file upload.

## Usage

1. Open `index.php` in a web browser and pass an ID as a GET parameter. For example:

    http://localhost/easy-dropzone-php/index.php?id=999

2. Drag and drop an image file into the Dropzone area on the page.

3. The image will be automatically uploaded and saved in the `files/` directory with the specified ID as its filename.

## Implementation Details

The `index.php` file checks if an ID is passed through a GET request and then initializes the Dropzone instance. The file includes:

-   A link to the Dropzone stylesheet and script.
-   A form element with the Dropzone class where files can be dropped.
-   A JavaScript block to customize Dropzone behavior, such as resizing the image and setting the accepted file type.

The `upload.php` script handles the uploaded file by:

-   Validates the filename.
-   Creates a `files/` directory if it doesn't exist.
-   Moves the uploaded file to the `files/` directory with the specified ID as its filename.

## License

MIT (c) Andrés Trujillo [Mateus] byUwUr
