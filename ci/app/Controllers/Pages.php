<?php

namespace App\Controllers;

require 'autoload.php';

// use Yabacon\Paystack;
// use AshleyDawson\SimplePagination\Paginator;
use CodeIgniter\Encryption\Encryption;
use DateInterval;
use DateTime;

// use TeamTNT\TNTSearch\TNTSearch;


class Pages extends BaseController
{
    public $Bonus = 17000;
    public $Profit = 8000;
    public $phone = '08106685629';
    public $P_Bonus = 12000;
    public $C_Bonus = 5000;
    public $PRICE = 25000;
    private $SK = "sk_test_e3a8002593887c115e353a6a9635e92d188a2a11";
    // private $SK1 = getenv('paystack_sk');
    // private $SK = "sk_live_120523c403f470836f4376602e42810be2dca860";
    private $PK = 'pk_test_1d734c2d1006d51c301eae04cd1bf9c6690353a4';
    // private $PK = "pk_live_fad5b2e553041c06fa662dbad248b4f1787d9583";
    public $key = '85e0f9981d42e18b5401808ccf490b2b344892ea';

    private function tntConfig()
    {
        return [
            'driver'    => 'mysql',
            'host'      => getenv('database.default.localhost'),
            'database'  => getenv('database.default.database'),
            'username'  => getenv('database.default.username'),
            'password'  => getenv('database.default.password'),
            'storage'   => WRITEPATH,
            // 'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class//optional
        ];
    }

    public function index()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $this->admindashboard();
        } else if ($session->logged_in == TRUE) {
            $session = session();
            $id = $session->id;
            $users = new \App\Models\Users();
            $packages = new \App\Models\Packages();
            $prods = $packages->findAll();
            $orders = new \App\Models\Orders();
            // $ords = $orders->where(['user_id' => $session->id])->findAll(3);
            // foreach ($prods as $key => $value) {
            //     $prods[$key]['image'] = $this->getFile1($prods[$key]['image']);
            // }

            $data = [
                'user' => $u_db = $users->where('id', $id)->find()[0],
                'products' => $prods,
                'dir_img' => getenv('directus'),
                'orders' => [],
                'b_acc' => empty($u_db['bank']),
            ];

            $head_data = [
                'title' => 'Farms',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ];

            echo view('user/header', $head_data);
            echo view('user/home', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    private function page()
    {
        if (isset($_GET['page'])) {
            return $_GET['page'];
        } else {
            return 1;
        }
    }

    public function paginatest()
    {

        // Build a mock list of items we want to paginate through
        $items = array(
            'Banana',
            'Apple',
            'Cherry',
            'Lemon',
            'Pear',
            'Watermelon',
            'Orange',
            'Grapefruit',
            'Apple',
            'Cherry',
            'Lemon',
            'Pear',
            'Watermelon',
            'Orange',
            'Pear',
            'Watermelon',
            'Orange',
            'Grapefruit',
            'Apple',
            'Cherry',
            'Lemon',
            'Pear',
            'Watermelon',
            'Orange',
            'Grapefruit',
            'Blackcurrant',
            'Dingleberry',
            'Snosberry',
            'Tomato',
        );

        // Instantiate a new paginator service
        $paginator = new Paginator();

        // Set some parameters (optional)
        $paginator
            ->setItemsPerPage(10) // Give us a maximum of 10 items per page
            ->setPagesInRange(5) // How many pages to display in navigation (e.g. if we have a lot of pages to get through)
        ;

        // Pass our item total callback
        $paginator->setItemTotalCallback(function () use ($items) {
            return count($items);
        });

        // Pass our slice callback
        $paginator->setSliceCallback(function ($offset, $length) use ($items) {
            return array_slice($items, $offset, $length);
        });
        $page = $this->page();
        // Paginate the item collection, passing the current page number (e.g. from the current request)
        $pagination = $paginator->paginate((int) $page);

        // Ok, from here on is where we'd be inside a template of view (e.g. pass $pagination to your view)

        // Iterate over the items on this page
        foreach ($pagination->getItems() as $item) {
            echo $item . '<br />';
        }

        // Let's build a basic page navigation structure
        foreach ($pagination->getPages() as $page) {
            echo '<a href="?page=' . $page . '">' . $page . '</a> ';
        }
    }

    private function getFile($id)
    {
        $client = \Config\Services::curlrequest();
        $url = 'http://localhost/admin.master.terry/skillhubb' . '/files/' . $id;
        $at = 'oIFIIgDji7AQ28TSNm4a3Ccm';
        $response = $client->request('GET', $url, ['query' => ['access_token' => $at]]);

        $body = json_decode($response->getBody());
        return $body->data->filename_disk;
    }

    private function getFile1($id)
    {
        $files = new \App\Models\Files();
        $f_d = $files->where('id', $id)->find()[0];
        return $f_d['filename_disk'];
    }

    private function indiv($id)
    {
        $users = new \App\Models\Customers();
        $indiv = $users->where('user_id', $id)->find()[0];
        return $indiv;
    }

    public function admindashboard()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $session = session();
            $id = $session->id;
            $users = new \App\Models\Users();
            $products = new \App\Models\Packages();
            $prods = $products->findAll();
            $customers = $users->where('clearance', 1)->findAll();
            $admins = $users->where('clearance', 11)->findAll();
            $notif = 0;
            // $ordes = [];
            // foreach ($prods as $key => $value) {
            //     $prods[$key]['image'] = $this->getFile1($prods[$key]['image']);
            // }
            // foreach ($ords as $key => $order) {
            //     if ($order['notif'] == 0) {
            //         $notif++;
            //         $ordes[$key] = $order;

            //         if ($order['type'] == 'c') {
            //             $indiv = $this->indiv($order['user_id']);
            //             $ordes[$key]['bank'] = $indiv['bank'];
            //             $ordes[$key]['acc_num'] = $indiv['acc_num'];
            //             $ordes[$key]['acc_name'] = $indiv['acc_name'];
            //             $ordes[$key]['phone'] = $indiv['phone'];
            //         }
            //     }
            //     continue;
            // }

            $data = [
                'user' => $users->where('id', $id)->find()[0],
                'products' => $prods,
                'prod_count' => count($prods),
                // 'cust_count' => count($customers),
                // 'admin_count' => count($admins),
                // 'dir_img' => getenv('directus'),
                // 'orders' => $ordes,
                'ord_count' => $notif
            ];

            echo view('admin/header', [
                'title' => 'Admin Farm',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('admin/home', $data);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', ['title' => 'Out of Bound']);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function addpackage()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $packages = new \App\Models\Packages();
            $incoming = $this->request->getPost();
            if (null !== ($packages->insert($incoming))) {
                $data = [
                    'title' => 'Farm Added',
                    'msg' => "The new farm has been added! <br> It is always editable from the dashboard",
                    'url' => base_url()
                ];
                $this->msg($data);
            } else {
                $data = [
                    'title' => 'Farm addition Failed 💔',
                    'msg' => "We are sorry! <br>Your upload was not successful.",
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function editpackage()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $packages = new \App\Models\Packages();
            $id = $this->request->getGet('id');
            $details = $packages->find($id);

            echo view('admin/header', ['title' => 'Farm Edit']);
            echo view('admin/editpackage', $details);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function posteditpackage()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $packages = new \App\Models\Packages();
            $incoming = $this->request->getPost();
            if (null !== ($packages->update($incoming['id'], $incoming))) {
                $data = [
                    'title' => 'Farm Updates',
                    'msg' => "The farm has been updated! <br> You can always edit as much as you wish from the dashboard",
                    'url' => base_url()
                ];
                $this->msg($data);
            } else {
                $data = [
                    'title' => 'Farm Update Failed 💔',
                    'msg' => "We are sorry! <br>Your update was not successful.",
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function packageinfo()
    {
        $session = session();
        $packages = new \App\Models\Packages();
        $id = $this->request->getGet('id');
        $details = $packages->find($id);

        echo view('user/header', [
            'title' => 'Farm Information',
            'name' => $session->fname . ' ' . $session->lname,
            'email' => $session->email,
        ]);
        echo view('user/packageinfo', $details);
        echo view('user/footer');
    }

    public function admintemplate()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function investor()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $investments = $Investments->distinct()->findAll();
            if (!empty($investments)) {
                $invs = [];
                foreach ($investments as $key => $invst) {
                    $user = $users->where(['id' => $invst['user_id']])->find()[0];
                    $invs[$key]['name'] = $user['fname'] . ' ' . $user['lname'];
                    $invs[$key]['email'] = $user['email'];
                    $invs[$key]['id'] = $user['id'];
                    $invs[$key]['tel'] = $user['phone'];
                    $invs[$key]['plot'] = $this->level($user['clearance']);
                }
                $data = [
                    'inv' => $invs,
                ];
            } else {
                $data = [];
            }
            echo view('admin/header', ['title' => 'Investors',
            'name' => $session->fname . ' ' . $session->lname,
            'email' => $session->email,]);
            echo view('admin/investor', $data);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function investorinfo()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $user_id = $this->request->getGet('user');
            $users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $Packages = new \App\Models\Packages();
            $user = $users->where(['id' => $user_id])->find()[0];
            $investments = $Investments->where('user_id', $user_id)->find();
            if (!empty($investments)) {
                $invs = [];
                foreach ($investments as $key => $invest) {
                    $indiv_package = $Packages->where('id', $invest['packages_id'])->find()[0];
                    $invs[$key]['plot'] = $invest['unit_bought'];
                    $invs[$key]['status'] = $invest['payment_status'];
                    $invs[$key]['invested'] = $invest['date'];
                    $invs[$key]['farmID'] = $indiv_package['id'];
                    $invs[$key]['farmName'] = $indiv_package['name'];
                    $invs[$key]['roi'] = $indiv_package['ROI'];
                    $invs[$key]['unit_price'] = $indiv_package['unit_price'];
                    $invs[$key]['total_price'] = $indiv_package['unit_price'] * $invest['unit_bought'];
                    $invs[$key]['duration'] = $indiv_package['duration'];
                    // TO BE EXAMINED
                    $invs[$key]['total_payout'] = '100000';
                    $invs[$key]['payout_month'] = 'December';
                }
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => $invs,
                    'user' => $user
                ];
            } else {
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'user' => $user,
                    'inv' => [],
                ];
            }
            echo view('admin/header', [
                'title' => 'Investor Personal Data',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('admin/investorinfo', $data);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function level($lv)
    {
        if ($lv == '1') {
            return 'Investor';
        } else {
            return 'Admin';
        }
    }

    public function pay_transactions()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $Tranx = new \App\Models\Tranx();
            $Users = new \App\Models\Users();
            $trans = $Tranx->findAll();
            if (!empty($trans)) {
                $invs = [];
                foreach ($trans as $key => $invest) {
                    $invs[$key]['date'] = $invest['created_at'];
                    $invs[$key]['trans_id'] = $invest['reference'];
                    $invs[$key]['amount'] = $invest['amount'];
                    $invs[$key]['email'] = $invest['email'];
                    $invs[$key]['user'] = $Users->where('id', $invest['user_id'])->find()[0];
                    $invs[$key]['status'] = $invest['status'];
                }
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => $invs,
                ];
            } else {
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => [],
                ];
            }
            echo view('admin/header', [
                'title' => 'Paystack Transactions',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('admin/tranx', $data);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function payout()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $Users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $Packages = new \App\Models\Packages();
            $investments = $Investments->where(['payout>' => 0])->find();
            if (!empty($investments)) {
                $invs = [];
                foreach ($investments as $key => $invest) {
                    $indiv_package = $Packages->where('id', $invest['packages_id'])->find()[0];
                    $indiv_user = $Users->where('id', $invest['user_id'])->find()[0];
                    $invs[$key]['plot'] = $invest['unit_bought'];
                    $invs[$key]['status'] = $invest['payment_status'];
                    $invs[$key]['invested'] = date('d/m/Y', strtotime($invest['date']));
                    $invs[$key]['todayDate'] = date('d') . '/' . date('m') . '/' . date('Y');
                    $invs[$key]['farmID'] = $indiv_package['id'];
                    $invs[$key]['investID'] = $invest['id'];
                    $invs[$key]['farmName'] = $indiv_package['name'];
                    $invs[$key]['email'] = $indiv_user['email'];
                    $invs[$key]['bank'] = $indiv_user['bank'];
                    $invs[$key]['acc_name'] = $indiv_user['acc_name'];
                    $invs[$key]['acc_no'] = $indiv_user['acc_no'];
                    $invs[$key]['roi'] = $indiv_package['ROI'];
                    $invs[$key]['unit_price'] = $indiv_package['unit_price'];
                    $invs[$key]['total_price'] = $indiv_package['unit_price'] * $invest['unit_bought'];
                    $invs[$key]['duration'] = $indiv_package['duration'];
                    $invs[$key]['tpayout'] = $invest['payout'];
                }
                $data = [
                    'inv' => $invs,
                ];
            } else {
                $data = [
                    'inv' => [],
                ];
            }
            echo view('admin/header', [
                'title' => 'Payout',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('admin/payout', $data);
            echo view('admin/footer');
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }


    public function postwallet()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $Users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $incoming = $this->request->getPost();
            $data = [
                'email' => $session->email,
                'password' => hash('sha1', $incoming['pass'], false),
            ];
            $result = $Users->where($data)->find();
            if ($result) {
                $invdata = ['payment_status' => $incoming['message']];
                $Investments->update($incoming['investID'], $invdata);
                $data = [
                    'title' => 'Payout Status Updated',
                    'msg' => 'You can always update it status anytime, anywhere',
                    'url' => base_url()
                ];
                $this->msg($data);
            } else {
                $data = [
                    'title' => 'Verification Failed 💔',
                    'msg' => 'Confirm the password provided as an admin',
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header', [
                'title' => 'Out of Bound',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function fulfillwithdraw()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $session = session();
            $id = $session->id;
            $orders = new \App\Models\Orders();
            $incoming = $this->request->getPost();
            $data = [
                'notif' => 1,
                'status' => 'Completed',
            ];
            $ords = $orders->update($incoming['id'], $data);
            if ($ords) {
                $this->order();
            }
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header');
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function fulfillorder()
    {
        $session = session();
        if ($session->logged_in == TRUE && $session->admin == TRUE) {
            $session = session();
            $id = $session->id;
            $orders = new \App\Models\Orders();
            $incoming = $this->request->getPost();
            $data = [
                'notif' => 1,
                'status' => $incoming['status'],
            ];
            $ords = $orders->update($incoming['id'], $data);
            if ($ords) {
                $this->order();
            }
        } else if ($session->logged_in == TRUE) {
            $dt = [
                'title' => "😠Out of Bound😡",
                'msg' => "You are not authorised to visit this page",
                'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
            ];
            echo view('user/header');
            echo view('user/message', $dt);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function login()
    {
        echo view('user/authheader', ['title' => 'Login']);
        echo view('user/login');
        echo view('footer');
    }

    public function bootstrap()
    {
        $this->productTNTloader();
    }

    public function productTNTloader()
    {
        $tnt = new TNTSearch;
        $tnt->loadConfig($this->tntConfig());

        $indexer = $tnt->createIndex('market.index');
        $indexer->query('SELECT id, name, category, details FROM products;');
        //$indexer->setLanguage('german');
        $indexer->run();
    }

    public function search()
    {
        $incoming = $this->request->getGet();
        $keyword = $incoming['keyword'];
        $tnt = new TNTSearch;
        $tnt->loadConfig($this->tntConfig());
        $tnt->selectIndex("market.index");
        $tnt->fuzziness = true;

        $res = $tnt->search($keyword, 10);

        $products = new \App\Models\Products();
        $searches = $products->whereIn('id', $res['ids'])->findAll();
        foreach ($searches as $key => $value) {
            $searches[$key]['image'] = $this->getFile1($searches[$key]['image']);
        };
        $paginator = new Paginator();
        $paginator
            ->setItemsPerPage(10) // Give us a maximum of 10 items per page
            ->setPagesInRange(5) // How many pages to display in navigation (e.g. if we have a lot of pages to get through)
        ;
        $paginator->setItemTotalCallback(function () use ($searches) {
            return count($searches);
        });
        $paginator->setSliceCallback(function ($offset, $length) use ($searches) {
            return array_slice($searches, $offset, $length);
        });
        $page = $this->page();
        $pagination = $paginator->paginate((int) $page);

        $data = [
            'hits' => $res['hits'],
            'dir_img' => getenv('directus'),
            'pagination' => $pagination,
            'current' => $pagination->getCurrentPageNumber(),
        ];
        echo view('user/header');
        echo view('user/search', $data);
        echo view('user/footer');
    }

    public function investment()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $Packages = new \App\Models\Packages();
            $user = $users->where(['id' => $session->id])->find()[0];
            $investments = $Investments->where('user_id', $session->id)->find();
            if (!empty($investments)) {
                $invs = [];
                foreach ($investments as $key => $invest) {
                    $indiv_package = $Packages->where('id', $invest['packages_id'])->find()[0];
                    $invs[$key]['plot'] = $invest['unit_bought'];
                    $invs[$key]['status'] = $invest['payment_status'];
                    $invs[$key]['invested'] = date('d/m/Y', strtotime($invest['date']));
                    $invs[$key]['todayDate'] = date('d') . '/' . date('m') . '/' . date('Y');
                    $invs[$key]['farmID'] = $indiv_package['id'];
                    $invs[$key]['investID'] = $invest['id'];
                    $invs[$key]['farmName'] = $indiv_package['name'];
                    $invs[$key]['roi'] = $indiv_package['ROI'];
                    $invs[$key]['unit_price'] = $indiv_package['unit_price'];
                    $invs[$key]['total_price'] = $indiv_package['unit_price'] * $invest['unit_bought'];
                    $invs[$key]['duration'] = $indiv_package['duration'];
                    // TO BE EXAMINED
                    $invs[$key]['total_payout'] = (($indiv_package['unit_price'] * $invest['unit_bought']) * $indiv_package['ROI'] / 100) + $indiv_package['unit_price'] * $invest['unit_bought'];
                    $ndate = new DateTime(strtotime($invest['date']));
                    $ndate->add(new DateInterval('P6M'));
                    $invs[$key]['payout_month'] = $ndate->format('F');
                    $invs[$key]['tpayout'] = $invest['payout'];
                }
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => $invs,
                    'user' => $user,
                ];
            } else {
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => [],
                    'user' => $user,
                ];
            }

            // var_dump($ords);
            echo view('user/header', [
                'title' => 'My Investment',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/investment', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function postpayout()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $Users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $incoming = $this->request->getPost();
            $data = [
                'email' => $session->email,
                'password' => hash('sha1', $incoming['pass'], false),
            ];
            $result = $Users->where($data)->find();
            if ($result) {
                $invdata = ['payment_status' => 'Processing Payout', 'payout' => $incoming['payout']];
                $Investments->update($incoming['investID'], $invdata);
                $data = [
                    'title' => 'Payout Request Sent',
                    'msg' => 'Wait for 3 days for successful payout',
                    'url' => base_url()
                ];
                $this->msg($data);
            } else {
                $data = [
                    'title' => 'Verification Failed 💔',
                    'msg' => 'Confirm the password provided.',
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else {
            $this->login();
        }
    }

    public function wallet()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $users = new \App\Models\Users();
            $Investments = new \App\Models\Investments();
            $Packages = new \App\Models\Packages();
            $user = $users->where(['id' => $session->id])->find()[0];
            $investments = $Investments->where(['user_id' => $session->id, 'payout>' => 0])->find();
            if (!empty($investments)) {
                $invs = [];
                foreach ($investments as $key => $invest) {
                    $indiv_package = $Packages->where('id', $invest['packages_id'])->find()[0];
                    $invs[$key]['plot'] = $invest['unit_bought'];
                    $invs[$key]['status'] = $invest['payment_status'];
                    $invs[$key]['invested'] = date('d/m/Y', strtotime($invest['date']));
                    $invs[$key]['todayDate'] = date('d') . '/' . date('m') . '/' . date('Y');
                    $invs[$key]['farmID'] = $indiv_package['id'];
                    $invs[$key]['investID'] = $invest['id'];
                    $invs[$key]['farmName'] = $indiv_package['name'];
                    $invs[$key]['roi'] = $indiv_package['ROI'];
                    $invs[$key]['unit_price'] = $indiv_package['unit_price'];
                    $invs[$key]['total_price'] = $indiv_package['unit_price'] * $invest['unit_bought'];
                    $invs[$key]['duration'] = $indiv_package['duration'];
                    // TO BE EXAMINED
                    $invs[$key]['tpayout'] = $invest['payout'];
                }
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => $invs,
                    'user' => $user,
                ];
            } else {
                $data = [
                    // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                    'inv' => [],
                    'user' => $user,
                ];
            }
            echo view('user/header', [
                'title' => 'Payout',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/wallet', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function help()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $users = new \App\Models\Users();
            $user = $users->where(['id' => $session->id])->find()[0];

            $data = [
                // 'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                'user' => $user,
            ];
            // var_dump($ords);
            echo view('user/header', [
                'title' => 'Help',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/help', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function register()
    {
        echo view('user/authheader', ['title' => 'Sign Up']);
        echo view('user/register');
        echo view('footer');
    }

    public function makePayment($id, $url)
    {
        echo view('user/authheader');
        echo view('user/payment', ['id' => $id, 'url' => $url]);
    }

    private function verifyPayment($ref)
    {
        $trans = new \App\Models\Tranx();
        $reference = $ref;
        $id = $trans->where('reference', $ref)->find()[0]['id'];
        if (!$reference) {
            die('No reference supplied');
        }

        // initiate the Library's Paystack Object
        $paystack = new \Yabacon\Paystack($this->SK);
        try {
            // verify using the library
            $tranx = $paystack->transaction->verify([
                'reference' => $reference, // unique to transactions
            ]);
        } catch (\Yabacon\Paystack\Exception\ApiException $e) {
            print_r($e->getResponseObject());
            die($e->getMessage());
        }

        if ('success' === $tranx->data->status) {
            $data = [
                'status' => 'successful'
            ];
            $trans->update($id, $data);
            $this->assignPlot($id);
            return TRUE;
        }
    }

    private function assignPlot($tranx_id)
    {
        $investments = new \App\Models\Investments();
        $db = $investments->where('tranx_id', $tranx_id)->find()[0];
        $data = [
            'payment_status' => 'successful'
        ];
        $investments->update($db['id'], $data);
        //Deduct bought stock from original
        $Packages = new \App\Models\Packages();
        $p_db = $Packages->where('id', $db['packages_id'])->find()[0];
        $p_data = [
            'status' => $p_db['status'] + $db['unit_bought'],
        ];
        $Packages->update($db['packages_id'], $p_data);
        // Update Users package with number of investment
    }

    public function autoVeri()
    {
        // Retrieve the request's body and parse it as JSON
        $event = \Yabacon\Paystack\Event::capture();
        http_response_code(200);

        /* It is a important to log all events received. Add code *
     * here to log the signature and body to db or file       */
        openlog('MyPaystackEvents', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER | LOG_PERROR);
        syslog(LOG_INFO, $event->raw);
        closelog();

        /* Verify that the signature matches one of your keys*/
        $my_keys = [
            'live' => $this->SK,
            'test' => $this->SK,
        ];
        $owner = $event->discoverOwner($my_keys);
        if (!$owner) {
            // None of the keys matched the event's signature
            die();
        }

        // Do something with $event->obj
        // Give value to your customer but don't give any output
        // Remember that this is a call from Paystack's servers and
        // Your customer is not seeing the response here at all
        switch ($event->obj->event) {
                // charge.success
            case 'charge.success':
                if ('success' === $event->obj->data->status) {
                    // TIP: you may still verify the transaction
                    // via an API call before giving value.
                    $this->verifyPayment($event->obj->data->reference);
                }
                break;
        }
    }

    private function payment($email, $user, $amount, $p_id, $plot)
    {
        $trans = new \App\Models\Tranx();
        $investments = new \App\Models\Investments();
        $session = session();
        $amount = $amount * 100;
        $reference = uniqid("farmpeak");
        $paystack = new \Yabacon\Paystack($this->SK);
        try {
            $tranx = $paystack->transaction->initialize([
                'amount' => $amount,       // in kobo
                'email' => $email,         // unique to customers
                'reference' => $reference, // unique to transactions
            ]);
        } catch (\Yabacon\Paystack\Exception\ApiException $e) {
            print_r($e->getResponseObject());
            die($e->getMessage());
        }

        // store transaction reference so we can query in case user never comes back
        // perhaps due to network issue
        $data = [
            'reference' => $tranx->data->reference,
            'url' => $tranx->data->authorization_url,
            'amount' => $amount,
            'user_id' => $user,
            'email' => $email,
            'status' => 'initiated'
        ];
        $db_id = $trans->insert($data);
        $inv_data = [
            'user_id' => $session->id,
            'packages_id' => $p_id,
            'tranx_id' => $db_id,
            'payment_status' => 'initiated',
            'unit_bought' => $plot,
            'date' => date('c')
        ];
        $inv_id = $investments->insert($inv_data);
        // echo $tranx->data->authorization_url;
        // var_dump($tranx->data->reference);
        // return $tranx->data->authorization_url;
        // return $db_id;
        // redirect to page so User can pay
        echo "About to redirect....";
        return $this->response->redirect($tranx->data->authorization_url);
    }

    public function initPayment()
    {
        $incoming = $this->request->getPost();
        $packages = new \App\Models\Packages();
        $session = session();
        $p_db = $packages->where('name', $incoming['name'])->find()[0];
        //Insert details into investment for user

        $p_price = $p_db['unit_price'];
        $amount = $p_price * $incoming['plot'];
        $email = $session->email;
        $user = $session->id;
        $this->payment($email, $user, $amount, $p_db['id'], $incoming['plot']);
    }

    public function processPayment()
    {
        $trans = new \App\Models\Tranx();
        $incoming = $this->request->getGet();
        $id = $incoming['ref'];
        $src = $incoming['utm_src'];
        if ($src == 'rgst') {
            $u_db = $trans->where('id', $id)->find()[0];
            $paymenturl = $u_db['url'];
            $this->makePayment($u_db['user_id'], $paymenturl);
        } else if ($src == 'lgn') {
            $u_db = $trans->where('id', $id)->find()[0];
            $paymenturl = $u_db['url'];
            $this->makePayment($u_db['user_id'], $paymenturl);
        } else {
            $u_db = $trans->where('reference', $id)->find()[0];
            $paymenturl = $u_db['url'];
            $this->makePayment($u_db['user_id'], $paymenturl);
        }
        // Callback URL https://farmpeak.abk.ng/paystack/congrat
        // Webhook URL https://farmpeak.abk.ng/paystack/paymentveri
    }

    public function postregister()
    {
        $users = new \App\Models\Users();
        $incoming = $this->request->getPost();
        $token = md5($incoming['fname']);
        $data = [
            'fname' => $incoming['fname'],
            'lname' => $incoming['lname'],
            'email' => $incoming['email'],
            'phone' => $incoming['phone'],
            'clearance' => 1,
            'password' => hash('sha1', $incoming['pass'], false),
            'token' => $token,
        ];

        if (null !== ($users->insert($data))) {
            // $paymenturl = $this->payment($incoming['email'], $user_id);
            // return redirect()->to(base_url('processpayment?ref=' . $paymenturl . '&utm_src=rgst'));
            $url = base_url('verify' . '?token=' . $token . '&email=' . $incoming['email'] . '&utm_src=rgst');
            $data = [
                'to' => $incoming['email'],
                'type' => 'link',
                'subject' => 'Farmpeak Registration',
                'message' => ['url' => $url, 'msg' => 'Your registration on farmpeak.com was successfull. However, you need to verify this email to access your dashboard. Kindly use the link below to proceed'],
                'response' => [
                    'title' => 'Registration Successful',
                    'msg' => 'The next step has been sent to your email. <br> <b>PS</b> Check your spam folder if not found in default folder',
                    'url' => base_url('login'),
                ]
            ];
            $this->mailer($data);
        } else {
            $data = [
                'title' => 'Registration Failed 💔',
                'msg' => "We are sorry! <br>Your registration was not successfull.
                     Try going through the details submitted or contact our support team 
                     using <a href='tel:" . $this->phone . "'>" . $this->phone . "</a> ",
                'url' => base_url('register')
            ];
            $this->msg($data);
        }
    }

    public function verify()
    {
        $users = new \App\Models\Users();
        $incoming = $this->request->getGet();

        $data = [
            'email' => $incoming['email'],
            'token' => $incoming['token'],
        ];
        $result = $users->where($data)->find();
        if ($result) {
            $new_data = [
                'token' => '0'
            ];
            $users->update($result[0]['id'], $new_data);
            $data = [
                'title' => 'Verification Succesful',
                'msg' => 'Click the link below to login to your account',
                'url' => base_url('login')
            ];
            $this->msg($data);
        } else {
            $data = [
                'title' => 'Verification Failed 💔',
                'msg' => 'The link is either invalid or expired. Contact the admin on ' . $this->phone . ' for help',
                'url' => base_url()
            ];
            $this->msg($data);
        }
    }

    public function postlogin()
    {
        $users = new \App\Models\Users();
        $incoming = $this->request->getPost();
        $data = [
            'email' => $incoming['email'],
            'password' => hash('sha1', $incoming['pass'], false),
        ];
        $result = $users->where($data)->find();
        if ($result) {
            if ($result[0]['token'] == 0 && $result[0]['clearance'] == 1) {
                $ses_data = [
                    'id' => $result[0]['id'],
                    'fname' => $result[0]['fname'],
                    'lname' => $result[0]['lname'],
                    'email' => $result[0]['email'],
                    'logged_in' => TRUE,
                ];
                $session = session();
                $session->set($ses_data);
                // $this->index();
                return redirect()->to(base_url());
            } else if ($result[0]['token'] == 0 && $result[0]['clearance'] == 11) {
                $ses_data = [
                    'id' => $result[0]['id'],
                    'fname' => $result[0]['fname'],
                    'lname' => $result[0]['lname'],
                    'email' => $result[0]['email'],
                    'admin' => TRUE,
                    'logged_in' => TRUE,
                ];
                $session = session();
                $session->set($ses_data);
                return redirect()->to(base_url());
            } else {
                $data = [
                    'title' => 'Verification Failed 💔',
                    'msg' => 'Verify the email provided to have access to your dashboard',
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else {
            $data = [
                'title' => 'Login Failed 💔',
                'msg' => 'Wrong email or password provided',
                'url' => base_url()
            ];
            $this->msg($data);
        }
    }

    public function message($type, $data)
    {
        $burl = base_url();
        // $burl = 'https://app.skilltaps.com/';
        if ($type == 'link') {
            $output = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title></title>
                <style>
                    body{margin: 0;padding: 0;}
                    .container{background-color: aliceblue;border-radius: 1.5rem;text-align: center;}
                    main{padding-bottom: 4rem;}
                    footer{padding: 0.4rem 0;background-color: black;color: white;border-bottom-left-radius: 1.5rem;border-bottom-right-radius: 1.5rem;}
                </style>
            </head>
            <body>
                <div class='container'>
                    <header class='logo'><img width='50%' src='" . $burl . "assets/img/favicons/skilltaps.png' alt=''></header>
                    <main>
                        <h2>" . $data['msg'] . "</h2>
                        <p><a href='" . $data['url'] . "'>Click here</a> or copy this <br> <code>" . $data['url'] . "</code></p> 
                    </main>
                    <footer>&copy; Skilltaps.com</footer>
                </div>
            </body>
            </html>
        ";
        }
        return $output;
    }

    public function mailer(array $data)
    {
        $email = \Config\Services::email();
        $email->setFrom(getenv('smtpuser'), getenv('smtptitle') . ' Account Manager');
        $email->setTo($data['to']);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject($data['subject']);
        $email->setMessage($this->message($data['type'], $data['message']));

        $email->send(false);
        $this->msg($data['response']);
        // return $email->printDebugger(['headers', 'subject', 'body']);
    }

    public function passreset()
    {
        $config = new \Config\Encryption();
        $config->key = $this->key;
        $encryter = \Config\Services::encrypter($config);
        $users = new \App\Models\Users();
        $email = $this->request->getPost()['email'];
        if (!empty($u_db = $users->where('email', $email)->find())) {
            $u_db = $u_db[0];
            $res = $users->update($u_db['id'], ['password' => '']);
            $encrypted = urlencode($encryter->encrypt($u_db['email'] . '\t\n' . $u_db['fname']));
            if ($res) {
                $url = base_url('rst?user=') . $encrypted;
                $data = [
                    'to' => $email,
                    'type' => 'link',
                    'subject' => 'Password Reset Link',
                    'message' => ['url' => $url, 'msg' => 'Your password can be reset using the link below'],
                    'response' => [
                        'title' => 'Password Reset',
                        'msg' => 'A reset link has been sent to the provided email',
                        'url' => base_url('login'),
                    ]
                ];
                $this->mailer($data);
            }
        } else {
            $data = [
                'title' => 'Password Reset',
                'msg' => 'A reset link has been sent to the provided email',
                'url' => base_url('login'),
            ];
            $this->msg($data);
        }
    }

    public function rst()
    {
        $details = $this->request->getGet()['user'];
        $data = [
            'email' => urlencode($details),
        ];

        echo view('user/authheader', ['title' => 'Password Reset']);
        echo view('user/reset', $data);
    }

    public function passwordreset()
    {
        $config = new \Config\Encryption();
        $config->key = $this->key;
        $encryter = \Config\Services::encrypter($config);
        $users = new \App\Models\Users();
        $incoming = $this->request->getPost();
        $loader = urldecode($incoming['loader']);
        $email = strtok($encryter->decrypt($loader), '\t\n');
        $password = hash('sha1', $incoming['password'], false);
        $u_db = $users->where('email', $email)->find()[0];
        $res = $users->update($u_db['id'], ['password' => $password]);

        if ($res) {
            $data = [
                'title' => 'Password Reset',
                'msg' => 'Your password reset was successfull',
                'url' => base_url('login'),
            ];
            $this->msg($data);
        }
    }

    public function msg($data)
    {
        echo view('user/authheader', ['title' => $data['title']]);
        echo view('user/redirect', $data);
        echo view('footer.php');
    }

    public function processpay($id)
    {
        // <a href="<?= base_url('pp?sku='.$id)
        $users = new \App\Models\Customers();
        $data = [
            'paid' => 1
        ];
        $p_db = $users->where('user_id', $id)->find()[0];
        $users->update($id, $data);
        $this->addtowallet($p_db['ref_id']);
        $this->credit($id);
        return TRUE;
    }

    private function credit($id)
    {
        $profit = new \App\Models\Profit();
        $data = [
            'customer' => $id,
            'amount' => $this->Profit
        ];
        $profit->save($data);
        return;
    }

    private function addtowallet($id)
    {
        $users = new \App\Models\Customers();
        $db_data = $users->where('user_id', $id)->find()[0];
        $data = [
            'p_wallet' => $db_data['p_wallet'] + $this->P_Bonus,
            'c_wallet' => $db_data['c_wallet'] + $this->C_Bonus,
        ];
        $users->update($id, $data);
        return;
    }

    public function profile()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $users = new \App\Models\Users();
            $user = $users->where(['id' => $session->id])->find()[0];

            $data = [
                'init' => strtoupper(substr($user['fname'], 0, 1) . substr($user['lname'], 0, 1)),
                'user' => $user,
                'banks' => [
                    array('id' => '1', 'name' => 'Access Bank', 'code' => '044'),
                    array('id' => '2', 'name' => 'Citibank', 'code' => '023'),
                    array('id' => '3', 'name' => 'Access (Diamond) Bank', 'code' => '063'),
                    array('id' => '4', 'name' => 'Dynamic Standard Bank', 'code' => ''),
                    array('id' => '5', 'name' => 'Ecobank Nigeria', 'code' => '050'),
                    array('id' => '6', 'name' => 'Fidelity Bank Nigeria', 'code' => '070'),
                    array('id' => '7', 'name' => 'First Bank of Nigeria', 'code' => '011'),
                    array('id' => '8', 'name' => 'First City Monument Bank', 'code' => '214'),
                    array('id' => '9', 'name' => 'Guaranty Trust Bank', 'code' => '058'),
                    array('id' => '10', 'name' => 'Heritage Bank Plc', 'code' => '030'),
                    array('id' => '11', 'name' => 'Jaiz Bank', 'code' => '301'),
                    array('id' => '12', 'name' => 'Keystone Bank Limited', 'code' => '082'),
                    array('id' => '13', 'name' => 'Providus Bank Plc', 'code' => '101'),
                    array('id' => '14', 'name' => 'Polaris Bank', 'code' => '076'),
                    array('id' => '15', 'name' => 'Stanbic IBTC Bank Nigeria Limited', 'code' => '221'),
                    array('id' => '16', 'name' => 'Standard Chartered Bank', 'code' => '068'),
                    array('id' => '17', 'name' => 'Sterling Bank', 'code' => '232'),
                    array('id' => '18', 'name' => 'Suntrust Bank Nigeria Limited', 'code' => '100'),
                    array('id' => '19', 'name' => 'Union Bank of Nigeria', 'code' => '032'),
                    array('id' => '20', 'name' => 'United Bank for Africa', 'code' => '033'),
                    array('id' => '21', 'name' => 'Unity Bank Plc', 'code' => '215'),
                    array('id' => '22', 'name' => 'Wema Bank', 'code' => '035'),
                    array('id' => '23', 'name' => 'Zenith Bank', 'code' => '057')
                ],
            ];
            // var_dump($ords);
            echo view('user/header', [
                'title' => 'Profile',
                'name' => $session->fname . ' ' . $session->lname,
                'email' => $session->email,
            ]);
            echo view('user/profile', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function transactions()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $orders = new \App\Models\Orders();
            $ords = $orders->where('user_id', $session->id)->findAll();

            $data = [
                'orders' => $ords,
            ];
            // var_dump($ords);
            echo view('user/header');
            echo view('user/transactions', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function market()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;
            $users = new \App\Models\Customers();
            $products = new \App\Models\Products();
            $prods = $products->findAll();
            foreach ($prods as $key => $value) {
                $prods[$key]['image'] = $this->getFile1($prods[$key]['image']);
            };
            $paginator = new Paginator();
            $paginator
                ->setItemsPerPage(20) // Give us a maximum of 10 items per page
                ->setPagesInRange(5) // How many pages to display in navigation (e.g. if we have a lot of pages to get through)
            ;
            $paginator->setItemTotalCallback(function () use ($prods) {
                return count($prods);
            });
            $paginator->setSliceCallback(function ($offset, $length) use ($prods) {
                return array_slice($prods, $offset, $length);
            });
            $page = $this->page();
            $pagination = $paginator->paginate((int) $page);

            $data = [
                'user' => $users->where('user_id', $id)->find()[0],
                'dir_img' => getenv('directus'),
                'pagination' => $pagination,
                'current' => $pagination->getCurrentPageNumber(),
                'products' => $prods,
            ];
            echo view('user/header');
            echo view('user/market', $data);
            echo view('user/footer');
        } else {
            $products = new \App\Models\Products();
            $prods = $products->findAll();
            foreach ($prods as $key => $value) {
                $prods[$key]['image'] = $this->getFile1($prods[$key]['image']);
            };
            $paginator = new Paginator();
            $paginator
                ->setItemsPerPage(20) // Give us a maximum of 10 items per page
                ->setPagesInRange(5) // How many pages to display in navigation (e.g. if we have a lot of pages to get through)
            ;
            $paginator->setItemTotalCallback(function () use ($prods) {
                return count($prods);
            });
            $paginator->setSliceCallback(function ($offset, $length) use ($prods) {
                return array_slice($prods, $offset, $length);
            });
            $page = $this->page();
            $pagination = $paginator->paginate((int) $page);

            $data = [
                'user' => ['p_wallet' => 0,],
                'dir_img' => getenv('directus'),
                'pagination' => $pagination,
                'current' => $pagination->getCurrentPageNumber(),
                'products' => $prods,
            ];
            echo view('user/header');
            echo view('user/market', $data);
            echo view('user/footer');
        }
    }

    public function details()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;
            $sku = $this->request->getGet('sku');
            $users = new \App\Models\Customers();
            $products = new \App\Models\Products();
            $prod = $products->where('id', $sku)->find()[0];
            $prod['image'] = $this->getFile1($prod['image']);
            $data = [
                'user' => $users->where('user_id', $id)->find()[0],
                'product' => $prod,
                'dir_img' => getenv('directus'),
            ];
            echo view('user/header');
            echo view('user/single', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function summary()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;
            $users = new \App\Models\Users();
            $data = [
                'user' => $users->where('user', $id)->find()[0],
            ];

            echo view('user/header');
            echo view('user/summary', $data);
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function pay()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;

            $orders = new \App\Models\Orders();

            $users = new \App\Models\Customers();
            $userdb = $users->where('user_id', $id)->find()[0];
            $user_wallet = $userdb['p_wallet'];

            $incoming = $this->request->getPost();
            $price = $incoming['price'];
            $ord = json_decode(urldecode($incoming['order']));
            $order = [];
            foreach ($ord as $key => $ord) {
                $order[$key] = [
                    'name' => $ord->name,
                    'price' => $ord->price,
                    'count' => $ord->count,
                    'total' => $ord->total,
                ];
            }


            if ($user_wallet > $price) {
                $user_data = [
                    'p_wallet' => $user_wallet - $price
                ];
                $user_update = $users->update($id, $user_data);
                $data = [
                    'user_id' => $userdb['user_id'],
                    'orders' => json_encode($order),
                    'type' => 'p',
                    'status' => 'Pending',
                    'notif' => 0,
                ];
                $admin_update = $orders->insert($data);
                $dt = [
                    'title' => "Congratulation🎊🎉",
                    'msg' => "Your order was successful",
                    'url' => "Go to <a class='clear-cart' href='" . base_url() . "'>dashboard</a>",
                ];
                if ($admin_update) {
                    echo view('user/header');
                    echo view('user/message', $dt);
                    echo view('user/footer');
                }
            } else {
                $msg = 'Insufficient Balance in Product Wallet';
                echo ($msg);
            }
        } else {
            $this->login();
        }
    }

    public function personalinfo()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;
            $Users = new \App\Models\Users();
            $incoming = $this->request->getPost();
            $data = [
                'email' => $session->email,
                'password' => hash('sha1', $incoming['pass'], false),
            ];
            $result = $Users->where($data)->find();
            if ($result) {
                $res = $Users->update($id, $incoming);
                if ($res) {
                    $dt = [
                        'title' => "Successful✨",
                        'msg' => "Your profile update was successful",
                        'url' => "Go to <a href='" . base_url('profile') . "'>profile</a>",
                    ];
                    echo view('user/header', ['title'=>'Profile Update',
                    'name' => $session->fname . ' ' . $session->lname,
                    'email' => $session->email,]);
                    echo view('user/message', $dt);
                    echo view('user/footer');
                } else {
                    $dt = [
                        'title' => "😢 Sorry 😒",
                        'msg' => "Your profile update was unsuccessful",
                        'url' => "Go to <a href='" . base_url('profile') . "'>profile</a>",
                    ];
                    echo view('user/header',['title'=>'Profile Update',
                    'name' => $session->fname . ' ' . $session->lname,
                    'email' => $session->email,]);
                    echo view('user/message', $dt);
                    echo view('user/footer');
                }
            } else {
                $data = [
                    'title' => 'Verification Failed 💔',
                    'msg' => 'Confirm the password provided.',
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else {
            $this->login();
        }
    }

    public function postchgpassword()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;
            $Users = new \App\Models\Users();
            $incoming = $this->request->getPost();
            $data = [
                'email' => $session->email,
                'password' => hash('sha1', $incoming['pass'], false),
            ];
            $result = $Users->where($data)->find();
            if ($result) {
                $up = [
                    'password' => hash('sha1', $incoming['newpass'], false),
                ];
                $res = $Users->update($id, $up);
                if ($res) {
                    $dt = [
                        'title' => "Successful✨",
                        'msg' => "Your profile update was successful",
                        'url' => "Go to <a href='" . base_url('profile') . "'>profile</a>",
                    ];
                    echo view('user/header', ['title'=>'Profile Update',
                    'name' => $session->fname . ' ' . $session->lname,
                    'email' => $session->email,]);
                    echo view('user/message', $dt);
                    echo view('user/footer');
                } else {
                    $dt = [
                        'title' => "😢 Sorry 😒",
                        'msg' => "Your profile update was unsuccessful",
                        'url' => "Go to <a href='" . base_url('profile') . "'>profile</a>",
                    ];
                    echo view('user/header',['title'=>'Profile Update',
                    'name' => $session->fname . ' ' . $session->lname,
                    'email' => $session->email,]);
                    echo view('user/message', $dt);
                    echo view('user/footer');
                }
            } else {
                $data = [
                    'title' => 'Verification Failed 💔',
                    'msg' => 'Confirm the password provided.',
                    'url' => base_url()
                ];
                $this->msg($data);
            }
        } else {
            $this->login();
        }
    }

    public function withdraw()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            $id = $session->id;

            $orders = new \App\Models\Orders();

            $users = new \App\Models\Customers();
            $userdb = $users->where('user_id', $id)->find()[0];
            $user_wallet = $userdb['c_wallet'];

            $incoming = $this->request->getPost();
            $price = $incoming['amount'] + ($incoming['amount'] * 0.025);

            if ($user_wallet > $price) {
                $user_data = [
                    'c_wallet' => $user_wallet - $price
                ];
                $user_update = $users->update($id, $user_data);
                $data = [
                    'user_id' => $userdb['user_id'],
                    'orders' => $price,
                    'status' => 'Pending',
                    'type' => 'c',
                    'notif' => 0,
                ];
                $admin_update = $orders->insert($data);
                $dt = [
                    'title' => "Congratulation🎊🎉",
                    'msg' => "Your withdrawal was successful",
                    'url' => "Go to <a href='" . base_url() . "'>dashboard</a>",
                ];
                if ($admin_update) {
                    echo view('user/header');
                    echo view('user/message', $dt);
                    echo view('user/footer');
                }
            } else {
                $dt = [
                    'title' => "Sorry🙇‍♀️🙇‍♂",
                    'msg' => "You have insufficient Balance in your Cash Wallet",
                    'url' => "Go to <a class='clear-cart' href='" . base_url() . "'>dashboard</a>",
                ];
                echo view('user/header');
                echo view('user/message', $dt);
                echo view('user/footer');
            }
        } else {
            $this->login();
        }
    }

    public function about()
    {
        $session = session();
        if ($session->logged_in == TRUE) {
            echo view('user/header');
            echo view('user/about');
            echo view('user/footer');
        } else {
            $this->login();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        // $this->login();
        return redirect()->to(base_url());
    }
    //--------------------------------------------------------------------
    // Rough
    // $config = config('Email');
    // $smtp = $config->SMTPPort;
    // var_dump($smtp);
}
