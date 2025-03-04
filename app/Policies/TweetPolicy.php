<?php

namespace App\Policies;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TweetPolicy
{
    /**
     * Determina si el usuario puede ver cualquier modelo (lista de tweets).
     * Actualmente bloqueado para todos los usuarios.
     */
    public function viewAny(User $user): bool
    {
        return false; // Nadie puede ver la lista de tweets
    }

    /**
     * Determina si el usuario puede ver un tweet específico.
     * Actualmente bloqueado para todos los usuarios.
     */
    public function view(User $user, Tweet $tweet): bool
    {
        return false; // Nadie puede ver tweets individuales
    }

    /**
     * Determina si el usuario puede crear nuevos tweets.
     * Actualmente bloqueado para todos los usuarios.
     */
    public function create(User $user): bool
    {
        return false; // Nadie puede crear tweets
    }

    /**
     * Determina si el usuario puede actualizar un tweet.
     * Solo permite al dueño del tweet editarlo.
     */
    public function update(User $user, Tweet $tweet)
    {
        // Compara el ID del usuario con el ID del creador del tweet
        return $user->id === $tweet->user_id;
    }

    /**
     * Determina si el usuario puede eliminar un tweet.
     * Solo permite al dueño del tweet borrarlo.
     */
    public function delete(User $user, Tweet $tweet)
    {
        // Compara el ID del usuario con el ID del creador del tweet
        return $user->id === $tweet->user_id;
    }

    /**
     * Determina si el usuario puede restaurar tweets eliminados (soft delete).
     * Actualmente bloqueado para todos los usuarios.
     */
    public function restore(User $user, Tweet $tweet): bool
    {
        return false; // Nadie puede restaurar tweets eliminados
    }

    /**
     * Determina si el usuario puede borrar permanentemente un tweet.
     * Actualmente bloqueado para todos los usuarios.
     */
    public function forceDelete(User $user, Tweet $tweet): bool
    {
        return false; // Nadie puede borrar tweets permanentemente
    }
}