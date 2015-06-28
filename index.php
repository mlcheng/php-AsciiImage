<?php
/***********************************************

  "index.php"

  Created by Michael Cheng on 06/12/2015 10:33
            http://michaelcheng.us/
            michael@michaelcheng.us
            --All Rights Reserved--

***********************************************/
require("ascii_image.php");
ini_set('memory_limit', '512M');
?>
<html>
	<head>
		<style>
			* {
				font-family: monospace;
				line-height: .3em;
				letter-spacing: -4px;
			}
		</style>
	</head>
	<body>
		<?=AsciiImage::transform("20150626_114458.jpg");?>
	</body>
</html>