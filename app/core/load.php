<?php
require APP_PATH . 'app/core/Router.php';
require APP_PATH . 'app/core/Validation.php';
require APP_PATH . 'app/core/TestValidation.php';
require APP_PATH . 'app/core/TestVerification.php';
require APP_PATH . 'app/core/Controller.php';
require APP_PATH . 'app/core/View.php';

require APP_PATH . 'app/controllers/Home.php';
require APP_PATH . 'app/controllers/Admin.php';
require APP_PATH . 'app/controllers/GuestBook.php';
//6 LR
require APP_PATH . 'app/core/Database.php';
require APP_PATH . 'app/core/BaseActiveRecord.php';
// Models
require APP_PATH . 'app/models/BlogModel.php';
require APP_PATH . 'app/models/TestsModel.php';
require APP_PATH . 'app/models/ReviewModel.php';
require APP_PATH . 'app/models/SiteVisitorModel.php';
require APP_PATH . 'app/models/UserModel.php';
require APP_PATH . 'app/models/CommentModel.php';

