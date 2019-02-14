<?php

class UserModel extends CI_Model
{
    protected $table = 'user';
    
    public $id;
    public $nom;
    public $prenom;
    public $mdp;
    public $tel;
    public $mail;

    /**
     * Permet de récuperer tout les users
     * @param void
     * @return array Tableau de user
     */
    public function findAll()
    {
        return $this->db->select('*')
                        ->from($this->table)
                        ->get()
                        ->result();
    }

    /**
     * Permet d'ajouter un user dans la BD
     * @param void
     * @return boolean Le résultat de la requête
     */
    public function insert()
    {
        $this->db->set('id', '');
        $this->db->set('nom', $this->nom);
        $this->db->set('prenom', $this->prenom);
        $this->db->set('tel', $this->tel);
        $this->db->set('mdp', $this->mdp);
        $this->db->set('mail', $this->mail);
        return $this->db->insert($this->table);
    }

    /**
     * Permet de supprimer un user
     * @param integer $id l'identifiant du user à supprimer
     * @return boolean Le résultat de la requête
     */
    public function deleteById($id)
    {
        return $this->db->where('id', (int) $id)->delete($this->table);
    }

    /**
     * Permet de recupérer un user.
     * 
     * @param integer $id L'id du user à recupérer.
     * @return object L'objet user
     */
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id'=>(int) $id])->row();
    }

    /**
     * Permet de mettre à jour un user.
     * 
     * @param object L'objet user à mettre à jour
     * @return boolean Le résultat de la requête
     */
    public function updateUser($user)
    {
        $this->db->where('id', (int) $user->id);
        return $this->db->update($this->table, $user);
    }

}