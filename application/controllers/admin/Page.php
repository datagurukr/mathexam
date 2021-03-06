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

class Page extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function returnpolicy ( ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'returnpolicy';
        
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
        if ( isset($data['session']['logged_in']) && isset($data['session']['admin']) ) {
            if ( $data['session']['admin'] ) {
                $session_id = $data['session']['users_id'];                
            } else {
                $session_id = 0;
            };
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/
        $result = FALSE;
        $filename = './assets/file/returnpolicy.txt';
        if ( isset($_POST['content']) ) {
            $content = $this->input->post('content',TRUE);
            $file = fopen($filename, "w") or die("Unable to open file!");
            fwrite($file, $content);
            fclose($file);
        }
        
        if (file_exists($filename)) {
            $file = fopen($filename,"r"); 
            $result = fread($file, filesize($filename)); fclose($file);
        }      
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result
            );        
        } else {
            $response['status'] = 401;
        };         
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/admin/page/returnpolicy', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }        
        
    function privacy ( ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'privacy';
        
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
        if ( isset($data['session']['logged_in']) && isset($data['session']['admin']) ) {
            if ( $data['session']['admin'] ) {
                $session_id = $data['session']['users_id'];                
            } else {
                $session_id = 0;
            };
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/
        $result = FALSE;
        $filename = './assets/file/privacy.txt';
        if ( isset($_POST['content']) ) {
            $content = $this->input->post('content',TRUE);
            $file = fopen($filename, "w") or die("Unable to open file!");
            fwrite($file, $content);
            fclose($file);
        }
        
        if (file_exists($filename)) {
            $file = fopen($filename,"r"); 
            $result = fread($file, filesize($filename)); fclose($file);
        }      
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result
            );        
        } else {
            $response['status'] = 401;
        };         
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/admin/page/privacy', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }
    
    function terms ( ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'privacy';
        
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
        if ( isset($data['session']['logged_in']) && isset($data['session']['admin']) ) {
            if ( $data['session']['admin'] ) {
                $session_id = $data['session']['users_id'];                
            } else {
                $session_id = 0;
            };
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/
        $result = FALSE;
        $filename = './assets/file/terms.txt';
        if ( isset($_POST['content']) ) {
            $content = $this->input->post('content',TRUE);
            $file = fopen($filename, "w") or die("Unable to open file!");
            fwrite($file, $content);
            fclose($file);
        }
        
        if (file_exists($filename)) {
            $file = fopen($filename,"r"); 
            $result = fread($file, filesize($filename)); fclose($file);
        }
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result
            );        
        } else {
            $response['status'] = 401;
        };        
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/admin/page/terms', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }    
    
}
?>