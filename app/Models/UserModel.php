<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nama', 'id_membership', 'email', 'password', 'username', 'avatar', 'alamat', 'TTGL', 'no_telp', 'active', 'role'];
    protected $useTimestamps = true;

    public function hapus($username)
    {
        $last_avatar = $this->where('username', $username)->first()['avatar'];
        if ($last_avatar != null) {
            unlink('img/avatars/' . $last_avatar);
        }
        $this->where('username', $username)->delete();
    }

    public function changeAvatar($id, $avatar)
    {
        $last_avatar = $this->find($id)['avatar'];
        if ($last_avatar != null) {
            unlink('img/avatars/' . $last_avatar);
        }
        $this->update($id, ['avatar' => $avatar]);
    }

    public function getMembershipFromUserId($id)
    {
        if (!$id)
            throw new \CodeIgniter\Exceptions\AlertError("Cannot get membership from user id null");
        $user = $this->find($id);
        if (!$user['id_membership'])
            return null;
        $membershipModel = new MembershipModel();
        return $membershipModel->find($user['id_membership']);
    }
}
