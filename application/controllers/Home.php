<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Controller Home
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jeff Maruli <jefrimaruli@gmail.com>
 * @link      https://github.com/xietsunzao/
 * @param     ...
 * @return    ...
 *
 */

class Home extends CI_Controller
{

    /**
     * __construct.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Monday, November 18th, 2019.	
     * @version	v1.0.1	Monday, November 25th, 2019.
     * @access	public
     * @return	void
     */
    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('Home_Model', 'home');
    }

    /**
     * index.
     *
     * @author	Jeff Maruli <jefrimaruli@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.1	Monday, November 18th, 2019.	
     * @version	v1.0.2	Thursday, November 21st, 2019.
     * @access	public
     * @return	void
     */
    public function index()
    {
        $title = 'Home';
        $mahasiswa = anchor('mahasiswa', 'Data Mahasiswa');
        $prodi = anchor('prodi', 'Data Program Studi');
        $konsentrasi = anchor('konsentrasi', 'Data Konsentrasi');
        $jenjang = anchor('jenjang', 'Data Jenjang');
        $box = $this->info_box();
        $data = array(
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'konsentrasi' => $konsentrasi,
            'jenjang' => $jenjang,
            'title' => $title,
            'box' => $box,
        );
        $this->template->load('template/template_v', 'home/home_v', $data);
    }

    public function info_box()
    {
        $box = [
            [
                'color'         => 'facebook',
                'total'     => $this->home->total('pendaftaran_peserta'),
                'title'        => 'Total peserta',
                'icon'        => 'users'
            ],
            [
                'color'         => 'success',
                'total'     => $this->home->total('narasumber'),
                'title'        => 'Total Narasumber',
                'icon'        => 'poll'
            ],
            [
                'color'         => 'warning',
                'total'     => $this->home->total('stakeholder'),
                'title'        => 'Total Stakeholder',
                'icon'        => 'book'
            ],
            [
                'color'         => 'googleplus',
                'total'     => $this->home->total('event'),
                'title'        => 'Total Event',
                'icon'        => 'layer-group'
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
