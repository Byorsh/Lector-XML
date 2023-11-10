<?php

include "./modelo/conexion.php";

    if (isset($_FILES['archivoXML']) && $_FILES['archivoXML']['error'] === UPLOAD_ERR_OK) {
        $dom = new DOMDocument();
        $file = $_FILES['archivoXML']['tmp_name'];
        $dom->load($file);

        //Seccion comprobante---------------
        $comprobante = $dom->documentElement;
        $fecha = $comprobante->getAttribute("Fecha");
        $fecha = strtok($fecha, 'T');
        $serie = $comprobante->getAttribute("Serie");
        $folio = $comprobante->getAttribute("Folio");
        $lugarExpedicion = $comprobante->getAttribute("LugarExpedicion");
        $metodoPago = $comprobante->getAttribute("MetodoPago");
        $moneda = $comprobante->getAttribute("Moneda");
        $subtotal = $comprobante->getAttribute("SubTotal");
        $total = $comprobante->getAttribute("Total");
        
        //Seccion emisor--------------------
        $emisor = $comprobante->getElementsByTagName("Emisor")->item(0);
        $nombreEmisor = $emisor->getAttribute("Nombre");
        $rfcEmisor = $emisor->getAttribute("Rfc");
        $regimenFiscalEmisor = $emisor->getAttribute("RegimenFiscal");

        //Seccion receptor------------------
        $receptor = $comprobante->getElementsByTagName("Receptor")->item(0);
        $nombreReceptor = $receptor->getAttribute("Nombre");
        $rfcReceptor = $receptor->getAttribute("Rfc");
        $regimenFiscalReceptor = $receptor->getAttribute("RegimenFiscalReceptor");

        //Seccion concepto------------------
        $conceptos = $comprobante->getElementsByTagName("Conceptos")->item(0);
        $conceptos = $conceptos->getElementsByTagName("Concepto");
        $cantidadConceptos = count($conceptos);

        

        //Seccion Traslados----------------------------
        $traslados = $comprobante->getElementsByTagName("Traslados")->item($cantidadConceptos);
        $traslados = $traslados->getElementsByTagName("Traslado")->item(0);
        $costoBase = $traslados->getAttribute("Base");
        $importeIva = $traslados->getAttribute("Importe");
        $tasa = $traslados->getAttribute("TasaOCuota");

        //Seccion Complemento--------------------------
        $complemento = $comprobante->getElementsByTagName("Complemento")->item(0);
        $complemento = $complemento->getElementsByTagName("TimbreFiscalDigital")->item(0);
        $uuid = $complemento->getAttribute("UUID");

        try {
            $sql=$conexion->query("INSERT INTO factura(uuid, serie, folio, fecha, lugarExpedicion, metodoPago, moneda, subtotal, costoBase, importeIva, tasa, total, rfcEmisor, nombreEmisor, regimenFiscalEmisor, rfcReceptor, nombreReceptor, regimenFiscalReceptor) VALUES ('$uuid', '$serie', '$folio', '$fecha', '$lugarExpedicion', '$metodoPago', '$moneda', '".floatval($subtotal)."', '".floatval($costoBase)."', '".floatval($importeIva)."', '".floatval($tasa)."', '".floatval($total)."', '$rfcEmisor', '$nombreEmisor', '$regimenFiscalEmisor', '$rfcReceptor', '$nombreReceptor', '$regimenFiscalReceptor')");
    
        } catch (\Throwable $th) {
            echo "No se ha podido almacenar el xml en la base de datos: $th";
        }

        try {
            $resultadoNum1 = $conexion->query("SELECT COUNT(*) FROM factura");
            
            $CANT1 = $resultadoNum1 -> fetch_row();
            $cant1 = $CANT1[0];
            intval($cant1);
            
        } catch (\Throwable $th) {
            echo "Se encontro este error $th";
        } 

        foreach ($conceptos as $concepto) {
            $claveProdServ = $concepto->getAttribute("ClaveProdServ");
            $claveUnidad = $concepto->getAttribute("ClaveUnidad");
            $unidad = $concepto->getAttribute("Unidad");
            $cantidad = $concepto->getAttribute("Cantidad");
            $descripcion = $concepto->getAttribute("Descripcion");
            $valorUnitario = $concepto->getAttribute("ValorUnitario");
            $descuento = $concepto->getAttribute("Descuento");

            $impuestos = $concepto->getElementsByTagName("Impuestos")->item(0);
            $impuestos = $concepto->getElementsByTagName("Traslados")->item(0);
            $impuestos = $concepto->getElementsByTagName("Traslado")->item(0);
            $importeBase = $impuestos->getAttribute("Importe");
            $base = $impuestos->getAttribute("Base");

            try {
                $sql=$conexion->query("INSERT INTO conceptos(claveProdServ, claveUnidad, unidad, cantidad, descripcion, valorUnitario, descuento, importeBase, base, idFactura) VALUES ('$claveProdServ', '$claveUnidad', '$unidad', '".floatval($cantidad)."', '$descripcion', '".floatval($valorUnitario)."', '".floatval($descuento)."', '".floatval($importeBase)."', '".floatval($base)."', '$cant1')");

            } catch (\Throwable $th) {
                echo "No se ha podido almacenar el concepto en la base de datos: $th";
            }
        }
    }

?>