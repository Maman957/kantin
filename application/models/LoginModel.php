<?php

class LoginModel extends CI_Model
{
    public function getPengguna($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        return $this->db->get('pengguna');
    }
    public function prosesDaftar($data)
    {
        $date = date('Y-m-d');
        $value = array(
            'nama_pengguna' => $data['nama_pengguna'],
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role'],
            'tanggal_update' => $date,
        );

        $this->db->insert('pengguna', $value);
    }
}
