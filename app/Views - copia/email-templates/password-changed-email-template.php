<p>Estimado <?= $mail_data['user']->name ?></p>
<p>Su password ha sido cambiado con exito</i>
<br> 
<p>Login ID : <?= $mail_data['user']->username ?> o Email: <?= $mail_data['user']->email ?> 
</p>
<p>Password : <?= $mail_data['new_password'] ?></p>
<br><br>
Por favor no comnparta sus credenciales.
<p>Este correo se envia automaticamente

</p>