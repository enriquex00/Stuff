<!--
	Enriquex00
	hola@smallbisons.com
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stuff</title>
</head>
<body>


	<img src="222.png" id="imagen" hidden>

	<div id="div_canva">
		<table>
			<?php
			/*
			* Aqui defines el tamaño de los pix
			*/
			$bloque_h = 60;
			$bloque_w = 60;
			for($i = 0; $i < $bloque_h; $i++){
				?>
				<tr>
					<?php
					for($j = 0; $j < $bloque_w; $j++){
						$key = "x" . $i . "y". $j;
						?>
						<td>
							<canvas id="canvas_<?php echo $key; ?>" width="50px;" height="50px;" style="border:1px solid;"hidden></canvas>
							<div style="width:50px; height:50px; border: 1px solid;" id="color_html_<?php echo $key; ?>"></div>
						</td>
						<?php
					}
					?>
				</tr>
				<?php
			}
			?>
		</table>
	</div>


	<script src="jquery-3.5.1.min.js"></script>

	<script type="text/javascript">
		imagen = $("#imagen");

		ruta = document.getElementById("imagen");
		bloque_h = <?php echo $bloque_h; ?>;
		bloque_w = <?php echo $bloque_w; ?>;

		size_w = imagen.width();
		size_h = imagen.height();

		matriz_i = parseFloat(size_h) / parseFloat(bloque_h);
		matriz_j = parseFloat(size_w) / parseFloat(bloque_w);

		for(i = 0; i < bloque_h; i++){
        	mover_i = parseFloat(i) * parseFloat(matriz_i);
			for(j = 0; j < bloque_w; j++){
				console.log(1);
				// alert();
            	mover_j = parseFloat(j) * parseFloat(matriz_j);
				key = 'x' + i + 'y' + j;

			  	var canvas = document.getElementById('canvas_' + key);
  				var ctx = canvas.getContext('2d');
  				$("#canvas_"+ key).attr("width", matriz_j);
  				$("#canvas_"+ key).attr("height", matriz_i);
			  	
			  	ctx.drawImage(ruta, mover_j, mover_i, size_w, size_h, 0, 0, size_w, size_h);
			  	const data = ctx.getImageData(0, 0, 50, 50).data;
			  	get_r = data[0];
			  	get_g = data[1];
			  	get_b = data[2];
			  	const rgb = get_r + ',' + get_g + ',' + get_b;

				var cont = 0;
				for(r = 0; r < 255; r++){
					for(g = 0; g < 255; g++){
						for(b = 0; b < 255; b++){
							cont++;
							if(b == get_b){ b = 255; }
						}
						if(g == get_g){ g = 255; }
					}
					if(r == get_r){ r = 255; }
				}
				// alert(cont);
				color_numerico_pos = cont;

				var color_elegido = 0;
				var material_image = '';

			  	$("#color_html_" + key).attr("style", "width:20px; height:20px; border: 1px solid; background: rgb(" + rgb + ");");
			}
		}
	</script>


<input type="" name="">





<script type="text/javascript">


	var hex = "#ff64c8";
	var red = parseInt(hex[1]+hex[2],16);
	var green = parseInt(hex[3]+hex[4],16);
	var blue = parseInt(hex[5]+hex[6],16);
	console.log(red,green,blue);

	function ColorToHex(color) {
	  var hexadecimal = color.toString(16);
	  return hexadecimal.length == 1 ? "0" + hexadecimal : hexadecimal;
	}

	function ConvertRGBtoHex(red, green, blue) {
	  return "#" + ColorToHex(red) + ColorToHex(green) + ColorToHex(blue);
	}
	console.log(ConvertRGBtoHex(255, 100, 200));

	function color_numerico_pos(r, g, b){
		// rgb = hex_to_rgb($hex);
		var rgb_r = r;
		var rgb_g = g;
		var rgb_b = b;

		//echo hexdec('0xFFFFFF');

		var cont = 0;
		for(r = 0; r < 255; r++){
			for(g = 0; g < 255; g++){
				for(b = 0; b < 255; b++){
					cont++;
					if(b == rgb_b){ b = 255; }
				}
				if(g == rgb_g){ g = 255; }
			}
			if(r == rgb_r){ r = 255; }
		}

		return cont;

	}

</script>

</body>
</html>