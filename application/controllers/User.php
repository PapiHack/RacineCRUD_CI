<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'userManager');
        $this->load->library('form_validation');
    }

    public function index()
    {   
        $data['title'] = "RacineCRUD - Index";
        $data['header'] = $this->load->view('shared/header.php', $data, true);
        $data['footer'] = $this->load->view('shared/footer.php', null, true);
        $data['allUser'] = $this->userManager->findAll();
        $this->load->view('User/index.php', $data);
    }

    public function ajouterUser()
    {
        $data['title'] = "RacineCRUD - Ajout";
        $data['header'] = $this->load->view('shared/header.php', $data, true);
        $data['footer'] = $this->load->view('shared/footer.php', null, true);

        $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[3]|alpha|encode_php_tags');
        $this->form_validation->set_rules('prenom', '"Prenom"', 'trim|required|min_length[3]|alpha|encode_php_tags');
        $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|min_length[3]|encode_php_tags');
        $this->form_validation->set_rules('cmdp', '"Confirmation mot de passe"', 'trim|required|matches[mdp]|encode_php_tags');
        $this->form_validation->set_rules('tel', '"N° telephone"', 'trim|required|is_unique[user.tel]|min_length[9]|max_length[14]|numeric|encode_php_tags');
        $this->form_validation->set_rules('mail', '"Mail"', 'trim|required|valid_email|is_unique[user.mail]|encode_php_tags');

        if($this->form_validation->run())
        {
            $this->userManager->nom = $this->input->post('nom');
            $this->userManager->prenom = $this->input->post('prenom');
            $this->userManager->tel = $this->input->post('tel');
            $this->userManager->mail = $this->input->post('mail');
            $this->userManager->mdp = $this->input->post('mdp');

            $this->userManager->insert();

            $this->session->set_flashdata('ajout_s', 'User ajouté avec succés !');
            redirect(array('User', 'index'));
        }

        $this->load->view('User/ajouter.php', $data);
    }

    public function modifierUser($id)
    {
        $data['title'] = "RacineCRUD - Editon";
        $data['header'] = $this->load->view('shared/header.php', $data, true);
        $data['footer'] = $this->load->view('shared/footer.php', null, true);

        $user = $this->userManager->getById($id);

        if($user)
        {
            $data['user'] = $user;

            $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[3]|alpha|encode_php_tags');
            $this->form_validation->set_rules('prenom', '"Prenom"', 'trim|required|min_length[3]|alpha|encode_php_tags');
            $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|min_length[3]|encode_php_tags');
            $this->form_validation->set_rules('cmdp', '"Confirmation mot de passe"', 'trim|required|matches[mdp]|encode_php_tags');
            $this->form_validation->set_rules('tel', '"N° telephone"', 'trim|required|is_unique[user.tel]|min_length[9]|max_length[14]|numeric|encode_php_tags');
            $this->form_validation->set_rules('mail', '"Mail"', 'trim|required|valid_email|is_unique[user.mail]|encode_php_tags');
    
            if($this->form_validation->run())
            {
                $user->nom = $this->input->post('nom');
                $user->prenom = $this->input->post('prenom');
                $user->tel = $this->input->post('tel');
                $user->mail = $this->input->post('mail');
                $user->mdp = $this->input->post('mdp');
    
                $this->userManager->updateUser($user);
    
                $this->session->set_flashdata('modif_s', 'User modifié avec succés !');
                redirect(array('User', 'index'));
            }
    
            $this->load->view('User/modifier.php', $data);
        }
        else 
        {
            $this->session->set_flashdata('modif_err', 'Le user que vous essayez de modifier n\'existe pas !');
            redirect(array('User', 'index'));
        }
    }

    public function supprimerUser($id)
    {
        $user = $this->userManager->getById($id);
        if($user)
        {
            $this->userManager->deleteById($user->id);
            $this->session->set_flashdata('sup_s', 'User supprimé avec succés !');
            redirect(array('User', 'index'));
        }
        else
        {
            $this->session->set_flashdata('sup_err', 'Le user que vous essayez de supprimer n\'existe pas !');
            redirect(array('User', 'index'));
        }
    }
}