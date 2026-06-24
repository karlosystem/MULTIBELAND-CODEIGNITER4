<?php

namespace App\Validation;

use PhpParser\Node\Stmt\Return_;

class IsPasswordStrong
{
    public function is_password_strong($password): bool
    {
        $password = trim($password);

      /*at least one lowercase char
        at least one uppercase char
        at least one digit
        at least one special sign of @#-_$%^&+=§!? */

        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
            return false;
        }
        return true;
    }
}
