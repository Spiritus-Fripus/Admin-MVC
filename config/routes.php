<?php

return [
    // login
    'login' => ['controller' => 'login', 'action' => 'formloginAction'],
    'logout' => ['controller' => 'login', 'action' => 'logoutAction'],
    //absence
    'absence' => ['controller' => 'absence', 'action' => 'viewOwnAbsenceAction'],
    'absenceUser' => ['controller' => 'absence', 'action' => 'viewAllUserAbsence'],
    'addAbsence' => ['controller' => 'absence', 'action' => 'addAbsenceAction'],
    'deleteAbsence' => ['controller' => 'absence', 'action' => 'deleteAbsenceAction'],
    // admin
    'admin' => ['controller' => 'admin', 'action' => 'indexAction'],
    'adminProfil' => ['controller' => 'admin', 'action' => 'profilAction'],
    // delay
    'delay' => ['controller' => 'delay', 'action' => 'viewDelayAction'],
    // error
    'notfound' => ['controller' => 'error', 'action' => 'notFound'],
    'unauthorized' => ['controller' => 'error', 'action' => 'unauthorized'],
    // formation
    'formation' => ['controller' => 'formation', 'action' => 'indexAction'],
    'addFormation' => ['controller' => 'formation', 'action' => 'addFormationAction'],
    'archiveFormation' => ['controller' => 'formation', 'action' => 'archiveFormationAction'],
    'modifyFormation' => ['controller' => 'formation', 'action' => 'modifyFormationAction'],
    //formation Archive
    'formationArchive' => ['controller' => 'formation-archive', 'action' => 'indexAction'],
    // manager
    'manager' => ['controller' => 'manager', 'action' => 'indexAction'],
    'managerProfil' => ['controller' => 'manager', 'action' => 'profilAction'],
    // promotion
    'promotion' => ['controller' => 'promotion', 'action' => 'viewPromotionAction'],
    'modifyPromotion' => ['controller' => 'promotion', 'action' => 'modifyPromotionAction'],
    'deletePromotion' => ['controller' => 'promotion', 'action' => 'deletePromotionAction'],
    // student
    'student' => ['controller' => 'student', 'action' => 'indexAction'],
    'studentProfil' => ['controller' => 'student', 'action' => 'profilAction'],
    // user archive
    'userArchive' => ['controller' => 'user-archive', 'action' => 'indexAction'],
    // user
    'user' => ['controller' => 'user', 'action' => 'indexAction'],
    'addUser' => ['controller' => 'user', 'action' => 'addUserAction'],
    'updateUser' => ['controller' => 'user', 'action' => 'updateUserAction'],
    'archiveUser' => ['controller' => 'user', 'action' => 'archiveUserAction'],
    'userInfo' => ['controller' => 'user', 'action' => 'userInfoAction']

];
