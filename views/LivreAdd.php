<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Livre/Add'); ?>
<div>Titre      : <input type="text" name="titre" value="<?php echo $this->input->post('titre'); ?>" /></div>
<!-- Nous allons remplacer la zone de saisie de text par une sélection de fichier -->
<!-- <div>Couverture : <input type="text" name="couverture" value=" --><div> Couverture     : <?php  echo $this->input->post('couverture'); ?></div> 
<input type="file" name="couverture" value="20" />
<div>Auteur     : <?php $comboBoxAuteur->Render(); ?></div>
<div>Editeur    : <?php $comboBoxEditeur->Render(); ?></div>
<div>Quizz      : <?php $comboBoxQuizz->Render(); ?></div>
<div><img src="<?php echo base_url('img/'.$this->input->post('couverture')) ?>" alt="<?php echo $this->input->post('titre'); ?>" height="100" width="100"> </div>
<button type="submit">Sauvegarder</button>
<?php echo form_close(); ?>