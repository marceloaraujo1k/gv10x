<?php

function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
{
list($origWidth, $origHeight, $type) = getimagesize($sourceImage);

if ($type == 1)
{
    header ('Content-Type: image/gif');
    $image = imagecreatefromgif($sourceImage);
}
elseif ($type == 2)
{
    header ('Content-Type: image/jpeg');
    $image = imagecreatefromjpeg($sourceImage);
}
elseif ($type == 3)
{
    header ('Content-Type: image/png');
    $image = imagecreatefrompng($sourceImage);
}
else
{
    header ('Content-Type: image/x-ms-bmp');
    $image = imagecreatefromwbmp($sourceImage);
}

if ($maxWidth == 0)
{
    $maxWidth  = $origWidth;
}

if ($maxHeight == 0)
{
    $maxHeight = $origHeight;
}

// Calculate ratio of desired maximum sizes and original sizes.
$widthRatio = $maxWidth / $origWidth;
$heightRatio = $maxHeight / $origHeight;

// Ratio used for calculating new image dimensions.
$ratio = min($widthRatio, $heightRatio);

// Calculate new image dimensions.
$newWidth  = (int)$origWidth  * $ratio;
$newHeight = (int)$origHeight * $ratio;

// Create final image with new dimensions.

// if($type==1 or $type==3)
// {
//    $newImage = imagefill($newImage,0,0,0x7fff0000);
// }

$newImage = imagecreatetruecolor($newWidth, $newHeight);

$transparent = imagecolorallocatealpha($newImage, 0, 0, 0, 127);
imagefill($newImage, 0, 0, $transparent);
imagesavealpha($newImage, true);


imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
imagepng($newImage, $targetImage);

// Free up the memory.
imagedestroy($image);
imagedestroy($newImage);

return true;
}

?>

/*compress(e) {
    const fileName = e.target.files[0].name;
    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = event => {
        const img = new Image();
        img.src = event.target.result;
        img.onload = () => {
                const elem = document.createElement('canvas');
                const width = Math.min(800, img.width);
                const scaleFactor = width / img.width;
                elem.width = width;
                elem.height = img.height * scaleFactor;

                const ctx = elem.getContext('2d');
                // img.width and img.height will contain the original dimensions
                ctx.drawImage(img, 0, 0, width, img.height * scaleFactor);
                ctx.canvas.toBlob((blob) => {
                    const file = new File([blob], fileName, {
                        type: 'image/jpeg',
                        lastModified: Date.now()
                    });
                }, 'image/jpeg', 1);
            },
            reader.onerror = error => console.log(error);
    };
}