<?php
class Login_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function login($usu_num_doc, $usu_contra)
    {
        $sql ="SELECT u.usu_id,u.usu_num_doc,u.usu_nom,u.usu_ape,u.usu_nom_two,u.usu_ape_two,u.usu_contra,u.usu_nom_two,u.usu_ape_two,r.rol_id,r.rol_des FROM ir_usuario u,ir_rol r WHERE u.rol_id_fk = r.rol_id and u.usu_num_doc = $usu_num_doc";
        $query = $this->db->query($sql);
        if($query->num_rows() == 1)
        {
            $row=$query->row();
            if($row->usu_contra == $usu_contra  )  
            {
                $data=array(
                    'login'=>true,
                    'usu_id'=>$row->usu_id,
                    'usu_num_doc'=>$row->usu_num_doc,
                    'usu_nom'=>$row->usu_nom,
                    'usu_ape'=>$row->usu_ape,
                    'usu_nom_two'=>$row->usu_nom_two,
                    'usu_ape_two'=>$row->usu_ape_two,
                    'usu_contra'=>$row->usu_contra,
                    'rol_id'=>$row->rol_id,
                    'rol_des'=>$row->rol_des
                    
                );
                
                $this->session->set_userdata($data);
                return true;
            }
        }
        $this->session->unset_userdata('user_data');
        return false;
    }
}
?>