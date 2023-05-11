<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, ' est requis');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email est requis');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Mot de passe est requis');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Les mots de passe ne correspondent pas');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email existe déjà');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email existe déjà');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Nom d\'utilisateur est requis');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Mot de passe est requis');
    }

    return $errors;
}
