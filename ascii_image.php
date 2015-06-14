<?php
/***********************************************

  "ascii.php"

  Created by Michael Cheng on 06/12/2015 10:24
            http://michaelcheng.us/
            michael@michaelcheng.us
            --All Rights Reserved--

***********************************************/

class AsciiImage {
	const MAX_WIDTH = 120;

	private $_image;
	private function setImage($image) {
		$this->_image = $image;
	}
	private function getImage() {
		return $this->_image;
	}

	public static function transform($image) {
		return AsciiImage::convertImage($image);
	}

	private static function convertImage($image) {
		$t_img = imagecreatefromjpeg($image);
		$width = imagesx($t_img);
		$height = imagesy($t_img);
		$new_width = AsciiImage::MAX_WIDTH;
		$new_height = (AsciiImage::MAX_WIDTH * $height)/$width;

		// create the new smaller image
		$img = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($img, $t_img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


		
		for($y=0;$y<$new_height;$y++) {
			for($x=0;$x<$new_width;$x++) {
				$rgb = imagecolorsforindex($img, imagecolorat($img, $x, $y));



				// $total_value = $rgb["red"] + $rgb["green"] + $rgb["blue"]; // total value is [0, 765]
				// if($total_value < 50) {
				// 	echo "&bull;";
				// } elseif($total_value <= 150) {
				// 	echo "&circ;";
				// } elseif($total_value <= 250) {
				// 	echo "-";
				// } else {
				// 	echo "`";
				// }



				$rgb = imagecolorsforindex($img, imagecolorat($img, $x, $y));
				$total_value = $rgb["red"] + $rgb["green"] + $rgb["blue"]; // total value is [0, 765]
				if($total_value < 50) {
					echo "<span style='background: rgba(0, 0, 0, 1);'>&bull;</span>";
				} elseif($total_value <= 150) {
					echo "<span style='background: rgba(0, 0, 0, .7);'>&bull;</span>";
				} elseif($total_value <= 250) {
					echo "<span style='background: rgba(0, 0, 0, .5);'>&bull;</span>";
				} else {
					echo "<span style='background: rgba(0, 0, 0, .1);'>&bull;</span>";
				}



				//echo "<span style='color: rgba({$rgb['red']}, {$rgb['green']}, {$rgb['blue']}, 1);'>&bull;</span>";
				

// 				$output = <<<EOD
// 				<span style="max-width: 1px; max-height: 1px; background: rgba({$rgb["red"]}, {$rgb["green"]}, {$rgb["blue"]}, 1);">&nbsp;</span>
// EOD;
// 				echo $output;
			}
			echo "<br>";
		}
	}
}
?>