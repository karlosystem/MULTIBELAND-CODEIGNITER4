<p>Estimado <?= $mail_data['user']->name ?></p>
<p>Hemos recibido su solicitud para resetear su password de nuestra pa  gina web en su cuenta de <i><?= $mail_data['user']->email ?></i>
<br>    
Tu puedes cambiar tu clave de acceso, haciendo click aqui <br><br>
<a style="color:#fff; border-color: #22bc66; border-style: solid; border-width:5px 10px; background-color: #22bc66; display: inline-block; text-decoration: none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0,0,0,0.16); -webkit-text-size-adjust: none; box-sizing: border-box;" href="<?= $mail_data['actionLink'] ?>" target="_blank">Cambiar de Password</a>
<br><br>
Nota: El link estara activo 15 minutos
<br>
Si usted no desea cambiar de password, ignore este mensaje. 
</p>