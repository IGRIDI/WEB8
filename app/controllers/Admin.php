<?php
//
//class Admin extends Controller
//{
//    private $countRecords = 50;
//
//    public function __construct()
//    {
//        parent::__construct();
//        $this->className = strtolower(__CLASS__) . '/';
//    }
//
//    public function index()
//    {
//        if (!$this->isInRole("Admin")) {
//            $this->view->generate('401');
//            return null;
//        }
//        $userInfo = $this->getUserInfo();
//        $this->saveVisitInformation("admin");
//        $this->view->generate($this->className . 'admin', compact("userInfo"));
//    }
//
//    public function editBlog()
//    {
//        if (!$this->isInRole("Admin")) {
//            $this->view->generate('401');
//            return null;
//        }
//        $errors = [];
//        if (!empty($_POST)) {
//            if (strcmp($_POST['mode'], 'manual') == 0) {
//                $errors = Validation::run([
//                    'topic' => 'required',
//                    'author' => 'required',
//                    'message' => 'required',
//                ]);
//                if (empty($errors)) {
//                    $model = new BlogModel();
//                    $model->Topic = $_POST['topic'];
//                    $model->Author = $_POST['author'];
//                    $model->Message = $_POST['message'];
//                    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
//                        $extension = pathinfo($_FILES['photo']['name'])['extension'];
//                        $model->PathToPhoto = '/img/blog/' . hash("sha256", time()) . "." . $extension;
//                        $path = APP_PATH . 'public' . $model->PathToPhoto;
//                        move_uploaded_file($_FILES['photo']['tmp_name'], $path);
//                    }
//                    $model->save();
//                }
//
//            } else {
//                if (is_uploaded_file($_FILES['records']['tmp_name'])) {
//                    $file = fopen($_FILES['records']['tmp_name'], "r");
//                    $model = new BlogModel();
//                    while (!feof($file)) {
//                        $data = explode(";", fgetcsv($file)[0]);
//                        $model->Topic = $data[0];
//                        $model->Message = $data[1];
//                        $model->Author = $data[2];
//                        $model->CurrentDate = $data[3];
//                        $model->save();
//                    }
//                    fclose($file);
//                }
//            }
//            header("Location: " . "/admin");
//        }
//        $this->saveVisitInformation("editBlog");
//        $this->view->generate($this->className . 'editBlog');
//    }
//
//    public function questBook()
//    {
//        if (!$this->isInRole("Admin")) {
//            $this->view->generate('401');
//            return null;
//        }
//        if (!empty($_FILES)) {
//            $uploadDir = APP_PATH . "public/files/tmp/";
//            $uploadFile = $uploadDir . basename($_FILES['records']['name']);
//            if (move_uploaded_file($_FILES['records']['tmp_name'], $uploadFile)) {
//                $file = fopen($uploadFile, "r");
//                print_r($file);
//                $this->file = fopen(APP_PATH . "public/files/message.inc", "a");
//                fwrite($this->file, "\n");
//                while (!feof($file)) {
//                    $message = fgets($file);
//                    print_r($message);
//                    fwrite($this->file, $message);
//                }
//                fclose($file);
//                fclose($this->file);
//                unlink($uploadFile);
//            } else {
//                echo "Не удалось загрузить файл";
//            }
//            header("Location: " . "/admin");
//        }
//        $this->saveVisitInformation("questBook");
//        $this->view->generate($this->className . 'questBook');
//    }
//
//    public function visitStatistic()
//    {
//        if (!$this->isInRole("Admin")) {
//            $this->view->generate('401');
//            return null;
//        }
//        if(empty($_GET["page"])) {
//            $page = 0;
//        } else {
//            $page = $_GET["page"];
//        }
//        $records = SiteVisitorModel::paginate($page, $this->countRecords);
//        $count = SiteVisitorModel::getCount();
//        $countPages = round($count / $this->countRecords);
//        $this->saveVisitInformation("visitStatistic");
//        $this->view->generate($this->className . 'visitStatistic', compact("records", "countPages", "page"));
//    }
//}