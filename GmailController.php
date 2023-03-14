<?php
$client = [
    "name"=>"Cliente 1",
    "email" => "cliente1@gmail.com"
];

$clients = [
    'cliente1',
    'cliente2'
];

$title_subject = "Factura Electronica";
// Varios destinatarios
// $para  = 'aidan@example.com' . ', '; // atención a la coma
// $para .= 'wez@example.com';

// título
$título = 'Factura';

// mensaje
$template_message = fopen("Gmail-Content.html", "r");
$content_template = fread($template_message, filesize("Gmail-Content.html"));
fclose($template_message);

// Para enviar un correo HTML, debe establecerse la cabecera Content-type

$headers  = "
    MIME-Version: 1.0
    Content-type: text/html; charset=iso-8859-1
    From: {$title_subject} <bigan.corre@gmail.com>
    To: {$client}
    Cc: {$clients}
    Bcc: {$clients}
";

// Enviarlo
mail($client['email'], $title_subject, $content_template, $headers);
