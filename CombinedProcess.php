<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pigeon Tree</title>
    <meta name="year" content="2024" />
</head>
<body>

<?php

libxml_use_internal_errors(true);
function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    $return = "<br/>\n";
    foreach ($errors as $error) {
        $return .= libxml_display_error($error);
    }
    return $return;
}
$newpath="";
$upload_folder = 'uploads/';
// An XML file exists
if(!$_FILES['upload-xml']['name'] =="0"){

// The upload directory

$filename = pathinfo($_FILES['upload-xml']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['upload-xml']['name'], PATHINFO_EXTENSION));

// File size check
$max_size = 50*1024; //50 KB
if($_FILES['upload-xml']['size'] > $max_size) {
    die("Please do not upload files larger than 50 kb");
}

// Path to upload
$new_path = $upload_folder.$filename.'.'.$extension;

// New file name if the file already exists
if(file_exists($new_path)) {
    // If file exists, append a number to the file name
    $id = 1;

    do {
        $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
        $id++;
    } while (file_exists($new_path));
}

// Everything okay, move file to new path (with test link)
move_uploaded_file($_FILES['upload-xml']['tmp_name'], $new_path);

$xml = new DOMDocument(); 
$xml->load($new_path);

if (!$xml->schemaValidate('TreeFormat.xsd')) {
    unlink($new_path);
    $res = libxml_display_errors();
    exit($res);

}else{
    
}

}else{
    //No file was selected for upload, file is generated from text field information
$idbands = json_decode($_POST["idbands"]);
$names = json_decode($_POST["names"]);
$sexes =json_decode($_POST["sexes"]);
$colors =json_decode($_POST["colors"]);
$owners =json_decode($_POST["owners"]);
$births = json_decode($_POST["births"]);
$deaths = json_decode($_POST["deaths"]);
$descendants = json_decode($_POST["descendants"]);
$pairs = json_decode($_POST["pairs"]);
$additional = json_decode($_POST["additional"]);

$writer = new XMLWriter();

$new_path = $upload_folder.'Generated'.'.xml';
$id=1;
do {
        $new_path = $upload_folder.'Generated'.'_'.$id.'.xml';
        $id++;
    } while (file_exists($new_path));

$customFixPath = basename($new_path);

$writer->openURI($customFixPath);
$writer->startDocument('1.0','UTF-8');  
$writer->setIndent(4);   
$writer->writePi('xml-stylesheet', 'type="text/xsl" href="http://localhost/Trees.xsl"');
$Tree = $writer->startElement('Tree');  
    for ($x = 0; $x < sizeof($idbands); $x++) {
    
        $writer->startElement('Pigeon');  
        
            $writer->writeAttribute('IdBand', $idbands[$x]);
            $writer->writeAttribute('Name', $names[$x]);
            $writer->writeAttribute('Sex', $sexes[$x]);
            $writer->writeAttribute('Color', $colors[$x]);
            $writer->writeAttribute('Owner', $owners[$x]);
            
            $date = new DateTime($births[$x]);
            $writer->writeAttribute('Birthday', $date->format('Y-m-d'));
            
            if($deaths[$x]!=""){
            $date = new DateTime($deaths[$x]);
            $writer->writeAttribute('Death', $date->format('Y-m-d'));
            }
            $writer->writeAttribute('ID', ($x+1));
            if($descendants[$x]===-1){
                if($x==0){$writer->writeAttribute('DescendantOf', '0');}else{
            $writer->writeAttribute('DescendantOf', '');}
        }else{
            $writer->writeAttribute('DescendantOf', $descendants[$x]);
        }
            if($pairs[$x]===-1){
                $writer->writeAttribute('PairedTo', '');
            }else{
                $writer->writeAttribute('PairedTo', $pairs[$x]);
            }

            $writer->writeAttribute('Additional', $additional[$x]);

        $writer->endElement();
    } 
   
$writer->endElement();  
$writer->endDocument();   
$writer->flush();

copy($customFixPath, "uploads/$customFixPath"); 

}



$newURL = 'http://localhost/disp.php?file=' . urlencode('./' . $new_path);

echo '<script type="text/javascript">
           window.location = "'.$newURL.'"
      </script>';

?>

</body>
</html>
