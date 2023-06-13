<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Post $post)
    {
        $this->cek_izin($user, $post);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $this->cek_izin($user, $post);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        return true;
        // $this->cek_izin($user, $post);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        $this->cek_izin($user, $post);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }

    public function cek_izin($user, $post){
        return true;
        // $prodi_ids = [1];
        // if($user->id == 1){
        //     return true;
        // } else {
        //     $post_roles = [];
        //     $roles = $user->role_users;
        //     $prodi_ids = [];
        //     foreach($roles as $role){
        //         $post_roles[] = $role->role_id;
        //     }
        //     foreach($post->post_prodi_data as $prodi){
        //         $prodi_ids[] = $prodi->prodi_id;
        //     }
        //     $is_true = Role::whereIn('id', $post_roles)->whereIn('prodi_id', $prodi_ids)->exists();
        //     return $is_true;
        // }
    }
}
