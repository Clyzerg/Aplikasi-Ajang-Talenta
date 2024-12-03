<?
class User_model extends CI_Model {

public function get_user_profile_status($user_id) {
    $this->db->select('is_profile_complete');
    $this->db->from('user');
    $this->db->where('id', $user_id);
    $query = $this->db->get();
    
    // Mengembalikan status profil dari tabel user
    return $query->row();
}
}
