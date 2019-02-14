<?php echo $header; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Projet - RacineCRUD version CodeIgniter by <a href="http://www.itdev.site" target="_blank" title="visit itdev's website">@the_it_dev</a></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-decoration: underline;">Edition d'un user</h2>
            <p> <a href="<?php echo site_url(array('User', 'index')); ?>"><i class="fa fa-arrow-left"></i> Retour à la liste</a> </p>

            <form action="<?php echo site_url(array('User', 'modifierUser', $user->id)); ?>" method="POST" class="col-lg-8">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $user->nom;?>" />
                    <?php echo form_error('nom');?>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $user->prenom;?>" />
                    <?php echo form_error('prenom');?>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control" value="<?php echo $user->mdp;?>" />
                    <?php echo form_error('mdp');?>
                </div>
                <div class="form-group">
                    <label for="cmdp">Confirmer mot de passe</label>
                    <input type="password" name="cmdp" id="cmdp" class="form-control" value="<?php echo $user->mdp;?>" />
                    <?php echo form_error('cmdp');?>
                </div>
                <div class="form-group">
                    <label for="tel">Telephone</label>
                    <input type="text" name="tel" id="tel" class="form-control" value="<?php echo $user->tel; ?>" />
                    <?php echo form_error('tel');?>
                </div>
                <div class="form-group">
                    <label for="mail">Adresse email</label>
                    <input type="email" name="mail" id="mail" class="form-control" value="<?php echo $user->mail;?>" />
                    <?php echo form_error('mail');?>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Editer"/>
                    <a href="<?php echo site_url(array('User', 'index'));?>" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <div class="clearfix">
    </div>
</div>

<?php echo $footer; ?>
