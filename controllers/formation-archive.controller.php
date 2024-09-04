<?php

require_once '../config/config.php';

function indexAction(): void
{
	checkUserRole(['admin']);
	require '../models/formation/formation-archive.manager.php';

	$filters = getFormationArchivedFilters();
	// Nombre d'enregistrements par page
	$recordsPerPage = 6;

	// Récupérer le numéro de page depuis les paramètres GET, ou utiliser la page 1 par défaut
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	// Calculer l'offset
	$offset = ($page - 1) * $recordsPerPage;

	$recordset = getAllFormationArchived($offset, $recordsPerPage);
	$totalRecords = getTotalFormationCount();
	$totalPages = ceil($totalRecords / $recordsPerPage);

	$title = 'Liste des formations archivées';

	$cssFiles =
		[
			'/css/user/user-style.css',
			'/css/generic/main-container.css',
			'/css/generic/table-responsive.css',
			'/css/generic/filter.css',
			'/css/generic/modal.css',
			'/css/generic/button-crud.css',
			'/css/generic/paging.css'
		];
	$jsFiles = [
		'/js/modal-delete-verify.js',
		"/js/submit-form.js"
	];
	$config = loadLayoutConfig();
	$template = '../views/formation-archive/index.html.php';
	require '../views/layouts/layout.html.php';
}

function getFormationArchivedFilters(): array
{
	$search = $_GET['search'] ?? '';
	$orderBy = $_GET['sort-by'] ?? 'user_archive_id';
	$direction = $_GET['sort-direction'] ?? 'DESC';
	$type = $_GET['sort-type'] ?? 'ALL';

	return [
		'search' => $search,
		'orderBy' => $orderBy,
		'direction' => $direction,
		'type' => $type,
	];
}
