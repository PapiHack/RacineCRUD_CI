<?php echo $header; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Projet - RacineCRUD version CodeIgniter by <a href="http://www.itdev.site" target="_blank" title="visit itdev's website">@the_it_dev</a></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 align="center" style="text-decoration: underline;">Liste des users</h1>
    
            <p><a href="<?php echo site_url(array('User', 'ajouterUser'))?>" class="btn btn-success"><i class="fa fa-user-plus"></i> Ajouter un user</a></p>

            <?php if($this->session->flashdata('ajout_s')) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('ajout_s'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
            } ?>

        <?php if($this->session->flashdata('modif_s')) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('modif_s'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    } ?>

        <?php if($this->session->flashdata('sup_err')) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo $this->session->flashdata('sup_err'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    } ?>

                    <?php if($this->session->flashdata('modif_err')) {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('modif_err'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                } ?>

                    <?php if($this->session->flashdata('sup_s')) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('sup_s'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                } ?>

<?php if(!$allUser) { ?> <h2>Pas encore de user. Veuillez en ajouté !</h2> <?php } else { ?>
            <table class="table table-striped table-bordered" id="myTable">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Password</th>
                    <th>Opérations</th>
                </tr>

                <?php 
                    foreach ($allUser as $user) {
                        ?>
                        <tr>
                            <td> <?php echo $user->prenom.' '.$user->nom; ?> </td>
                            <td> <?php echo $user->mail; ?> </td>
                            <td> <?php echo $user->tel; ?> </td>
                            <td> <?php echo $user->mdp; ?> </td>
                            <td> <a href="<?php echo site_url(array('User', 'modifierUser', $user->id)); ?>" class="btn btn-warning" title="Editer"><i class="fa fa-edit"></i></a> <a href="<?php echo site_url(array('User', 'supprimerUser', $user->id)); ?>" class="btn btn-danger" title="Supprimer" name="sup"><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
<?php } ?>
        </div>
    </div>
</div>

<?php echo $footer; ?>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    })

    var sup = document.getElementsByName('sup');
    for(var i = 0; i < sup.length; i++){
        sup[i].onclick = function(e){
            if(!confirm("Voulez-vous vraiment suppprimer ce user ?")){
                e.preventDefault();
            }
        }
    }
</script>
