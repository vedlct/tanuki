<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GridList extends CI_Controller
{

    public function gridLists()
    {
        $this->load->view('grid_list');

    }
}