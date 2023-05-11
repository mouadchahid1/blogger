<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Le titre est requis');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Le contenu est requis');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Veuillez sélectionner un sujet');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Un post avec ce titre existe déjà');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Un poste avec ce titre existe déjà');
        }
    }

    return $errors;
}
