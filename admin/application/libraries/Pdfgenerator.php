<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    $dompdf->stream();
    if ($stream) {


        $dompdf->stream($filename.".pdf", array("Inline" => 0));

      //  $dompdf->stream($filename.".pdf", "D");
    } else {
        return $dompdf->output();
    }
  }


}
