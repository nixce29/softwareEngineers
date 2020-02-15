<?php
class equipment_model extends CI_Model
{
    public function showEquipment()
    {
        $this->db->select('id, equipment_name, equipment_status');
        $query = $this->db->get('equipment');
        return $query->result();
    }
    public function updateStatus($id, $status)
    {
        $update = array(
            'id' => $id,
            'equipment_status'  => $status
        );
        $this->db->where('id', $id);
        $this->db->update('equipment', $update);

        return true;
    }
}
