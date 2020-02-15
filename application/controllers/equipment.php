<?php
defined('BASEPATH') or exit('No direct script access allowed');

class equipment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('equipment_model');
    }

    public function index()
    {
        // echo 'hello';exit();
        header('Location: welcome/home');
    }

    public function home()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'blank');
    }
    public function showEquipment()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'equipment/showEquipment');
    }
    public function get_equipment()
    {
        $equipment = $this->equipment_model->showEquipment();
        //success
        if ($equipment !== null) {
            $return_data['data'] = $equipment;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = null;
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }
    public function updateStatusNormal()
    {
        $id = $this->input->post("id");
        $status = "ปกติ";
        $this->equipment_model->updateStatus($id, $status);
        echo json_encode($id);
        echo json_encode($status);
        return true;
    }
    public function updateStatusFixing()
    {
        $id = $this->input->post("id");
        $status = "กำลังซ่อมแซม";
        $this->equipment_model->updateStatus($id, $status);
        echo json_encode($id);
        echo json_encode($status);
        return true;
    }
    public function updateStatusNotRent()
    {
        $id = $this->input->post("id");
        $status = "ไม่ว่าง";
        $this->equipment_model->updateStatus($id, $status);
        echo json_encode($id);
        echo json_encode($status);
        return true;
    }
}
