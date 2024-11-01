<?php

require '../config/config.php';

function indexAction(): void
{
	require_once '../models/user/user.manager.php';
	checkUserRole(['admin']);

	// Récupérer les filtres de l'utilisateur
	$filters = getUserFilters();

	// Nombre d'enregistrements par page
	$recordsPerPage = 8;

	// Récupérer le numéro de page en GET, ou utiliser la page 1 par défaut
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	// Calcule de l'offset
	$offset = ($page - 1) * $recordsPerPage;

	// Récupéreration des données avec limite et offset
	$recordset = searchAndFilterUsers($filters['search'], $filters['type'], $filters['orderBy'], $filters['direction'], $offset, $recordsPerPage);

	// Récupérer le nombre total d'enregistrements pour calculer le nombre de pages
	$totalRecords = getTotalUserCount($filters['search'], $filters['type']);
	$totalPages = ceil($totalRecords / $recordsPerPage);


	$title = 'Liste des utilisateurs';
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
	$jsFiles =
		[
			'/js/modal-delete-verify.js',
			'/js/submit-form.js'
		];

	$config = loadLayoutConfig();
	$template = '../views/user/index.html.php';
	require '../views/layouts/layout.html.php';
}

function getUserFilters(): array
{
	// Définition des variables si non null
	$search = $_GET['search'] ?? '';
	$orderBy = $_GET['sort-by'] ?? 'created_at';
	$direction = $_GET['sort-direction'] ?? 'DESC';
	$type = $_GET['sort-type'] ?? 'ALL';

	return [
		'search' => $search,
		'orderBy' => $orderBy,
		'direction' => $direction,
		'type' => $type,
	];
}

function addUserAction(): void
{
	checkUserRole(['admin']);
	require '../models/user/user.manager.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') :
		if (!verifyCsrfToken()) :
			// Jeton CSRF invalide
			require '../models/login/login.manager.php';
			disconnect();
		endif;

		addUser();
		// Regenère CSRF token
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
		header('Location: /user');
		exit();
	endif;

	$title = "Ajouts d'utilisateurs";
	$cssFiles = ['/css/generic/form.css'];
	$config = loadLayoutConfig();
	$template = '../views/user/add-user.html.php';
	require '../views/layouts/layout.html.php';
}

function updateUserAction(): void
{
	checkUserRole(['admin']);
	require '../models/user/user.manager.php';

	if (isset($_GET['user_id'])) :
		// Récupérer l'user spécifique
		$user = getUserById($_GET['user_id']);
	else :
		header("Location: /user");
		exit();
	endif;

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) :
		if (!verifyCsrfToken()) :
			// Jeton CSRF invalide
			require '../models/login/login.manager.php';
			disconnect();
		endif;

		updateUser();
		// Regenère CSRF token
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
		header("Location: /user");
		exit();
	endif;


	$config = loadLayoutConfig();
	$cssFiles = ['/css/generic/form.css'];
	$template = "../views/user/update-user.html.php";
	require "../views/layouts/layout.html.php";
}

function archiveUserAction(): void
{
	checkUserRole(['admin']);
	require '../models/user/user.manager.php';

	if (isset($_GET['user_id'])) :
		archiveUser($_GET['user_id']);
		header("Location: /user");
		exit();
	endif;
}


function userInfoAction(): void
{
	checkUserRole(['admin']);
	require '../models/user/user.manager.php';

	// Inline if de récupération par ID
	if (isset($_GET['user_id'])) $user = getUserById($_GET['user_id']);

	$config = loadLayoutConfig();
	$cssFiles =
		[
			'/css/generic/main-container.css',
			'/css/generic/table-card.css'
		];
	$template = "../views/user/user-info.html.php";
	require "../views/layouts/layout.html.php";
}
