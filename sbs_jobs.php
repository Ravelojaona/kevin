<?php
/**
 * Plugin Name: SBS Job Management
 * Plugin URI: https://exemple.com
 * Description: A WordPress plugin for managing job offers and applications.
 * Version: 1.0
 * Author: faby-dev <fabyandriamparany.7@gmail.com>
 * Author URI: https://votresite.com
 */

// Charger l'autoload de Composer
require_once __DIR__ . '/vendor/autoload.php';

// Activer et désactiver les hooks
register_activation_hook(__FILE__, ['\SbsJobs\Activation', 'activate']);
register_deactivation_hook(__FILE__, ['\SbsJobs\Desactivation', 'deactivate']);


add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style(
		'sbs_jobs_styles',
		plugins_url('assets/css/styles.css', __FILE__),
		[],
		'1.0'
	);
	wp_enqueue_style(
		'sbs_jobs_company_form',
		plugins_url('assets/css/companyForm.css', __FILE__),
		[],
		'1.0'
	);
	wp_enqueue_style(
		'sbs_jobs_candidat_form',
		plugins_url('assets/css/candidate_form.css', __FILE__),
		[],
		'1.0'
	);
	wp_enqueue_style(
		'sbs_jobs_offre_detail_form',
		plugins_url('assets/css/template_offre_detail.css', __FILE__),
		[],
		'1.0'
	);
	wp_enqueue_style(
		'sbs_jobs_canditature_form',
		plugins_url('assets/css/candidature_form.css', __FILE__),
		[],
		'1.0'
	);

	wp_enqueue_style(
		'sbs_jobs_offre_form',
		plugins_url('assets/css/offre_form.css', __FILE__),
		[],
		'1.0'
	);

	wp_enqueue_style(
		'sbs_jobs_single_candidature',
		plugins_url('assets/css/single_candidature.css', __FILE__),
		[],
		'1.0'
	);

	wp_enqueue_style(
		'sbs_jobs_list_candidat',
		plugins_url('assets/css/list_candidat.css', __FILE__),
		[],
		'1.0'
	);

	
});


add_action('plugins_loaded', function() {
	$classes = [
		//Formulaire
		'SbsJobs\Forms\CandidatForm',
		'SbsJobs\Forms\CompanyForm',
		'SbsJobs\Forms\OffreForm',

		//Les tableau
		'SbsJobs\Admin\Tables\CandidatTable',
		'SbsJobs\Admin\Tables\CandidatureTable',
		'SbsJobs\Admin\Tables\OffreTable',
		'SbsJobs\Admin\Tables\EntrepriseTable',

		//Affiche front
		"SbsJobs\OffreListes",
	];

	foreach ($classes as $class) {
		if (class_exists($class)) {
			new $class();
		} else {
			error_log("Class $class not found.");
		}
	}
});

