<?php 
    class crearpdf { 
         
        var $pdf;     
        var $nombre_archivo; 
        var $descargar = FALSE; 
        var $patch = K_PATH_MAIN; // Patch Default del TCPDF 
         
        // Funciones 
         
        
        function __construct(){
        }
        
        // Constructor 
        function crearpdf($nombre,$descargar) {     
             // Instanciamos el Objeto 
            $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true); 
            // Damos nombre al Archivo 
            $this->nombre_archivo=$nombre; 
            /*  $descargar TRUE Descargar Archivo 
                True  Descargar Archivo 
                False Crear Archivo 
            */
			
            if ($descargar) { 
                $this->descargar=TRUE; 
            } else { 
                $this->descargar=FALSE; 
            } 
        } 
         
        // Cambiar Ruta del Archivo 
        function ruta($ruta) {     
            if (is_dir($ruta)) { 
                $this->patch=$ruta; 
                return TRUE;     
            } else { 
                return FALSE; 
            } 
        } 
         
        // Crear el Archivo PDF 
        function texto($string) { 
            // $string debe ser un String 
            if ( is_string ($string) ) { 
                // Seteamos Info del Documento 
                $this->pdf->SetCreator(PDF_CREATOR); 
                $this->pdf->SetAuthor(PDF_AUTHOR); 
                $this->pdf->SetTitle("certificado"); 
                $this->pdf->SetSubject("certificado"); 
                $this->pdf->SetKeywords(""); 
                //$this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING); 
     
                // Seteamos Margenes 
                $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); 
                $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
                $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 
                $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
                $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
                $this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
                $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
                $this->pdf->setLanguageArray($l); 
                // Inciciamos Documento  
                $this->pdf->AliasNbPages(); 
                $this->pdf->AddPage(); 
                // Codigo de Barra para el Foot 
                $this->pdf->SetBarcode(date("Y-m-d H:i:s", time())); 
                // Escribimos el archivo 
                $string=utf8_encode($string); 
                $this->pdf->WriteHTML($string, true, 0); 
                // � Creamos o Descargamos ? 
                if ($this->descargar) { 
                    $this->pdf->Output(); 
                } else { 
                    $this->pdf->Output($this->nombre_archivo,"F"); 
                } 
            } 
        } 
    } 
?> 