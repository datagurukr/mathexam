<?
/***********************************
타임:          Class
이름:          User
용도:          User 템플렛 클래스 ( WEB 버전 )
작성자:        전병훈
생성일자:      2017.05.16 15:11:13
업데이트일자:   
Var 1.0
************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function refund_complete () {
        /*******************
        data
        *******************/
        $data = array();    
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        library
        *******************/        
        $this->load->library('form_validation');                   
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        response
        *******************/
        $response = array();           
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        if ( isset($_POST['purchase_id']) ) {
            $this->form_validation->set_rules('purchase_id','구매식별자','trim|required|numeric');
            /*******************
            data query
            *******************/     
            if ($this->form_validation->run() == TRUE ) {
                $this->load->model('purchase_model');       

                $purchase_id = $this->input->post('purchase_id',TRUE);
                if ( isset($_POST['purchase_refund_reason']) ) {
                    $purchase_refund_reason = $this->input->post('purchase_refund_reason',TRUE);                        
                } else {
                    $purchase_refund_reason = '';                    
                };

                $set_data = array ();
                $set_data['purchase_id'] = $purchase_id;        
                $set_data['purchase_state'] = array (
                    'key' => 'purchase_state',
                    'type' => 'int',
                    'value' => 3
                );
                if ( $this->purchase_model->update('update',$set_data) ) {
                    $response['update'] = TRUE;
                } else {
                    $response['update'] = FALSE;
                };                
            } else {
                show_404();                    
            };
        };
        
        /*******************
        data query
        *******************/     
		$this->load->model('purchase_model');
        $result = $this->purchase_model->out('id',array(
            'purchase_id' => $purchase_id
        ));

        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };        
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            if ( $response['update'] ) {
                $data['container'] = $this->load->view('/admin/purchase/refund_complete', $data, TRUE);
            } else {
                $data['container'] = $this->load->view('/admin/purchase/refund_fail', $data, TRUE);
            }
            $this->load->view('/admin/body', $data, FALSE);            
        };        
    }
    
    function refund () {
        /*******************
        data
        *******************/
        $data = array();    
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        library
        *******************/        
        $this->load->library('form_validation');                   
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        response
        *******************/
        $response = array();           
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        if ( isset($_POST['purchase_id']) ) {
            $this->form_validation->set_rules('purchase_id','구매식별자','trim|required|numeric');
            /*******************
            data query
            *******************/     
            if ($this->form_validation->run() == TRUE ) {
                $this->load->model('purchase_model');       

                $purchase_id = $this->input->post('purchase_id',TRUE);
                if ( isset($_POST['purchase_refund_reason']) ) {
                    $purchase_refund_reason = $this->input->post('purchase_refund_reason',TRUE);                        
                } else {
                    $purchase_refund_reason = '';                    
                };

                $set_data = array ();
                $set_data['purchase_id'] = $purchase_id;        
                $set_data['purchase_state'] = array (
                    'key' => 'purchase_state',
                    'type' => 'int',
                    'value' => 2
                );
                if ( isset($_POST['purchase_refund_reason']) ) {
                    $set_data['purchase_refund_reason'] = array (
                        'key' => 'purchase_refund_reason',
                        'type' => 'string',
                        'value' => $purchase_refund_reason
                    );
                };                
                if ( $this->purchase_model->update('update',$set_data) ) {
                    $response['update'] = TRUE;
                } else {
                    $response['update'] = FALSE;
                };                
            } else {
                show_404();                    
            };
        };
        
        /*******************
        data query
        *******************/     
		$this->load->model('purchase_model');
        $result = $this->purchase_model->out('id',array(
            'purchase_id' => $purchase_id
        ));

        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };        
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            if ( $response['update'] ) {
                $data['container'] = $this->load->view('/front/purchase/refund_complete', $data, TRUE);
            } else {
                $data['container'] = $this->load->view('/front/purchase/refund_fail', $data, TRUE);
            }
            $this->load->view('/front/body', $data, FALSE);            
        };
    }        
    
    function pay ( $subject_id = 0, $action = '' ) {        
        /*******************
        data
        *******************/
        $data = array();    
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        library
        *******************/        
        $this->load->library('form_validation');                   
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        response
        *******************/
        $response = array();           
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $this->load->model('user_model');                                       
            $session_id = $data['session']['users_id'];            
            $user_result = $this->user_model->out('id', array(
                'user_id' => $session_id
            ));
            if ( $user_result ) {
                $data['session_email'] = $user_result[0]['user_email'];
            }
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            $this->load->helper('url');
            redirect('/login', 'refresh');            
        };
        $data['session_id'] = $session_id;
        
        if ( $action == 'delete' ) {
            
        } else {
            if ( isset($_POST['pay_subject_id']) && isset($_POST['pay_subject_name']) && isset($_POST['pay_subject_price']) ) {
                $this->form_validation->set_rules('pay_subject_id','서브코스','trim|required|numeric');
                $this->form_validation->set_rules('pay_subject_name','서브코스','trim|required');
                $this->form_validation->set_rules('pay_subject_price','가격','trim|required|numeric');
                
                /*******************
                data query
                *******************/     
                if ($this->form_validation->run() == TRUE ) {
                    echo 'asd';
                    $this->load->model('purchase_model');       
                    $purchase_id = mt_rand();
                    $result = $this->purchase_model->update('create', array(
                        'purchase_id' => $purchase_id,
                        'user_id' => $session_id,                        
                        'subject_id' => $this->input->post('pay_subject_id',TRUE),
                        'purchase_name' => $this->input->post('pay_subject_name',TRUE),
                        'purchase_price' => $this->input->post('pay_subject_price',TRUE),
                        'purchase_state' => 1
                    ));
                    if ( $result ) {
                        // 구매완료
                        $this->load->model('subject_model');
                        $result = $this->subject_model->pay('create', array(
                            'relation_id' => mt_rand(),
                            'user_id' => $session_id,                        
                            'subject_id' => $this->input->post('pay_subject_id',TRUE)
                        ));
                        if ( $result ) {
                            $response['update'] = TRUE;                        
                        } else {
                            $result = $this->subject_model->out('user_subject',array(
                                'user_id' => $session_id,
                                'subject_id' => $this->input->post('pay_subject_id',TRUE)                                
                            ));
                            if ( $result ) {
                                $response['update'] = TRUE;                                
                            } else {
                                $response['update'] = FALSE;                                
                            }
                        };
                        
                        if ( $response['update'] ) {
                            $result = $this->purchase_model->out('id', array(                            
                                'purchase_id' => $purchase_id
                            ));
                            $response['status'] = 200;                                                
                            $response['data'] = array(
                                'out' => $result,
                                'count' => count($result)
                            );
                        }
                    } else {
                        // 구매실패
                        $response['update'] = FALSE;
                    };
                } else {
                    show_404();                    
                };
            };
        };
        
        /*******************
        data query
        *******************/     
		$this->load->model('subject_model');
    
        $filename = './assets/file/returnpolicy.txt';
        if ( isset($_POST['content']) ) {
            $content = $this->input->post('content',TRUE);
            $file = fopen($filename, "w") or die("Unable to open file!");
            fwrite($file, $content);
            fclose($file);
        }
        
        if (file_exists($filename)) {
            $file = fopen($filename,"r"); 
            $returnpolicy = fread($file, filesize($filename)); fclose($file);
        }              
        
        if ( !isset($response['data']) ) {
            $result = $this->subject_model->out('id',array(
                'subject_id' => $subject_id
            ));
            
            if ( $result ) {
                $response['status'] = 200;                    
                $response['data'] = array(
                    'out' => $result,
                    'returnpolicy' => $returnpolicy,
                    'count' => count($result)
                );        
            } else {
                $response['status'] = 401;
            };        
        }
        
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            if ( isset($response['update']) ) {
                if ( $response['update'] ) {
                    $data['container'] = $this->load->view('/front/purchase/pay_complete', $data, TRUE);
                } else {
                    $data['container'] = $this->load->view('/front/purchase/pay_fail', $data, TRUE);
                }
            } else {
                $data['container'] = $this->load->view('/front/purchase/pay', $data, TRUE);                
            }
            $this->load->view('/front/body', $data, FALSE);            
        };
    }
    
}
?>