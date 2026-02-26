<?php

namespace App\Policies;

use App\Models\PeminjamanRuangan;
use App\Models\Users;
use Illuminate\Auth\Access\Response;

class PeminjamanRuanganPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Users $users): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(Users $users, PeminjamanRuangan $peminjamanRuangan): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(Users $users): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Users $users, PeminjamanRuangan $peminjamanRuangan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Users $users, PeminjamanRuangan $peminjamanRuangan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Users $users, PeminjamanRuangan $peminjamanRuangan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Users $users, PeminjamanRuangan $peminjamanRuangan): bool
    {
        return false;
    }

    public function before(Users $users, $ability)
    {
        if ($users->role === 'admin') {
            return true;
        }
    }

    public function approve(User $user, PeminjamanRuangan $peminjaman)
{
    return $user->id === $peminjaman->ruangan->pic_id;
}

public function view(User $user, PeminjamanRuangan $peminjaman)
{
    return $user->id === $peminjaman->ruangan->pic_id;
}
}
