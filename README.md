# Sendgrid
Envio de email via Sendgrid

## Exemplo
```php
<?php
inc('sendgrid');
$from=[
    'name'=>'From Name',
    'email'=>'from@email.com'
];
$to=[
    'name'=>'To Name',
    'email'=>'to@email.com'
];
$subject='Testando o Sendgrid';
$body=<<<heredoc
<html>
<head>
<style>
b{color:orange;}
</style>
</head>
<body>
hello <b>orange bold</b>
</body>
</html>
heredoc;
$response=sendgrid($from,$to,$subject,$body);
if($response){
    print 'mensagem enviada';
}else{
    print 'erro ao enviar';
}
?>
```
