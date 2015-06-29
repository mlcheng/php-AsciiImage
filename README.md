# php-ascii_image

This small PHP library can help turn images into beautiful ASCII art. Note that the playground for a live demo will be created soon.

## Usage
To transform an image into ASCII, just use

```php
$image = "image.jpg";
$ascii = AsciiImage::transform($image);

echo $ascii;
```
