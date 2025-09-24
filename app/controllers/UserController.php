<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        // Load dependencies for get_all listing
        $this->call->library('Pagination');
        $this->call->model('StudentsModel');
    }

    public function profile($username, $name) {
        $data['username'] = $username;
        $data['name'] = $name;
        $this->call->view('ViewProfile', $data);
    }

    public function show()
    {
        $data ['students'] = $this->UserModel->all();
        $this->call->view('Showdata', $data);
    }

    public function get_all() {
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $all = $this->StudentsModel->page($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮️ First',
            'last_link'      => 'Last ⏭️',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('students/get-all').'?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('students/get_all', $data);
    }

    public function create()
    {
        if($this->io->method() == 'post')
        {
            $last_name = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
            );
            if($this->UserModel->insert($data))
            {
            redirect('user/show');
            }else{
                echo 'Failed to insert data.';
            }
            }else{
                    $this->call->view('Create');
            }
        }

        public function update($id)
        {
            $data ['student'] = $this->UserModel->find($id);
            if($this->io->method() == 'post')
            {
                $last_name = $this->io->post('last_name');
                $first_name = $this->io->post('first_name');
                $email = $this->io->post('email');
                $data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email' => $email,
                );
                if($this->UserModel->update($id, $data))
                {
                    redirect('user/show');
                }else{
                    echo 'Failed to update data.';
                }
            }
            $this->call->view('Update', $data);
        }

        public function delete($id)
        {
            if($this->UserModel->delete($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function soft_delete($id)
        {
            if($this->UserModel->soft_delete($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function restore($id)
        {
            if($this->UserModel->restore($id))
            {
                redirect('user/show');
            }else{
                echo 'Failed to restore data.';
            }
        }
    }
