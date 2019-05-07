<?php

class Upload {
	public function resizeIMG($width, $height, $filename, $rename, $pathDIR)
		{
			/* Get original image x y*/
			list($w, $h) = getimagesize($filename['tmp_name']);
			/* calculate new image size with ratio */
			$ratio = max($width / $w, $height / $h);
			$h = ceil($height / $ratio);
			$x = ($w - $width / $ratio) / 2;
			$w = ceil($width / $ratio);
			/* new file name */
			$path = $pathDIR . $width . 'x' . $height . '_' . $rename;
			/* read binary data from image file */
			$imgString = file_get_contents($filename['tmp_name']);
			/* create image from string */
			$image = imagecreatefromstring($imgString);
			$tmp = imagecreatetruecolor($width, $height);

			imagealphablending($tmp, false);
			imagesavealpha($tmp,true);
			$transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
			imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
			imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);

			//imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
			/* Save image */
			switch ($filename['type']) {
				case 'image/jpeg':
					imagejpeg($tmp, $path, 100);
					break;
				case 'image/png':
					imagepng($tmp, $path, 0);
					break;
				case 'image/gif':
					imagegif($tmp, $path);
					break;
				default:
					exit;
					break;
			}
		}


		public function customerimgpath($width){

			if ($width == 370 ){
				return 'thumbs/';

			}

			if ($width == 185){
				return 'small/';

			}

			if ($width == 740){
				return 'large/';

			}
		}
		public function uploadImage($file, $url)
		{
			$fileName  = $file->name;
			$fileTmp   = $file->tmp_name;
			$fileSize  = $file->size;
			$fileError = $file->error;

			$allowed = ['jpg', 'png', 'jpeg', 'gif'];

			$ext = explode('.', $fileName);

			$ActualExt = strtolower(end($ext));

			if(in_array($ActualExt, $allowed)) {
				if ($fileError == 0) {
					if ($fileSize < 1000000) {
						$newName = uniqid('fxreport', true).'.'.$ActualExt;
						$fileDestination = $url('postuploads/').$newName;
						move_uploaded_file($fileTmp, $fileDestination);

						return $fileDestination;
					}
					return "File is too large.";
				}
				return "File has an error.";
			}
			return 'File extension is invalid.';
		}
	}

?>

<!--
SAMPLE

 $Customsize = array(370 => 370, 185 => 185);
	$imagefN = $file['inputimagep'];
	$imagef = $imagefN['name'];



	$tmpf = $imagefN['tmp_name'];


	$newnamef = $renamef . $imagef;
	$ext = strtolower(getExtension($imagef));

	foreach ($Customsize as $w => $h) {
		$path = $defind_PATH . 'img/' . customerimgpath($w);

		if (file_exists($path)) {
			$uploadStatus = resizeIMG($w, $h, $imagefN, $newnamef, $path);
		} else {
			$responseArray['PartnerCount'] = 3;
		}
	}

	$orpath = $defind_PATH . 'img/original/';

	if (file_exists($orpath)) {
		$uploadStatus = move_uploaded_file($tmpf, $orpath . $newnamef);
	} else {
		$responseArray['PartnerCount'] = 3;
	} -->
