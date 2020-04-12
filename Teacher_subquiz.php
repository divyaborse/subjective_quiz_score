<?php
class Teacher_subquiz extends CI_Controller{

	public function index() {
		if ($this->session->userdata('teacherlogin')['id']) {

			redirect(base_url() . 'Teacher_subquiz/dashboard');
		}
		redirect(base_url());
	}
	public function login() {

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$teacher_login = array(
				'email' => htmlspecialchars((strip_tags(trim($this->input->post('t_email'))))),
				'password' => md5(htmlspecialchars(strip_tags(trim($this->input->post('t_password'))))),
			);
			$this->load->model('Model_teacher', 'mt');
			$result_login = $this->mt->login_teacher($teacher_login);

			if ($result_login == true) {
				$resultlogin = $this->mt->getteacherData(htmlspecialchars(strip_tags(trim($this->input->post('t_email')))));
				print_r($resultlogin);
				$session_data = array(
					'id' => $resultlogin[0]['id'],
					'name' => $resultlogin[0]['name'],
					'email' => $resultlogin[0]['email'],
					'contact' => $resultlogin[0]['contact'],
					'gender' => $resultlogin[0]['gender'],
					'type' => $resultlogin[0]['type'],
					'school' => $resultlogin[0]['school'],
				);
				// Add user data in session
				$this->session->set_userdata('teacherlogin', $session_data);
				if ($this->session->userdata('studentlogin')['id']) {
					$this->session->unset_userdata('studentlogin');
				}
				//activity track
				$this->load->model('Model_clientIP');
				date_default_timezone_set('Asia/Kolkata');
				$activity = array(
					'user_id' => $this->session->userdata('teacherlogin')['id'],
					'user_name' => $this->session->userdata('teacherlogin')['name'] . '(' . $this->session->userdata('teacherlogin')['school'] . ')',
					'system_info' => php_uname(),
					'activity_name' => 'school_' . $resultlogin['type'] . '_teacher_login',
					'access_date_time' => date('Y-m-d H:i:s', time()),
				);

				$this->Model_clientIP->user_Activity($activity);
				//actiivty track end
				redirect(base_url() . 'Teacher_subquiz/dashboard');
			} else {
				$cdata = array(
					'flag' => 40,
				);

				$this->session->set_flashdata('o_register', $cdata);
				redirect(base_url());
			}
		}
	}
	public function dashboard() {
		if (!$this->session->userdata('teacherlogin')['id']) {

			redirect(base_url());
		}
		$data['page_title'] = 'Intelify | Teacher';
		$this->load->model('Model_final_quiz');
		$data['data']=$this->Model_final_quiz->display_quizname();

		$this->load->view('accounthquiz');
		$this->load->view('Subjective', $data);
		$this->load->view('accountfooter');
	}
	public function show(){
		$this->load->model('Model_final_quiz');
	$data['data']=$this->Model_final_quiz->fetch_data($this->input->post("hidden_id"));
	$this->load->view('attempt_quiz',$data);
	}
	
	}
	?>