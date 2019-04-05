<?php


class Account extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('enseignantModel');
        $this->load->library('Aauth');
        $this->load->library('form_validation');
    }
}

function Create(){
    LoadValidationRules($this->enseignantModel, $this->form_validation);
    $this->form_validation->set_rules('password','Password','required|max_length[100]');
    $this->form_validation->set_rules('passwordConfirmation',
            'Confirmez le mot de passe', "required|max_length[100]|callback_password_check");
    if ($this->form_validation->run()) {
            $params=array(
                'nom'=>$this->input->post('nom'),
                'prenom'=>$this->input->post('prenom'),
                'email'=>$this->input->post('email'),
                'mdp'=>$this->input->post('mdp'),
                'cmdp'=>$this->input->post('cmdp'),
            );
            redirect('Login/Index');
            }
            
            else {
                $this->load->view('AppHeader');
                $this->load->view('AccountConfirmation');
                $this->load->view('AppFooter');
            }
}

function  attente_confirmation($email){
    $data['title']="Confirmation de votre inscription";
    $data['email']=$email;
    $this->load->view('AppHeader',$data);
    $this->load->view('AccountConfirmation',$data);
    $this->load->view('AppFooter');
}




function password_check(){
    $password=$this->post('password');
    $passwordConfirmation=$this->post('passwordConfirmation');
    if($password!=$passwordConfirmation){
        $this->form_validation->set_message('password_check',
                'le mot de passe de confirmation est différent du mot de passe initial');
        
        return false;
    }
    else {
        return true;
    }
}
?>