<?php 
	
	$valores = $_POST['array'];
	$valores = explode(',',$valores);

	function moda(array $parametro, &$quantidade = 0) {
        $moda = array();
        if (empty($parametro)) {
            return $moda;
        }

    // qtd de aparições de cada valor no array
    	$aparicoes = array();
        foreach ($parametro as $valor) {
            $valor_str = var_export($valor, true);
            if (!isset($aparicoes[$valor_str])) {
                $aparicoes[$valor_str] = array(
                    'valor' => $valor,
                    'aparicoes' => 0
                );
            }
            $aparicoes[$valor_str]['aparicoes'] += 1;
        }

    // maior aparição no array
    	$quantidade = null;
        foreach ($aparicoes as $item) {
            if ($quantidade === null || $item['aparicoes'] >= $quantidade) {
                $quantidade = $item['aparicoes'];
            }
        }

    // número com a maior aparição no array
    	foreach ($aparicoes as $item) {
            if ($item['aparicoes'] == $quantidade) {
                $moda[] = $item['valor'];
            }
        }
        return $moda;
    }

	function mediana(array $parametro, $comparacao = null) {
        if (empty($parametro)) {
            return false;
        }

    // Ordenar o array
    	if ($comparacao === null) {
            sort($parametro);
        } else {
            usort($parametro, $comparacao);
        }

        $tamanho = count($parametro);
    // impar: valor mediano
    	if ($tamanho % 2) {
            $mediana = $parametro[(($tamanho + 1) / 2) - 1];

    // par: media simples dos dois valores medianos
    	} else {
            $v1 = $parametro[($tamanho / 2) - 1];
            $v2 = $parametro[$tamanho / 2];
            $mediana = ($v1 + $v2) / 2;
        }
        return $mediana;
    }

	function media(array $parametro) {
        return array_sum($parametro) / count($parametro);
    } 

	$modona = moda($valores);
	$midia = mediana($valores);
	$media = media($valores);
	echo "A moda é: ".$modona[0];
	echo "\n";
    ?>
    <html>
    <br>
    </html>
    <?php
	echo "A média é: $media";
	?>
    <html>
    <br>
    </html>
    <?php
	echo "A mediana é: $midia";



 ?>